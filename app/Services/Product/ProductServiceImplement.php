<?php

namespace App\Services\Product;

use LaravelEasyRepository\Service;
use App\Repositories\Product\ProductRepository;

class ProductServiceImplement extends Service implements ProductService
{
  /**
   * Don't change $this->mainRepository variable name
   * because it's used in the extended Service class
   */
  protected $mainRepository;

  public function __construct(ProductRepository $mainRepository)
  {
    $this->mainRepository = $mainRepository;
  }

  public function all()
  {
    // Use mainRepository to get all products
    return $this->mainRepository->all();
  }

  public function find($id)
  {
    // Use mainRepository to find a product by ID
    return $this->mainRepository->find($id);
  }

  // Define your custom methods :)
}
