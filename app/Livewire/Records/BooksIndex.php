<?php

namespace App\Livewire\Records;

use App\Models\AcquisitionStatus;
use App\Models\CoverType;
use App\Models\DdcClassification;
use App\Models\PhysicalLocation;
use App\Models\Record;
use App\Models\Source;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BooksIndex extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search = '';
    public $perPage = 10; // Adjust as needed
    public $import_csv;

    public function updatingSearch(): void
    {
        $this->resetPage(); // Reset pagination when search changes
    }

    // for modal
    public $isModalOpen = false;
    public function openModal()
    {
        $this->isModalOpen = true;
    }
    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function rules()
    {
        return [
            'import_csv' => 'required|file|mimes:csv,txt|max:2048',
        ];
    }

    public function submit() {

        try {

            $this->validate();

            $csv_path = null;
            if ($this->import_csv) {
                $csv_path = $this->import_csv->store('uploads/book_csv_imports', 'public');
            }

            if ( $csv_path && Storage::disk('public')->exists($csv_path) ) {

                $csv_content = Storage::disk('public')->get($csv_path);
                $csv_data = array_map('str_getcsv', explode("\n", $csv_content));

                // Remove header row if it exists
                $headers = array_shift($csv_data);

                $imported_count = 0;
                $failed_count = 0;
                $errors = [];

                foreach ($csv_data as $row_index => $row) {
                    try {
                        // Skip empty rows
                        if (empty(array_filter($row))) {
                            continue;
                        }

                        // validating invalid purchase amount
                        $purchaseAmount = $row[17] ?? null;
                        $donated_by = null;
                        $source = null;
                        if (!is_numeric($purchaseAmount) || $purchaseAmount < 0) {
                            $donated_by = $purchaseAmount;
                            $source = 'Donation';
                        }

                        $record_data = [
                            'volume' => $row[0] ?? null,
                            'accession_number' => $row[1] ?? null,
                            'date_received' => $row[2] ?? null,
                            'title' => $row[5] ?? null,
                            'acquisition_status' => AcquisitionStatus::where('key', 'available')->first()->name,
                            'imported_by' => Auth::user()->id,
                        ];

                        $book_data = [
                            'authors' => $row[4] ?? null,
                            'edition' => $row[6] ?? null,
                            'publication_year' => $row[11] ?? null,
                            'publisher' => $row[10] ?? null,
                            // pa endorse sa ko
                            'publication_place' => $row[9] ?? null,
                            'isbn' => $row[12] ?? null,

                            'call_number' => $row[3] ?? null,

                            'ddc_class_id' => DdcClassification::where('name', ucwords(strtolower($row[7])))->firstOrCreate()->id,
                            'location' => PhysicalLocation::where('name', ucwords(strtolower($row[8])))->firstOrCreate()->id,

                            'cover_type' => CoverType::where('name', ucwords(strtolower($row[16])))->firstOrCreate()->id,
                            'cover_image' => '/uploads/book_cover_images/' . $row[19] ?? null,


                            'source_id' => $source ?? Source::where('name', ucwords(strtolower($row[15])))->firstOrCreate()->id,

                            'purchased_amount' => $purchaseAmount,

                            'supplier' => $row[18] ?? null,
                            'donated_by' => $donated_by,

                            'table_of_contents' => $row[14] ?? null,
                        ];

                        $remark_data = [];

                        if ($row[17]) {
                            $remark_data = [
                                'academic_period_id' => 2007-2008,
                                'content' => $row[18] ?? null,
                            ];
                        }

                        // reset after use
                        $purchaseAmount = null;
                        $donated_by = null;
                        $source = null;

                        // Validate required fields
                        if (empty($record_data['title']) || empty($book_data['authors'])) {
                            $failed_count++;
                            $errors[] = "Row " . ($row_index + 2) . ": Title and Author are required";
                            continue;
                        }

                        // Clean and validate data
                        $record_data['title'] = trim($record_data['title']);

                        // Check for duplicate ISBN if provided
                        if (!empty($book_data['isbn'])) {
                            $existing_book = \App\Models\Book::where('isbn', $book_data['isbn'])->first();
                            if ($existing_book) {
                                $failed_count++;
                                $errors[] = "Row " . ($row_index + 2) . ": Book with ISBN {$book_data['isbn']} already exists";
                                continue;
                            }
                        }

                        // Create the book record
                        $record = Record::create($record_data);
                        $record->book()->create($book_data);
                        $record->remarks()->create($remark_data);

                        $imported_count++;

                    } catch (\Exception $e) {
                        $failed_count++;
                        $errors[] = "Row " . ($row_index + 2) . ": " . $e->getMessage();
                    }
                }

                // Clean up the uploaded file
                if (file_exists($csv_path)) {
                    unlink($csv_path);
                }

                // Prepare success/error messages
                $success_message = "Import completed! {$imported_count} book(s) imported successfully.";
                if ($failed_count > 0) {
                    $success_message .= " {$failed_count} row(s) failed.";
                }

                if (!empty($errors)) {
                    session()->flash('import_errors', $errors);
                } else {
                    session()->flash('success', $success_message);
                }

            } else {
                session()->flash('error', 'No file uploaded.');
            }

            // Reset the file input after saving
            $this->reset();
            $this->resetValidation();

        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database-specific errors
            $message = app()->environment('production')
                ? 'Failed to add record. Please try again.'
                : 'Failed to add record: ' . $e->getMessage();
            session()->flash('error', $message);
        } catch (\Exception $e) {
            // Handle any other unexpected errors
            $message = app()->environment('production')
                ? 'An unexpected error occurred. Please try again.'
                : 'An unexpected error occurred: ' . $e->getMessage();
            session()->flash('error', $message);
        }
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $records = Record::with('book')
            ->whereHas('book')
            ->when($this->search, function ($query) {
                $query->where('accession_number', 'like', '%' . $this->search . '%')
                    ->orWhere('title', 'like', '%' . $this->search . '%')
                    ->orWhere('ddc_classification', 'like', '%' . $this->search . '%')
                    ->orWhereHas('book', function ($query) {
                        $query->where('author', 'like', '%' . $this->search . '%');
                    })->orWhereHas('book', function ($query) {
                        $query->where('publication_year', 'like', '%' . $this->search . '%');
                    });
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.records.books-index', [
            'records' => $records,
        ])->layout('components.layouts.records', ['headingTitle' => 'Manage Books']);
    }
}
