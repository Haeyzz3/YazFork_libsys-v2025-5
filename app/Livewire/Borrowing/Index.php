<?php

namespace App\Livewire\Borrowing;

use Livewire\Component;

class Index extends Component
{
    public $search = '';

    // Track only the search query string
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function render()
    {
        // Dummy data for borrowing records
        $dummyBorrowings = [
            [
                'id' => 1,
                'accession_number' => 'ACC001',
                'book' => ['title' => 'The Great Gatsby'],
                'borrower' => ['name' => 'John Doe'],
                'borrow_date' => '2025-07-01',
                'due_date' => '2025-07-15',
                'status' => 'Borrowed',
            ],
            [
                'id' => 2,
                'accession_number' => 'ACC002',
                'book' => ['title' => 'To Kill a Mockingbird'],
                'borrower' => ['name' => 'Jane Smith'],
                'borrow_date' => '2025-07-05',
                'due_date' => '2025-07-19',
                'status' => 'Overdue',
            ],
            [
                'id' => 3,
                'accession_number' => 'ACC003',
                'book' => ['title' => '1984'],
                'borrower' => ['name' => 'Alice Johnson'],
                'borrow_date' => '2025-07-10',
                'due_date' => '2025-07-24',
                'status' => 'Borrowed',
            ],
            [
                'id' => 4,
                'accession_number' => 'ACC004',
                'book' => ['title' => 'Pride and Prejudice'],
                'borrower' => ['name' => 'Bob Wilson'],
                'borrow_date' => '2025-07-12',
                'due_date' => '2025-07-26',
                'status' => 'Borrowed',
            ],
            [
                'id' => 5,
                'accession_number' => 'ACC005',
                'book' => ['title' => 'The Catcher in the Rye'],
                'borrower' => ['name' => 'Emma Davis'],
                'borrow_date' => '2025-07-15',
                'due_date' => '2025-07-29',
                'status' => 'Borrowed',
            ],
        ];

        // Convert array to collection for filtering
        $filteredBorrowings = collect($dummyBorrowings)->filter(function ($borrowing) {
            return stripos($borrowing['accession_number'], $this->search) !== false ||
                stripos($borrowing['book']['title'], $this->search) !== false ||
                stripos($borrowing['borrower']['name'], $this->search) !== false;
        })->values();

        return view('livewire.borrowing.index', [
            'borrowings' => $filteredBorrowings,
        ]);
    }
}
