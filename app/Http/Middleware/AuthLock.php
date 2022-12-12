<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AuthLock
{
    public function handle(Request $request, Closure $next)
    {

        if (!app()->environment('local')) {
        if (!$request->user()) {
            return $next($request);
        }
        if (!$request->user()->hasLockoutTime()) {

            if (session('lock-expires-at')) {
                session()->forget('lock-expires-at');
            }

            return $next($request);
        }

        if (($lockExpiresAt = session('lock-expires-at')) && $lockExpiresAt < now()) {
            session()->put('route_to_redirect', $request->url());
            return redirect(route('login.locked'));
        }

        session(['lock-expires-at' => now()->addMinutes($request->user()->getLockoutTime())]);
        }
        return $next($request);
    }
}
