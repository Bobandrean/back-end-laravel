<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryImplement;
use App\Services\User\UserService;
use App\Services\User\UserServiceImplement;
use App\Services\Product\ProductService;
use App\Services\Product\ProductServiceImplement;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryImplement;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Bind repositories
        $this->app->bind(UserRepository::class, UserRepositoryImplement::class);

        // Bind services
        $this->app->bind(UserService::class, UserServiceImplement::class);

        // Bind services
        $this->app->bind(ProductService::class, ProductServiceImplement::class);

        // Bind repositories
        $this->app->bind(ProductRepository::class, ProductRepositoryImplement::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
