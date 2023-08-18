<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Events\NewOrder;
 

class DispatchOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dispatch-order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Broadcast new order';

    /**
     * Execute the console command.
     */

     public function __construct()
     {
         parent::__construct();
     }

    public function handle()
    {
        echo "Dispatching event...\n";
        NewOrder::dispatch([
            "id" => 1
        ]);
        echo "Event dispatched!\n";
    }
}
