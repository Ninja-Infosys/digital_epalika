<?php

namespace Modules\GrievanceHandling\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\GrievanceHandling\Entities\GrievanceOffice;
use Modules\GrievanceHandling\Http\Requests\GrievanceOffice\StoreGrievanceOfficeRequest;
use Modules\GrievanceHandling\Http\Requests\GrievanceOffice\UpdateGrievanceOfficeRequest;

class GrievanceOfficeController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('grievanceOffice_access');
        $grievanceOffices = GrievanceOffice::latest()->get();

        return view('grievancehandling::admin.setting.grievance_office.index', compact('grievanceOffices'));
    }

    public function create()
    {
        $this->checkAuthorization('grievanceOffice_create');

        return view('grievancehandling::admin.setting.grievance_office.create');
    }

    public function store(StoreGrievanceOfficeRequest $request)
    {
        $this->checkAuthorization('grievanceOffice_create');
        GrievanceOffice::create($request->validated());
        toast('शाखा/कार्यालय सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(GrievanceOffice $grievanceOffice)
    {
        $this->checkAuthorization('grievanceOffice_access');

        return view('grievancehandling::show');
    }

    public function edit(GrievanceOffice $grievanceOffice)
    {
        $this->checkAuthorization('grievanceOffice_edit');

        return view('grievancehandling::admin.setting.grievance_office.edit', compact('grievanceOffice'));
    }

    public function update(UpdateGrievanceOfficeRequest $request, GrievanceOffice $grievanceOffice)
    {
        $this->checkAuthorization('grievanceOffice_edit');
        $grievanceOffice->update($request->validated());
        toast(' शाखा/कार्यालय सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.grievanceHandling.setting.grievanceOffice.index'));
    }

    public function destroy(GrievanceOffice $grievanceOffice)
    {
        $this->checkAuthorization('grievanceOffice_delete');
        $grievanceOffice->delete();
        toast(' शाखा/कार्यालय सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
