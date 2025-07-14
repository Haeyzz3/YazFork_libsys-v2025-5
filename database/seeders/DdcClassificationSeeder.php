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
            ['name' => 'Computer Science, Information & General Works', 'code' => '000'],
            ['name' => 'Philosophy & Psychology', 'code' => '100'],
            ['name' => 'Religion', 'code' => '200'],
            ['name' => 'Social Sciences', 'code' => '300'],
            ['name' => 'Language', 'code' => '400'],
            ['name' => 'Pure Science', 'code' => '500'],
            ['name' => 'Applied Science & Technology', 'code' => '600'],
            ['name' => 'Arts & Recreation', 'code' => '700'],
            ['name' => 'Literature', 'code' => '800'],
            ['name' => 'History & Geography', 'code' => '900'],
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
