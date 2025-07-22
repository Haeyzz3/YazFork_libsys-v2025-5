<?php

namespace Database\Seeders;

use App\Models\AcquisitionStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcquisitionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['key' => 'available', 'name' => 'Available'],
            ['key' => 'pending_review', 'name' => 'Pending Review'],
            ['key' => 'processing', 'name' => 'Processing'],
        ];

        foreach ($statuses as $status) {
            AcquisitionStatus::create([
                'key' => $status['key'],
                'name' => $status['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
