<?php

namespace Database\Seeders;

use App\Models\UserManagement\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            ['title' => 'role_access'],
            ['title' => 'role_create'],
            ['title' => 'role_edit'],
            ['title' => 'role_delete'],
            ['title' => 'user_access'],
            ['title' => 'user_create'],
            ['title' => 'user_edit'],
            ['title' => 'user_delete'],
            ['title' => 'fiscalYear_access'],
            ['title' => 'fiscalYear_create'],
            ['title' => 'fiscalYear_edit'],
            ['title' => 'fiscalYear_delete'],

            ['title' => 'executiveCommittee_access'],
            ['title' => 'executiveCommittee_create'],
            ['title' => 'executiveCommittee_edit'],
            ['title' => 'executiveCommittee_delete'],
            ['title' => 'municipalMeeting_access'],
            ['title' => 'municipalMeeting_create'],
            ['title' => 'municipalMeeting_edit'],
            ['title' => 'municipalMeeting_delete'],
            ['title' => 'wardMeeting_access'],
            ['title' => 'wardMeeting_create'],
            ['title' => 'wardMeeting_edit'],
            ['title' => 'wardMeeting_delete'],

            ['title' => 'listRegistration_access'],
            ['title' => 'listRegistration_create'],
            ['title' => 'listRegistration_edit'],
            ['title' => 'listRegistration_delete'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
