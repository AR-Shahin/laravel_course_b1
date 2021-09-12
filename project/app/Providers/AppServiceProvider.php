<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Category\AnotherRepository;
use App\Repository\Category\CategoryInterface;
use App\Repository\Category\CategoryRepository;
use App\Http\Controllers\Admin\CategoryController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        // $this->app->bind(CategoryInterface::class, AnotherRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
