<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PrintButton extends Component
{
    public function __construct(public $title='Document',public $targetElement='printData')
    {
    }

    public function render()
    {
        return view('components.print-button');
    }
}
