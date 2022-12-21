<?php

namespace Modules\GrievanceHandling\Providers;

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
            ->prefix('grievanceHandling')
            ->as('grievanceHandling.')
            ->group(module_path('GrievanceHandling', '/Routes/web.php'));

        Route::middleware(['web', 'auth.lock', 'auth:sanctum', 'checkRoleMiddleware'])
            ->prefix('admin/grievanceHandling')
            ->as('admin.grievanceHandling.')
            ->group(module_path('GrievanceHandling', '/Routes/admin.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->group(module_path('GrievanceHandling', '/Routes/api.php'));
    }
}
