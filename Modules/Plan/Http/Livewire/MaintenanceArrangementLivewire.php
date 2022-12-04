<?php

namespace Modules\Plan\Http\Livewire;

use Livewire\Component;
use Modules\Plan\Entities\Project;
use Modules\Plan\Entities\ProjectMaintenanceArrangement;

class MaintenanceArrangementLivewire extends Component
{
    public Project $project;

    public array $form = [
        'office_name' => null,
        'public_service' => null,
        'service_fee' => null,
        'from_fee_donation' => null,
        'others' => null
    ];

    public function mount(Project $project)
    {
        $this->assignMaintenanceArrangementData($project);
    }

    public function rules(): array
    {
        return [
            'form.office_name' => ['required'],
            'form.public_service' => ['nullable', 'numeric'],
            'form.service_fee' => ['nullable', 'numeric'],
            'form.from_fee_donation' => ['nullable', 'numeric'],
            'form.others' => ['nullable', 'numeric']
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function assignMaintenanceArrangementData($project)
    {
        $this->project = $project->load('projectMaintenanceArrangement');
        if ($projectMaintenanceArrangement = $project->projectMaintenanceArrangement) {
            foreach ($this->form as $key => $value) {
                $this->form[$key] = $projectMaintenanceArrangement[$key];
            }
        }
    }

    public function submitFormData()
    {
        ProjectMaintenanceArrangement::updateOrCreate(
            ['project_id' => $this->project->id],
            $this->validate()['form']
        );

        $this->dispatchBrowserEvent('toast_message', [
            'type' => 'success',
            'title' => 'मर्मत व्यवस्था विवरण सफलतापूर्वक अद्यावधिक गरियो',
        ]);
    }

    public function render()
    {
        return view('plan::livewire.maintenance-arrangement-livewire');
    }
}
