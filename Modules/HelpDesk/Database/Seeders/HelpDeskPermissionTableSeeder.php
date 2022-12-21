<?php

namespace Modules\HelpDesk\Database\Seeders;

use App\Traits\StorePermissionTrait;
use Illuminate\Database\Seeder;

class HelpDeskPermissionTableSeeder extends Seeder
{
    use StorePermissionTrait;

    public function run()
    {
        $permissions = [
            'service_access',
            'service_create',
            'service_edit',
            'service_delete',
        ];

        $this->storePermission($permissions);
    }
}
