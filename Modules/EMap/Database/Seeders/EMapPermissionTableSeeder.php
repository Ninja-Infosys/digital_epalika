<?php

namespace Modules\EMap\Database\Seeders;

use App\Traits\StorePermissionTrait;
use Illuminate\Database\Seeder;

class EMapPermissionTableSeeder extends Seeder
{
    use StorePermissionTrait;

    public function run()
    {
        $permissions = [
            'eMapDashboard_access',
            'organization_access',
            'organization_edit',
            'organization_delete',
            'mapFee_access',
            'mapFee_create',
            'mapFee_edit',
            'mapFee_delete',
            'eMapTemplate_access',
            'eMapTemplate_create',
            'eMapTemplate_edit',
            'eMapTemplate_delete',
            'oldMap_access',
            'oldMap_create',
            'oldMap_edit',
            'oldMap_delete',
            'mapApply_access',
            'mapApply_create',
            'mapApply_edit',
            'mapApply_delete',
            'mapSetting_access',
            'mapSetting_create',
            'mapApplyNotice_access',
            'mapApplyNotice_print',
            'mapApplyNoticeReject_access',
            'necessaryDocument_access',
            'necessaryDocument_create',
            'necessaryDocument_edit',
            'necessaryDocument_delete',
            'registrationDocument_access',
            'registrationDocument_edit',
            'registrationDocument_create',
            'registrationDocument_delete',
            'buildingDocumentationSetting_access',
            'buildingDocumentationSetting_edit',
            'buildingDocumentationSetting_create',
            'buildingDocumentationSetting_delete',
            'buildingDocumentationApplication_access',
            'landConfirmation_access',
            'landRecommendation_access',
            'landReport_access',
            'landReport_edit',
            'landReport_create',
            'landReport_delete',

        ];

        $this->storePermission($permissions);
    }
}
