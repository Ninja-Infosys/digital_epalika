<?php

namespace Modules\EMap\Observers;

use App\Models\Settings\OfficeSetting;
use Modules\EMap\Entities\MapApply;

class MapApplyObserver
{

    public function creating(MapApply $mapApply)
    {
        $fiscal_year = OfficeSetting::first()->fiscal_year_id ?? null;
        $mapApply->organization_id = auth('organization')->user()->id;
        $mapApply->registration_date = now();
        $mapApply->fiscal_year_id = $fiscal_year;
        $mapApply->registration_no = MapApply::where('fiscal_year_id', $fiscal_year)->max('registration_no') + 1;
    }
}
