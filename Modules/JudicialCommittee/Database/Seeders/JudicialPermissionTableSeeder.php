<?php

namespace Modules\JudicialCommittee\Database\Seeders;

use App\Traits\StorePermissionTrait;
use Illuminate\Database\Seeder;

class JudicialPermissionTableSeeder extends Seeder
{
    use StorePermissionTrait;

    public function run()
    {
        $permissions = [
            'chiefJudicialMember_access',
            'chiefJudicialMember_create',
            'chiefJudicialMember_edit',
            'chiefJudicialMember_delete',
            'administrationMember_access',
            'administrationMember_create',
            'administrationMember_edit',
            'administrationMember_delete',
            'judicialMember_access',
            'judicialMember_create',
            'judicialMember_edit',
            'judicialMember_delete',
        ];

        $this->storePermission($permissions);
    }
}
