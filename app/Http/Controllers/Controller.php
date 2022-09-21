<?php

namespace App\Http\Controllers;

use App\Http\Livewire\OfficeHeader;
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
        view()->share('officeHeader', OfficeHeader::orderBy('position')->get());
    }

    public function deleteFile($file_url)
    {
        if (Storage::disk('public')->exists($file_url)) {
            Storage::disk('public')->delete($file_url);
        }
    }
}
