<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\DigitalResource;
use App\Models\Record;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DigitalResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Record::factory()
            ->has(DigitalResource::factory(), 'digitalResource')
            ->count(15)->create();
    }
}
