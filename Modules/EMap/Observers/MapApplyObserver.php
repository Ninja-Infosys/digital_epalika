<?php

namespace Modules\EMap\Observers;

use Modules\EMap\Entities\MapApply;

class MapApplyObserver
{

    public function creating(MapApply $mapApply)
    {
        $fiscal_year = $officeSetting->fiscal_year_id ?? '';
        $mapApply->organization_id = auth('organization')->user()->id;
        $mapApply->registration_date = now();
        $mapApply->fiscal_year_id = $fiscal_year;
        $mapApply->registration_no = MapApply::where('fiscal_year_id', $fiscal_year)->max('registration_no') + 1;
    }
}
