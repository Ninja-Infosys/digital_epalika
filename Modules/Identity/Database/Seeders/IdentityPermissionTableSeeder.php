<?php

namespace Modules\Identity\Database\Seeders;

use App\Traits\StorePermissionTrait;
use Illuminate\Database\Seeder;

class IdentityPermissionTableSeeder extends Seeder
{
    use StorePermissionTrait;

    public function run()
    {
        $permissions = [
            'disabilityReason_access',
            'disabilityReason_create',
            'disabilityReason_edit',
            'disabilityReason_delete',
            'disabilityType_access',
            'disabilityType_create',
            'disabilityType_edit',
            'disabilityType_delete',
            'relationship_access',
            'relationship_create',
            'relationship_edit',
            'relationship_delete',
        ];

        $this->storePermission($permissions);
    }
}
