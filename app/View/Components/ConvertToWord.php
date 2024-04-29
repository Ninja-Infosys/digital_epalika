<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ConvertToWord extends Component
{
    public function __construct(public string $number = '', public string $id = '')
    {
        //
    }

    public function render()
    {
        return view('components.convert-to-word');
    }
}
