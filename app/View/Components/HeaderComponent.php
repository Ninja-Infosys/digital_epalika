<?php

namespace App\View\Components;

use App\Models\OfficeHeader;
use App\Traits\NepaliDateConverter;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class HeaderComponent extends Component
{
    use NepaliDateConverter;

    /**
     * Returns the header name.
     *
     * @return string
     */
    public $headers = [];
    public string $year = '';
    public string $month = '';
    public string $day = '';

    public function __construct()
    {
        $this->headers = OfficeHeader::orderBy('position')->get();
        $nepaliDate = $this->get_nepali_date(date('Y'), date('m'), date('d'));
        $this->year = Str::padLeft($nepaliDate['y'], 4, 0);
        $this->day = Str::padLeft($nepaliDate['d'], 2, 0);
        $this->month = Str::padLeft($nepaliDate['M'], 2, 0);
    }

    public function render()
    {
        return view('components.header-component');
    }
}
