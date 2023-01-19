<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Settings\OfficeSetting;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Modules\BusinessRegistration\Entities\BusinessDetail;
use Modules\EMap\Entities\MapApply;
use Modules\GrievanceHandling\Entities\GrievanceDetail;
use Modules\Plan\Entities\PlanArea;
use Modules\Plan\Entities\Project;
use Modules\Roaster\Entities\Training;
use Schema;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $businessDetail_count = 0;
        $training_count = 0;
        $project_count = 0;
        $map_count = 0;
        $grievance_count = 0;
        $planAreas = [
            'labels' => [],
            'dataSets' => [
                [
                    'data' => [],
                ]
            ]
        ];

        $user_count = User::count();
        $activityLogs = ActivityLog::with('user')
            ->whereDate('created_at', today()->toDateString())
            ->paginate(5);

        if (Schema::hasTable('business_details')) {
            $businessDetail_count = BusinessDetail::whereNotNull('registration_no')
                ->count();
        }

        if (Schema::hasTable('trainings')) {
            $training_count = Training::whereDate('closed_date', '<=', today()->toDateString())
                ->count() ?? 0;
        }

        if (Schema::hasTable('projects')) {
            $project_count = Project::count() ?? 0;
        }

        if (Schema::hasTable('map_applies')) {
            $map_count = MapApply::count() ?? 0;
        }

        if (Schema::hasTable('grievance_details')) {
            $grievance_count = GrievanceDetail::approved()->count() ?? 0;
        }

        if (Schema::hasTable('plan_areas')) {
            $planAreas = $this->setPlanData();
        }

        return view('admin.dashboard', compact(['user_count',
            'businessDetail_count',
            'planAreas',
            'activityLogs',
            'training_count',
            'project_count',
            'map_count',
            'grievance_count'
        ]));
    }

    private function setPlanData(): array
    {
        $officeSetting = OfficeSetting::first();

        $planAreas = PlanArea::withCount(['projects' => function ($query) use ($officeSetting) {
            $query->where('fiscal_year_id', $officeSetting->fiscal_year_id);
        }])
            ->with(['planAreas' => function ($query) use ($officeSetting) {
                $query->withCount(['projects' => function ($sub_query) use ($officeSetting) {
                    $sub_query->where('fiscal_year_id', $officeSetting->fiscal_year_id);
                }]);
            }])->whereNull('plan_area_id')->get()->map(function ($planArea) {
                return [
                    'area_name' => $planArea->area_name ?? '',
                    'projects_count' => $planArea->projects_count + $planArea->planAreas->sum('projects_count')
                ];
            });


        return [
            'labels' => $planAreas->pluck('area_name')->toArray(),
            'dataSets' => [
                [
                    'data' => $planAreas->pluck('projects_count')->toArray(),
                    'label' => 'जम्मा',
                    'fill' => 'false',
                ],
            ],
        ];
    }
}
