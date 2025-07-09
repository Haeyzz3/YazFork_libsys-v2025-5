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
            ->has(Book::factory(), 'book')
            ->count(15)->create();
    }

    // \App\Models\Record::factory()->has(\App\Models\Book::factory(), 'book')->count(500)->create();
}
