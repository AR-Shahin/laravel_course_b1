<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Category;
use App\Models\Skill;
use App\Policies\SkillPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Skill::class => SkillPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('isEditor', function ($user) {
            return $user->role === 'editor';
        });
        Gate::define('isModerator', function ($user) {
            return $user->role === 'moderator';
        });

        // Gate::define('update-post', function (User $user, Category $category) {
        //     return $user->id === $category->user_id;
        // });
    }
}
