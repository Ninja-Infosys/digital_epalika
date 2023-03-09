<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PrintButton extends Component
{
    public function __construct(public $title='Document', public $targetElement='printData',public $headerRequired=false,public $headerType='header')
    {
    }

    public function render()
    {
        return view('components.print-button');
    }
}
