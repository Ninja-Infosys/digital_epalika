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
            if (Cache::has($this->getCacheKey())) {
                $permissions = Cache::get($this->getCacheKey());
                 info('cache'.$permissions);
            } else {
                $permissions = Cache::remember($this->getCacheKey(), 12 * 60 * 60, function () use ($request) {
                    return $request->user()->role->permissions->pluck('title');
                });
                 info('db'.$permissions);
            }


            collect($permissions)->each(function ($title) {
                Gate::define($title, function () {
                    return true;
                });
            });
        }

        return $next($request);
    }

    public function getCacheKey(): string
    {
        info(md5('permissions-' . auth()->id()));
        return md5('permissions-' . auth()->id());
    }
}
