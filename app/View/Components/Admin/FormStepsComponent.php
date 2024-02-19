<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class FormStepsComponent extends Component
{
    public function __construct(public $mapApply, public $forms, public $order)
    {
        //
    }

    public function render()
    {
        return view('components.admin.form-steps-component');
    }
}
