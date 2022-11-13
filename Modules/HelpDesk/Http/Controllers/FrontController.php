<?php

namespace Modules\HelpDesk\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\HelpDesk\Entities\Service;

class FrontController extends Controller
{
    public function showServiceDetail(Service $service)
    {
        return view('helpdesk::frontend.services.details', compact('service'));
    }

    public function helpDesk()
    {
        return view('helpdesk::frontend.index');
    }

    public function service()
    {
        return view('helpdesk::frontend.services.service');
    }
}
