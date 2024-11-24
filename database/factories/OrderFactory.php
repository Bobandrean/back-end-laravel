<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,  // Random user
            'total_price' => $this->faker->randomFloat(2, 10, 1000),  // Random price
            'status' => $this->faker->randomElement(['pending', 'completed', 'cancelled']),
        ];
    }
}
