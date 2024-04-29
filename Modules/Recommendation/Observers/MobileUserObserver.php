<?php

namespace Modules\Recommendation\Observers;

use App\Models\MobileUser;

class MobileUserObserver
{
    public function creating(MobileUser $mobileUser): void
    {
        $mobileUser->reg_no = 'C-'.get_english_number(officeSetting()->fiscalYear?->title).'-'.rand(0, 999) ?? '';
    }
}
