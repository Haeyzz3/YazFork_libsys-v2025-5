<?php

namespace Database\Seeders;

use App\Models\Source;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Source::create([
            ['key' => 'donation', 'name' => 'Donation'],
            ['key' => 'purchase', 'name' => 'Purchase'],
            ['key' => 'purchase_photocopy', 'name' => 'Purchased-Photocopy'],
            ['key' => 'replaced', 'name' => 'Replaced'],
            ['key' => 'transferred', 'name' => 'Transferred'],
        ]);
    }
}
