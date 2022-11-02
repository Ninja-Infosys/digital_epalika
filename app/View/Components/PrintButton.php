<?php

namespace App\View\Components;

use App\Models\Settings\OfficeSetting;
use Illuminate\View\Component;

class PrintButton extends Component
{
    public object $setting;

    public function __construct(public $title)
    {
        $this->setting = OfficeSetting::with('province','district','localBody')->first();
    }

    public function render()
    {
        return view('components.print-button');
    }
}
