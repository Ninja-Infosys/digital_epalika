<?php

namespace Modules\ExecutiveMeeting\Http\Controllers;

use App\Models\Settings\FiscalYear;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Modules\ExecutiveMeeting\Entities\Meeting;
use Modules\ExecutiveMeeting\Transformers\MeetingResource;
use Modules\ExecutiveMeeting\Transformers\MeetingResourceReport;

class ReportController extends Controller
{
    public function index()
    {
        $fiscalYears = FiscalYear::all();
        $columnData = $this->getColumns();
        return view('executivemeeting::admin.report.index',compact('fiscalYears','columnData'));
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
                        'meetings' => ['meeting_name', 'recurrence', 'start_date', 'en_start_date']
                    ]
                ]
            );
        }

        $meetings = Meeting::with('fiscalYear','committee')->where(function ($q) use ($request) {
            $this->filterDataFromUser($q, $request);
        })->get();

//        if (!empty($request->input('columns')['partners'])) {
//            $projects->load(['partners' => function ($q) {
//                $q->with('province', 'localBody', 'district', 'issueDistrict');
//            }]);
//        }
//
//        if (!empty($request->input('columns')['registered_businesses'])) {
//            $projects->load('registeredBusinesses');
//        }
//
//        if (!empty($request->input('columns')['business_renews'])) {
//            $projects->load(['businessRenew' => function ($q) {
//                $q->with('fiscalYear');
//            }]);
//        }

        return response()->json([
            'data' => MeetingResourceReport::collection($meetings)
        ]);
    }

    private function getColumns(): Collection
    {
        $columnData = collect();

        (new Meeting())
            ->ownAndRelatedModelsFillableColumns()
            ->filter(function ($column) {
                return !array_keys($column, 'printedData');
            })
            ->each(function ($column) use ($columnData) {
                $columnData->push(collect($column)->put('columns', $column['columns']));
            });
        return $columnData;
    }

    private function filterDataFromUser($q, Request $request): void
    {
        if (!empty($request->input('fiscal_year'))) {
            $q->whereIn('fiscal_year_id', $request->input('fiscal_year'));
        }

//        if (!empty($request->input('from_date'))) {
//            $q->whereDate('registration_date_ne', '>=', $request->input('from_date'));
//        }
//
//        if (!empty($request->input('to_date'))) {
//            $q->whereDate('registration_date_ne', '<=', $request->input('to_date'));
//        }
//
//        if (!empty($request->input('object_transaction'))) {
//            $q->whereIn('object_transaction_id', $request->input('object_transaction'));
//        }
//
//        if (!empty($request->input('business_nature'))) {
//            $q->whereIn('business_nature_id', $request->input('business_nature'));
//        }
//        if (!empty($request->input('ward_no'))) {
//            $q->whereIn('ward_no', $request->input('ward_no'));
//        }
    }

}
