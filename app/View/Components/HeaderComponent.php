<?php

namespace App\View\Components;


use App\Models\OfficeHeader;
use Illuminate\View\Component;

class HeaderComponent extends Component
{


    public $headers = [];

    public function __construct()
    {
        $this->headers = OfficeHeader::orderBy('position')->get();
    }


    public function render()
    {
        return view('components.header-component');
    }
}
