<?php

namespace Database\Seeders;

use App\Traits\StorePermissionTrait;
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
            'fiscalYear_access',
            'fiscalYear_create',
            'fiscalYear_edit',
            'fiscalYear_delete',
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
            'ethnicity_access',
            'ethnicity_create',
            'ethnicity_edit',
            'ethnicity_delete',
            'branch_access',
            'branch_create',
            'branch_edit',
            'branch_delete',
            'slider_access',
            'slider_create',
            'slider_edit',
            'slider_delete',
            'municipalDetail_access',
            'municipalDetail_create',
            'municipalDetail_edit',
            'municipalDetail_delete',
            'importantLink_access',
            'importantLink_create',
            'importantLink_edit',
            'importantLink_delete',
            'feature_access',
            'sms_access',
            'mail_access',
            'officeSetting_access',
            'officeSetting_edit',
            'officeHeader_edit',
            'officeHeader_delete',
            'emergencyNumber_access',
            'emergencyNumber_create',
            'emergencyNumber_edit',
            'emergencyNumber_delete',
            'occupation_access',
            'occupation_create',
            'occupation_edit',
            'occupation_delete',
            'employee_access',
            'employee_create',
            'employee_edit',
            'employee_delete',
        ];

        $this->storePermission($permissions);
    }
}
