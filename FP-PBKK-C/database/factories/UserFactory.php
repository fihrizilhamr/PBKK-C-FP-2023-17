<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        $nama = $this->faker->name($gender);
        return [
            'name' => $nama,
            'email' => strtolower(str_replace(' ', '', $nama)) . '@mail.com',
            'email_verified_at' => now(),
            'birthdate' => $this->faker->dateTimeBetween('1970-01-01', '2010-12-31')->format('Y-m-d'),
            'address' => $this->faker->address,
            'phone_number' => $this->faker->phoneNumber,
            'Gender' => ($gender == 'male')?'Male':'Female',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
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
