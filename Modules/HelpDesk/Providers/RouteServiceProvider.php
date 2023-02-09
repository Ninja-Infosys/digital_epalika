<?php

namespace Modules\HelpDesk\Providers;

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
            ->group(module_path('HelpDesk', '/Routes/web.php'));

        Route::middleware(['web', 'auth.lock', 'auth:sanctum', 'checkRoleMiddleware','checkPinMiddleware'])
            ->prefix('admin/helpDesk')
            ->as('admin.helpDesk.')
            ->group(module_path('HelpDesk', '/Routes/admin.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->group(module_path('HelpDesk', '/Routes/api.php'));
        Route::prefix('api/v1/helpdesk')
            ->middleware('api')
            ->group(module_path('HelpDesk', '/Routes/api/v1/public_api.php'));
    }
}
