<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Schedule;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(10)
            ->has(Trainer::factory()
                ->has(Schedule::factory()->count(3))
                ->has(Article::factory()->count(3))
            )
            ->create();
    }
}
