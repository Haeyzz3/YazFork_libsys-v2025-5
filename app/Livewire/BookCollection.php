<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;

class BookCollection extends Component
{
    use WithPagination;

    public function getBooksProperty()
    {
        $books = [
            [
                'title' => 'Introduction to Algorithms',
                'author' => 'Thomas H. Cormen',
                'image' => 'https://placehold.co/300x400?text=Sample Image Ni Siya',
                'status' => 'available',
                'edition' => '2020 Edition',
                'description' => 'A comprehensive introduction to algorithms and data structures with focus on making them practical and efficient.'
            ],
            [
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'image' => 'https://m.media-amazon.com/images/I/81s6DUyQCZL._AC_UF1000,1000_QL80_.jpg',
                'status' => 'checked-out',
                'edition' => '2008 Edition',
                'description' => 'Handbook of agile software craftsmanship that teaches you how to write clean, maintainable code.'
            ],
            [
                'title' => 'Design Patterns',
                'author' => 'Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides',
                'image' => 'https://m.media-amazon.com/images/I/61yB0UFlM3L._AC_UF1000,1000_QL80_.jpg',
                'status' => 'available',
                'edition' => '1994 Edition',
                'description' => 'Catalog of simple and succinct solutions to commonly occurring design problems.'
            ],
            [
                'title' => 'The Pragmatic Programmer',
                'author' => 'Andrew Hunt, David Thomas',
                'image' => 'https://m.media-amazon.com/images/I/81vpsIs58WL._AC_UF1000,1000_QL80_.jpg',
                'status' => 'reserved',
                'edition' => '2019 Edition',
                'description' => 'Your journey to mastery with practical advice on all aspects of programming.'
            ],
            [
                'title' => 'Structure and Interpretation of Computer Programs',
                'author' => 'Harold Abelson, Gerald Jay Sussman',
                'image' => 'https://placehold.co/300x400?text=Sample Image Ni Siya',
                'status' => 'available',
                'edition' => '1996 Edition',
                'description' => 'Classic textbook that teaches fundamental principles of computer programming.'
            ],
            [
                'title' => 'The Pragmatic Programmer',
                'author' => 'Andrew Hunt, David Thomas',
                'image' => 'https://m.media-amazon.com/images/I/81vpsIs58WL._AC_UF1000,1000_QL80_.jpg',
                'status' => 'reserved',
                'edition' => '2019 Edition',
                'description' => 'Your journey to mastery with practical advice on all aspects of programming.'
            ],
            [
                'title' => 'Structure and Interpretation of Computer Programs',
                'author' => 'Harold Abelson, Gerald Jay Sussman',
                'image' => 'https://placehold.co/300x400?text=Sample Image Ni Siya',
                'status' => 'available',
                'edition' => '1996 Edition',
                'description' => 'Classic textbook that teaches fundamental principles of computer programming.'
            ],
            [
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'image' => 'https://m.media-amazon.com/images/I/81s6DUyQCZL._AC_UF1000,1000_QL80_.jpg',
                'status' => 'checked-out',
                'edition' => '2008 Edition',
                'description' => 'Handbook of agile software craftsmanship that teaches you how to write clean, maintainable code.'
            ],
            // Add more books as needed
        ];

        $perPage = 10;
        $page = $this->page ?? 1;
        $items = array_slice($books, ($page - 1) * $perPage, $perPage);

        return new LengthAwarePaginator(
            $items,
            count($books),
            $perPage,
            $page,
            ['path' => request()->url()]
        );
    }

    public function showBookDetails($bookIndex)
    {
        $books = $this->books->items();
        if (isset($books[$bookIndex])) {
            $this->dispatch('showBookModal', book: $books[$bookIndex]);
        }
    }

    public function render()
    {
        return view('livewire.book-collection', [
            'books' => $this->books,
        ]);
    }
}
