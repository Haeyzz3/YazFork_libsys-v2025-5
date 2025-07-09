<?php

namespace Database\Seeders;

use App\Models\Record;
use App\Models\Thesis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThesisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Record::factory()
            ->has(Thesis::factory(), 'thesis')
            ->count(15)->create();
    }
}
