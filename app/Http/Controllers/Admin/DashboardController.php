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
use Modules\EMap\Entities\Organization;
use Modules\ExecutiveMeeting\Entities\MeetingEvent;
use Modules\GrievanceHandling\Entities\GrievanceDetail;
use Modules\GrievanceHandling\Entities\GrievanceType;
use Modules\GrievanceHandling\Entities\GrievanceUser;
use Modules\Plan\Entities\PlanArea;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $user_count = User::count();
        $grievance_user_count = GrievanceUser::count();
        $notice_count = Notice::where('type', 'Notice')->count();
        $news_count = Notice::where('type', 'News')->count();
        $registration_count = Registration::count();
        $dispatch_count = Dispatch::count();
        $unseen_grievance = GrievanceDetail::whereNull('grievance_detail_id')->whereStatus('Unseen');
        $unseen_grievances = $unseen_grievance->limit(5)->get();
        $unseen_grievance_count = $unseen_grievance->count();
        $replied_grievance_count = GrievanceDetail::whereNull('grievance_detail_id')->whereStatus('Replied')->count();
        $investigated_grievance_count = GrievanceDetail::whereNull('grievance_detail_id')->whereStatus('Investigated')->count();
        $closed_grievance_count = GrievanceDetail::whereNull('grievance_detail_id')->whereStatus('Closed')->count();
        $ward_meetings_count = MeetingEvent::where('event_for', 'ward')->count();
        $municipal_meetings_count = MeetingEvent::where('event_for', 'municipal')->count();
        $grievanceTypes = GrievanceType::withCount('grievanceDetails')->latest()->get();
        $businessDetail_count = BusinessDetail::whereNotNull('registration_no')->count();
        $activityLogs = ActivityLog::with('user', 'model')->whereDate('created_at', today()->toDateString())->paginate(5);

        $planAreas = $this->setPlanData();


        return view('admin.dashboard', compact(['user_count',
            'businessDetail_count',
            'planAreas',
            'activityLogs',
            'grievance_user_count',
            'notice_count',
            'news_count',
            'registration_count',
            'dispatch_count',
            'unseen_grievance_count',
            'replied_grievance_count',
            'investigated_grievance_count',
            'closed_grievance_count',
            'municipal_meetings_count',
            'ward_meetings_count',
            'grievanceTypes',
            'unseen_grievances',
        ]));


    }

    private function setPlanData(): array
    {
        $officeSetting = OfficeSetting::first();
        $planAreas = PlanArea::with(['planAreas' => function ($query) use ($officeSetting) {
            $query->withCount('projects');
        }])->get()->map(function ($planArea){
            $count=0;
            foreach($planArea->planAreas as $area){
                $count+=$area->projects_count;
            }
            return [
                'area_name'=>$planArea->area_name,
                'projects_count'=>$count
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
