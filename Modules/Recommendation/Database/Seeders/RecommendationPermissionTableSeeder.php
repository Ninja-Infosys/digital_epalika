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
            'recommendation_access',
            'recommendation_create',
            'recommendation_edit',
            'recommendation_delete',
            'recommendationTemplate_access',
            'recommendationTemplate_create',
            'recommendationTemplate_edit',
            'recommendationTemplate_delete',
        ];

        $this->storePermission($permissions);
    }
}
