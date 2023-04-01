<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class InstallMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if($this->alreadyInstalled()) {
            abort(404);
        }
        return $next($request);
    }

    public function alreadyInstalled(): bool
    {
        return file_exists(storage_path('installed'));
    }
}
