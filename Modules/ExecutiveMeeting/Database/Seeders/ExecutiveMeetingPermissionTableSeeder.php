<?php

namespace Modules\ExecutiveMeeting\Database\Seeders;

use App\Traits\StorePermissionTrait;
use Illuminate\Database\Seeder;

class ExecutiveMeetingPermissionTableSeeder extends Seeder
{
    use StorePermissionTrait;

    public function run()
    {
        $permissions = [
            'executiveCommittee_access',
            'executiveCommittee_create',
            'executiveCommittee_edit',
            'executiveCommittee_delete',
            'meetingEvent_access',
            'meetingEvent_create',
            'meetingEvent_edit',
            'meetingEvent_delete',
            'meetingDecision_access',
            'meetingDecision_create',
            'meetingDecision_edit',
            'meetingDecision_delete',
            'wardMeeting_access',
            'wardMeeting_create',
            'wardMeeting_edit',
            'wardMeeting_delete',
            'municipalMeeting_access',
            'municipalMeeting_create',
            'municipalMeeting_edit',
            'municipalMeeting_delete',
        ];

        $this->storePermission($permissions);
    }
}
