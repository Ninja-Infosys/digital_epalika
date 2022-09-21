<?php

namespace Modules\HelpDesk\Http\Livewire;

use Livewire\Component;

class ServiceProcess extends Component
{
    public $serviceProcesses = [];

    public function mount()
    {
        $this->serviceProcesses[] = [];
    }

    public function addRow()
    {
        $this->serviceProcesses[] = [];
    }

    public function removeRow($index)
    {
        unset($this->serviceProcesses[$index]);
        $this->serviceProcesses = array_values($this->serviceProcesses);
    }

    public function render()
    {
        return view('helpdesk::livewire.service-process');
    }
}
