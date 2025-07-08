<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\ECollection;
use App\Models\Record;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ECollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Record::factory()
            ->has(ECollection::factory(), 'eCollection')
            ->count(15)->create();
    }
}
