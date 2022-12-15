<?php

namespace App\View\Components;

use App\Models\OfficeHeader;
use App\Models\Settings\OfficeSetting;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class PrintButton extends Component
{
    public function __construct(public $title)
    {

    }

    public function render()
    {
        return view('components.print-button');
    }
}
