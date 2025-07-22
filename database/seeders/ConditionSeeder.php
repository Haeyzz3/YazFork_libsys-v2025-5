<?php

namespace Database\Seeders;

use App\Models\Condition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $conditions = [
            ['key' => 'excellent', 'label' => 'Excellent'],
            ['key' => 'good', 'label' => 'Good'],
            ['key' => 'fair', 'label' => 'Fair'],
            ['key' => 'poor', 'label' => 'Poor'],
            ['key' => 'damaged', 'label' => 'Damaged'],
        ];

        foreach ($conditions as $condition) {
            Condition::create($condition);
        }
    }
}
