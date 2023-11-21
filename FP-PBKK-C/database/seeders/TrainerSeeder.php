<?php

namespace Database\Seeders;

use App\Models\Trainer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Trainer::factory()
        ->count(10)
        ->hasSchedules(3) // You can adjust the number of schedules here
        ->hasArticles(3)
        ->create();
    }
}
