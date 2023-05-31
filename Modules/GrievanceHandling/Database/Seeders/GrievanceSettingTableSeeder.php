<?php

namespace Modules\GrievanceHandling\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\GrievanceHandling\Entities\GrievanceSetting;

class GrievanceSettingTableSeeder extends Seeder
{
    public function run()
    {
        GrievanceSetting::create([
            'user_id' => null,
            'escalation_days' => 10
        ]);
    }
}
