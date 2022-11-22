<?php

namespace Modules\Recommendation\Database\Seeders;

use App\Traits\StorePermissionTrait;
use Illuminate\Database\Seeder;

class RecommendationPermissionTableSeeder extends Seeder
{
    use StorePermissionTrait;

    public function run()
    {
        $permissions = [
            'formBuilder_access',
            'formBuilder_create',
            'formBuilder_edit',
            'formBuilder_delete',
        ];

        $this->storePermission($permissions);
    }
}
