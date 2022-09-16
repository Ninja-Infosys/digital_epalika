<?php

namespace Modules\DigitalBoard\Database\Seeders;

use App\Models\UserManagement\Permission;
use Illuminate\Database\Seeder;

class DigitalBoardPermissionTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            ['title' => 'digitalBoardVideo_access'],
            ['title' => 'digitalBoardVideo_create'],
            ['title' => 'digitalBoardVideo_edit'],
            ['title' => 'digitalBoardVideo_delete'],
            ['title' => 'digitalBoardNotice_access'],
            ['title' => 'digitalBoardNotice_create'],
            ['title' => 'digitalBoardNotice_edit'],
            ['title' => 'digitalBoardNotice_delete'],
            ['title' => 'digitalBoardNews_access'],
            ['title' => 'digitalBoardNews_create'],
            ['title' => 'digitalBoardNews_edit'],
            ['title' => 'digitalBoardNews_delete'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
