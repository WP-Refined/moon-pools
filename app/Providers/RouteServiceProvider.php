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
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            $this->mapDomainRoutes();
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }

    /**
     * Map all available routes within each domain
     *
     * @return void
     */
    protected function mapDomainRoutes()
    {
        $domainPath = base_path('app/Domain');
        $domains = scandir($domainPath);

        foreach ($domains as $domain) {
            if (in_array($domain, ['.', '..'])) {
                continue;
            }

            $path = 'app/Domain/%s/Application/Routes/%s.php';
            $apiRoutes = base_path(sprintf($path, $domain, 'api'));
            $webRoutes = base_path(sprintf($path, $domain, 'web'));

            if (file_exists($apiRoutes)) {
                Route::middleware('api')
                    ->namespace($this->namespace)
                    ->group($apiRoutes);
            }

            if (file_exists($webRoutes)) {
                Route::middleware('web')
                    ->namespace($this->namespace)
                    ->group($webRoutes);
            }
        }
    }
}
