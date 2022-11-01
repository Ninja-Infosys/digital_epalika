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
        ];

        $this->storePermission($permissions);
    }
}
