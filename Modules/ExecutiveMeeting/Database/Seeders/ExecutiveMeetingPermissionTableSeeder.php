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
            'committeeType_access',
            'committeeType_create',
            'committeeType_edit',
            'committeeType_delete',
            'committee_access',
            'committee_create',
            'committee_edit',
            'committee_delete',
        ];

        $this->storePermission($permissions);
    }
}
