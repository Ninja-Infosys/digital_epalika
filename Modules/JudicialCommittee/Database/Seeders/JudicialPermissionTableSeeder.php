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
            'lawsuitNature_access',
            'lawsuitNature_create',
            'lawsuitNature_edit',
            'lawsuitNature_delete',
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
            'complaintApplication_access',
            'complaintApplication_create',
            'complaintApplication_edit',
            'complaintApplication_delete',
        ];

        $this->storePermission($permissions);
    }
}
