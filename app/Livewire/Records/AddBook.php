<?php

namespace App\Livewire\Records;

use App\Models\Record;
use Livewire\Component;

class AddBook extends Component
{
    public $isModalOpen = false;

    public $accession_number = '';
    public $title = '';
    public $author = '';
    public $additionalAuthors = [''];
    public $editor = '';
    public $publication_year = '';
    public $publisher = '';
    public $publication_place = '';
    public $isbn = '';
//    public $ddc_classification = '';
//    public $lc_classification = '';
//    public $call_number = '';
//    public $physical_location = '';
//    public $location_symbol = '';
//    public $cover_type = '';
//    public $cover_image = '';
//    public $ics_number = '';
//    public $ics_number_date = '';
//    public $pr_number = '';
//    public $pr_date = '';
//    public $po_number = '';
//    public $po_date = '';
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
            'publisher' => 'nullable|string|max:100',
            'publication_place' => 'nullable|string|max:255',
            'isbn' => 'nullable|string|max:25',
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
    //            'publication_year' => $this->publicationYear,
    //            'publisher' => $this->publisher,
    //            'place_of_publication' => $this->placeOfPublication,
    //            'isbn' => $this->isbn,
    //            'series_title' => $this->seriesTitle,
    ////            added by
            ]);

            $record->book()->create([
                'author' => $this->author,
                'additional_authors' => $this->additionalAuthors,
                'editor' => $this->editor,
                'publication_year' => $this->publication_year,
                'publisher' => $this->publisher,
                'publication_place' => $this->publication_place,
                'isbn' => $this->isbn,
            ]);

            session()->flash('message', 'Book added successfully!');
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
