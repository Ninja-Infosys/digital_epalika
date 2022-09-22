<?php

namespace Modules\HelpDesk\Http\Livewire;

use Livewire\Component;
use Modules\HelpDesk\Entities\ServiceEmployee;

class ServiceEmployeeLivewire extends Component
{
    public $serviceEmployees = [];

    public function mount($service = null)
    {
        if (!empty($service)) {
            foreach ($service->serviceEmployees as $serviceEmployee) {
                $this->serviceEmployees[] = [
                    'id' => $serviceEmployee->id,
                    'employee' => $serviceEmployee->employee
                ];
            }
        } else {
            $this->serviceEmployees[] = [];
        }
    }

    public function addRow()
    {
        $this->serviceEmployees[] = [];
    }

    public function removeRow($index)
    {
        if (!empty($this->serviceEmployees[$index]['id'])) {
            ServiceEmployee::find($this->serviceEmployees[$index]['id'])->delete();
        }
        unset($this->serviceEmployees[$index]);
        $this->serviceEmployees = array_values($this->serviceEmployees);
    }

    public function render()
    {
        return view('helpdesk::livewire.service-employee-livewire');
    }
}
