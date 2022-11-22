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
            'chiefJudicialMember_access',
        ];

        $this->storePermission($permissions);
    }
}
