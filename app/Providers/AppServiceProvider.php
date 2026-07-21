<?php

namespace App\Providers;

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
        // Auto-detect Vite HMR for development
        if (app()->isLocal()) {
            \Illuminate\Support\Facades\URL::forceScheme('http');
        }
    }
}
