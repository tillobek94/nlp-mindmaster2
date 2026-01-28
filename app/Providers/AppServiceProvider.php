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
        // Hech narsa
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Database muammosini oldini olish
        try {
            // Agar database connection sozlanmagan bo'lsa
            if (!config('database.default')) {
                config(['database.default' => 'sqlite']);
            }
        } catch (\Exception $e) {
            // Xatoni log qilish
            error_log('Database config error: ' . $e->getMessage());
        }
        
        // HTTPS force (production uchun)
        if ($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
    }
}
