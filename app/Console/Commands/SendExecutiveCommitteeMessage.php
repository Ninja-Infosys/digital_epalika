<?php

namespace App\Console\Commands;

use App\Helper\SMS\SamayaSms;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Modules\ExecutiveMeeting\Entities\MeetingEvent;
use Modules\ExecutiveMeeting\Entities\MunicipalCommittee;
use Modules\ExecutiveMeeting\Entities\WardCommittee;

class SendExecutiveCommitteeMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'executiveCommitteeMessage:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $meetingEvents = MeetingEvent::whereDate('en_start_date', Carbon::tomorrow()->toDateString())->get();
        $wardCommittees = WardCommittee::select('phone')->get();
        $municipalCommittees = MunicipalCommittee::select('phone')->get();

        foreach ($meetingEvents as $meetingEvent) {
            if ($meetingEvent->event_for == 'ward') {
                $phone = implode(',', $wardCommittees->pluck('phone')->toArray());
            } else {
                $phone = implode(',', $municipalCommittees->pluck('phone')->toArray());
            }

            (new SamayaSms())->sendTextSMS($phone, $meetingEvent->description);
        }
        return 0;
    }
}
