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
        return [
            'Email' => strtolower(str_replace(' ', '', $nama)) . '@mail.com',
            'Nama' => $nama,
            'TL' => $this->faker->dateTimeBetween('1970-01-01', '2010-12-31')->format('Y-m-d'),
            'Alamat' => $this->faker->address,
            'NHP' => '+62-8' . $this->faker->numerify('##') .'-'. $this->faker->numerify('####') .'-'. $this->faker->numerify('####'),
            'Gender' => ($gender == 'male')?'Laki-laki':'Perempuan',
            'Password' => bcrypt($this->faker->password),
        ];
    }
}
