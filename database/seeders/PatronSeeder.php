<?php

namespace Database\Seeders;

use App\Models\PatronType;
use App\Models\Program;
use App\Models\User;
use Illuminate\Database\Seeder;

class PatronSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student_patron_type = PatronType::firstOrCreate(['name' => 'student']);

        $bsit_program = Program::firstOrCreate(['name' => 'Bachelor of Science in Information Technology']);
        $bsed_program = Program::firstOrCreate(['name' => 'Bachelor of Science in Secondary Education']);

        User::create([
            'first_name' => 'Patron',
            'last_name' => 'Student',
            'middle_name' => 'Child',
            'birth_date' => '1990-01-01',
            'username' => '@patron',
            'email' => 'patron@email.com',
            'password' => bcrypt('patron123'),
        ])->patronDetails()
            ->create([
                'library_id' => '001',
                'patron_type_id' => $student_patron_type->id,
                'program_id' => $bsit_program->id,
                'address' => 'sample address',
                'phone' => '0123456789',
            ]);
    }
}
