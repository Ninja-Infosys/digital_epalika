<?php

namespace Modules\GrievanceHandling\Http\Controllers\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\GrievanceHandling\Entities\GrievanceType;
use Modules\GrievanceHandling\Http\Requests\GrievanceType\StoreGrievanceTypeRequest;
use Modules\GrievanceHandling\Http\Requests\GrievanceType\UpdateGrievanceTypeRequest;

class GrievanceTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('grievanceType_access'),
            403,
            'You are not allowed to access this resource'
        );

        $grievance_types = GrievanceType::latest()->get();
        return view('grievancehandling::admin.setting.grievance_type.index',compact('grievance_types'));
    }

    public function create()
    {
        abort_if(Gate::denies('grievanceType_create'),
            403,
            'You are not allowed to access this resource'
        );
        return view('grievancehandling::admin.setting.grievance_type.create');
    }

    public function store(StoreGrievanceTypeRequest $request)
    {
        abort_if(Gate::denies('grievanceType_create'),
            403,
            'You are not allowed to access this resource'
        );

        GrievanceType::create($request->validated());
        toast('गुनासो प्रकार  सफलतापूर्वक थपियो', 'success');
        return back();

    }

    public function show(GrievanceType $grievanceType)
    {
        abort_if(Gate::denies('grievanceType_access'),
            403,
            'You are not allowed to access this resource'
        );
        return view('grievancehandling::admin.setting.grievance_type.show');
    }

    public function edit(GrievanceType $grievanceType)
    {
        abort_if(Gate::denies('grievanceType_edit'),
            403,
            'You are not allowed to access this resource'
        );

        return view('grievancehandling::admin.setting.grievance_type.edit', compact('grievanceType'));
    }

    public function update(UpdateGrievanceTypeRequest $request, GrievanceType $grievanceType)
    {
        abort_if(Gate::denies('grievanceType_edit'),
            403,
            'You are not allowed to grievance edit'
        );

        $grievanceType->update($request->validated());
        toast('गुनासो प्रकार सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.grievanceHandling.setting.grievanceType.index'));
    }

    public function destroy(GrievanceType $grievanceType)
    {
        abort_if(Gate::denies('grievanceType_delete'),
            403,
            'You are not allowed to grievance delete'
        );
        $grievanceType->delete();
        toast(' गुनासो प्रकार सफलतापूर्वक मेटाइयो', 'success');
        return back();
    }
}
