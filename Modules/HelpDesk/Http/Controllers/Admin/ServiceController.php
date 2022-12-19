<?php

namespace Modules\HelpDesk\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\Branch;
use Illuminate\Support\Facades\DB;
use Modules\HelpDesk\Entities\Service;
use Modules\HelpDesk\Entities\ServiceDocument;
use Modules\HelpDesk\Entities\ServiceProcess;
use Modules\HelpDesk\Http\Requests\Service\StoreServiceRequest;
use Modules\HelpDesk\Http\Requests\Service\UpdateServiceRequest;
use Illuminate\Database\Eloquent\Builder;

class ServiceController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('service_access');

        $services = Service::with('branch')
        ->where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['title'], request('search'));
            }
        })
        ->latest()->paginate(10);


        return view('helpdesk::admin.service.index', compact('services'));
    }

    public function create()
    {
        $this->checkAuthorization('service_create');
        $mainBranches = Branch::with('branches')->whereNull('branch_id')->get();

        return view('helpdesk::admin.service.create', compact('mainBranches'));
    }

    public function store(StoreServiceRequest $request)
    {
        $this->checkAuthorization('service_create');

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
        $this->checkAuthorization('service_access');
        $service->load('branch', 'serviceDocuments', 'serviceProcesses', 'serviceEmployees');

        return view('helpdesk::admin.service.show', compact('service'));
    }

    public function edit(Service $service)
    {
        $this->checkAuthorization('service_edit');
        $mainBranches = Branch::with('branches')->whereNull('branch_id')->get();

        return view('helpdesk::admin.service.edit', compact('service', 'mainBranches'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $this->checkAuthorization('service_edit');

        DB::transaction(function () use ($request, $service) {
            $service->update($request->validated());

            foreach ($request->input('serviceDocuments') as $serviceDocument) {
                if (! empty($serviceDocument['id'])) {
                    ServiceDocument::find($serviceDocument['id'])->update([
                        'description' => $serviceDocument['description'],
                    ]);
                } else {
                    $service->serviceDocuments()->create($serviceDocument);
                }
            }
            foreach ($request->input('serviceProcesses') as $serviceProcess) {
                if (! empty($serviceProcess['id'])) {
                    ServiceProcess::find($serviceProcess['id'])->update([
                        'description' => $serviceProcess['description'],
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
        $this->checkAuthorization('service_delete');
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
