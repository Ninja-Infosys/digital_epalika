<?php

namespace App\Console\Commands;

use App\Mail\GrievanceDetailMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Modules\GrievanceHandling\Entities\GrievanceDetail;
use Modules\GrievanceHandling\Entities\GrievanceSetting;
use Modules\GrievanceHandling\Enums\GrievanceStatus;

class GrievanceEscalationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'grievance:escalate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Grievance Escalation';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $grievanceSetting = GrievanceSetting::first();
        $grievanceDetails = GrievanceDetail::with('assignedUser')
            ->whereHas('assignedUser', function ($query) {
                $query->whereNotNull('user_id');
            })
            ->where('status', GrievanceStatus::UNSEEN)
            ->whereNull('grievance_detail_id')
            ->whereRaw("DATE(assigned_at) = CURDATE() - INTERVAL $grievanceSetting->escalation_days DAY")
            ->get();

        foreach ($grievanceDetails as $grievanceDetail) {
            $grievanceAssign=$grievanceDetail->grievanceAssignHistories()->create([
                'from_user_id' => $grievanceDetail->assigned_user_id,
                'user_id' => $grievanceDetail->assignedUser->user_id
            ]);

            $grievanceDetail->update([
                'assigned_user_id' => $grievanceDetail->assignedUser->user_id,
                'assigned_at' => now()
            ]);
            //mail to assigned user
            Mail::to($grievanceAssign->user->email)->send(new GrievanceDetailMail(
                "$grievanceDetail->token टोकन नम्बरको गुनासो तपाईंको शाखामा पेश गरिएको छ । कृपया निश्चित अवधिमा सम्बोधन गरिदिनुहोला ।"
            ));
        }

        $this->info('Grievance Escalation');

        return 0;
    }
}
