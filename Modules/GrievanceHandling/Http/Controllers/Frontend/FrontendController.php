<?php

namespace Modules\GrievanceHandling\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\GrievanceHandling\Entities\GrievanceDetail;
use Modules\GrievanceHandling\Entities\GrievanceType;

class FrontendController extends Controller
{
    public function singleGrievance(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'phone' => ['required'],
        ]);

        $grievanceDetail = GrievanceDetail::with('grievanceDetails.files', 'files', 'grievanceType', 'grievanceOffice')
            ->whereNull('grievance_detail_id')
            ->whereHas('grievanceUser', function ($query) use ($request) {
                $query->where('phone', $request->input('phone'));
            })
            ->where('token', $request->input('token'))
            ->first();

        return view('grievancehandling::frontend.grievance.single-grievance', compact('grievanceDetail'));
    }

    public function grievanceHandling()
    {
        $grievanceTypes = GrievanceType::withCount('grievanceDetails')->latest()->get();
        $grievanceDetails = GrievanceDetail::whereNull('grievance_detail_id')->public()->get();

        return view('grievancehandling::frontend.index', compact('grievanceTypes', 'grievanceDetails'));
    }

    public function policy()
    {
        return view('grievancehandling::frontend.policy.policy');
    }

    public function register()
    {
        return view('grievancehandling::frontend.register.register-form');
    }

    public function track()
    {
        return view('grievancehandling::frontend.track.track');
    }

    public function publicGrievance()
    {
        return view('grievancehandling::frontend.grievance.public-grievance');
    }

    public function grievanceList()
    {
        return view('grievancehandling::frontend.grievance.grievance-list');
    }
}
