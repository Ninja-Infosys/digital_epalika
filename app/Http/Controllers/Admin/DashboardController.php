<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\Circular\Entities\Dispatch;
use Modules\Circular\Entities\Registration;
use Modules\DigitalBoard\Entities\Notice;
use Modules\GrievanceHandling\Entities\GrievanceDetail;
use Modules\GrievanceHandling\Entities\GrievanceUser;
use Nwidart\Modules\Facades\Module;

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
        $unseen_grievance_count = GrievanceDetail::whereNull('grievance_detail_id')->whereStatus('Unseen')->count();
        $replied_grievance_count = GrievanceDetail::whereNull('grievance_detail_id')->whereStatus('Replied')->count();
        $investigated_grievance_count = GrievanceDetail::whereNull('grievance_detail_id')->whereStatus('Investigated')->count();
        $closed_grievance_count = GrievanceDetail::whereNull('grievance_detail_id')->whereStatus('Closed')->count();



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
        ]));
    }
}
