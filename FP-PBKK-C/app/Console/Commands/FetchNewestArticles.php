<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class FetchNewestArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch-newest-articles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and cache the latest three articles';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $articles = Article::latest()->take(3)->get();

        // Simpan daftar artikel ke dalam cache dengan durasi 24 jam
        Cache::put('newest_articles', $articles, 1440);

        $this->info('Newest articles fetched and cached successfully.');
    }
}
