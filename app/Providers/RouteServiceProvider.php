<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->registerJsonGroup();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware(['backoffice', 'auth', 'verified'])
                ->prefix('backoffice')
                ->as('backoffice.')
                ->group(base_path('routes/backoffice.php'));
        });
    }

    private function registerJsonGroup(): void
    {
        Route::macro('jsonGroup', function (string $prefix, string $controller, array $methods = []) {
            Route::prefix($prefix)->name($prefix .'.')->group(function () use ($controller, $methods) {
                if (in_array('index', $methods)) {
                    Route::get('/', [$controller, 'index'])->name('index');
                }
                if (in_array('json', $methods)) {
                    Route::get('/json', [$controller, 'json'])->name('json');
                }
                if (in_array('export', $methods)) {
                    Route::post('/generate-export-url', [$controller, 'generateExportUrl'])->name('generate_export_url');
                    Route::get('/export', [$controller, 'export'])->name('export');
                }
                if (in_array('store', $methods)) {
                    Route::post('/', [$controller, 'store'])->name('store');
                }
                if (in_array('update', $methods)) {
                    Route::put('/{id}', [$controller, 'update'])->name('update');
                }
                if (in_array('destroy', $methods)) {
                    Route::delete('/{id}', [$controller, 'destroy'])->name('destroy');
                }
            });
        });
    }
}
