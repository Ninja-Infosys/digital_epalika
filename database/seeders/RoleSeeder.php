<?php

namespace Database\Seeders;

use App\Models\UserManagement\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        if(!Role::where('type','Super')->exists()){
            Role::create([
                'title' => 'Super Admin',
                'type' => 'Super',
            ]);
        }
       
    }
}
