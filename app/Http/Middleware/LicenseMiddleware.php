<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Installer\LicenseController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LicenseMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Cache::has('license')) {
            $response = Cache::get('license');
            if (array_key_exists('is_active', $response) && $response['is_active']) {
                return $next($request);
            }else{

            }
        }else{
            if(file_exists(config_path('license.php'))){
                $license = config('license.license_key');
                $domain = request()->getUri();
                $response = (new LicenseController())->checkLicense($license,$domain);
                Cache::remember('license', 60 * 60 * 24, function () use ($response) {
                    return $response;
                });
                if (array_key_exists('is_active', $response) && $response['is_active']) {


                    return $next($request);
                }else{

                }
            }else{
                return 404;
            }
        }

    }
}
