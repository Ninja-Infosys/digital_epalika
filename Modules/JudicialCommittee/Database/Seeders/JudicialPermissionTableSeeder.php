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
            'judicialMember_access',
            'judicialMember_create',
            'judicialMember_edit',
            'judicialMember_delete',
            'judicialCommitteeTemplate_access',
            'judicialCommitteeTemplate_create',
            'judicialCommitteeTemplate_edit',
            'judicialCommitteeTemplate_delete',
            'complaintApplication_access',
            'complaintApplication_create',
            'complaintApplication_edit',
            'complaintApplication_delete',
            'dateSheet_access',
            'dateSheet_create',
            'dateSheet_edit',
            'dateSheet_delete',
            'defendantIssuedDeadline_access',
            'defendantIssuedDeadline_create',
            'defendantIssuedDeadline_edit',
            'defendantIssuedDeadline_delete',
            'dateCompensation_access',
            'dateCompensation_create',
            'dateCompensation_edit',
            'dateCompensation_delete',
            'writtenAnswer_access',
            'writtenAnswer_create',
            'writtenAnswer_edit',
            'writtenAnswer_delete',
        ];

        $this->storePermission($permissions);
    }
}
