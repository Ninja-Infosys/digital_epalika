<?php

namespace Modules\EMap\Database\Seeders;

use App\Models\UserManagement\Permission;
use App\Models\UserManagement\Role;
use App\Traits\StorePermissionTrait;
use Illuminate\Database\Seeder;

class EMapPermissionTableSeeder extends Seeder
{
    use StorePermissionTrait;

    public function run()
    {

        $permissions = [
            'organization_access',
            'organization_edit',
            'organization_delete',
            'mapFee_access',
            'mapFee_create',
            'mapFee_edit',
            'mapFee_delete',
            'eMapTemplate_access',
            'eMapTemplate_create',
            'eMapTemplate_edit',
            'eMapTemplate_delete',
        ];

        $this->storePermission($permissions);
    }
}
