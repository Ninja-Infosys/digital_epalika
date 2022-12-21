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
            'executiveMunicipalCommittee_access',
            'executiveMunicipalCommittee_create',
            'executiveMunicipalCommittee_edit',
            'executiveMunicipalCommittee_delete',
            'executiveWardCommittee_access',
            'executiveWardCommittee_create',
            'executiveWardCommittee_edit',
            'executiveWardCommittee_delete',
            'wardMeetingEvent_access',
            'wardMeetingEvent_create',
            'wardMeetingEvent_edit',
            'wardMeetingEvent_delete',
            'municipalMeetingEvent_access',
            'municipalMeetingEvent_create',
            'municipalMeetingEvent_edit',
            'municipalMeetingEvent_delete',
            'wardMeetingDecision_access',
            'wardMeetingDecision_create',
            'wardMeetingDecision_edit',
            'wardMeetingDecision_delete',
            'municipalMeetingDecision_access',
            'municipalMeetingDecision_create',
            'municipalMeetingDecision_edit',
            'municipalMeetingDecision_delete',
        ];

        $this->storePermission($permissions);
    }
}
