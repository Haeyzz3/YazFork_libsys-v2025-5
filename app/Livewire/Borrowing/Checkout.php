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

    public function render()
    {
        $query = Record::with(['book', 'digitalResource'])
            ->whereHas('book', function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('authors', 'like', '%' . $this->search . '%')
                    ->orWhere('accession_number', 'like', '%' . $this->search . '%');
            });

        // If you need the actual results:
        $records = $query->paginate(3);

        return view('livewire.borrowing.checkout', [
            'records' =>  $records,
        ]);
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

    public function clearSelection()
    {
        $this->selectedBook = null;
    }
}
