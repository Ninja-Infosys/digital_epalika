<?php

namespace Modules\Grant\Database\Seeders;

use App\Traits\StorePermissionTrait;
use Illuminate\Database\Seeder;

class GrantPermissionTableSeeder extends Seeder
{
    use StorePermissionTrait;

    public function run()
    {
        $permissions = [
            ['title'=>'grantType_access'],
            ['title'=>'grantType_create'],
            ['title'=>'grantType_edit'],
            ['title'=>'grantType_delete'],
            ['title'=>'cooperativeType_access'],
            ['title'=>'cooperativeType_create'],
            ['title'=>'cooperativeType_edit'],
            ['title'=>'cooperativeType_delete'],
            ['title'=>'affiliation_access'],
            ['title'=>'affiliation_create'],
            ['title'=>'affiliation_edit'],
            ['title'=>'affiliation_delete'],
            ['title'=>'enterpriseType_access'],
            ['title'=>'enterpriseType_create'],
            ['title'=>'enterpriseType_edit'],
            ['title'=>'enterpriseType_delete'],
            ['title'=>'grantProgram_access'],
            ['title'=>'grantProgram_create'],
            ['title'=>'grantProgram_edit'],
            ['title'=>'grantProgram_delete'],
            ['title'=>'grantOffice_access'],
            ['title'=>'grantOffice_create'],
            ['title'=>'grantOffice_edit'],
            ['title'=>'grantOffice_delete'],
        ];

        $this->storePermission($permissions);
    }
}
