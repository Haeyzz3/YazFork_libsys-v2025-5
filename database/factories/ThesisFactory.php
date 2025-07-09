<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Thesis>
 */
class ThesisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'researchers' => $this->faker->name(), // or join multiple names
            'academic_year' => $this->faker->year() . '-' . ($this->faker->year() + 1),
            'institution' => $this->faker->company . ' University of Southeastern Philippines',
            'department' => $this->faker->words(2, true),
            'adviser' => $this->faker->name(),
            'panelist' => implode(', ', $this->faker->randomElements([
                $this->faker->name(),
                $this->faker->name(),
                $this->faker->name(),
                $this->faker->name()
            ], 3)),
            'degree_program' => $this->faker->randomElement(['Computer Science', 'Information Technology', 'Engineering', 'Business Administration']),
            'degree_level' => $this->faker->randomElement(['Bachelor\'s', 'Master\'s', 'PhD']),
            'format' => $this->faker->randomElement(['Print', 'Digital', 'Bound Volume']),
            'number_of_pages' => $this->faker->numberBetween(50, 300),
            'abstract_document' => $this->faker->optional()->fileExtension(), // optionally you can fake a file path
            'full_text' => $this->faker->optional()->fileExtension(),
            'abstract_summary' => $this->faker->paragraph(4),
            'keywords' => implode(', ', $this->faker->words(5)),
            'additional_notes' => $this->faker->optional()->sentence(),
        ];
    }
}
