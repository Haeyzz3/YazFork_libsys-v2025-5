<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhysicalLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            ['symbol' => 'Cir', 'name' => 'Circulation'],
            ['symbol' => 'F', 'name' => 'Fiction'],
            ['symbol' => 'Fil', 'name' => 'Filipiniana'],
            ['symbol' => 'Gr', 'name' => 'General References'],
            ['symbol' => 'Gs', 'name' => 'Graduate School'],
            ['symbol' => 'Gs./Fil.', 'name' => 'Graduate School/Filipiniana'],
            ['symbol' => 'pcarrd', 'name' => 'PCARRD'],
            ['symbol' => 'Res', 'name' => 'Reserve'],
            ['symbol' => 'vertical_files', 'name' => 'Vertical Files'],
        ];

        foreach ($locations as $location) {
            DB::table('physical_locations')->insert([
                'symbol' => $location['symbol'],
                'name' => $location['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
