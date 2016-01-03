<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Cache;

class Cryptonews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'btc:news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bitcoin News from google api';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        while(true)
        {
            $this->comment('caching google news as of ' . date('Y-m-d H:i:s'));
            Cache::forever('top_news_daily',file_get_contents('https://ajax.googleapis.com/ajax/services/search/news?v=1.0&rsz=5&q=bitcoin%20blockchain'));
            $this->comment('caching done. waiting for next run...');
            sleep(30);
        }
    }
}
