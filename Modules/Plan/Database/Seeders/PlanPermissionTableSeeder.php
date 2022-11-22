<?php

namespace Modules\Plan\Database\Seeders;

use App\Traits\StorePermissionTrait;
use Illuminate\Database\Seeder;

class PlanPermissionTableSeeder extends Seeder
{
    use StorePermissionTrait;

    public function run()
    {
        $permissions = [
            'planArea_access',
            'planArea_create',
            'planArea_edit',
            'planArea_delete',
            'planLevel_access',
            'planLevel_create',
            'planLevel_edit',
            'planLevel_delete',
            'budgetHead_access',
            'budgetHead_create',
            'budgetHead_edit',
            'budgetHead_delete',
            'budgetSource_access',
            'budgetSource_create',
            'budgetSource_edit',
            'budgetSource_delete',
        ];

        $this->storePermission($permissions);
    }
}
