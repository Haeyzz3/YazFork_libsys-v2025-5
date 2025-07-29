<?php

namespace App\Livewire\Borrowing;

use App\Models\Record;
use Livewire\Component;
use Livewire\WithPagination;

class Checkout extends Component
{
    use WithPagination;
    public $selectedBook = null;
    public $search = '';
    public $search_ac = null;

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

    public function findAcc()
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

    public function selectBook($bookId)
    {
        $record = Record::with('book')->find($bookId);

        if ($record) {
            $this->selectedBook = [
                'title' => $record->title,
                'authors' => $record->book->authors,
                'accession_number' => $record->accession_number,
                'status' => $record->condition ?? 'Available', // Adjust based on your model
                'cover_image' => $record->cover_image,
            ];
        }
    }

    public function clearSelection(): void
    {
        $this->selectedBook = null;
    }
}
