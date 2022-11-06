<?php

namespace Modules\TaskManagement\Providers;

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
            ->prefix('taskmanagement')
            ->as('taskManagement')
            ->group(module_path('TaskManagement', '/Routes/web.php'));

        Route::middleware(['web', 'auth.lock', 'auth:sanctum', 'checkRoleMiddleware', config('jetstream.auth_session'), 'verified'])
            ->prefix('admin/taskmanagement')
            ->as('admin.taskManagement.')
            ->group(module_path('TaskManagement', '/Routes/admin.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->group(module_path('TaskManagement', '/Routes/api.php'));
    }
}
