<?php

namespace Modules\ExecutiveMeeting\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\ExecutiveMeeting\Entities\Committee;
use Modules\ExecutiveMeeting\Entities\CommitteeMember;
use Modules\ExecutiveMeeting\Entities\Meeting;
use Modules\ExecutiveMeeting\Entities\MeetingEvent;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $this->checkAuthorization('executiveMeetingDashboard_access');

        if (request()->ajax()) {
            return [
                'committeeWiseMeetings' => $this->getCommitteeWiseMeetings()
            ];
        }

        $members_count = CommitteeMember::count();
        $meetings_count = Meeting::where('fiscal_year_id', officeSetting()->fiscal_year_id)->count();
        $upcoming_meetings = Meeting::where('fiscal_year_id', officeSetting()->fiscal_year_id)->whereDate('en_start_date', '>=', today()->toDateString())->count();
        $completed_meetings = Meeting::where('fiscal_year_id', officeSetting()->fiscal_year_id)->whereDate('en_start_date', '<', today()->toDateString())->count();

        return view('executivemeeting::admin.dashboard', compact('members_count', 'meetings_count', 'upcoming_meetings', 'completed_meetings'));
    }

    private function getCommitteeWiseMeetings()
    {
        $committees = Committee::withCount(
            [
                'meetings' => function ($query) {
                    $query->where('fiscal_year_id', \officeSetting()->fiscal_year_id);
                },
                'meetings as completed_meetings_count'=>function($query){
                    $query->where('fiscal_year_id', \officeSetting()->fiscal_year_id);
                    $query->whereDate('en_start_date', '<', today()->toDateString());
                },
                'meetings as upcoming_meetings_count'=>function($query){
                    $query->where('fiscal_year_id', \officeSetting()->fiscal_year_id);
                    $query->whereDate('en_start_date', '>=', today()->toDateString());
                }
            ]
        )->get()->map(function ($committee) {
            return [
                'committee_name' => $committee->committee_name,
                'meetings_count' => $committee->meetings_count,
                'completed_meetings_count' => $committee->completed_meetings_count,
                'upcoming_meetings_count' => $committee->upcoming_meetings_count,
            ];
        });

        return [
            'labels' => $committees->pluck('committee_name')->toArray(),
            'dataSets' => [
                [
                    'data' => $committees->pluck('meetings_count')->toArray(),
                    'label' => 'जम्म्मा वैठक ',
                    'fill' => 'false',
                ],
                [
                    'data' => $committees->pluck('completed_meetings_count')->toArray(),
                    'label' => 'सम्पन्न बैठकहरू',
                    'fill' => 'false',
                ],
                [
                    'data' => $committees->pluck('upcoming_meetings_count')->toArray(),
                    'label' => 'आगामी बैठकहरू',
                    'fill' => 'false',
                ],
            ]
        ];
    }
}
