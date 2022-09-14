<?php

namespace Database\Seeders;

use App\Models\UserManagement\Permission;
use App\Models\UserManagement\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    public function run()
    {
        Role::find(1)->permissions()->attach(Permission::all());
    }
}
