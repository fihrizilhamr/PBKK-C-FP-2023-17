<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Trainer;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trainer>
 */
class TrainerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Trainer::class;

    public function definition(){

        $gender = $this->faker->randomElement(['male', 'female']);
        $nama = $this->faker->name($gender);
        return [
            'Email' => strtolower(str_replace(' ', '', $nama)) . '@mail.com',
            'Nama' => $nama,
            'TL' => $this->faker->dateTimeBetween('1970-01-01', '2010-12-31')->format('Y-m-d'),
            'Alamat' => $this->faker->address,
            'NHP' => $this->faker->phoneNumber,
            'Gender' => ($gender == 'male')?'Laki-laki':'Perempuan',
            'Password' => bcrypt($this->faker->password),
            'Lokasi' => $this->faker->address,
            'Foto' => $this->faker->word,
        ];
    }
}
