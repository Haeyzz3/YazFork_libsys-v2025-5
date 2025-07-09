<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Periodical>
 */
class PeriodicalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'primary_author' => $this->faker->name,
            'publication_year' => $this->faker->year,
            'publisher' => $this->faker->company,
            'volume_number' => $this->faker->numberBetween(1, 50),
            'issue_number' => $this->faker->numberBetween(1, 12),
            'publication_date' => $this->faker->optional()->date(),
            'issn' => $this->faker->optional()->regexify('[0-9]{4}-[0-9]{4}'),
            'frequency' => $this->faker->optional()->randomElement(['Daily', 'Weekly', 'Biweekly', 'Monthly', 'Quarterly', 'Annually']),
            'format' => $this->faker->optional()->randomElement(['Print', 'Microfilm', 'Digital', 'Other']),
            'cover_sample_image' => $this->faker->optional()->imageUrl(640, 480, 'periodicals'), // returns a dummy URL
            'summary_contents' => $this->faker->optional()->paragraphs(3, true),
        ];
    }
}
