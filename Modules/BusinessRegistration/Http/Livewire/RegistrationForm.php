<?php

namespace Modules\BusinessRegistration\Http\Livewire;

use App\Models\Address\Province;
use Livewire\Component;

class RegistrationForm extends Component
{

    public $provices = [];
    public $districts = [];
    public $localBodies = [];


    public function mount()
    {
        $this->provices = Province::all();
    }
    public function render()
    {
        return view('businessregistration::livewire.registration-form');
    }
}
