<?php

namespace Modules\GrievanceHandling\Http\Livewire;

use Livewire\Component;
use Modules\GrievanceHandling\Entities\GrievanceOffice;
use Modules\GrievanceHandling\Entities\GrievanceType;

class GrievanceFormWizard extends Component
{
    public $grievanceTypes = [];

    public $currentStep = 1;

    public $firstStepForm = [
        'grievance_type_id' => null,
        'description' => null
    ];

    public function mount()
    {
        $this->grievanceTypes = GrievanceType::all();
    }

    public function backStep($step)
    {
        $this->currentStep = $step;
    }

    protected $rules = [
        'firstStepForm.grievance_type_id' => ['required', 'exists:grievance_types,id'],
        'firstStepForm.description' => ['required'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function firstStepSubmit()
    {
        $this->validate();
        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $this->validate();
        $this->currentStep = 3;
    }

    public function render()
    {
        return view('grievancehandling::livewire.grievance-form-wizard');
    }
}
