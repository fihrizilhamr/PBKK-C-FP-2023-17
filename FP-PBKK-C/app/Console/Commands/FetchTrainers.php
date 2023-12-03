<?php

namespace App\Console\Commands;

use App\Models\Trainer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class FetchTrainers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch-trainers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and cache the list of trainers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $trainers = Trainer::with('user')->get();

        // Simpan daftar personal trainer ke dalam cache dengan durasi 1 minggu
        Cache::put('trainers', $trainers, 10800);

        $this->info('Trainers fetched and cached successfully.');
    }
}
