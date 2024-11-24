<?php

namespace App\Repositories\Product;

use LaravelEasyRepository\Repository;

interface ProductRepository extends Repository
{
    // Define additional repository methods if needed
    public function all();
    public function find($id);
}
