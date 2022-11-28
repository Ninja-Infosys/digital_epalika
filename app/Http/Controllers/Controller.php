<?php

namespace App\Http\Controllers;

use App\Models\Settings\OfficeSetting;
use App\Models\Website\ImportantLink;
use App\Traits\BaseControllerTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;
    use BaseControllerTrait;

    public function __construct()
    {
        $this->constructionMethod();
    }
}
