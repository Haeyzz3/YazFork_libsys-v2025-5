<?php

namespace Database\Seeders;

use App\Models\DigitalResource;
use App\Models\Periodical;
use App\Models\Record;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodicalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Record::factory()
            ->has(Periodical::factory(), 'digitalResource')
            ->count(15)->create();
    }
}
