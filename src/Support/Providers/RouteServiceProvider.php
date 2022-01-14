<?php

namespace Support\Providers;

use App\Admin\Todos\Controllers\Controller;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use function base_path;
use function optional;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            //Admin Todo
            Route::middleware('api')
                ->namespace(Controller::class)
                ->group(base_path('src/App/Admin/Todos/routes.php'));

            //Admin Todo CQRS
            Route::middleware('api')
                ->namespace(Controller::class)
                ->group(base_path('src/App/AdminCQRS/Todos/routes.php'));
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
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
