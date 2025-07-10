<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Record>
 */
class RecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Define possible values for fields to mimic your data
        $classifications = [
            'Applied Science', 'Literature', 'Pure Science', 'History',
            'Arts', 'Social Sciences', 'Philosophy & Religion', 'Geography'
        ];
        $locations = [
            'Circulation', 'Fiction', 'Filipiniana', 'General References',
            'Graduate School', 'reserve', 'PCAARRD','Vertical Files'
        ];
        $sources = ['Purchase', 'Donation', 'Exchange', 'Government Publication'];
        $languages = ['English', 'Filipino', 'Spanish', 'Cebuano', 'Others'];
        $statuses = ['Available', 'Processing'];

        return [
            'accession_number' => $this->faker->randomNumber(6),
            'title' => $this->faker->sentence(3, true),
            'ddc_classification' => $this->faker->randomElement($classifications),
//            'call_number' => $this->faker->regexify('[A-Z]{3,4}[0-9]{3}\.[0-9]{4}'),
//            'physical_location' => $this->faker->randomElement($locations),
//            'location_symbol' => $this->faker->regexify('[A-Z]{2,4}-[A-Z][1-9]'),
//            'date_acquired' => Carbon::now()->subMonths($this->faker->numberBetween(1, 12)),
//            'source' => $source = $this->faker->randomElement($sources),
//            'purchase_amount' => $source === 'Purchase' ? $this->faker->randomFloat(2, 30, 150) : null,
//            'acquisition_status' => $this->faker->randomElement($statuses),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
