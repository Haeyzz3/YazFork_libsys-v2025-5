<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author' => $this->faker->name,
            'additional_authors' => [
                $this->faker->name,
                $this->faker->name,
                $this->faker->name,
            ],
            'publication_year' => $this->faker->year(),
            'publisher' => $this->faker->company(),
            'publication_place' => $this->faker->city(),
            'isbn' => $this->faker->isbn13(),
//            'Series_Title' => $this->faker->optional()->words(3, true),
//            'Edition' => $this->faker->optional()->randomElement(['1st', '2nd', '3rd', 'Revised']),
//            'Cover_Type' => $this->faker->randomElement(['Hardcover', 'Paperback', 'Other']),
//            'Book_Cover_Image' => $this->faker->optional()->imageUrl(200, 300, 'books', true, 'cover'),
//            'Table_of_Contents' => $this->faker->optional()->paragraphs(3, true),
//            'Summary_Abstract' => $this->faker->optional()->paragraph(),
        ];
    }
}
