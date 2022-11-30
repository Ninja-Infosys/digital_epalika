<?php

namespace Modules\Plan\Http\Livewire;

use Illuminate\Validation\Rules\Enum;
use Livewire\Component;
use Modules\Plan\Entities\Project;
use Modules\Plan\Entities\ProjectInstallmentDetail;
use Modules\Plan\Enums\InstallmentTypeEnum;

class InstallmentDetailLivewire extends Component
{
    public bool $createModalOpened = false;
    public object $project;

    public array $form = [
        'installment_type' => null,
        'date' => null,
        'amount' => null,
        'construction_material_quantity' => null,
        'remarks' => null
    ];

    protected $listeners = ['dateChanged'];

    public function mount($project_id)
    {
        $this->getProjectData($project_id);
    }

    public function dateChanged($nepaliDate, $englishDate)
    {
        $this->form['date'] = $nepaliDate;
    }

    public function openCreateModal()
    {
        $this->createModalOpened = true;
    }

    public function closeModal()
    {
        $this->reset('form');
        $this->createModalOpened = false;
    }

    public function getProjectData($project_id)
    {
        $this->project=Project::with('projectInstallmentDetails')->find($project_id);
    }

    public function rules(): array
    {
        return [
            'form.installment_type' => ['required', new Enum(InstallmentTypeEnum::class)],
            'form.date' => ['nullable'],
            'form.amount' => ['required', 'numeric'],
            'form.construction_material_quantity' => ['nullable'],
            'form.remarks' => ['nullable']
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitFormData()
    {
        $this->project->projectInstallmentDetails()->create($this->validate()['form']);
        $this->closeModal();
        $this->getProjectData($this->project->id);

        $this->dispatchBrowserEvent('toast_message', [
            'type' => 'success',
            'title' => 'किस्ता विवरण सफलतापूर्वक थपियो',
        ]);
    }

    public function deleteInstallmentDetail(ProjectInstallmentDetail $projectInstallmentDetail)
    {
        $projectInstallmentDetail->delete();
        $this->getProjectData($this->project->id);

        $this->dispatchBrowserEvent('toast_message', [
            'type' => 'success',
            'title' => 'किस्ता विवरण सफलतापूर्वक मेटाइयो',
        ]);
    }

    public function render()
    {
        return view('plan::livewire.installment-detail-livewire');
    }
}
