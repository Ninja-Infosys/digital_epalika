<?php

namespace Modules\GrievanceHandling\Http\Controllers\Frontend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\GrievanceHandling\Entities\GrievanceDetail;
use Modules\GrievanceHandling\Entities\GrievanceType;

class FrontendController extends Controller
{

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

    public function grievance()
    {
        $grievanceTypes = GrievanceType::withCount('grievanceDetails')->latest()->get();
        $grievanceDetails = GrievanceDetail::whereNull('grievance_detail_id')->get();
        return view('grievancehandling::frontend.index',compact('grievanceTypes','grievanceDetails'));
    }
}
