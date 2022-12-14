<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Settings\OfficeSetting;
use App\Models\User;
use Modules\BusinessRegistration\Entities\BusinessDetail;
use Modules\Circular\Entities\Dispatch;
use Modules\Circular\Entities\Registration;
use Modules\DigitalBoard\Entities\Notice;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\Organization;
use Modules\ExecutiveMeeting\Entities\MeetingEvent;
use Modules\GrievanceHandling\Entities\GrievanceDetail;
use Modules\GrievanceHandling\Entities\GrievanceType;
use Modules\GrievanceHandling\Entities\GrievanceUser;
use Modules\Plan\Entities\PlanArea;
use Modules\Plan\Entities\Project;
use Modules\Roaster\Entities\Training;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $user_count = User::count();

        $businessDetail_count = BusinessDetail::whereNotNull('registration_no')->count() ?? 0;
        $activityLogs = ActivityLog::with('user')->whereDate('created_at', today()->toDateString())->paginate(5);
        $training_count = Training::whereDate('closed_date', '<=', today()->toDateString())->count() ?? 0;
        $project_count = Project::count() ?? 0;
        $map_count = MapApply::count() ?? 0;
        $grievance_count = GrievanceDetail::approved()->count() ?? 0;
        $planAreas = $this->setPlanData();


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
                    'area_name' => $planArea->area_name,
                    'projects_count' => $planArea->projects_count + $planArea->planAreas->sum('projects_count')
                ];
            });

        if (!empty($planArea)) {
            $data = [
                'labels' => $planAreas->pluck('area_name')->toArray(),
                'dataSets' => [
                    [
                        'data' => $planAreas->pluck('projects_count')->toArray(),
                        'label' => 'जम्मा',
                        'fill' => 'false',
                    ],
                ],
            ];
        } else {
            $data = [
                'labels' => [],
                'dataSets' => [
                    [
                        'data' => [],
                    ]
                ]
            ];
        }

        return $data;

    }
}
