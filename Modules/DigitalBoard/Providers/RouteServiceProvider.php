<?php

namespace Modules\DigitalBoard\Providers;

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
        Route::middleware(['web', 'auth:sanctum', 'checkRoleMiddleware', config('jetstream.auth_session'), 'verified'])
            ->prefix('admin/digitalBoard')
            ->as('admin.digitalBoard.')
            ->group(module_path('DigitalBoard', '/Routes/web.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->group(module_path('DigitalBoard', '/Routes/api.php'));
    }
}
