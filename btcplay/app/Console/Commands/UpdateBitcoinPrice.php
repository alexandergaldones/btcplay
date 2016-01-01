<?php

namespace App\Console\Commands;

use App\Http\Controllers\PriceController;
use Illuminate\Console\Command;

class UpdateBitcoinPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'btc:update';

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

    public function fire()
    {
        $this->info("Updating Bitcoin prices...");
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $wait = true;
        while(true)
        {               
            $this->info("Updating Bitcoin prices...     :        " . date('Y-m-d H:i:s'));
            $btcprice = new PriceController();
            $btcprice->getBTCPrices();                
            $this->comment('running..\n');
            $this->comment('Finished at ' . date('Y-m-d H:i:s'));            
        }
    }
}
