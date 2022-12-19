<?php

namespace Modules\GrievanceHandling\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Modules\GrievanceHandling\Entities\GrievanceOffice;
use Modules\GrievanceHandling\Http\Requests\GrievanceOffice\StoreGrievanceOfficeRequest;
use Modules\GrievanceHandling\Http\Requests\GrievanceOffice\UpdateGrievanceOfficeRequest;

class GrievanceOfficeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('grievanceOffice_access'),
            403,
            'You are not allowed to access this resource'
        );
        $grievanceOffices = GrievanceOffice::latest()->get();
        return view('grievancehandling::admin.setting.grievance_office.index',compact('grievanceOffices'));
    }

    public function create()
    {
        abort_if(Gate::denies('grievanceOffice_create'),
            403,
            'You are not allowed to access this resource'
        );
        return view('grievancehandling::admin.setting.grievance_office.create');
    }

    public function store(StoreGrievanceOfficeRequest $request)
    {
        abort_if(Gate::denies('grievanceOffice_create'),
            403,
            'You are not allowed to access this resource'
        );
        GrievanceOffice::create($request->validated());
        toast('शाखा/कार्यालय सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(GrievanceOffice $grievanceOffice)
    {
        abort_if(Gate::denies('grievanceOffice_access'),
            403,
            'You are not allowed to access this resource'
        );
        return view('grievancehandling::show');
    }

    public function edit(GrievanceOffice $grievanceOffice)
    {
        abort_if(Gate::denies('grievanceOffice_edit'),
            403,
            'You are not allowed to access this resource'
        );
        return view('grievancehandling::admin.setting.grievance_office.edit',compact('grievanceOffice'));
    }

    public function update(UpdateGrievanceOfficeRequest $request, GrievanceOffice $grievanceOffice)
    {
        abort_if(Gate::denies('grievanceOffice_edit'),
            403,
            'You are not allowed to access this resource'
        );
        $grievanceOffice->update($request->validated());
        toast(' शाखा/कार्यालय सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.grievanceHandling.setting.grievanceOffice.index'));
    }

    public function destroy(GrievanceOffice $grievanceOffice)
    {
        abort_if(Gate::denies('grievanceOffice_delete'),
            403,
            'You are not allowed to access this resource'
        );
        $grievanceOffice->delete();
        toast(' शाखा/कार्यालय सफलतापूर्वक मेटाइयो', 'success');
        return back();
    }
}
