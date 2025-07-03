<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class PatronSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Patron',
            'last_name' => 'Student',
            'username' => '@patron',
            'email' => 'patron@email.com',
            'password' => bcrypt('patron123'),
        ])->patronDetails()
            ->create([
                'library_id' => '001',
                'address' => 'sample address',
                'phone' => '0123456789',
            ]);
    }
}
