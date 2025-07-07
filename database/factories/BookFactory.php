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
        $languages = ['English', 'Filipino', 'Spanish', 'Other'];

        $ddcClassifications = [
            'Applied Science',
            'Arts',
            'Literature',
            'History',
            'Philosophy',
            'Religion',
            'Social Sciences',
            'Pure Sciences',
            'Technology',
            'General Knowledge'
        ];

        $physicalLocations = [
            'Circulation',
            'Fiction',
            'Reference',
            'Periodicals',
            'Special Collections',
            'Children\'s Section',
            'Young Adult',
            'Archives',
            'Rare Books'
        ];

        $sources = ['Purchase', 'Donation', 'Exchange', 'Gift', 'Transfer'];

        $acquisitionStatuses = [
            'Processing',
            'Available',
            'Cataloging',
            'On Hold',
            'Missing',
            'Damaged',
            'Under Review'
        ];

        $subjectHeadings = [
            'Computer Science, Programming',
            'Philippine Literature, Fiction',
            'History, World War II',
            'Mathematics, Calculus',
            'Biology, Marine Science',
            'Art, Renaissance',
            'Psychology, Cognitive Science',
            'Economics, Development',
            'Philosophy, Ethics',
            'Education, Teaching Methods'
        ];

        $source = $this->faker->randomElement($sources);
        $ddc = $this->faker->randomElement($ddcClassifications);
        $location = $this->faker->randomElement($physicalLocations);

        // Generate call number based on DDC classification
        $callNumber = $this->generateCallNumber($ddc);

        // Generate location symbol based on physical location
        $locationSymbol = $this->generateLocationSymbol($location);

        return [
            'title' => $this->faker->sentence(rand(3, 8)),
            'language' => $this->faker->randomElement($languages),
            'ddc_classification' => $ddc,
            'call_number' => $callNumber,
            'physical_location' => $location,
            'location_symbol' => $locationSymbol,
            'date_acquired' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'source' => $source,
            'purchase_amount' => $source === 'Purchase' ? $this->faker->randomFloat(2, 15.00, 2500.00) : null,
            'acquisition_status' => $this->faker->randomElement($acquisitionStatuses),
            'subject_headings' => $this->faker->randomElement($subjectHeadings),
            'additional_notes' => $this->faker->optional(0.7)->paragraph(),
        ];
    }

    /**
     * Generate a realistic call number based on DDC classification
     */
    private function generateCallNumber(string $ddc): string
    {
        $ddcNumbers = [
            'Applied Science' => '6',
            'Arts' => '7',
            'Literature' => '8',
            'History' => '9',
            'Philosophy' => '1',
            'Religion' => '2',
            'Social Sciences' => '3',
            'Pure Sciences' => '5',
            'Technology' => '6',
            'General Knowledge' => '0'
        ];

        $baseNumber = $ddcNumbers[$ddc] ?? '0';
        $decimal = str_pad(rand(0, 99), 2, '0', STR_PAD_LEFT);
        $author = strtoupper(substr($this->faker->lastName(), 0, 3));

        return $baseNumber . $decimal . '.' . $decimal . ' ' . $author;
    }

    /**
     * Generate location symbol based on physical location
     */
    private function generateLocationSymbol(string $location): string
    {
        $symbols = [
            'Circulation' => 'CIR',
            'Fiction' => 'FIC',
            'Reference' => 'REF',
            'Periodicals' => 'PER',
            'Special Collections' => 'SC',
            'Children\'s Section' => 'CHILD',
            'Young Adult' => 'YA',
            'Archives' => 'ARCH',
            'Rare Books' => 'RARE'
        ];

        return $symbols[$location] ?? 'GEN';
    }

    /**
     * Create a record with Purchase source and amount
     */
    public function purchased(): static
    {
        return $this->state(fn (array $attributes) => [
            'source' => 'Purchase',
            'purchase_amount' => $this->faker->randomFloat(2, 15.00, 2500.00),
        ]);
    }

    /**
     * Create a record with Donation source (no purchase amount)
     */
    public function donated(): static
    {
        return $this->state(fn (array $attributes) => [
            'source' => 'Donation',
            'purchase_amount' => null,
        ]);
    }

    /**
     * Create a record that's currently available
     */
    public function available(): static
    {
        return $this->state(fn (array $attributes) => [
            'acquisition_status' => 'Available',
        ]);
    }

    /**
     * Create a record that's still being processed
     */
    public function processing(): static
    {
        return $this->state(fn (array $attributes) => [
            'acquisition_status' => 'Processing',
            'date_acquired' => now()->subDays(rand(1, 30)),
        ]);
    }

    /**
     * Create a Filipino language record
     */
    public function filipino(): static
    {
        return $this->state(fn (array $attributes) => [
            'language' => 'Filipino',
            'subject_headings' => 'Philippine Literature, Panitikan',
        ]);
    }

    /**
     * Create a fiction record
     */
    public function fiction(): static
    {
        return $this->state(fn (array $attributes) => [
            'ddc_classification' => 'Literature',
            'physical_location' => 'Fiction',
            'location_symbol' => 'FIC',
            'subject_headings' => 'Fiction, Literature, Novel',
        ]);
    }

    /**
     * Create a reference book record
     */
    public function reference(): static
    {
        return $this->state(fn (array $attributes) => [
            'physical_location' => 'Reference',
            'location_symbol' => 'REF',
            'acquisition_status' => 'Available',
        ]);
    }

    /**
     * Create a recently acquired record
     */
    public function recent(): static
    {
        return $this->state(fn (array $attributes) => [
            'date_acquired' => now()->subDays(rand(1, 30)),
            'acquisition_status' => $this->faker->randomElement(['Processing', 'Cataloging', 'Available']),
        ]);
    }

    /**
     * Create an expensive record
     */
    public function expensive(): static
    {
        return $this->state(fn (array $attributes) => [
            'source' => 'Purchase',
            'purchase_amount' => $this->faker->randomFloat(2, 1000.00, 5000.00),
            'ddc_classification' => $this->faker->randomElement(['Applied Science', 'Technology', 'Pure Sciences']),
        ]);
    }
}
