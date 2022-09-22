<?php

namespace Modules\HelpDesk\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Modules\HelpDesk\Entities\Branch;
use Modules\HelpDesk\Entities\Service;
use Modules\HelpDesk\Http\Requests\Service\StoreServiceRequest;

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

    public function store(StoreServiceRequest $request)
    {
        abort_if(Gate::denies('service_create'),
            403,
            'You are not allowed to access this resource'
        );

        DB::transaction(function () use ($request) {
            $service = Service::create($request->validated());

            foreach ($request->validated()['serviceDocuments'] as $serviceDocument) {
                $service->serviceDocuments()->create($serviceDocument);
            }

            foreach ($request->validated()['serviceProcesses'] as $serviceProcess) {
                $service->serviceProcesses()->create($serviceProcess);
            }

            foreach ($request->validated()['serviceEmployees'] as $serviceEmployee) {
                $service->serviceEmployees()->create($serviceEmployee);
            }
        });

        toast('सेवा सफलतापूर्वक सिर्जना गरियो', 'success');

        return back();
    }

    public function show(Service $service)
    {
        abort_if(Gate::denies('service_access'),
            403,
            'You are not allowed to access this resource'
        );
        $service->load('branch', 'serviceDocuments', 'serviceProcesses', 'serviceEmployees');

        return view('helpdesk::admin.service.show', compact('service'));
    }

    public function edit(Service $service)
    {
        abort_if(Gate::denies('service_edit'),
            403,
            'You are not allowed to access this resource'
        );
        $mainBranches = Branch::with('branches')->whereNull('branch_id')->get();

        return view('helpdesk::admin.service.edit', compact('service', 'mainBranches'));
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
