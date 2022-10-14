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

    protected function mapWebRoutes()
    {

        Route::middleware(['web', 'auth.lock', 'auth:sanctum', 'checkRoleMiddleware', config('jetstream.auth_session'), 'verified'])
            ->prefix('admin/businessRegistration')
            ->as('admin.businessRegistration.')
            ->group(module_path('BusinessRegistration', '/Routes/admin.php'));

        Route::middleware('web')
            ->prefix('businessRegistration')
            ->as('businessRegistration.')
            ->group(module_path('BusinessRegistration', '/Routes/web.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->group(module_path('BusinessRegistration', '/Routes/api.php'));
    }
}
