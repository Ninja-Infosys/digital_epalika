<?php

namespace Modules\GrievanceHandling\Database\Seeders;

use App\Models\UserManagement\Permission;
use App\Models\UserManagement\Role;
use Illuminate\Database\Seeder;

class GrievanceHandlingPermissionTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'grievanceType_access',
            'grievanceType_create',
            'grievanceType_edit',
            'grievanceType_delete',
        ];

        Permission::whereIn('title', $permissions)->delete();

        $permissionId = collect();

        foreach ($permissions as $permission) {
            $permission = Permission::create(['title' => $permission]);

            $permissionId->push($permission->id);
        }

        $role = Role::first();
        $role->permissions()->sync($permissionId);
    }
}
