<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatronSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patron = Role::firstOrCreate(['role_name' => 'patron']);

        User::create([
            'first_name' => 'Patron',
            'last_name' => 'Student',
            'username' => '@patron',
            'email' => 'patron@email.com',
            'role_id' =>  $patron->id,
            'password' => bcrypt('patron123'),
        ])->patronDetails()
            ->create([
                'library_id' => '001',
                'address' => 'sample address',
                'phone' => '0123456789',
            ]);
    }
}
