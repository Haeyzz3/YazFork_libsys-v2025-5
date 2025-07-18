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
        CoverType::create([
            ['key' => 'book_bind', 'name' => 'Book Bind'],
            ['key' => 'flip_chart', 'name' => 'Flip Chart'],
            ['key' => 'hard_book', 'name' => 'Hardback'],
            ['key' => 'hardbound', 'name' => 'Hardbound'],
            ['key' => 'hardbound', 'name' => 'Journal'],
            ['key' => 'hardbound', 'name' => 'Paperback'],
        ]);
    }
}
