<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Path ke halaman "home" setelah login.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define route binding dan grup.
     */
    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

//            Route::middleware('api')
//                ->prefix('api')
//                ->group(base_path('routes/api.php'));
        });
    }
}
