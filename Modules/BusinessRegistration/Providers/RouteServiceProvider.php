<?php

namespace Modules\BusinessRegistration\Providers;

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

    protected function mapWebRoutes(): void
    {
        Route::middleware(['web', 'auth.lock', 'auth:sanctum', 'checkRoleMiddleware'])
            ->prefix('admin/businessRegistration')
            ->as('admin.businessRegistration.')
            ->group(module_path('BusinessRegistration', '/Routes/admin.php'));

        Route::middleware('web')
            ->prefix('businessRegistration')
            ->as('businessRegistration.')
            ->group(module_path('BusinessRegistration', '/Routes/web.php'));
    }

    protected function mapApiRoutes(): void
    {
        Route::prefix('api')
            ->middleware('api')
            ->group(module_path('BusinessRegistration', '/Routes/api.php'));

        Route::middleware(['api',
//            'auth:api',
//            'checkRoleMiddleware'
        ])
            ->prefix('api/admin/businessRegistration')
            ->as('api.admin.businessRegistration.')
            ->group(module_path('BusinessRegistration', '/Routes/v1/private_api.php'));

    }
}
