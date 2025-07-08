<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DigitalResource>
 */
class DigitalResourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'primary_author' => $this->faker->name(),
            'publication_copyright_year' => $this->faker->year(),
            'publisher_producer' => $this->faker->company(),
            'editor_producer' => $this->faker->company(),
            'collection_type' => $this->faker->randomElement(['E-books', 'Audiobooks', 'Digital Magazines', 'Online Databases', 'Streaming Media']),
            'access_method' => $this->faker->randomElement(['Online', 'CD/DVD', 'USB', 'Network Access']),
            'file_format' => $this->faker->randomElement(['PDF', 'EPUB', 'MOBI', 'MP3', 'MP4', 'HTML', 'XML']),
            'duration' => $this->faker->boolean(30) ? $this->faker->time('H:i:s') : null,
            'system_requirements' => $this->faker->boolean(50) ? $this->faker->paragraph(2) : null,
            'resource_cover_thumbnail' => $this->faker->boolean(70) ? $this->faker->imageUrl(200, 300, 'books') : null,
            'license_access_rights' => $this->faker->boolean(60) ? $this->faker->paragraph(3) : null,
            'summary_abstract' => $this->faker->boolean(80) ? $this->faker->paragraph(4) : null,
        ];
    }
}
