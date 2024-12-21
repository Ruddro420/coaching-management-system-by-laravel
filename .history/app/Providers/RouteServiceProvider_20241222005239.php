<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

        // Add your route groups here
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        // Handle redirection based on user role after login
        $this->redirectBasedOnRole();
    }

    /**
     * Redirect user to different pages based on their role after login.
     *
     * @return void
     */
    protected function redirectBasedOnRole()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Redirect based on user role
            if ($user->user_role == 'admin') {
                // Redirect admins to the dashboard
                redirect('/dashboard')->send();
            } elseif ($user->user_role == 'result') {
                // Redirect 'result' role users to the 'add result' route
                redirect('/dashboard/class/add')->send();
            }
        }
    }
}


