<?php

namespace Modules\GrievanceHandling\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\GrievanceHandling\Entities\GrievanceOffice;

class GrievanceOfficeController extends Controller
{
    public function index()
    {
        $grievanceOffices = GrievanceOffice::latest()->get();
        return view('grievancehandling::admin.setting.grievance_office.index',compact('grievanceOffices'));
    }

    public function create()
    {
        return view('grievancehandling::admin.setting.grievance_office.create');
    }

    public function store(Request $request)
    {

        GrievanceOffice::create($request->validated());
        toast(' गुनासो पठाउने कार्यालय सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(GrievanceOffice $grievanceOffice)
    {
        return view('grievancehandling::show');
    }

    public function edit(GrievanceOffice $grievanceOffice)
    {
        return view('grievancehandling::admin.setting.grievance_office.edit',compact('grievanceOffice'));
    }

    public function update(Request $request, GrievanceOffice $grievanceOffice)
    {
        $grievanceOffice->update($request->validated());
        toast(' गुनासो पठाउने कार्यालय सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.grievanceHandling.setting.grievanceOffice.index'));
    }

    public function destroy(GrievanceOffice $grievanceOffice)
    {
        $grievanceOffice->delete();
        toast(' गुनासो पठाउने कार्यालय सफलतापूर्वक मेटाइयो', 'success');
        return back();
    }
}
