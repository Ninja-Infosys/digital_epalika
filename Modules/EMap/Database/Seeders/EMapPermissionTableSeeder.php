<?php

namespace Modules\EMap\Database\Seeders;

use App\Models\UserManagement\Permission;
use App\Models\UserManagement\Role;
use Illuminate\Database\Seeder;

class EMapPermissionTableSeeder extends Seeder
{
    public function run()
    {

        $permissions = [
            'client_access',
            'client_create',
            'client_edit',
            'client_delete',
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
