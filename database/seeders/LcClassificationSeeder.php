<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LcClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lcClasses = [
            ['code' => 'A', 'name' => 'General Works'],
            ['code' => 'B', 'name' => 'Philosophy, Psychology, Religion'],
            ['code' => 'C', 'name' => 'Auxiliary Sciences of History'],
            ['code' => 'D', 'name' => 'World History and History of Europe, Asia, Africa, Australia, New Zealand, etc.'],
            ['code' => 'E', 'name' => 'History of the Americas'],
            ['code' => 'F', 'name' => 'History of the Australias'],
            ['code' => 'G', 'name' => 'Geography, Anthropology, Recreation'],
            ['code' => 'H', 'name' => 'Social Sciences'],
            ['code' => 'J', 'name' => 'Political Science'],
            ['code' => 'K', 'name' => 'Law'],
            ['code' => 'L', 'name' => 'Education'],
            ['code' => 'M', 'name' => 'Music and Books on Music'],
            ['code' => 'N', 'name' => 'Fine Arts'],
            ['code' => 'P', 'name' => 'Language and Literature'],
            ['code' => 'Q', 'name' => 'Science'],
            ['code' => 'R', 'name' => 'Medicine'],
            ['code' => 'S', 'name' => 'Agriculture'],
            ['code' => 'T', 'name' => 'Technology'],
            ['code' => 'U', 'name' => 'Military Science'],
            ['code' => 'V', 'name' => 'Naval Science'],
            ['code' => 'Z', 'name' => 'Bibliography, Library Science, Information Resources'],
        ];

        foreach ($lcClasses as $lcClass) {
            DB::table('lc_classifications')->insert([
                'code' => $lcClass['code'],
                'name' => $lcClass['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
