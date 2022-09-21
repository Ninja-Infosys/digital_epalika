<?php

namespace Modules\HelpDesk\Http\Livewire;

use Livewire\Component;

class ServiceEmployee extends Component
{
    public $serviceEmployees = [];

    public function mount()
    {
        $this->serviceEmployees[] = [];
    }

    public function addRow()
    {
        $this->serviceEmployees[] = [];
    }

    public function removeRow($index)
    {
        unset($this->serviceEmployees[$index]);
        $this->serviceEmployees = array_values($this->serviceEmployees);
    }

    public function render()
    {
        return view('helpdesk::livewire.service-employee');
    }
}
