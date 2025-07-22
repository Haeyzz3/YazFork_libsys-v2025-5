<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DdcClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $classifications = [
            ['name' => 'Applied Science', 'code' => '000'],
            ['name' => 'Arts', 'code' => '100'],
            ['name' => 'Fiction', 'code' => '200'],
            ['name' => 'General Works', 'code' => '300'],
            ['name' => 'History', 'code' => '400'],
            ['name' => 'Language', 'code' => '500'],
            ['name' => 'Literature', 'code' => '600'],
            ['name' => 'Philosophy', 'code' => '700'],
            ['name' => 'Pure Science', 'code' => '800'],
            ['name' => 'Religion', 'code' => '900'],
            ['name' => 'Social Science', 'code' => '901'],
        ];

        foreach ($classifications as $classification) {
            DB::table('ddc_classifications')->insert([
                'name' => $classification['name'],
                'code' => $classification['code'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
