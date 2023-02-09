<?php

namespace Modules\OrganizationRegistration\Database\Seeders;

use Illuminate\Database\Seeder;

class OrganizationRegistrationDatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            BusinessRegistrationPermissionTableSeeder::class
        ]);
    }
}
