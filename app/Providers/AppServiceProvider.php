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
        foreach (glob(app_path('Macros/Blueprint/*.php')) as $filename) {
            $filename = basename($filename, '.php');
            $class = 'App\\Macros\\Blueprint\\'.$filename;
            $this->app->call($class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
