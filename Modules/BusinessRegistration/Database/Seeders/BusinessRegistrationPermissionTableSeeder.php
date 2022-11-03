<?php

namespace Modules\BusinessRegistration\Database\Seeders;

use App\Traits\StorePermissionTrait;
use Illuminate\Database\Seeder;

class BusinessRegistrationPermissionTableSeeder extends Seeder
{
    use StorePermissionTrait;

    public function run()
    {
        $permissions = [
            'objectTransaction_access',
            'objectTransaction_create',
            'objectTransaction_edit',
            'objectTransaction_delete',
            'investmentRevenue_access',
            'investmentRevenue_create',
            'investmentRevenue_edit',
            'investmentRevenue_delete',
            'businessNature_access',
            'businessNature_create',
            'businessNature_edit',
            'businessNature_delete',
            'businessPurpose_access',
            'businessPurpose_create',
            'businessPurpose_edit',
            'businessPurpose_delete',
        ];

        $this->storePermission($permissions);
    }
}
