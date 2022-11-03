<?php

namespace Modules\Roaster\Database\Seeders;

use App\Traits\StorePermissionTrait;
use Illuminate\Database\Seeder;

class RoasterPermissionTableSeeder extends Seeder
{
    use StorePermissionTrait;

    public function run()
    {
        $permissions = [
            'department_access',
            'department_create',
            'department_edit',
            'department_delete',
            'designation_access',
            'designation_create',
            'designation_edit',
            'designation_delete',
            'subject_access',
            'subject_create',
            'subject_edit',
            'subject_delete',
        ];

        $this->storePermission($permissions);
    }
}
