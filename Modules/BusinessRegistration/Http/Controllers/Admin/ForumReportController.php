<?php

namespace Modules\BusinessRegistration\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use Illuminate\Http\Request;
use Modules\BusinessRegistration\Entities\Forum;
use Modules\BusinessRegistration\Transformers\forumReport\ForumResource;

class ForumReportController extends Controller
{
    public function index()
    {
        $fiscalYears = FiscalYear::all();
        $forums = Forum::all();
        return view('businessregistration::admin.forumReport.index', compact('fiscalYears','forums'));
    }


    public function report(Request $request)
    {
        $request->validate([
            'from_date' => ['nullable'],
            'to_date' => ['nullable', 'after_or_equal:from_date'],
            'columns' => ['nullable', 'array']
        ]);

        if (empty($request->input('columns'))) {
            $request->request->add(
                ['columns' =>
                    [
                        'forum_registrations' => ['name', 'type', 'registration_no', 'registration_date_ne', 'purpose']
                    ]
                ]
            );
        }
        $projects = Forum::with('fiscalYear', 'province', 'localBody', 'district')->where(function ($q) use ($request) {
            $this->filterDataFromUser($q, $request);
        })->whereNotNull('registration_no')->get();

        if (!empty($request->input('columns')['partners'])) {
            $projects->load(['partners' => function ($q) {
                $q->with('province', 'localBody', 'district', 'issueDistrict');
            }]);
        }

        if (!empty($request->input('columns')[''])) {
            $projects->load(['forumRenew' => function ($q) {
                $q->with('fiscalYear');
            }]);
        }

        return response()->json([
            'data' => ForumResource::collection($projects)
        ]);
    }

    private function filterDataFromUser($q, Request $request): void
    {
        if (!empty($request->input('fiscal_year'))) {
            $q->whereIn('fiscal_year_id', $request->input('fiscal_year'));
        }

        if (!empty($request->input('from_date'))) {
            $q->whereDate('registration_date_ne', '>=', $request->input('from_date'));
        }

        if (!empty($request->input('to_date'))) {
            $q->whereDate('registration_date_ne', '<=', $request->input('to_date'));
        }


        if (!empty($request->input('name'))) {
            $q->whereIn('name', $request->input('name'));
        }
        if (!empty($request->input('type'))) {
            $q->whereIn('type', $request->input('type'));
        }

        if (!empty($request->input('ward_no'))) {
            $q->whereIn('ward_no', $request->input('ward_no'));
        }
    }
}
