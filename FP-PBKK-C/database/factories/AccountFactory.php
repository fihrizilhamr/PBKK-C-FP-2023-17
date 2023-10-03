<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Account;

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

    public function definition(){

        $gender = $this->faker->randomElement(['male', 'female']);
        $nama = $this->faker->name($gender);
        //$email = str_replace(' ', '', $nama) . '@mail.com';

        $tl = $this->faker->dateTimeBetween('1970-01-01', '2010-12-31')->format('Y-m-d');

        return [
            'Email' => str_replace(' ', '', $nama) . '@mail.com',
            'Nama' => $nama,
            'TL' => $tl,
            'Alamat' => $this->faker->address,
            'NHP' => $this->faker->phoneNumber,
            'Gender' => $gender,
            'Password' => bcrypt($this->faker->password),
        ];
    }

}
