<?php

namespace Modules\GrievanceHandling\Http\Controllers\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\GrievanceHandling\Entities\GrievanceType;

class GrievanceTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('grievanceType_access'),
            403,
            'You are not allowed to access this resource'
        );

        return view('grievancehandling::admin.setting.grievance_type.index');
    }

    public function create()
    {
        return view('grievancehandling::admin.setting.grievance_type.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(GrievanceType $grievanceType)
    {
        return view('grievancehandling::admin.setting.grievance_type.show');
    }

    public function edit(GrievanceType $grievanceType)
    {
        return view('grievancehandling::admin.setting.grievance_type.edit');
    }

    public function update(Request $request, GrievanceType $grievanceType)
    {
        //
    }

    public function destroy(GrievanceType $grievanceType)
    {
        //
    }
}
