<?php

namespace Modules\OrganizationRegistration\Providers;

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
        Route::middleware(['web', 'auth.lock', 'auth:sanctum', 'checkRoleMiddleware'])
            ->prefix('admin/organizationRegistration')
            ->as('admin.organizationRegistration.')
            ->group(module_path('OrganizationRegistration', '/Routes/admin.php'));

        Route::middleware('web')
            ->prefix('organizationRegistration')
            ->as('organizationRegistration.')
            ->group(module_path('BusinessRegistration', '/Routes/web.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->group(module_path('OrganizationRegistration', '/Routes/api.php'));
    }
}
