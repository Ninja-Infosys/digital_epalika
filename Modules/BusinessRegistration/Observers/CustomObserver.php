<?php

namespace Modules\BusinessRegistration\Observers;

use App\Traits\NepaliDateConverter;
use Modules\BusinessRegistration\Entities\Customs;

class CustomObserver
{
    use NepaliDateConverter;

    public function creating(Customs $customs): void
    {
    }
}
