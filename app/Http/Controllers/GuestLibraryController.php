<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestLibraryController extends Controller
{
    public function index()
    {
        $records = [
            (object)[
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'description' => 'A novel about the American dream, love, and loss set in the Roaring Twenties.',
                'cover_url' => 'https://placehold.co/300x400?text=Gatsby',
                'id' => 1,
            ],
            (object)[
                'title' => '1984',
                'author' => 'George Orwell',
                'description' => 'A dystopian novel set in a totalitarian society ruled by Big Brother.',
                'cover_url' => 'https://placehold.co/300x400?text=1984',
                'id' => 2,
            ],
            (object)[
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'description' => 'A powerful story of racial injustice and moral growth in the American South.',
                'cover_url' => 'https://placehold.co/300x400?text=Mockingbird',
                'id' => 3,
            ],
            (object)[
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'description' => 'A novel about the American dream, love, and loss set in the Roaring Twenties.',
                'cover_url' => 'https://placehold.co/300x400?text=Gatsby',
                'id' => 1,
            ],
            (object)[
                'title' => '1984',
                'author' => 'George Orwell',
                'description' => 'A dystopian novel set in a totalitarian society ruled by Big Brother.',
                'cover_url' => 'https://placehold.co/300x400?text=1984',
                'id' => 2,
            ],
            (object)[
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'description' => 'A novel about the American dream, love, and loss set in the Roaring Twenties.',
                'cover_url' => 'https://placehold.co/300x400?text=Gatsby',
                'id' => 1,
            ],
            (object)[
                'title' => '1984',
                'author' => 'George Orwell',
                'description' => 'A dystopian novel set in a totalitarian society ruled by Big Brother.',
                'cover_url' => 'https://placehold.co/300x400?text=1984',
                'id' => 2,
            ],
        ];

        return view('guest.dashboard', [
            'records' => $records
        ]);
    }
}
