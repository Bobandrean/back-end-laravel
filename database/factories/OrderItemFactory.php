<?php

namespace Database\Factories;

use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    public function definition()
    {
        return [
            'order_id' => Order::inRandomOrder()->first()->id,  // Random order
            'product_id' => Product::inRandomOrder()->first()->id,  // Random product
            'quantity' => $this->faker->numberBetween(1, 5),  // Random quantity
            'price' => $this->faker->randomFloat(2, 10, 100),  // Random price
        ];
    }
}
