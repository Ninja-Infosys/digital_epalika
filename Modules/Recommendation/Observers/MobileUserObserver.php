<?php

namespace Modules\Recommendation\Observers;

use Modules\Recommendation\Entities\PersonalDetail;

class MobileUserObserver
{
    public function creating(PersonalDetail $personalDetail): void
    {
        $personalDetail->reg_no = 'C-'.get_english_number(officeSetting()->fiscalYear?->title). '-'.rand(0, 999)  ?? '';
        $personalDetail->user_id = auth()->id();
    }
}
