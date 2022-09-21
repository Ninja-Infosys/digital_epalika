<?php

namespace Modules\GrievanceHandling\Database\Seeders;

use App\Models\UserManagement\Permission;
use App\Models\UserManagement\Role;
use App\Traits\StorePermissionTrait;
use Illuminate\Database\Seeder;

class GrievanceHandlingPermissionTableSeeder extends Seeder
{

    use StorePermissionTrait;

    public function run()
    {
        $permissions = [
            'grievanceType_access',
            'grievanceType_create',
            'grievanceType_edit',
            'grievanceType_delete',
        ];

        $this->storePermission($permissions);
    }
}
