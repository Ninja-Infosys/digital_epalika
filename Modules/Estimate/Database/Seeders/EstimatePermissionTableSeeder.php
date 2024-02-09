<?php

namespace Modules\Estimate\Database\Seeders;

use App\Traits\StorePermissionTrait;
use Illuminate\Database\Seeder;

class EstimatePermissionTableSeeder extends Seeder
{
    use StorePermissionTrait;

    public function run()
    {
        $permissions = [
            'estimateDashboard_access',

        ];

        $this->storePermission($permissions);
    }
}
