<?php

namespace App\Providers;

use App\Models\Category;
use App\Observers\CategoryObserbar;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Category::observe(CategoryObserbar::class);
        Blade::directive('route', function ($expression) {
            //dd($expression);
            return "<?php echo route($expression); ?>";
        });
    }
}
