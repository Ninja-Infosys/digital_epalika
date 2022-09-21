<?php

namespace Modules\HelpDesk\Database\Seeders;

use App\Models\UserManagement\Permission;
use App\Traits\StorePermissionTrait;
use Illuminate\Database\Seeder;

class HelpDeskPermissionTableSeeder extends Seeder
{
    use StorePermissionTrait;

    public function run()
    {
        $permissions = [
            'branch_access',
            'branch_create',
            'branch_edit',
            'branch_delete',
            'service_access',
            'service_create',
            'service_edit',
            'service_delete',
        ];

        $this->storePermission($permissions);
    }
}
