<?php

namespace App\Livewire\Borrowing;

use App\Models\Borrowing;
use App\Models\Record;
use Livewire\Component;
use Livewire\WithPagination;

class Checkout extends Component
{
    use WithPagination;
    public $selectedBook = null;
    public $search = null;
    public $search_ac = null;
    public $showScanModal = false;
    public $showBorrowModal = false;
    public $borrowType = 'inside';

    public function render()
    {
        $query = Record::with('book')
            ->whereHas('book', function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('authors', 'like', '%' . $this->search . '%');
            });

        // If you need the actual results:
        $records = $query->paginate(3);

        return view('livewire.borrowing.checkout', [
            'records' =>  $records,
        ]);
    }

    public function findAcc(): void
    {
        $ac_query = Record::with('book')
            ->whereHas('book', function ($query) {
                $query->where('accession_number', '=', $this->search_ac);
            })->first(); // Fetch the first record or null if none exists

        if ($ac_query) {
            $this->selectBook($ac_query->id);
        } else {
            session()->flash('error', 'Book not found');
            $this->clearSelection();
        }
    }

    public function scanAcc(): void
    {
        $this->showScanModal = true;
    }

    public function borrowBook(): void
    {
        if ($this->borrowType === 'inside') {

            Borrowing::create([
                'user_id' => auth()->user()->id,
                'record_id' => $this->selectedBook['id'],
                'borrowed_at' => now(),
                'due_at' => now()->addDays(3),
            ]);

            $this->clearSelection();
            session()->flash('success', 'The book has been borrowed inside');

        } else if ($this->borrowType === 'outside') {

            $this->showBorrowModal = true;

        }
    }

    public function selectBook($bookId)
    {
        $record = Record::with('book')->find($bookId);

        if ($record) {
            $this->selectedBook = [
                'id' => $record->id,
                'title' => $record->title,
                'authors' => $record->book->authors,
                'accession_number' => $record->accession_number,
                'status' => $record->condition ?? 'Available', // Adjust based on your model
                'cover_image' => empty($record->book->cover_image) ||
                $record->book->cover_image === '/uploads/book_cover_images/'
                    ? asset('storage/uploads/book_cover_images/sample5.png')
                    : asset('storage/' . ltrim($record->book->cover_image, '/')),
            ];
        }
    }

    public function clearSelection(): void
    {
        $this->selectedBook = null;
        $this->search_ac = null;
        $this->borrowType = 'inside';
        $this->search = null;
    }
}
