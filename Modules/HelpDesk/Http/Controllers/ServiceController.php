<?php

namespace Modules\HelpDesk\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\HelpDesk\Entities\Branch;
use Modules\HelpDesk\Entities\Service;

class ServiceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('service_access'),
            403,
            'You are not allowed to access this resource'
        );

        $services = Service::with('branch')->get();

        return view('helpdesk::admin.service.index', compact('services'));
    }

    public function create()
    {
        abort_if(Gate::denies('service_access'),
            403,
            'You are not allowed to access this resource'
        );
        $mainBranches = Branch::with('branches')->whereNull('branch_id')->get();

        return view('helpdesk::admin.service.create', compact('mainBranches'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('service_create'),
            403,
            'You are not allowed to access this resource'
        );
    }

    public function show(Service $service)
    {
        abort_if(Gate::denies('service_access'),
            403,
            'You are not allowed to access this resource'
        );

        return view('helpdesk::admin.service.show');
    }

    public function edit(Service $service)
    {
        abort_if(Gate::denies('service_edit'),
            403,
            'You are not allowed to access this resource'
        );

        return view('helpdesk::admin.service.edit');
    }

    public function update(Request $request, Service $service)
    {
        abort_if(Gate::denies('service_edit'),
            403,
            'You are not allowed to access this resource'
        );
    }

    public function destroy(Service $service)
    {
        abort_if(Gate::denies('service_delete'),
            403,
            'You are not allowed to access this resource'
        );
    }
}
