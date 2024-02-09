<?php

namespace Modules\Estimate\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

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
        Route::middleware('web', 'auth.lock', 'auth:sanctum', 'checkRoleMiddleware', 'checkPinMiddleware')
            ->prefix('admin/estimate')
            ->as('admin.estimate.')
            ->group(module_path('Estimate', '/Routes/admin.php'));

        Route::middleware('web')
            ->prefix('estimate')
            ->as('estimate.')
            ->group(module_path('Estimate', '/Routes/web.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->group(module_path('Estimate', '/Routes/api.php'));
    }
}
