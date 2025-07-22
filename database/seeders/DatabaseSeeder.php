<?php

namespace Database\Seeders;

use App\Models\Condition;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\ThesisFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        $this->call(AdminSeeder::class);
        $this->call(PatronSeeder::class);
        $this->call(DdcClassificationSeeder::class);
        $this->call(LcClassificationSeeder::class);
        $this->call(PhysicalLocationSeeder::class);
        $this->call(SourceSeeder::class);
        $this->call(CoverTypeSeeder::class);
        $this->call(Condition::class);
        $this->call(RemarkSeeder::class);
        $this->call(AcademicPeriodSeeder::class);

//        $this->call(BookSeeder::class);
//        $this->call(DigitalResourceSeeder::class);
//        $this->call(PeriodicalSeeder::class);
//        $this->call(ThesisSeeder::class);
    }
}
