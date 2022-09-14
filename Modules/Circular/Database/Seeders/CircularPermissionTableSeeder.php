<?php

namespace Modules\Circular\Database\Seeders;

use App\Models\UserManagement\Permission;
use Illuminate\Database\Seeder;

class CircularPermissionTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            ['title' => 'registration_access'],
            ['title' => 'registration_create'],
            ['title' => 'registration_edit'],
            ['title' => 'registration_delete'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
