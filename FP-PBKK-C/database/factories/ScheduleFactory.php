<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Schedule;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Schedule::class;

    public function definition()
    {   
        $startTime = $this->faker->time('H:i');
        $endTime = $this->faker->dateTimeInInterval($startTime, '+2 hours')->format('H:i');
        return [
            'day' => $this->faker->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']),
            'start_time' => $startTime,
            'end_time' => $endTime,
        ];
    }
}
