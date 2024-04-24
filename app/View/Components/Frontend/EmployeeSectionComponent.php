<?php

namespace App\View\Components\Frontend;

use App\Models\Settings\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Closure;

class EmployeeSectionComponent extends Component
{
    public $employees = [];
    public $representatives = [];

    // public function __construct(int|null $ward = null)
    // {
    //     $employees = Employee::active()
    //         ->showInIndex()
    //         ->where(function ($q) use ($ward) {
    //             if (!is_null($ward)) {
    //                 $q->whereRaw("FIND_IN_SET('$ward', ward) > 0");
    //             } else {
    //                 $q->whereNull('ward');
    //             }
    //         })
    //         ->orWhere('is_displayed', true)
    //         ->orderBy('position')
    //         ->get();
    
    //     // Filter employees and representatives based on is_employee flag
    //     $this->employees = $employees->where('is_employee', 1);
    //     $this->representatives = $employees->where('is_employee', 0);
    // }
    public function __construct(int|null $ward = null)
    {
        $employees = Employee::active()
            ->showInIndex()
            ->where(function ($q) use ($ward) {
                if (!empty($ward)) {
                    $q->whereRaw("FIND_IN_SET('$ward', ward) > 0");
                } else {
                    $q->orWhere('is_displayed', true);
                }
            })
            ->orderBy('position')
            ->get();

        $this->employees = $employees->where('is_employee',1);
        $this->representatives = $employees->where('is_employee',0);
    }
    


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.employee-section-component');
    }
}
