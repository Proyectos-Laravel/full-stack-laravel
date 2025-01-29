<?php

namespace App\Providers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\ServiceProvider;

class BackofficeServiceProvider extends ServiceProvider
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
        $this->app->bind(
            abstract: \Illuminate\Pagination\LengthAwarePaginator::class,
            concrete: \App\Overrides\LengthAwarePaginator::class,
        );
    }
}
