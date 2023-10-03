<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Account::class;

    public function definition()
    {
        $gender = $this->faker->randomElement(['Laki-laki','Perempuan']);
        $tl = $this->faker->dateTimeThisCentury->format('Y-m-d');
        
        return [
            'Email' => $this->faker->unique()->safeEmail,
            'Nama' => $this->faker->name,
            'TL' => $tl,
            'Alamat' => $this->faker->address,
            'NHP' => $this->faker->phoneNumber,
            'Gender' => $gender,
            'Password' => bcrypt($this->faker->password),
        ];
    }
}
