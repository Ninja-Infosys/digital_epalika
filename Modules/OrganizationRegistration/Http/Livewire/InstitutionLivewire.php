<?php

namespace Modules\OrganizationRegistration\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class InstitutionLivewire extends Component
{
    use WithFileUploads;



    public function render()
    {
        return view('organizationregistration::livewire.institution-livewire');
    }
}
