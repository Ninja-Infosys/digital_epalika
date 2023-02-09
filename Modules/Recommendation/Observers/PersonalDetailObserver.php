<?php

namespace Modules\Recommendation\Observers;

use Modules\Recommendation\Entities\PersonalDetail;

class PersonalDetailObserver
{

    public function creating(PersonalDetail $personalDetail)
    {
        $personalDetail->reg_no = rand(0,999);
        $personalDetail->user_id = auth()->id();
    }

}
