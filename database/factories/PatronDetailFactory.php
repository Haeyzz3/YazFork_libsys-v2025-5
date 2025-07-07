<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PatronDetail>
 */
class PatronDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => str_pad($this->faker->unique()->numberBetween(1, 999), 3, '0', STR_PAD_LEFT),
            'library_id' => str_pad($this->faker->numberBetween(1, 999), 3, '0', STR_PAD_LEFT),
            'sex' => $this->faker->randomElement(['male', 'female']),
            'patron_type_id' => $this->faker->randomElement([1, 2]),
            'program_id' => $this->faker->randomElement([1, 2]),
            'major_id' => $this->faker->randomElement([1, 2]),
            'office_id' => $this->faker->randomElement([1, 2]),
        ];
    }
}
