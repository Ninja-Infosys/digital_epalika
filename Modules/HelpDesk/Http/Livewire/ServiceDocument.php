<?php

namespace Modules\HelpDesk\Http\Livewire;

use Livewire\Component;

class ServiceDocument extends Component
{
    public $serviceDocuments = [];

    public function mount()
    {
        $this->serviceDocuments[] = [];
    }

    public function addRow()
    {
        $this->serviceDocuments[] = [];
    }

    public function removeRow($index)
    {
        unset($this->serviceDocuments[$index]);
        $this->serviceDocuments = array_values($this->serviceDocuments);
    }

    public function render()
    {
        return view('helpdesk::livewire.service-document');
    }
}
