<?php

namespace Modules\Circular\Http\Livewire;

use Livewire\Component;
use Modules\Circular\Entities\Registration;

class RegistrationReport extends Component
{
    public $search;
    public $registrations = [];

    public function render()
    {
        $this->registrations = Registration::where(function ($query) {
            if (!empty($this->search)) {
                $query->where('registration_no','LIKE', '%'.$this->search.'%');
                $query->orWhere('registration_date','LIKE', '%'.$this->search.'%');
            }
        })
            ->latest()
            ->get();
        return view('circular::livewire.registration-report');
    }
}
