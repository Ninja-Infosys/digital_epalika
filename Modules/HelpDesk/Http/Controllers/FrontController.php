<?php

namespace Modules\HelpDesk\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\HelpDesk\Entities\Service;

class FrontController extends Controller
{
    public function showServiceDetail(Service $service)
    {
        return view('helpdesk::frontend.services.details', compact('service'));
    }
}
