<?php

namespace Modules\BusinessRegistration\Observers;

use App\Models\Settings\OfficeSetting;
use Illuminate\Support\Str;
use Modules\BusinessRegistration\Entities\BusinessDetail;
use Modules\BusinessRegistration\Entities\Customs;
use Modules\EMap\Entities\MapApply;

class CustomObserver
{
    public function creating(Customs $customs): void
    {
        $customs->load('proprietorDetail.businessDetail');

        $fiscal_year = OfficeSetting::first()->fiscal_year_id ?? null;
info($fiscal_year);
            info(empty($customs->proprietorDetail->businessDetail->registration_no));
        if (empty($customs->proprietorDetail->businessDetail->registration_no)) {
            info('true part');
            $registrationNo = BusinessDetail::whereFiscalYearId($fiscal_year)
                    ->max('registration_no') + 1;
info($registrationNo);
            $customs->proprietorDetail?->businessDetail()->update([
                'fiscal_year_id'=>$fiscal_year,
                'registration_no' => $registrationNo,
                'registration_date_en' => today()->toDateString()
            ]);
        }
       }
}
