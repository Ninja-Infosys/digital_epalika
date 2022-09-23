<?php

namespace Modules\GrievanceHandling\Http\Controllers\Frontend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\GrievanceHandling\Entities\GrievanceDetail;

class FrontendController extends Controller
{
    public function index()
    {
        return view('grievancehandling::index');
    }

    public function create()
    {
        return view('grievancehandling::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('grievancehandling::show');
    }

    public function edit($id)
    {
        return view('grievancehandling::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function singleGrievance(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'phone' => ['required']
        ]);

        $grievanceDetail = GrievanceDetail::with('grievanceDetails.files','files','grievanceType','grievanceOffice')
            ->whereNull('grievance_detail_id')
            ->whereHas('grievanceUser', function ($query) use ($request) {
                $query->where('phone', $request->input('phone'));
            })
            ->where('token', $request->input('token'))
            ->first();

        return view('grievancehandling::frontend.grievance.single-grievance',compact('grievanceDetail'));
    }
}
