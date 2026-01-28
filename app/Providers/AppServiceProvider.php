<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        // Agar SQLite bo'lsa
        if ($this->app->runningInConsole() && config('database.default') === 'sqlite') {
            $databasePath = config('database.connections.sqlite.database');
            if (!file_exists($databasePath)) {
                file_put_contents($databasePath, '');
            }
        }
        
        // HTTPS force (production uchun)
        if ($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
    }
}
