<?php

namespace Modules\HelpDesk\Database\Seeders;

use Illuminate\Database\Seeder;

class HelpDeskDatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            HelpDeskPermissionTableSeeder::class
        ]);
    }
}
