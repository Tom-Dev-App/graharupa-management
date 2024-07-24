<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
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
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        Blade::component('dashboard-layout', \App\View\Components\DashboardLayout::class);

        Gate::define('admin', function(User $user){
            return $user->role_id === Role::ADMIN;
        });

        Gate::define('user', function(User $user){
            return $user->role_id === Role::USER;
        });




    }
}
