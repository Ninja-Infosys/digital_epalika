<?php

namespace Modules\GrievanceHandling\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\GrievanceHandling\Entities\GrievanceSetting;

class GrievanceHandlingTableSeeder extends Seeder
{
    public function run()
    {
        GrievanceSetting::create([
            'user_id' => null
        ]);
    }
}
