<?php

namespace Modules\TaskManagement\Database\Seeders;

use App\Traits\StorePermissionTrait;
use Illuminate\Database\Seeder;

class TaskManagementPermissionSeederTableSeeder extends Seeder
{
    use StorePermissionTrait;

    public function run()
    {

        $permissions = [
            'taskActivity_access',
            'taskActivity_create',
            'taskActivity_edit',
            'taskActivity_delete',
            'allTaskActivity_access'
        ];

        $this->storePermission($permissions);
    }
}
