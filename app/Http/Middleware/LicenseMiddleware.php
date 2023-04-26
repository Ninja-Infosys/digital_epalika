<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Installer\LicenseController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class LicenseMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('license')) {
            if (file_exists(config_path('license.php'))) {
                Session::remember('license', function () {
                    $license = config('license.license_key');
                    $domain = request()->getUri();
                    return (new LicenseController())->checkLicense($license, $domain);
                });
            } else {
                Session::remember('licenseError', fn() => 'License key not found');
            }
        }
        return $next($request);
    }
}
