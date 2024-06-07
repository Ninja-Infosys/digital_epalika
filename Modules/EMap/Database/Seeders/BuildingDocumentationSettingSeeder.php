<?php

namespace Modules\EMap\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\EMap\Entities\BuildingDocumentationSetting;

class BuildingDocumentationSettingSeeder extends Seeder
{
    public function run()
    {
        if(!BuildingDocumentationSetting::where('is_building_documentation',0)->exists()){

        BuildingDocumentationSetting::create([
            'is_building_documentation' => 0,
        ]);
    }
    }
}
