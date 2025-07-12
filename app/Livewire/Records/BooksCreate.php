<?php

namespace App\Livewire\Records;

use App\Models\Record;
use Livewire\Component;
use Livewire\WithFileUploads;

class BooksCreate extends Component
{
    use WithFileUploads;

    public $isModalOpen = false;
    public $ddc_classifications = [
        'Applied Science', 'Literature', 'Pure Science', 'History',
        'Arts', 'Social Sciences', 'Philosophy & Religion', 'Geography'
    ];
    public $lc_classifications = ['sample', 'data'];
    public $sources = ['Donation', 'Purchase'];
    public $locations = [
        'Circulation', 'Fiction', 'Filipiniana', 'General References',
        'Graduate School', 'reserve', 'PCAARRD','Vertical Files'
    ];
    public $cover_types = ['Hardcover', 'Paperback', 'Other'];
    public $acquisition_statuses = ['sample', 'data'];

    public $accession_number = null;
    public $title = null;
    public $author = null;
    public $additional_authors = [null];
    public $editor = null;
    public $publication_year = null;
    public $publisher = null;
    public $publication_place = null;
    public $isbn = null;
    public $ddc_classification = null;
    public $lc_classification = null;
    public $call_number = null;
    public $physical_location = null;
    public $location_symbol = null;
    public $cover_type = null;
    public $ics_number = null;
    public $ics_number_date = null;
    public $pr_number = null;
    public $pr_number_date = null;
    public $po_number = null;
    public $po_number_date = null;
    public $cover_image;
    public $source = null;
    public $purchase_amount = null;
    public $lot_cost = null;
    public $supplier = null;
    public $donated_by = null;
    public $acquisition_status = null;
    public $table_of_contents = null;
    public $subject_headings = [null];

    public function rules()
    {
        return [
            'accession_number' => 'required|string|max:25|unique:records,accession_number',
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:100',
            'additional_authors.*' => 'nullable|string|max:255',
            'editor' => 'nullable|string|max:100',
            'publication_year' => 'required|integer|min:1800|max:' . date('Y'),
            'publisher' => 'required|string|max:100',
            'publication_place' => 'required|string|max:255',
            'isbn' => 'required|string|max:25',
            'ddc_classification' => 'nullable|string|max:100',
            'lc_classification' => 'nullable|string|max:100',
            'call_number' => 'nullable|string|max:50',
            'physical_location' => 'required|string|max:100',
            'location_symbol' => 'nullable|string|max:50',
            'cover_type' => 'nullable|string|max:100',
            'ics_number' => 'nullable|string|max:20',
            'ics_number_date' => 'nullable|string|max:20',
            'pr_number' => 'nullable|string|max:50',
            'pr_number_date' => 'nullable|string|max:50',
            'po_number' => 'nullable|string|max:50',
            'po_number_date' => 'nullable|string|max:50',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'source' => 'nullable|string|max:50',
            'purchase_amount' => 'nullable|numeric|min:0',
            'lot_cost' => 'nullable|numeric|min:0',
            'supplier' => 'nullable|string|max:100',
            'donated_by' => 'nullable|string|max:100',
            'acquisition_status' => 'required|string|max:100',
            'table_of_contents' => 'nullable|string|max:1000',
            'subject_headings.*' => 'nullable|string|max:255',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addAuthorField()
    {
        $this->additional_authors[] = '';
    }

    public function addSubjectHeadingField()
    {
        $this->subject_headings[] = '';
    }

    public function removeAuthorField($index)
    {
        if (isset($this->additional_authors[$index])) {
            unset($this->additional_authors[$index]);
            $this->additional_authors = array_values($this->additional_authors);
        }
    }

    public function removeSubjectHeadingField($index)
    {
        if (isset($this->additional_authors[$index])) {
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
                $cover_image_path = $this->cover_image->store('uploads', 'public');
            }

            $record = Record::create([
                'accession_number' => $this->accession_number,
                'title' => $this->title,
                'ddc_classification' => $this->ddc_classification,
                'lc_classification' => $this->lc_classification,
                'call_number' => $this->call_number,
                'physical_location' => $this->physical_location,
                'location_symbol' => $this->location_symbol,
                'added_by' => auth()->user()->id,
                'source' => $this->source,
                'purchase_amount' => $this->purchase_amount,
                'lot_cost' => $this->lot_cost,
                'supplier' => $this->supplier,
                'donated_by' => $this->donated_by,
                'acquisition_status' => $this->acquisition_status,
            ]);

            $record->book()->create([
                'author' => $this->author,
                'additional_authors' => array_filter($this->additional_authors, static fn($author) => !empty(trim($author))),
                'editor' => $this->editor,
                'publication_year' => $this->publication_year,
                'publisher' => $this->publisher,
                'publication_place' => $this->publication_place,
                'isbn' => $this->isbn,
                'cover_type' => $this->cover_type,
                'ics_number' => $this->ics_number,
                'ics_number_date' => $this->ics_number_date,
                'pr_number' => $this->pr_number,
                'pr_number_date' => $this->pr_number_date,
                'po_number' => $this->po_number,
                'po_number_date' => $this->po_number_date,
                'cover_image' => $cover_image_path,
                'table_of_contents' => $this->table_of_contents,
                'subject_headings' => array_filter($this->subject_headings, static fn($subject) => !empty(trim($subject))),
            ]);

            // Reset the file input after saving
            $this->reset('cover_image');

            session()->flash('success', 'Book added successfully!');
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

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
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
        return view('livewire.records.books-create')->layout('components.layouts.records', ['headingTitle' => 'Add Book']);
    }
}
