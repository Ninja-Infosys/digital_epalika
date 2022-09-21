<?php

namespace Modules\Circular\Database\Seeders;

use App\Models\UserManagement\Permission;
use App\Models\UserManagement\Role;
use Illuminate\Database\Seeder;

class CircularPermissionTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'registration_access',
            'registration_create',
            'registration_edit',
            'registration_delete',
            'dispatch_access',
            'dispatch_create',
            'dispatch_edit',
            'dispatch_delete',
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
