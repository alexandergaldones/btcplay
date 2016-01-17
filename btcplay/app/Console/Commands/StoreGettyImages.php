<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StoreGettyImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'btc:images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get sample images from getty';

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
        //
	$imagesString = array(
		'bitcoion',
		'stocks',
		'digital'
	);
    }
}
