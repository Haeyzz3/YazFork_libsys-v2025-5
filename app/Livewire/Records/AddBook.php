<?php

namespace App\Livewire\Records;

use Livewire\Component;

class AddBook extends Component
{
    public $accessionNumber = '';
    public $title = '';
    public $author = '';
    public $editor = '';
    public $publicationYear = '';
    public $publisher = '';
    public $placeOfPublication = '';
    public $isbn = '';
    public $additionalAuthors = [''];
    public $seriesTitle = '';

    protected $rules = [
        'accessionNumber' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'author' => 'nullable|string|max:255',
        'editor' => 'nullable|string|max:255',
        'publicationYear' => 'required|integer|min:1800|max:' . 2025,
        'publisher' => 'required|string|max:255',
        'placeOfPublication' => 'required|string|max:255',
        'isbn' => 'required|string|max:13',
        'additionalAuthors.*' => 'nullable|string|max:255',
        'seriesTitle' => 'nullable|string|max:255',
    ];

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

        Book::create([
            'accession_number' => $this->accessionNumber,
            'title' => $this->title,
            'author' => $this->author,
            'editor' => $this->editor,
            'publication_year' => $this->publicationYear,
            'publisher' => $this->publisher,
            'place_of_publication' => $this->placeOfPublication,
            'isbn' => $this->isbn,
            'additional_authors' => implode(', ', array_filter($this->additionalAuthors)),
            'series_title' => $this->seriesTitle,
        ]);

        session()->flash('message', 'Book added successfully!');
        return redirect()->route('books.index');
    }

    public function render()
    {
        return view('livewire.records.add-book')->layout('components.layouts.records', ['headingTitle' => 'Add Book']);
    }
}
