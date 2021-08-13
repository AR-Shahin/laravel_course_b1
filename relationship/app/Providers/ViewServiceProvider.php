<?php

namespace App\Providers;

use App\Http\View\Composers\ViewComposer;
use App\Models\Country;
use App\Models\Skill;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // View Share

        View::share('test', 'This is our global variable');
        view()->share('key', 'view helper');
        view()->share('countries', Country::get());

        // View Composers

        // view()->composer(['welcome', 'test.*'], function ($view) {
        //     $view->with('globalSkills', Skill::get());
        // });

        # view composer in another class
        View::composer(['welcome', 'test.*'], ViewComposer::class);

        # Custom Blade Directive

        Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->format('m/d/Y H:i'); ?>";
        });


        Blade::directive('customUppercase', function ($expression) {

            return "<?php echo strtoupper($expression)?>";
        });


        Blade::directive('route', function ($expression) {
            //dd($expression);
            return "<?php echo route($expression); ?>";
        });
    }
}
