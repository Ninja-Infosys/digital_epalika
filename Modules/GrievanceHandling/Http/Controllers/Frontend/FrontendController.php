<?php

namespace Modules\GrievanceHandling\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Modules\GrievanceHandling\Entities\GrievanceDetail;
use Modules\GrievanceHandling\Entities\GrievanceType;
use Modules\GrievanceHandling\Enums\GrievanceStatus;

class FrontendController extends Controller
{
    public function grievanceHandling(): Factory|View|Application
    {
        $grievanceTypes = GrievanceType::withCount('grievanceDetails')->latest()->get();
        $grievanceDetails = GrievanceDetail::whereNull('grievance_detail_id')->public()->get();

        $grievanceCount = GrievanceDetail::whereNull('grievance_detail_id')->count();
        $registeredGrievanceCount = GrievanceDetail::whereNull('grievance_detail_id')->approved()->count();
        $closedGrievanceCount = GrievanceDetail::whereNull('grievance_detail_id')->where('status', GrievanceStatus::CLOSED->value)->count();
        $investigatedGrievanceCount = GrievanceDetail::whereNull('grievance_detail_id')->where('status', GrievanceStatus::INVESTIGATED->value)->count();
        $seenGrievanceCount = GrievanceDetail::whereNull('grievance_detail_id')->where('status', '!=', GrievanceStatus::UNSEEN->value)->count();
        $unseenGrievanceCount = GrievanceDetail::whereNull('grievance_detail_id')->where('status', GrievanceStatus::UNSEEN->value)->count();

        return view('grievancehandling::frontend.index', compact(
            'grievanceTypes',
            'grievanceDetails',
                'grievanceCount',
                'registeredGrievanceCount',
                'closedGrievanceCount',
                'investigatedGrievanceCount',
                'seenGrievanceCount',
                'unseenGrievanceCount'
            )
        );
    }

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

        if ($grievanceDetail) {
            return view('grievancehandling::frontend.grievance.single-grievance', compact('grievanceDetail'));
        }
        toast('तपाइले उपलब्ध गराएको विवरण मिलेन', 'error');
        return back();
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
