<?php

namespace App\Providers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        @mkdir(config('view.compiled'), 0755, true);

        if (app()->runningInConsole()) {
            return;
        }

        if (app()->environment('production') && !Schema::hasTable('migrations')) {
            Artisan::call('migrate', ['--force' => true]);
        }
    }
}
