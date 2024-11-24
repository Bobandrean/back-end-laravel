<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    public function run()
    {
        // Seed order items for each order
        \App\Models\OrderItem::factory(20)->create();
    }
}
