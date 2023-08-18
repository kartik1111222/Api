<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;

class CronDemo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cron-demo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count_categories = Category::count();
        
        echo "Today $count_categories categories available";
    }
}
