<?php

namespace Database\Seeders;

use App\Models\UserManagement\Permission;
use App\Models\UserManagement\Role;
use App\Traits\StorePermissionTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    use StorePermissionTrait;

    public function run()
    {
        $permissions = [
            'role_access',
            'role_create',
            'role_edit',
            'role_delete',
            'user_access',
            'user_create',
            'user_edit',
            'user_delete',
            'websiteAdmin_access',
            'fiscalYear_access',
            'fiscalYear_create',
            'fiscalYear_edit',
            'fiscalYear_delete',
            'listRegistration_access',
            'listRegistration_create',
            'listRegistration_edit',
            'listRegistration_delete',
            'unitType_access',
            'unitType_create',
            'unitType_edit',
            'unitType_delete',
            'MeasurementUnit_access',
            'MeasurementUnit_create',
            'MeasurementUnit_edit',
            'MeasurementUnit_delete',
            'unit_access',
            'unit_create',
            'unit_edit',
            'unit_delete',
        ];

        $this->storePermission($permissions);
    }
}
