<?php

namespace App\Livewire\Records;

use App\Models\AcademicPeriod;
use App\Models\AcquisitionStatus;
use App\Models\CoverType;
use App\Models\DdcClassification;
use App\Models\PhysicalLocation;
use App\Models\Record;
use App\Models\Source;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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

    public $imported_count = 0;

    public function updatingSearch(): void
    {
        $this->resetPage(); // Reset pagination when search changes
    }

    // for modal
    public $isModalOpen = false;
    public function openModal(): void
    {
        $this->isModalOpen = true;
    }
    public function closeModal(): void
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

                $failed_count = 0;
                $errors = [];

                foreach ($csv_data as $row_index => $row) {
                    try {
                        // Trim all values in the row and check for emptiness
                        $row = array_map('trim', $row); // Trim all values
                        if (empty(array_filter($row, fn($value) => $value !== '' && $value !== null))) {
                            \Log::warning('Skipping empty row ' . ($row_index + 1) . ':', $row);
                            continue;
                        }

                        // handle this, 01-06-93, here
                        $date_received = null;
                        if (!empty($row[2]) && is_string($row[2])) {
                            try {
                                // log the row here:
                                $date_received = Carbon::createFromFormat('m/d/Y', trim($row[2]))->format('Y-m-d');
                            } catch (\Exception $e) {
                                $failed_count++;
                                $errors[] = "Row " . ($row_index + 1) . ": Invalid date format in date_received: " . $row[2];
                                Log::info('Processing row', ['row_index' => $row_index + 1, 'data' => $row]);
                                continue;
                            }
                        }

                        $subject_headings = null;
                        if (isset($row[13]) && !empty(trim($row[13]))) {
                            $subject_headings = trim($row[13]);
                        }

                        $record_data = [
                            'accession_number' => $row[1] ?? null,
                            'date_received' => $date_received,
                            'title' => $row[5] ?? null,
                            'acquisition_status' => AcquisitionStatus::where('key', 'available')->first()->name,
                            'imported_by' => Auth::user()->id,
                            'subject_headings' => $subject_headings,
                        ];

                        $volume = null;
                        if (isset($row[0]) && !empty(trim($row[0]))) {
                            $volume = trim($row[0]);
                        }

                        $authors = [];
                        if (isset($row[4]) && !empty(trim($row[4]))) {
                            $authors = array_map('trim', explode(',', trim($row[4])));
                        }

                        $edition = null;
                        if (isset($row[6]) && !empty(trim($row[6]))) {
                            $edition = trim($row[6]);
                        }

                        $publication_year = $row[11] ?? null;
                        if ($publication_year === '' || $publication_year === '-') {
                            $publication_year = null;
                        }

                        $publisher = null;
                        if (isset($row[10]) && !empty(trim($row[10]))) {
                            $publisher = trim($row[10]);
                        }

                        $publication_place = null;
                        if (isset($row[9]) && !empty(trim($row[9]))) {
                            $publication_place = trim($row[9]);
                        }

                        $isbn = null;
                        if (isset($row[12]) && !empty(trim($row[12]))) {
                            $isbn = trim($row[12]);
                            if ($isbn === '-') {
                                $isbn = null;
                            }
                        }

                        $call_number = null;
                        if (isset($row[3]) && !empty(trim($row[3]))) {
                            $call_number = trim($row[3]);
                        }

                        $ddc_class_id = null;
                        if (isset($row[7]) && !empty(trim($row[7]))) {
                            $ddc_class_name = ucwords(strtolower(trim($row[7])));
                            $ddc_class = DdcClassification::where('name', $ddc_class_name)->first();
                            if ($ddc_class) {
                                $ddc_class_id = $ddc_class->id;
                            } else {
                                $ddc_class_id = DdcClassification::create([
                                    'name' => $ddc_class_name,
                                    'code' => strlen($ddc_class_name) >= 3 ? substr($ddc_class_name, 0, 3) : $ddc_class_name
                                ])->id;
                            }
                        }

                        $physical_location_id = null;
                        if (isset($row[8]) && !empty(trim($row[8]))) {
                            $physical_location_name = ucwords(strtolower(trim($row[8])));
                            $physical_location = PhysicalLocation::where('name', $physical_location_name)->first();
                            if ($physical_location) {
                                $physical_location_id = $physical_location->id;
                            } else {
                                $physical_location_id = PhysicalLocation::create([
                                    'name' => $physical_location_name,
                                    'symbol' => strlen($physical_location_name) >= 3 ? substr($physical_location_name, 0, 3) : $physical_location_name
                                ])->id;
                            }
                        }

                        $cover_type_id = null;
                        if (isset($row[16]) && !empty(trim($row[16]))) {
                            $cover_type_name = trim($row[16]);
                            $cover_type = CoverType::where('name', ucwords(strtolower($cover_type_name)))->first();
                            if ($cover_type) {
                                $cover_type_id = $cover_type->id;
                            } else {
                                $cover_type_id = CoverType::create([
                                    'key' => strtolower($cover_type_name),
                                    'name' => $cover_type_name
                                ])->id;
                            }
                        }

                        $cover_image = null;
                        if (isset($row[19]) && !empty(trim($row[19]))) {
                            $cover_image = trim($row[19]);
                            if ($cover_image === '-') {
                                $cover_image = null;
                            }
                        }

                        $source_id = null;
                        if (isset($row[15]) && !empty(trim($row[15]))) {
                            $source_name = trim($row[15]);
                            $source_from_db = Source::where('name', ucwords(strtolower($row[15])))->first();
                            if ($source_from_db) {
                                $source_id = $source_from_db->id;
                            } else {
                                $source_id = Source::create([
                                    'key' => strtolower($source_name),
                                    'name' => $source_name
                                ])->id;
                            }
                        }

                        $source = null;
                        $donated_by = null;
                        $purchaseAmount = $row[17] ?? null;
                        if (!is_numeric($purchaseAmount) || $purchaseAmount < 0) {
                            $donated_by = $purchaseAmount;
                            $source = 'Donation';
                            $purchaseAmount = null;
                        }

                        $supplier = null;
                        if (isset($row[18]) && !empty(trim($row[18]))) {
                            $supplier = trim($row[18]);
                        }


                        $table_of_contents = null;
                        if (isset($row[14]) && !empty(trim($row[14]))) {
                            $raw_content = trim($row[14]);

                            // Step 1: Clean the content
                            // Replace double dashes with a single space or dash
                            $cleaned_content = str_replace('--', ' - ', $raw_content);

                            // Step 2: Remove excessive whitespace and normalize
                            $cleaned_content = preg_replace('/\s+/', ' ', trim($cleaned_content));

                            // Step 3: Optional - Split into array for structured storage (e.g., JSON)
                            $toc_array = explode(' - ', $cleaned_content);
                            $table_of_contents = json_encode($toc_array); // Store as JSON for flexibility
                            // OR keep as string: $table_of_contents = $cleaned_content;
                        }

                        $book_data = [
                            'volume' => $volume,
                            'authors' => $authors,
                            'edition' => $edition,
                            'publication_year' => $publication_year,
                            'publisher' => $publisher,
                            'publication_place' => $publication_place,
                            'isbn' => $isbn,

                            'call_number' => $call_number,
                            'ddc_class_id' => $ddc_class_id,
                            'physical_location_id' => $physical_location_id,

                            'cover_type_id' => $cover_type_id,
                            'cover_image' => '/uploads/book_cover_images/' . $cover_image,

                            'source_id' => $source ?? $source_id,
                            'purchase_amount' => $purchaseAmount,
                            'supplier' => $supplier,
                            'donated_by' => $donated_by,

                            'table_of_contents' => $table_of_contents,
                        ];

                        // reset after use
                        $purchaseAmount = null;
                        $donated_by = null;
                        $source = null;

                        // initialize
                        $remark_data = [];

                        if (isset($row[20]) && !empty(trim($row[20]))) {
                            $content = trim($row[20]);
                            $remark_data[] = [
                                'academic_period_id' => AcademicPeriod::where('academic_year', '2007-2008')
                                    ->where('semester', 'Whole Year')->first()->id,
                                'content' => $content,
                            ];
                        }
                        if (isset($row[21]) && !empty(trim($row[21]))) {
                            $content = trim($row[21]);
                            $remark_data[] = [
                                'academic_period_id' => AcademicPeriod::where('academic_year', '2008-2009')
                                    ->where('semester', 'Whole Year')->first()->id,
                                'content' => $content,
                            ];
                        }
                        if (isset($row[22]) && !empty(trim($row[22]))) {
                            $content = trim($row[22]);
                            $remark_data[] = [
                                'academic_period_id' => AcademicPeriod::where('academic_year', '2009-2010')
                                    ->where('semester', 'Whole Year')->first()->id,
                                'content' => $content,
                            ];
                        }
                        if (isset($row[23]) && !empty(trim($row[23]))) {
                            $content = trim($row[23]);
                            $remark_data[] = [
                                'academic_period_id' => AcademicPeriod::where('academic_year', '2010-2011')
                                    ->where('semester', 'Whole Year')->first()->id,
                                'content' => $content,
                            ];
                        }
                        if (isset($row[24]) && !empty(trim($row[24]))) {
                            $content = trim($row[24]);
                            $remark_data[] = [
                                'academic_period_id' => AcademicPeriod::where('academic_year', '2011-2012')
                                    ->where('semester', 'Whole Year')->first()->id,
                                'content' => $content,
                            ];
                        }
                        if (isset($row[25]) && !empty(trim($row[25]))) {
                            $content = trim($row[25]);
                            $remark_data[] = [
                                'academic_period_id' => AcademicPeriod::where('academic_year', '2017-2018')
                                    ->where('semester', 'Whole Year')->first()->id,
                                'content' => $content,
                            ];
                        }
                        if (isset($row[26]) && !empty(trim($row[26]))) {
                            $content = trim($row[26]);
                            $remark_data[] = [
                                'academic_period_id' => AcademicPeriod::where('academic_year', '2018-2019')
                                    ->where('semester', 'Whole Year')->first()->id,
                                'content' => $content,
                            ];
                        }
                        if (isset($row[27]) && !empty(trim($row[27]))) {
                            $content = trim($row[27]);
                            $remark_data[] = [
                                'academic_period_id' => AcademicPeriod::where('academic_year', '2019-2020')
                                    ->where('semester', 'Whole Year')->first()->id,
                                'content' => $content,
                            ];
                        }
                        if (isset($row[28]) && !empty(trim($row[28]))) {
                            $content = trim($row[28]);
                            $remark_data[] = [
                                'academic_period_id' => AcademicPeriod::where('academic_year', '2020-2021')
                                    ->where('semester', 'Whole Year')->first()->id,
                                'content' => $content,
                            ];
                        }
                        if (isset($row[29]) && !empty(trim($row[29]))) {
                            $content = trim($row[29]);
                            $remark_data[] = [
                                'academic_period_id' => AcademicPeriod::where('academic_year', '2021-2022')
                                    ->where('semester', 'Whole Year')->first()->id,
                                'content' => $content,
                            ];
                        }
                        if (isset($row[30]) && !empty(trim($row[30]))) {
                            $content = trim($row[30]);
                            $remark_data[] = [
                                'academic_period_id' => AcademicPeriod::where('academic_year', '2022-2023')
                                    ->where('semester', 'Whole Year')->first()->id,
                                'content' => $content,
                            ];
                        }
                        if (isset($row[31]) && !empty(trim($row[31]))) {
                            $content = trim($row[31]);
                            $remark_data[] = [
                                'academic_period_id' => AcademicPeriod::where('academic_year', '2023-2024')
                                    ->where('semester', '1st Semester')->first()->id,
                                'content' => $content,
                            ];
                        }
                        if (isset($row[32]) && !empty(trim($row[32]))) {
                            $content = trim($row[32]);
                            $remark_data[] = [
                                'academic_period_id' => AcademicPeriod::where('academic_year', '2023-2024')
                                    ->where('semester', '2nd Semester')->first()->id,
                                'content' => $content,
                            ];
                        }
                        if (isset($row[33]) && !empty(trim($row[33]))) {
                            $content = trim($row[33]);
                            $remark_data[] = [
                                'academic_period_id' => AcademicPeriod::where('academic_year', '2023-2024')
                                    ->where('semester', 'Whole Year')->first()->id,
                                'content' => $content,
                            ];
                        }

                        // Clean and validate data
                        $record_data['title'] = trim($record_data['title']);

                        // Check for duplicate ISBN if provided
                        if (!empty($book_data['accession_number'])) {
                            $existing_book = \App\Models\Record::where('accession_number', $book_data['accession_number'])->first();
                            if ($existing_book) {
                                $failed_count++;
                                $errors[] = "Row " . ($row_index + 1) . ": Book with Accession Number {$book_data['isbn']} already exists";
                                continue;
                            }
                        }

                        // Validate required fields
                        if (!empty($record_data['title']) || !empty($book_data['accession_number'])) {

                            // Create the book record
                            $record = Record::create($record_data);
                            $record->book()->create($book_data);

                            foreach ($remark_data as $remark) {
                                $record->remarks()->create($remark);
                            }

                            $this->imported_count++;
                        }

                    } catch (\Exception $e) {
                        $failed_count++;
                        $errors[] = "Row " . ($row_index + 1) . ": " . $e->getMessage();
                    }
                }

                // Clean up the uploaded file
                if (file_exists($csv_path)) {
                    unlink($csv_path);
                }

                // Prepare success/error messages
                $success_message = "Import completed! {$this->imported_count} book(s) imported successfully.";
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
        $query = Record::with(['book.ddcClassification'])
            ->whereHas('book');

        // Apply search filter if search term is provided
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('accession_number', 'like', '%' . $this->search . '%')
                    ->orWhereHas('book', function ($bookQuery) {
                        $bookQuery->where('title', 'like', '%' . $this->search . '%')
                            ->orWhere('authors', 'like', '%' . $this->search . '%')
                            ->orWhere('publication_year', 'like', '%' . $this->search . '%')
                            ->orWhereHas('ddcClassification', function ($ddcQuery) {
                                $ddcQuery->where('name', 'like', '%' . $this->search . '%');
                            });
                    })
//                    ->orWhere('lc_classification', 'like', '%' . $this->search . '%')
                ;
            });
        }

        $records = $query->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.records.books-index', [
            'records' => $records,
        ])->layout('components.layouts.records', ['headingTitle' => 'Manage Books']);
    }
}
