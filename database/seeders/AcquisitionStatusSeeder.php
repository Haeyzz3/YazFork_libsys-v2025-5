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
            ['key' => 'available', 'label' => 'Available'],
            ['key' => 'pending_review', 'label' => 'Pending Review'],
            ['key' => 'processing', 'label' => 'Processing'],
        ];

        foreach ($statuses as $status) {
            AcquisitionStatus::create([
                'key' => $status['key'],
                'label' => $status['label'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
