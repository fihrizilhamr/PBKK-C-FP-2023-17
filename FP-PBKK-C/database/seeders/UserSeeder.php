<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Article;
use App\Models\Member;
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
            ->create()
            ->each(function ($user) {
                $role = \Faker\Provider\Base::randomElement(['admin', 'member', 'trainer']);

                if ($role === 'admin') {
                    Admin::factory()->create(['user_id' => $user->id]);
                } elseif ($role === 'member') {
                    Member::factory()->create(['user_id' => $user->id]);
                } else {
                    Trainer::factory()
                        ->has(Schedule::factory()->count(3))
                        ->has(Article::factory()->count(3))
                        ->create(['user_id' => $user->id]);
                }
            });
    }

}
