<?php

namespace Database\Seeders;

use App\Models\AcademicPeriod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AcademicPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $academicPeriods = [];

        // Generate periods from 2007 to 2026
        for ($year = 2007; $year <= 2025; $year++) {
            $academicYear = $year . '-' . ($year + 1);

            // 1st Semester (August to December)
            $academicPeriods[] = [
                'academic_year' => $academicYear,
                'semester' => '1st Semester',
                'start_date' => Carbon::create($year, 8, 1),
                'end_date' => Carbon::create($year, 12, 15),
                'is_active' => $year === 2025, // Only 2025-2026 1st Semester is active
            ];

            // 2nd Semester (January to May of next year)
            $academicPeriods[] = [
                'academic_year' => $academicYear,
                'semester' => '2nd Semester',
                'start_date' => Carbon::create($year + 1, 1, 15),
                'end_date' => Carbon::create($year + 1, 5, 30),
                'is_active' => false,
            ];

            // Summer (June to July of next year)
            $academicPeriods[] = [
                'academic_year' => $academicYear,
                'semester' => 'Summer',
                'start_date' => Carbon::create($year + 1, 6, 16),
                'end_date' => Carbon::create($year + 1, 7, 31),
                'is_active' => false,
            ];

            // Summer (June to July of next year)
            $academicPeriods[] = [
                'academic_year' => $academicYear,
                'semester' => 'Whole Year',
                'start_date' => Carbon::create($year, 8, 1),
                'end_date' => Carbon::create($year + 1, 12, 15),
                'is_active' => false,
            ];
        }

        foreach ($academicPeriods as $period) {
            AcademicPeriod::create($period);
        }
    }
}
