<?php

namespace App\Observers;


use Modules\Recommendation\Entities\RegistrationDetail as EntitiesRegistrationDetail;

class RegistrationDetailObserver
{
    public function created(EntitiesRegistrationDetail $registrationDetail)
    {
        $registrationDetail->reg_no = rand(0,999);
        $registrationDetail->user_id = auth()->id();   
    }

 
}
