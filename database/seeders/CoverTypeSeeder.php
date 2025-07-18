<?php

namespace Database\Seeders;

use App\Models\CoverType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoverTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coverTypes = [
            ['key' => 'book_bind', 'name' => 'Book Bind'],
            ['key' => 'flip_chart', 'name' => 'Flip Chart'],
            ['key' => 'hard_book', 'name' => 'Hardback'],
            ['key' => 'hardbound', 'name' => 'Hardbound'],
            ['key' => 'journal', 'name' => 'Journal'], // Fixed duplicate key issue
            ['key' => 'paperback', 'name' => 'Paperback'], // Fixed duplicate key issue
        ];

        foreach ($coverTypes as $coverType) {
            CoverType::create($coverType);
        }
    }
}
