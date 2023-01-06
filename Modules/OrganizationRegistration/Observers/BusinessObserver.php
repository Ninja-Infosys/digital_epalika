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
        if (\Route::is('admin.businesses.store')) {
            if (empty($businessDetail->registration_no)) {
                $fiscal_year = OfficeSetting::first()->fiscal_year_id ?? null;

                $registrationNo = Business::whereFiscalYearId($fiscal_year)
                        ->max('registration_no') + 1;


                $business->fiscal_year_id = $fiscal_year;
                $business->registration_no = $registrationNo;

            }
        }
    }
}
