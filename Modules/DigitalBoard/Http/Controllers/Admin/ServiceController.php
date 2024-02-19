<?php

namespace Modules\DigitalBoard\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\Branch;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Modules\DigitalBoard\Entities\Service;
use Modules\DigitalBoard\Entities\ServiceDocument;
use Modules\DigitalBoard\Entities\ServiceProcess;
use Modules\DigitalBoard\Http\Requests\Service\StoreServiceRequest;
use Modules\DigitalBoard\Http\Requests\Service\UpdateServiceRequest;

class ServiceController extends Controller
{
    public function index()
    {


        $services = Service::with('branch')
        ->where(function ($q){
            if (!empty(auth()->user()->ward_no)) {
                $authWardNo = auth()->user()->ward_no;
                $q->whereRaw("FIND_IN_SET('$authWardNo', ward) > 0");
            }
        })
        ->latest()->paginate(10);

        return view('digitalboard::admin.service.index', compact('services'));
    }

    public function create()
    {

        $mainBranches = Branch::with('branches')->whereNull('branch_id')->get();

        return view('digitalboard::admin.service.create', compact('mainBranches'));
    }

    public function store(StoreServiceRequest $request)
    {


        DB::transaction(function () use ($request) {
            $service = Service::create($request->validated()+['ward'=>auth()->user()->ward_no,'user_id'=>auth()->id()]);

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

        $service->load('branch', 'serviceDocuments', 'serviceProcesses', 'serviceEmployees');

        return view('digitalboard::admin.service.show', compact('service'));
    }

    public function edit(Service $service)
    {

        $mainBranches = Branch::with('branches')->whereNull('branch_id')->get();

        return view('digitalboard::admin.service.edit', compact('service', 'mainBranches'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        DB::transaction(function () use ($request, $service) {
            $service->update($request->validated()+['ward'=>auth()->user()->ward_no,'user_id'=>auth()->id()]);
    
            foreach ($request->input('serviceDocuments') as $serviceDocument) {
                ServiceDocument::updateOrCreate(
                    ['service_id' => $service->id,'id' => $serviceDocument['id'] ?? null],
                    $serviceDocument
                );
            }
    
            foreach ($request->input('serviceProcesses') as $serviceProcess) {
                ServiceProcess::updateOrCreate(
                    ['service_id' => $service->id,'id' => $serviceProcess['id'] ?? null],
                    $serviceProcess
                );
            }
        });
    
        toast('सेवा विवरण सफलतापूर्वक अद्यावधिक गरियो', 'success');
    
        return redirect(route('admin.digitalBoard.service.index'));
    }

    public function destroy(Service $service)
    {

        $service->serviceDocuments()->delete();
        $service->serviceProcesses()->delete();
        $service->serviceEmployees()->delete();

        if ($service->photo) {
            $this->deleteFile($service->photo);
        }
        $service->delete();

        toast('सेवा सफलतापूर्वक मेटियो', 'success');

        return redirect(route('admin.digitalBoard.service.index'));
    }
}
