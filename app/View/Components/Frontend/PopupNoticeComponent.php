<?php

namespace App\View\Components\Frontend;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Modules\DigitalBoard\Entities\PopUpNotice;
use Closure;

class PopupNoticeComponent extends Component
{
    public ?PopUpNotice $popupSetting;

    public function __construct(int|null $ward = null)
    {
        $this->popupSetting = PopUpNotice::where(function ($q) use ($ward) {
            if (!empty($ward)) {
                $q->whereRaw("FIND_IN_SET('$ward', ward) > 0");
            } else {
                $q->MainPageDisplay();
            }
        })
            ->active()
            ->latest()
            ->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.popup-notice-component');
    }
}
