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
            'recommendationDashboard_access',
            'recommendationTemplate_access',
            'recommendationTemplate_create',
            'recommendationTemplate_edit',
            'recommendationTemplate_delete',
            'recommendationCategory_access',
            'recommendationCategory_create',
            'recommendationCategory_edit',
            'recommendationCategory_delete',
            'recommendation_access',
            'recommendation_create',
            'recommendation_edit',
            'recommendation_delete',
            'personalDetail_access',
            'personalDetail_create',
            'personalDetail_edit',
            'personalDetail_delete',
            'recommendationReport_main',
            'recommendationReport_ward',
            'recommendationReport_recommendationCategory',
            'recommendationReport_personalDetail',
            'recommendationSetting_access',
            'recommendationSetting_edit',
            'recommendationSubCategory_access',
            'recommendationSubCategory_edit',
            'recommendationSubCategory_create',
            'recommendationSubCategory_delete',

            'Recommendation_revenue_access',
            'Recommendation_revenue_create',
            'Recommendation_revenue_edit',
            'Recommendation_revenue_delete',

            'recommendation_template_access',
            'recommendation_template_create',
            'recommendation_template_edit',
            'recommendation_template_delete',

            'recommendation_document_access',
            'recommendation_document_create',
            'recommendation_document_edit',
            'recommendation_document_delete',

            'recommendation_detail_access',
            'recommendation_detail_create',
            'recommendation_detail_edit',
            'recommendation_detail_delete',

            'recommendation_setting_access',
            'recommendation_signature_create',
            'recommendation_signature_edit',
            'recommendation_signature_delete',





        ];

        $this->storePermission($permissions);
    }
}
