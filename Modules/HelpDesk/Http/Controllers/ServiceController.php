<?php

namespace Modules\HelpDesk\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Modules\HelpDesk\Entities\Branch;
use Modules\HelpDesk\Entities\Service;
use Modules\HelpDesk\Entities\ServiceDocument;
use Modules\HelpDesk\Entities\ServiceEmployee;
use Modules\HelpDesk\Entities\ServiceProcess;
use Modules\HelpDesk\Http\Requests\Service\StoreServiceRequest;
use Modules\HelpDesk\Http\Requests\Service\UpdateServiceRequest;

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

    public function update(UpdateServiceRequest $request, Service $service)
    {
        abort_if(Gate::denies('service_edit'),
            403,
            'You are not allowed to access this resource'
        );

        DB::transaction(function () use ($request, $service) {
            if ($request->hasFile('photo') && $service->photo) {
                $this->deleteFile($service->photo);
            }
            $service->update($request->validated());

            foreach ($request->input('serviceDocuments') as $serviceDocument) {
                if (!empty($serviceDocument['id'])) {
                    ServiceDocument::find($serviceDocument['id'])->update([
                        'description' => $serviceDocument['description']
                    ]);
                } else {
                    $service->serviceDocuments()->create($serviceDocument);
                }
            }
            foreach ($request->input('serviceProcesses') as $serviceProcess) {
                if (!empty($serviceProcess['id'])) {
                    ServiceProcess::find($serviceProcess['id'])->update([
                        'description' => $serviceProcess['description']
                    ]);
                } else {
                    $service->serviceProcesses()->create($serviceProcess);
                }
            }
        });

        toast('सेवा विवरण सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.helpDesk.service.index'));
    }

    public function destroy(Service $service)
    {
        abort_if(Gate::denies('service_delete'),
            403,
            'You are not allowed to access this resource'
        );
        $service->serviceDocuments()->delete();
        $service->serviceProcesses()->delete();
        $service->serviceEmployees()->delete();

        if ($service->photo) {
            $this->deleteFile($service->photo);
        }
        $service->delete();

        toast('सेवा सफलतापूर्वक मेटियो', 'success');
        return back();
    }
}
