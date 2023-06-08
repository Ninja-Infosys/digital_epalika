<?php

namespace Modules\TaskManagement\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\Branch;
use App\Models\Settings\FiscalYear;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Modules\TaskManagement\Entities\Activity;
use Modules\TaskManagement\Entities\DailyTask;

class ReportController extends Controller
{
    public function index()
    {
        $fiscalYears = FiscalYear::get();
        $branches = Branch::with('branches')->whereNull('branch_id')->get();
        $activities = [];
        return view('taskmanagement::admin.report.index', compact('fiscalYears', 'branches', 'activities'));
    }

    public function report(Request $request)
    {
        $fiscalYears = FiscalYear::get();
        $branches = Branch::with('branches')->whereNull('branch_id')->get();
        $activities = Activity::with('branch', 'user', 'activityLists')
            ->where(function ($q) use ($request) {
                $this->filterDataFromUser($q, $request);
            })
            ->get()
            ->map(function ($activity) {
                $data = collect([
                    'date' => $activity->date,
                    'user' => $activity->user->name ?? '',
                    'branch' => $activity->branch->name ?? '',
                    'remarks' => $activity->remarks ?? '',
                ]);
                $list = [];
                foreach ($activity->activityLists as $key => $activityList) {
                    $list[] = [
                        'title' => $activityList->title,
                        'description' => $activityList->description,
                        'remarks' => $activityList->remarks,
                    ];
                }
                $data->put('list', $list);
                return $data;
            });
        return view('taskmanagement::admin.report.index', compact('fiscalYears', 'branches', 'activities'));
    }

    public function filterDataFromUser($q, Request $request): void
    {
        if (!empty($request->input('fiscal_year'))) {
            $q->whereIn('fiscal_year_id', $request->input('fiscal_year'));
        }

        if (!empty($request->input('en_date'))) {
            $q->whereDate('date_en', $request->input('en_date'));
        }

        if (!empty($request->input('from_date'))) {
            $q->whereDate('date', '>=', $request->input('from_date'));
        }

        if (!empty($request->input('to_date'))) {
            $q->whereDate('date', '<=', $request->input('to_date'));
        }

        if (!empty($request->input('branch_id'))) {
            $q->whereIn('branch_id', $request->input('branch_id'));
        }
    }

    public function dailyReportPage()
    {
        return view('taskmanagement::admin.report.dailyReport');
    }

    public function getDailyReport(Request $request)
    {
        $request->validate([
            'en_date' => ['required', 'date']
        ]);

        $activities = Activity::with('branch', 'user', 'activityLists')
            ->where(function ($q) use ($request) {
                $this->filterDataFromUser($q, $request);
            })
            ->get();

        return response()->json([
            'data' => (string)View::make('taskmanagement::admin.report.inc.dailyReportTable', compact('activities'))
        ]);
    }

    public function monthlyReportPage()
    {
        return view('taskmanagement::admin.report.monthlyReport');
    }

    public function getMonthlyReport(Request $request)
    {
        $request->validate([
            'en_date' => ['required', 'date']
        ]);

        $activities = Activity::with('branch', 'user', 'activityLists')
            ->where(function ($q) use ($request) {
                $this->filterDataFromUser($q, $request);
            })
            ->get();

        return response()->json([
            'data' => (string)View::make('taskmanagement::admin.report.inc.monthlyReportTable', compact('activities'))
        ]);
    }
}
