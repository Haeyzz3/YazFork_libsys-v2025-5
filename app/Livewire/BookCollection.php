<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Record;

class BookCollection extends Component
{
    use WithPagination;

    public function getBooksProperty()
    {
        // Fetch records with associated book
        return Record::with('book')
            ->whereHas('book')
            ->orderBy('created_at', 'desc')
            ->simplePaginate(10);
    }

    public function showBookDetails($bookId)
    {
        $record = Record::with('book')->find($bookId);
        if ($record && $record->book) {
            // Convert authors array to string if it's an array
            $authors = $record->book->authors;
            $authorText = is_array($authors) ? implode(', ', $authors) : $authors;

            $this->dispatch('showBookModal', book: [
                'id'               => $record->id,
                'title'            => $record->title ?? 'No Title',
                'author'           => $authorText,
                'image'            => $record->book->cover_image
                    ? asset('storage' . $record->book->cover_image)
                    : asset('storage/uploads/book_cover_images/sample5.png'),
                'status'           => 'available',
                'publication_year' => $record->book->publication_year,
                'description'      => 'This is a placeholder description for the book.',
            ]);
        }
    }

    public function render()
    {
        // Transform the paginated records into desired format
        $paginated = $this->books->getCollection()->transform(function ($record) {
            $authors = $record->book->authors ?? 'Unknown Author';
            $authorText = is_array($authors) ? implode(', ', $authors) : $authors;

            return [
                'id'               => $record->id,
                'title'            => $record->title ?? 'No Title',
                'author'           => $authorText,
                'image'            => $record->book->cover_image
                    ? asset('storage' . $record->book->cover_image)
                    : asset('storage/uploads/book_cover_images/sample5.png'),
                'status'           => 'available',
                'publication_year' => $record->book->publication_year,
                'description'      => 'This is a placeholder description for the book.',
            ];
        });

        // Replace the paginator's collection with the transformed data
        $books = $this->books->setCollection($paginated);

        return view('livewire.book-collection', [
            'books' => $books,
        ]);
    }
}
