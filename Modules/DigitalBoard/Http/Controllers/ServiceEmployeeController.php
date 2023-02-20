<?php

namespace Modules\DigitalBoard\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\DigitalBoard\Entities\Service;
use Modules\DigitalBoard\Entities\ServiceEmployee;
use Modules\DigitalBoard\Http\Requests\ServiceEmployee\StoreServiceEmployeeRequest;
use Modules\DigitalBoard\Http\Requests\ServiceEmployee\UpdateServiceEmployeeRequest;

class ServiceEmployeeController extends Controller
{
    public function index(Service $service)
    {
        $service->load(['serviceEmployees' => function ($query) {
            $query->orderBy('position');
        }]);

        return view('helpdesk::admin.service_employee.index', compact('service'));
    }


    public function store(StoreServiceEmployeeRequest $request, Service $service)
    {
        $service->serviceEmployees()->create($request->validated());

        toast('कर्मचारी सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(Service $service, ServiceEmployee $serviceEmployee)
    {
        return view('helpdesk::show');
    }

    public function edit(Service $service, ServiceEmployee $serviceEmployee)
    {
        return view('helpdesk::admin.service_employee.edit', compact('service', 'serviceEmployee'));
    }

    public function update(UpdateServiceEmployeeRequest $request, Service $service, ServiceEmployee $serviceEmployee)
    {
        if ($request->hasFile('photo') && $serviceEmployee->photo) {
            $this->deleteFile($serviceEmployee->photo);
        }
        $serviceEmployee->update($request->validated());

        toast('कर्मचारी सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.helpDesk.service.serviceEmployee.index', $service));
    }

    public function destroy(Service $service, ServiceEmployee $serviceEmployee)
    {
        if ($serviceEmployee->photo) {
            $this->deleteFile($serviceEmployee->photo);
        }

        $serviceEmployee->delete();

        toast('कर्मचारी सफलतापूर्वक हटाइयो', 'success');

        return back();
    }
}
