<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('manage-admins', static fn($user) =>
        $user->hasPermission('manage_admins')
        );

        Gate::define('manage-patrons', static fn($user) =>
            $user->hasPermission('manage_patrons')
        );
    }

    protected array $policies = [
        \App\Models\User::class => \App\Policies\UserPolicy::class,
    ];
}
