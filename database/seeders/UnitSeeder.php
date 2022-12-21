<?php

namespace Database\Seeders;

use App\Models\Settings\Units\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    public function run()
    {
        $units = [
            ['title' => 'bigha', 'measurement_unit_id' => 1, 'type_id' => 1],
            ['title' => 'kattha', 'measurement_unit_id' => 1, 'type_id' => 1],
            ['title' => 'dhur', 'measurement_unit_id' => 1, 'type_id' => 1, 'is_smallest' => 1],
            ['title' => 'ropani', 'measurement_unit_id' => 2, 'type_id' => 1],
            ['title' => 'aana', 'measurement_unit_id' => 2, 'type_id' => 1],
            ['title' => 'paisa', 'measurement_unit_id' => 2, 'type_id' => 1],
            ['title' => 'dam', 'measurement_unit_id' => 2, 'type_id' => 1, 'is_smallest' => 1],
            ['title' => 'sq.feet', 'measurement_unit_id' => 3, 'type_id' => 1, 'is_smallest' => 1],
            ['title' => 'sq.meter', 'measurement_unit_id' => 3, 'type_id' => 1],
        ];

        foreach ($units as $unit) {
            Unit::create($unit);
        }
    }
}
