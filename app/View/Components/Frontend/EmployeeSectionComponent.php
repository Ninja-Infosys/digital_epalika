<?php

namespace App\View\Components\Frontend;

use Illuminate\View\Component;
use Modules\DigitalBoard\Entities\Employee;

class EmployeeSectionComponent extends Component
{
    public $employees;

    public function __construct()
    {
        $this->employees = Employee::orderBy('position')->get();
    }

    public function render()
    {
        return view('components.frontend.employee-section-component');
    }
}
