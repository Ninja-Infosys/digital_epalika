<?php

namespace Modules\OrganizationRegistration\Http\Livewire;

use App\Enums\DesignationTypeEnum;
use Livewire\Component;
use Livewire\WithFileUploads;

class InstitutionLivewire extends Component
{
    use WithFileUploads;

    public array $form = [];

    public function mount()
    {
        $this->form = [
            [
                'officer_designation' => DesignationTypeEnum::CHAIRMAN->value,
            ],
            [
                'officer_designation' => DesignationTypeEnum::SECRETARY->value,
            ],
            [
                'officer_designation' => DesignationTypeEnum::TREASURER->value,
            ]
        ];
    }


    public function addOfficer(): void
    {
        $this->form[] = [];

    }

    public function removeOfficer($index): void
    {
        if ($index > 2) {
            unset($this->form[$index]);
            $this->form = array_values($this->form);
        }
    }


    public function render()
    {
        return view('organizationregistration::livewire.institution-livewire');
    }
}
