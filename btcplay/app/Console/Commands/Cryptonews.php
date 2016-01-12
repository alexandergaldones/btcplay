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
            Cache::forever('top_news_daily',file_get_contents('http://www.faroo.com/api?q=bitcoin%20blockchain&start=1&length=1&l=en&src=news&f=json&key=iyFb9CZbZ2KRj5hJuXEcRCZJDR8_'));
            $this->comment('caching done. waiting for next run...');
            sleep(1800);
        }
    }
}
