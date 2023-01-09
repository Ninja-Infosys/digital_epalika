<?php

namespace Modules\Identity\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Identity\Entities\GovernmentalDisabilityType;

class GovernmentalDisabilityTypeTableSeeder extends Seeder
{
    public function run()
    {
        $governmentalDisabilityTypes = [
            ['title'=>'पूर्ण अशक्त अपाङ्गता','title_en'=>'Profound Disability','color'=>'#FF0000','category'=>'A','position'=> null],
            ['title'=>'अति अशक्त अपाङ्गता','title_en'=>'Severe Disability','color'=>'#0000FF','category'=>'B','position'=> null],
            ['title'=>'मध्यम अपाङ्गता','title_en'=>'Moderate Disability','color'=>'#FFFF00','category'=>'C','position'=> null],
            ['title'=>'सामान्य अपाङ्गता','title_en'=>'Mild Disability','color'=>'#FFFFFF','category'=>'D','position'=> null],

        ];

        foreach ($governmentalDisabilityTypes as $governmentalDisabilityType)
        {
            GovernmentalDisabilityType::create($governmentalDisabilityType);
        }
    }
}
