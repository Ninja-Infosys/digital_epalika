<?php

namespace Modules\Grant\Database\Seeders;

use App\Traits\StorePermissionTrait;
use Illuminate\Database\Seeder;

class GrantPermissionTableSeeder extends Seeder
{
    use StorePermissionTrait;

    public function run()
    {
        $permissions = [
            'grantType_access',
            'grantType_create',
            'grantType_edit',
            'grantType_delete',
            'cooperativeType_access',
            'cooperativeType_create',
            'cooperativeType_edit',
            'cooperativeType_delete',
            'affiliation_access',
            'affiliation_create',
            'affiliation_edit',
            'affiliation_delete',
            'enterpriseType_access',
            'enterpriseType_create',
            'enterpriseType_edit',
            'enterpriseType_delete',
            'grantProgram_access',
            'grantProgram_create',
            'grantProgram_edit',
            'grantProgram_delete',
            'grantOffice_access',
            'grantOffice_create',
            'grantOffice_edit',
            'grantOffice_delete',
        ];

        $this->storePermission($permissions);
    }
}
