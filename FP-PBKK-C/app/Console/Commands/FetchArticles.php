<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class FetchArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch-articles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and cache the list of articles';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $articles = Article::all();

        // Simpan daftar artikel ke dalam cache dengan durasi 24 jam
        Cache::put('articles', $articles, 1440);

        $this->info('Articles fetched and cached successfully.');
    }
}
