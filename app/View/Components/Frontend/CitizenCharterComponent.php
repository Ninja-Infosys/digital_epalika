<?php

namespace App\View\Components\frontend;

use Illuminate\View\Component;
use Modules\DigitalBoard\Entities\CitizenCharter;

class CitizenCharterComponent extends Component
{
    public $citizenCharters;


    public function __construct(int|null $ward = null)
    {
        $this->citizenCharters = CitizenCharter::with('branch')
            ->where(function ($q) use ($ward) {
                if (!empty($ward)) {
                    $q->whereRaw("FIND_IN_SET('$ward', ward) > 0");
                } else {
                    $q->MainPageDisplay();
                }
            })
            ->orderBy('branch_id')
            ->get();
    }


    public function render()
    {
        return view('components.frontend.citizen-charter-component', [
            'citizenCharters' => $this->citizenCharters,
        ]);
    }

}
