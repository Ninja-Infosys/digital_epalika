<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPinMiddleware
{
    public function handle(Request $request, Closure $next)
    {
//        if (auth()->check()
//            && ! auth()->user()->pin
//            && ! $request->is('organization/password/create')
//            && ! $request->is('organization/password/store')
//        ) {
//            return redirect()->route('organization.password.create');
//        }

        return $next($request);
    }
}
