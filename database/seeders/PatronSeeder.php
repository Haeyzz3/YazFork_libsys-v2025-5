<?php

namespace Database\Seeders;

use App\Models\Office;
use App\Models\PatronType;
use App\Models\Program;
use App\Models\Major;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class PatronSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patron_role = Role::where('name', 'patron')->first();

        $undergraduate_patron_type = PatronType::firstOrCreate(['name' => 'undergraduate']);
        PatronType::firstOrCreate(['name' => 'graduate']);
        PatronType::firstOrCreate(['name' => 'alumni']);

        $osas_office = Office::firstOrCreate(['name' => 'Office of Student Affairs and Services']);
        Office::firstOrCreate(['name' => 'University Assessment and Guidance Center']);

        $bsit_program = Program::firstOrCreate(['name' => 'Bachelor of Science in Information Technology']);
        $bsed_program = Program::firstOrCreate(['name' => 'Bachelor of Science in Secondary Education']);

        $infosec_major = Major::firstOrCreate(['name' => 'Information Security', 'program_id' => $bsit_program->id]);
        Major::firstOrCreate(['name' => 'Filipino', 'program_id' => $bsed_program->id]);

        User::create([
            'first_name' => 'Patron',
            'last_name' => 'Student',
            'middle_name' => 'Child',
            'birth_date' => '1990-01-01',
            'username' => '@patron',
            'role_id' => $patron_role->id,
            'email' => 'patron@email.com',
            'password' => bcrypt('patron123'),
        ])->patronDetails()
            ->create([
                'student_id' => '001',
                'library_id' => '001',
                'sex' => 'male',
                'patron_type_id' => $undergraduate_patron_type->id,
                'program_id' => $bsit_program->id,
                'major_id' => $infosec_major->id,
                'office_id' => $osas_office->id,
                'contact_number' => '0123456789',
            ]);
    }
}
