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
            'infrastructure_access',
            'infrastructure_create',
            'infrastructure_edit',
            'infrastructure_delete',
            'thematicArea_access',
            'thematicArea_create',
            'thematicArea_edit',
            'thematicArea_delete',
            'grantType_access',
            'grantType_create',
            'grantType_edit',
            'grantType_delete',
            'grantActivity_access',
            'grantActivity_create',
            'grantActivity_edit',
            'grantActivity_delete',
            'grantProgram_access',
            'grantProgram_create',
            'grantProgram_edit',
            'grantProgram_delete',
            'grantDetail_access',
            'grantDetail_create',
            'grantDetail_edit',
            'grantDetail_delete',
        ];

        $this->storePermission($permissions);
    }
}
