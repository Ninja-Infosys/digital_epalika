<?php

namespace Modules\EMap\Observers;

use App\Models\Settings\OfficeSetting;
use Illuminate\Support\Str;
use Modules\EMap\Entities\BuildingDocumentation;

class BuildingApplyObserver
{
    public function creating(BuildingDocumentation $buildingDocumentation): void
    {
        $fiscal_year = OfficeSetting::first()->fiscal_year_id ?? null;
        $buildingDocumentation->fiscal_year_id = $fiscal_year;
        $buildingDocumentation->submission_no = time();
        /*$mapApply->registration_date = now();
        $mapApply->registration_no = MapApply::where('fiscal_year_id', $fiscal_year)->max('registration_no') + 1;*/
    }
}
