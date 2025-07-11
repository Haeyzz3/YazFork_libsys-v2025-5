<?php

namespace App\Livewire\Records;

use App\Models\Record;
use Livewire\Component;

class AddBook extends Component
{
    public $isModalOpen = false;
    public $ddc_classifications = [
        'Applied Science', 'Literature', 'Pure Science', 'History',
        'Arts', 'Social Sciences', 'Philosophy & Religion', 'Geography'
    ];
    public $locations = [
        'Circulation', 'Fiction', 'Filipiniana', 'General References',
        'Graduate School', 'reserve', 'PCAARRD','Vertical Files'
    ];
    public $cover_types = ['Hardcover', 'Paperback', 'Other'];

    public $accession_number = '';
    public $title = '';
    public $author = '';
    public $additionalAuthors = [''];
    public $editor = '';
    public $publication_year = '';
    public $publisher = '';
    public $publication_place = '';
    public $isbn = '';
    public $ddc_classification = '';
    public $lc_classification = '';
    public $call_number = '';
    public $physical_location = '';
    public $location_symbol = '';
    public $cover_type = '';
    public $ics_number = '';
    public $ics_number_date = '';
    public $pr_number = '';
    public $pr_number_date = '';
    public $po_number = '';
    public $po_number_date = '';
//    public $cover_image = '';
//    public $source = '';
//    public $purchase_amount = '';
//    public $lot_cost = '';
//    public $donated_by = '';
//    public $supplier = '';
//    public $acquisition_status = '';
//    public $table_of_contents = '';
//    public $subjectHeadings = '';

    public function rules()
    {
        return [
            'accession_number' => 'required|string|max:25',
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:100',
            'additionalAuthors.*' => 'nullable|string|max:255',
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
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addAuthorField()
    {
        $this->additionalAuthors[] = '';
    }

    public function removeAuthorField($index)
    {
        unset($this->additionalAuthors[$index]);
        $this->additionalAuthors = array_values($this->additionalAuthors);
    }

    public function submit()
    {
        $this->validate();

        try {
            $record = Record::create([
                'accession_number' => $this->accession_number,
                'title' => $this->title,
                'ddc_classification' => $this->ddc_classification,
                'lc_classification' => $this->lc_classification,
                'call_number' => $this->call_number,
                'physical_location' => $this->physical_location,
                'location_symbol' => $this->location_symbol,
                'added_by' => auth()->user()->id,
            ]);

            $record->book()->create([
                'author' => $this->author,
                'additional_authors' => $this->additionalAuthors,
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
            ]);

            session()->flash('success', 'Book added successfully!');
            return redirect()->route('books.index');

        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database-specific errors (e.g., duplicate entry, foreign key issues)
            session()->flash('error', 'Failed to add book: ' . $e->getMessage());
        } catch (\Exception $e) {
            // Handle any other unexpected errors
            session()->flash('error', 'An unexpected error occurred: ' . $e->getMessage());
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

    public function render()
    {
        return view('livewire.records.add-book')->layout('components.layouts.records', ['headingTitle' => 'Add Book']);
    }
}
