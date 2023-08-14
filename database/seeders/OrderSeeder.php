<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
        'details' => 'Watch',
        'client' => 'ABC'
        ]);

        Order::create([
            'details' => 'Mobile',
            'client' => 'DEF'
            ]);
    }
}
