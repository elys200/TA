<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
    Paginator::useBootstrap();

    if (app()->runningInConsole() === false) {
        if (str_contains(request()->getHost(), 'ngrok')) {
            \URL::forceScheme('https');
        }
    }
}

    
}
