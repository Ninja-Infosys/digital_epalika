<?php

namespace Modules\DigitalBoard\Database\Seeders;

use App\Models\UserManagement\Permission;
use App\Models\UserManagement\Role;
use Illuminate\Database\Seeder;

class DigitalBoardPermissionTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'digitalBoardVideo_access',
            'digitalBoardVideo_create',
            'digitalBoardVideo_edit',
            'digitalBoardVideo_delete',
            'digitalBoardNotice_access',
            'digitalBoardNotice_create',
            'digitalBoardNotice_edit',
            'digitalBoardNotice_delete',
            'digitalBoardNews_access',
            'digitalBoardNews_create',
            'digitalBoardNews_edit',
            'digitalBoardNews_delete',
            'employee_access',
            'employee_create',
            'employee_edit',
            'employee_delete',
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
