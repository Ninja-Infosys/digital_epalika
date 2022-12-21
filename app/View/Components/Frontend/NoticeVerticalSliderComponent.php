<?php

namespace App\View\Components\Frontend;

use Illuminate\View\Component;
use Modules\DigitalBoard\Entities\Notice;

class NoticeVerticalSliderComponent extends Component
{
    public $notices;

    public function __construct()
    {
        $this->notices = Notice::with('files')->where('type', 'Notice')->whereNull('closed_at')->orderByDesc('date')->get();
    }

    public function render()
    {
        return view('components.frontend.notice-vertical-slider-component');
    }
}
