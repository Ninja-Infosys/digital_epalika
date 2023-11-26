<?php

namespace Modules\Roaster\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->prefix('roaster')
            ->as('roaster.')
            ->group(module_path('Roaster', '/Routes/web.php'));
            Route::middleware('web')
            ->prefix('roaster/api')
                ->group(module_path('Roaster', '/Routes/v1/publicRoute.php'));

        Route::middleware(['web', 'auth.lock', 'auth:sanctum', 'checkRoleMiddleware','checkPinMiddleware'])
            ->prefix('admin/roaster')
            ->as('admin.roaster.')
            ->group(module_path('Roaster', '/Routes/admin.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->group(module_path('Roaster', '/Routes/api.php'));

    }
}
