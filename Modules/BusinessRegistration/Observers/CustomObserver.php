<?php

namespace Modules\BusinessRegistration\Observers;

use App\Models\Settings\OfficeSetting;
use App\Traits\NepaliDateConverter;
use Illuminate\Support\Str;
use Modules\BusinessRegistration\Entities\BusinessDetail;
use Modules\BusinessRegistration\Entities\Customs;
use Modules\EMap\Entities\MapApply;

class CustomObserver
{
    use NepaliDateConverter;

    public function creating(Customs $customs): void
    {

    }
}
