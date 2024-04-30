<?php

namespace Modules\BusinessRegistration\Observers;

use Illuminate\Support\Str;
use Modules\BusinessRegistration\Entities\OrganizationRenew;
use function officeSetting;

class OrganizationRenewObserver
{
    public function creating(OrganizationRenew $organizationRenew): void
    {
        $reg_no = OrganizationRenew::whereFiscalYearId(officeSetting()->fiscal_year_id)
                ->max('reg_no') + 1;
        $organizationRenew->reg_no = $reg_no;
        $organizationRenew->registration_no = 'ORR-' . officeSetting()->fiscalYear->title . '-' . Str::padLeft($reg_no, 4, 0);
    }
}
