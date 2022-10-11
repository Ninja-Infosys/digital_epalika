<?php

namespace App\Http\Controllers;

use App\Models\Settings\OfficeSetting;
use App\Models\Website\ImportantLink;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
//        view()->share('important_links', ImportantLink::all());
//        view()->share('officeSetting', OfficeSetting::with('fiscalYear', 'province', 'district', 'localBody')->first());

    }

    public function deleteFile($file_url)
    {
        if (Storage::disk('public')->exists($file_url)) {
            Storage::disk('public')->delete($file_url);
        }
    }
}
