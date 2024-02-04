<?php

namespace App\View\Components\Organization;

use Illuminate\View\Component;

class FormStepsComponent extends Component
{
    public function __construct(public $mapApply, public $forms, public $order)
    {
        //
    }

    public function render()
    {
        return view('components.organization.form-steps-component');
    }
}
