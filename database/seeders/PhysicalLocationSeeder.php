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
            ['symbol' => 'Res', 'name' => 'Reserved'],
            ['symbol' => 'GS', 'name' => 'Graduate School'],
            ['symbol' => 'Fil', 'name' => 'Filipinana'],
            ['symbol' => 'F', 'name' => 'Fiction'],
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
