<?php

namespace Modules\OrganizationRegistration\Observers;

use App\Models\Settings\OfficeSetting;
use Carbon\Carbon;
use Modules\OrganizationRegistration\Entities\Business;

class BusinessObserver
{
    public function creating(Business $business): void
    {
        $business->submissions_id = time();

    }
}
