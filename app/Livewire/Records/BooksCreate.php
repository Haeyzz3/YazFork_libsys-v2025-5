<?php

namespace App\Livewire\Records;

use App\Models\CoverType;
use App\Models\DdcClassification;
use App\Models\LcClassification;
use App\Models\PhysicalLocation;
use App\Models\Record;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class BooksCreate extends Component
{
    use WithFileUploads;

    public $ddc_classifications = [];
    public $lc_classifications = [];
    public $physical_locations = [];
    public $cover_types = [];
    public $sources = [];
    public $acquisition_statuses = [];
    public $conditions = [];

    // records fields
    public $title = '';
    public $accession_number = '';
    public $acquisition_status = "";
    public  $condition = "";
    public  $subject_headings = [''];

    // books fields
    public $authors = [''];
    public $editors = [''];
    public $publication_year = '';
    public $publisher = '';
    public $publication_place = '';
    public $edition = '';
    public $isbn = '';
    public $volume = '';
    public $call_number = '';
    public $ddc_class_id = "";
    public $lc_class_id = "";
    public $physical_location_id = "";
    public $cover_type_id = '';
    public $cover_image = '';
    public $ics_number = '';
    public $ics_date = null;
    public $pr_number = '';
    public $pr_date = null;
    public $po_number = '';
    public $po_date = null;
    public $source_id = '';
    public $purchase_amount = null;
    public $lot_cost = null;
    public $supplier = '';
    public $donated_by = '';
    public $replaced_by = '';
    public $transferred_from = '';

    public $table_of_contents = '';

    public function mount()
    {
        // Fetch DDC classifications from the database
        $this->ddc_classifications = DdcClassification::pluck('name','id')->toArray();
        $this->lc_classifications = LcClassification::pluck('name','id')->toArray();
        $this->physical_locations = PhysicalLocation::pluck('name','id')->toArray();
        $this->cover_types = CoverType::pluck('name','id')->toArray();
        $this->sources = DB::table('sources')->pluck('name', 'id')->toArray();
        $this->acquisition_statuses = DB::table('acquisition_statuses')->pluck('name', 'key')->toArray();
        $this->conditions = DB::table('conditions')->pluck('label', 'key')->toArray();
    }

    public function rules()
    {
        return [
            // Records fields
            'title' => 'required|string|max:255',
            'accession_number' => 'required|string|max:50|unique:records,accession_number',
            'acquisition_status' => 'nullable|string|max:50',
            'condition' => 'nullable|string|max:100',
            'subject_headings.*' => 'string|max:100',

            // Books fields
            'volume' => 'nullable|string|max:100',
            'authors.*' => 'string|max:100',
            'editors.*' => 'string|max:100',
            'publication_year' => 'nullable|integer|min:1000|max:' . now()->year,
            'publisher' => 'nullable|string|max:255',
            'isbn' => 'nullable|string|max:20|unique:books,isbn',
            'publication_place' => 'nullable|string|max:255',
            'edition' => 'nullable|string|max:100',
            'call_number' => 'nullable|string|max:50',
            'ddc_class_id' => 'nullable|exists:ddc_classifications,id',
            'lc_class_id' => 'nullable|exists:lc_classifications,id',
            'physical_location_id' => 'nullable|exists:physical_locations,id',
            'cover_type_id' => 'nullable|exists:cover_types,id',
            'cover_image' => 'nullable|image|max:2048', // adjust size if needed
            'ics_number' => 'nullable|string|max:50',
            'ics_date' => 'nullable|date|date_format:Y-m-d|before_or_equal:today',
            'pr_number' => 'nullable|string|max:50',
            'pr_date' => 'nullable|date|date_format:Y-m-d|before_or_equal:today',
            'po_number' => 'nullable|string|max:50',
            'po_date' => 'nullable|date|date_format:Y-m-d|before_or_equal:today',
            'source_id' => 'nullable|exists:sources,id',
            'purchase_amount' => 'nullable|numeric|min:0',
            'lot_cost' => 'nullable|numeric|min:0',
            'supplier' => 'nullable|string|max:255',
            'donated_by' => 'nullable|string|max:255',
            'replaced_by' => 'nullable|string|max:255',
            'transferred_from' => 'nullable|string|max:255',
            'table_of_contents' => 'nullable|string',
        ];
    }

    // Livewire lifecycle hook that is automatically triggered whenever a property (field) bound to the component is updated in the frontend (e.g., when a user types in an input field).
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }

    public function addAuthorField(): void
    {
        $this->authors[] = '';
    }
    public function removeAuthorField($index): void
    {
        if (isset($this->authors[$index])) {
            unset($this->authors[$index]);
            $this->authors = array_values($this->authors);
        }
    }

    public function addEditorField(): void
    {
        $this->editors[] = '';
    }
    public function removeEditorField($index): void
    {
        if (isset($this->editor[$index])) {
            unset($this->editor[$index]);
            $this->editor = array_values($this->editor);
        }
    }

    public function addSubjectHeadingField(): void
    {
        $this->subject_headings[] = '';
    }
    public function removeSubjectHeadingField($index): void
    {
        if (isset($this->subject_headings[$index])) {
            unset($this->subject_headings[$index]);
            $this->subject_headings = array_values($this->subject_headings);
        }
    }

    public function submit()
    {
        try {

            $this->validate();

            $cover_image_path = null;
            if ($this->cover_image) {
                $cover_image_path = $this->cover_image->store('uploads/book_covers', 'public');
            }

            $record = Record::create([
                'accession_number' => $this->accession_number,
                'title' => $this->title,
                'acquisition_status' => $this->acquisition_status,
                'condition' => $this->condition,
                'subject_headings' => $this->subject_headings,

                'date_received' => now(),
                'added_by' => auth()->user()->id,
            ]);

            $record->book()->create([
                'authors' => $this->authors,
                'editors' => $this->editors,
                'publication_year' => $this->publication_year,
                'publisher' => $this->publisher,
                'publication_place' => $this->publication_place,
                'edition' => $this->edition,
                'isbn' => $this->isbn,
                'volume' => $this->volume,

                'call_number' => $this->call_number,
                'ddc_class_id' => $this->ddc_class_id,
                'lc_class_id' => $this->lc_class_id,
                'physical_location_id' => $this->physical_location_id,

                'cover_type_id' => $this->cover_type_id,
                'cover_image' => $cover_image_path,

                'ics_number' => $this->ics_number,
                'ics_date' => $this->ics_date,
                'pr_number' => $this->pr_number,
                'pr_date' => $this->pr_date,
                'po_number' => $this->po_number,
                'po_date' => $this->po_date,

                'source_id' => $this->source_id,
                'purchase_amount' => $this->purchase_amount,
                'lot_cost' => $this->lot_cost,
                'supplier' => $this->supplier,
                'donated_by' => $this->donated_by,
                'replaced_by' => $this->replaced_by,
                'transferred_from' => $this->transferred_from,

                'table_of_contents' => $this->table_of_contents,
            ]);

            // Reset the file input after saving
            $this->reset();
            $this->resetValidation();

            session()->flash('success', 'Record added successfully!');
            return redirect()->route('books.index');

        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database-specific errors
            $message = app()->environment('production')
                ? 'Failed to add book. Please try again.'
                : 'Failed to add book: ' . $e->getMessage();
            session()->flash('error', $message);
        } catch (\Exception $e) {
            // Handle any other unexpected errors
            $message = app()->environment('production')
                ? 'An unexpected error occurred. Please try again.'
                : 'An unexpected error occurred: ' . $e->getMessage();
            session()->flash('error', $message);
        }
    }

    public function formatFileSize($bytes)
    {
        if ($bytes === 0) return '0 Bytes';
        $k = 1024;
        $sizes = ['Bytes', 'KB', 'MB', 'GB'];
        $i = floor(log($bytes) / log($k));
        return round(($bytes / pow($k, $i)), 2) . ' ' . $sizes[$i];
    }

    public function render()
    {
        return view('livewire.records.books-create')
            ->layout('components.layouts.records', ['headingTitle' => 'Add Book']);
    }
}
