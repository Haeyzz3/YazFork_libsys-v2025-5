<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'middle_name' => $this->faker->boolean(50) ? $this->faker->lastName : null, // 50% chance of having a middle name
            'username' => '@' . $this->faker->unique()->userName,
            'birth_date' => $this->faker->date('Y-m-d', '2005-01-01'), // Random date before 2005
            'email' => $this->faker->unique()->safeEmail,
            'contact_number' => $this->faker->phoneNumber,
            'role_id' => Role::where('name', 'patron')->first()->id, // Assumes you have a Role factory
            'password' => Hash::make('admin123'),
        ];
    }

    public function superAdmin()
    {
        return $this->state([
            'first_name' => 'Raffy',
            'last_name' => 'Dela Cruz',
            'middle_name' => 'Abay-abay',
            'username' => '@superadmin',
            'email' => 'radelacruz00121@usep.edu.ph',
            'role_id' => Role::where('name', 'super_admin')->first()->id,
        ]);
    }

    public function yazee()
    {
        return $this->state([
            'first_name' => 'John Yazee',
            'last_name' => 'Dela Cruz',
            'username' => '@yazee',
            'email' => 'jydelacruz00121@usep.edu.ph',
            'role_id' => Role::where('name', 'admin')->first()->id,
        ]);
    }

    public function admin()
    {
        return $this->state([
            'role_id' =>  Role::where('name', 'admin')->first()->id,
        ]);
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
