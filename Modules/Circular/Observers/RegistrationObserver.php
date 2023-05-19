<?php

namespace Modules\Circular\Observers;

use App\Traits\NepaliDateConverter;
use Modules\BusinessRegistration\Entities\Customs;
use Modules\Circular\Entities\Registration;

class RegistrationObserver
{

    public function creating(Registration $registration): void
    {
    }
}
