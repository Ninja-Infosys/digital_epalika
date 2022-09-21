<?php

namespace App\View\Components;


use App\Models\OfficeHeader;
use Illuminate\View\Component;

class HeaderComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $headers = [];

    public function __construct()
    {
        $this->headers = OfficeHeader::orderBy('position')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header-component');
    }
}
