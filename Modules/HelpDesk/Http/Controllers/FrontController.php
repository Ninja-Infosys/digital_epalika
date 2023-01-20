<?php

namespace Modules\HelpDesk\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Settings\Branch;
use Modules\HelpDesk\Entities\Service;

class FrontController extends Controller
{
    public function showServiceDetail(Service $service)
    {
        return view('helpdesk::frontend.services.details', compact('service'));
    }

    public function helpDesk()
    {
        $branches = Branch::with('branches')->whereNull('branch_id')->get();

        return view('helpdesk::frontend.index', compact('branches'));
    }

    public function service()
    {
        return view('helpdesk::frontend.services.service');
    }

    public function getServices($id = null)
    {
        if ($id) {
            $services = Service::where('branch_id', $id)->get();
        } else {
            $services = Service::whereNull('branch_id')->get();
        }
        return $services;
    }
}
