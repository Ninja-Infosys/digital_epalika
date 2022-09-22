<?php

namespace Modules\GrievanceHandling\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\GrievanceHandling\Entities\GrievanceDetail;

class GrievanceDetailController extends Controller
{
    public function index()
    {

        abort_if(Gate::denies('grievanceDetail_access'),
            403,
            'You are not allowed to access this resource'
        );
        $grievanceDetails = GrievanceDetail::with('grievanceType')->paginate(10);
        return view('grievancehandling::admin.grievanceDetail.index',compact('grievanceDetails'));
    }

    public function create()
    {
        abort_if(Gate::denies('grievanceDetail_create'),
            403,
            'You are not allowed to access this resource'
        );
        return view('grievancehandling::create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('grievanceDetail_create'),
            403,
            'You are not allowed to access this resource'
        );
    }

    public function show($id)
    {
        abort_if(Gate::denies('grievanceDetail_access'),
            403,
            'You are not allowed to access this resource'
        );
        return view('grievancehandling::show');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('grievanceDetail_edit'),
            403,
            'You are not allowed to access this resource'
        );
        return view('grievancehandling::edit');
    }

    public function update(Request $request, $id)
    {
        abort_if(Gate::denies('grievanceDetail_edit'),
            403,
            'You are not allowed to access this resource'
        );
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('grievanceDetail_delete'),
            403,
            'You are not allowed to access this resource'
        );
    }
}
