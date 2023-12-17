<?php

namespace Modules\JudicialCommittee\Providers;

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
            ->prefix('judicial-committee')
            ->as('judicialCommittee.')
            ->group(module_path('JudicialCommittee', '/Routes/web.php'));

        Route::middleware(['web', 'auth.lock', 'auth:sanctum', 'checkRoleMiddleware','checkPinMiddleware'])
            ->prefix('admin/judicialcommittee')
            ->as('admin.judicialCommittee.')
            ->group(module_path('JudicialCommittee', '/Routes/admin.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->group(module_path('JudicialCommittee', '/Routes/api.php'));

            Route::prefix('api/JudicialCommittee/user')
            ->middleware(['api', 'auth:sanctum'])
            ->group(module_path('JudicialCommittee', '/Routes/api/private_api.php'));

        Route::prefix('api/v1/complainRegistration')
            ->middleware('api')
            ->group(module_path('JudicialCommittee', '/Routes/Api/public_api.php'));

    }
}
