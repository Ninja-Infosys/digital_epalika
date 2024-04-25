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
    public bool $hasClock = true;

    public function __construct(bool $hasClock = true, ?int $ward = null)
    {
        $this->headers = OfficeHeader::where(function ($q) use ($ward) {
            if (!is_null($ward)) {
                $q->where('ward', $ward);
            } else {
                $q->whereNull('ward');
            }
        })
            ->orderBy('position')
            ->get();

        $this->hasClock = $hasClock;

        if ($this->hasClock) {
            $nepaliDate = $this->get_nepali_date(date('Y'), date('m'), date('d'));
            $this->year = str_pad($nepaliDate['y'], 4, '0', STR_PAD_LEFT);
            $this->day = str_pad($nepaliDate['d'], 2, '0', STR_PAD_LEFT);
            $this->month = $nepaliDate['M'];
        }
    }

    public function render()
    {
        return view('components.header-component');
    }
}
