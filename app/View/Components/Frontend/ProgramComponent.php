<?php

namespace App\View\Components\Frontend;

use Illuminate\View\Component;
use Modules\DigitalBoard\Entities\Program;
use Illuminate\Contracts\View\View;
use Closure;

class ProgramComponent extends Component
{
    public $programs;

    public function __construct(int|null $ward = null)
    {
        $this->programs = Program::latest()
            ->where(function ($q) use ($ward) {
                if (!empty($ward)) {
                    $q->whereRaw("FIND_IN_SET('$ward', ward) > 0");
                } else {
                    $q->MainPageDisplay();
                }
            })
            ->orderByDesc('date')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.program-component');
    }
}
