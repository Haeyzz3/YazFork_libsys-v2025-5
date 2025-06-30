<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('view-super-admin-content', fn($user) =>
            $user->role?->role_name === 'super_admin'
        );

        Gate::define('view-admin-content', fn($user) =>
            $user->role?->role_name === 'admin'
        );

        Gate::define('manage-admins', function ($user) {
            return $user->hasPermission('circulate');
        });
    }
}
