<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FetchN11Orders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'n11:orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch N11 Orders';

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
    }
}
