<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Modules\Circular\Entities\Dispatch;
use Modules\Circular\Entities\Registration;
use Modules\DigitalBoard\Entities\Notice;
use Modules\EMap\Entities\Organization;
use Modules\ExecutiveMeeting\Entities\MeetingEvent;
use Modules\GrievanceHandling\Entities\GrievanceDetail;
use Modules\GrievanceHandling\Entities\GrievanceType;
use Modules\GrievanceHandling\Entities\GrievanceUser;

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
        $organizations_count=Organization::where('is_active',1)->count();

        return view('admin.dashboard', compact(['user_count',
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
            'organizations_count'
        ]));
    }
}
