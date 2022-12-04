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
        $customs->load('proprietorDetail.businessDetail');

        $fiscal_year = OfficeSetting::first()->fiscal_year_id ?? null;
        if (empty($customs->proprietorDetail->businessDetail->registration_no)) {

            $registrationNo = BusinessDetail::whereFiscalYearId($fiscal_year)
                    ->max('registration_no') + 1;
            $customs->proprietorDetail?->businessDetail()->update([
                'fiscal_year_id' => $fiscal_year,
                'registration_no' => $registrationNo,
                'registration_date_en' => today()->toDateString(),
                'registration_date_ne' => $this->get_today_nepali_date()
            ]);
        }
    }
}
