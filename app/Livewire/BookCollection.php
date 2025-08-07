<?php

namespace App\Livewire;

use App\Models\Record;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class BookCollection extends Component
{
    use WithPagination;

    public $selectedBook = null;
    public $showModal = false;

    protected $listeners = ['closeBookModal' => 'closeModal'];

    private function getBookImage($coverImage)
    {
        // Check if cover_image exists in database AND the file actually exists
        if ($coverImage && Storage::disk('public')->exists($coverImage)) {
            $imagePath = $coverImage[0] === '/' ? $coverImage : '/' . $coverImage;
            return asset('storage' . $imagePath);
        }

        // Fallback to placeholder if no image or file doesn't exist
        return asset('storage/uploads/book_cover_images/sample5.png');
    }


    public function showBookDetails($recordId)
    {
        $record = Record::with('book')->find($recordId);

        if ($record && $record->book) {
            $authors = $record->book->authors;
            $authorText = is_array($authors) ? implode(', ', $authors) : $authors;

            $this->selectedBook = [
                'id' => $record->id,
                'title' => $record->title ?? 'No Title',
                'author' => $authorText,
                'image' => $this->getBookImage($record->book->cover_image),
                'status' => $record->acquisition_status ?? 'N/A',
                'publication_year' => $record->book->publication_year,
                'description' => $record->book->description ?? 'No description available.',
                'isbn' => $record->book->isbn ?? 'N/A',
                'pages' => $record->book->pages ?? 'N/A',
                'publisher' => $record->book->publisher ?? 'Unknown Publisher',
            ];

            $this->showModal = true;
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedBook = null;
    }

    public function getBooksProperty()
    {
        return Record::with('book')
            ->whereHas('book')
            ->orderBy('created_at', 'desc')
            ->simplePaginate(10);
    }

    public function render()
    {
        $paginated = $this->books->getCollection()->transform(function ($record) {
            $authors = $record->book->authors ?? 'Unknown Author';
            $authorText = is_array($authors) ? implode(', ', $authors) : $authors;

            return [
                'id' => $record->id, // Use the actual record ID
                'title' => $record->title ?? 'No Title',
                'author' => $authorText,
                'image' => $this->getBookImage($record->book->cover_image),
                'status' => 'available',
                'publication_year' => $record->book->publication_year,
            ];
        });

        $books = $this->books->setCollection($paginated);

        return view('livewire.book-collection', [
            'books' => $books,
        ]);
    }
}
