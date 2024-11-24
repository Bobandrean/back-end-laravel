<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Seed 10 orders for users
        \App\Models\Order::factory(10)->create();
    }
}
