<?php

namespace Modules\HelpDesk\Database\Seeders;

use App\Models\UserManagement\Permission;
use Illuminate\Database\Seeder;

class HelpDeskPermissionTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            ['title' => 'branch_access'],
            ['title' => 'branch_create'],
            ['title' => 'branch_edit'],
            ['title' => 'branch_delete'],
            ['title' => 'service_access'],
            ['title' => 'service_create'],
            ['title' => 'service_edit'],
            ['title' => 'service_delete'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
