<?php

namespace Modules\Recommendation\Observers;


use Modules\Recommendation\Entities\RegistrationDetail;

class RegistrationDetailObserver
{
    public function creating(RegistrationDetail $registrationDetail)
    {
        $registrationDetail->registration_no = rand(0,999);
        $registrationDetail->user_id = auth()->id();
    } 
}
