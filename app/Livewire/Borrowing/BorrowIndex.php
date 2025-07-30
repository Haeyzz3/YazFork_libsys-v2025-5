<?php

namespace App\Livewire\Borrowing;

use App\Models\Borrowing;
use Livewire\Component;
use Livewire\WithPagination;

class BorrowIndex extends Component
{
    use WithPagination;

    public $search = '';

    // Track only the search query string
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function render()
    {
        // Paginate the borrowing data (10 records per page by default)
        $all_borrowing = Borrowing::query()->with(['record', 'user'])->latest()->paginate(10);

        return view('livewire.borrowing.borrow-index', [
            'borrowings' => $all_borrowing,
        ]);
    }
}
