<?php

namespace Modules\HelpDesk\Http\Livewire;

use Livewire\Component;
use Modules\HelpDesk\Entities\Branch;
use Modules\HelpDesk\Entities\Service;

class HelpDeskLivewire extends Component
{
    public $branches = [];

    public $services = [];

    public function mount()
    {
        $this->branches = Branch::with('branches')->whereNull('branch_id')->get();
        $this->services = Service::whereNull('branch_id')->get();
    }

    public function setBranchId(Branch $branch)
    {
        $branch->load('services');
        $this->services = $branch->services;

    }

    public function resetService()
    {
        $this->reset('services');
    }

    public function render()
    {
        return view('helpdesk::livewire.help-desk-livewire');
    }
}
