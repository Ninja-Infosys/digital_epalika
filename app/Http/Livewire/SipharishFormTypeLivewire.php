<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SipharishFormTypeLivewire extends Component
{
    public $formTypes = [];

    public function mount()
    {
    }

    public function addRow()
    {
        $this->formTypes[] = [];
    }

    public function removeRow($index)
    {
        unset($this->formTypes[$index]);
        $this->formTypes = array_values($this->formTypes);
    }

    public function render()
    {
        return view('livewire.sipharish-form-type-livewire');
    }
}
