<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\PriceController;

class Headliners extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'btc:headline';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
            $this->comment('Caching Headlines       :       ' . date('Y-m-d H:i:s'));
            $controller = new PriceController();
            $controller->getHeadlines();  
            $this->comment('done. waiting for the next run...');
        }
    }
}
