<?php

namespace App\Providers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
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
        Config::set('session.driver', 'cookie');
        Config::set('cache.default', 'array');

        @mkdir(config('view.compiled'), 0755, true);
        @mkdir('/tmp/sessions', 0755, true);

        if (app()->runningInConsole()) {
            return;
        }

        $databasePath = config('database.connections.sqlite.database');
        if ($databasePath && !file_exists(dirname($databasePath))) {
            @mkdir(dirname($databasePath), 0755, true);
        }

        if ($databasePath && !file_exists($databasePath)) {
            @touch($databasePath);
        }

        if (app()->environment('production') && !Schema::hasTable('migrations')) {
            Artisan::call('migrate', ['--force' => true]);
        }
    }
}
