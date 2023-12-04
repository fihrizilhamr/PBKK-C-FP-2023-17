<?php

// MemberFactory.php

namespace Database\Factories;

use App\Models\Member;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'tinggi_badan' => $this->faker->randomFloat(2, 150, 200),
            'berat_badan' => $this->faker->randomFloat(2, 40, 150),
        ];
    }
}
