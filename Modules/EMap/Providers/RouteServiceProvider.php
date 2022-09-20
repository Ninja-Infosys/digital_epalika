<?php

namespace Modules\EMap\Providers;

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
        Route::middleware('web')
            ->group(module_path('EMap', '/Routes/web.php'));

        Route::middleware(['web', 'auth:organization', 'checkRoleMiddleware', config('jetstream.auth_session'), 'verified'])
            ->prefix('organization/admin')
            ->as('organization.admin.')->group(base_path('/Modules/EMap/Routes/organization/admin.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->group(module_path('EMap', '/Routes/api.php'));
    }
}
