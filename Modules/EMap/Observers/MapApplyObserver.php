<?php

namespace Modules\EMap\Observers;

use Modules\EMap\Entities\MapApply;

class MapApplyObserver
{

    public function creating(MapApply $mapApply)
    {
        $mapApply->organization_id = auth('organization')->user()->id;
        $mapApply->registration_no = ($officeSetting->fiscalYear->title ?? '') . '/' . time();
        $mapApply->registration_date = now();
    }
}
