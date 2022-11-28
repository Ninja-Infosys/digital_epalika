<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class CheckRoleMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        if (!empty($request->user()->role)) {
            $permissions = Cache::rememberForever('permissions', function () use ($request) {
                return $request->user()->role->permissions->pluck('title');
            });

            collect($permissions)->each(function ($title) {
                Gate::define($title, function () {
                    return true;
                });
            });
        }

        return $next($request);
    }
}
