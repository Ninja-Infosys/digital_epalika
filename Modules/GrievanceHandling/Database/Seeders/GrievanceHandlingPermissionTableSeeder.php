<?php

namespace Modules\GrievanceHandling\Database\Seeders;

use App\Models\UserManagement\Permission;
use Illuminate\Database\Seeder;

class GrievanceHandlingPermissionTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            ['title' => 'grievanceType_access'],
            ['title' => 'grievanceType_create'],
            ['title' => 'grievanceType_edit'],
            ['title' => 'grievanceType_delete'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
