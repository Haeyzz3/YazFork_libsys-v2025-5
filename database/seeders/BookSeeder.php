<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Record;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Record::factory()
            ->has(Book::factory(), 'books')
            ->count(20)->create();
    }
}
