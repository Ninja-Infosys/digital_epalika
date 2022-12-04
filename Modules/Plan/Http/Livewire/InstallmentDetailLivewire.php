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
    public bool $editModalOpened = false;
    public Project $project;
    public ProjectInstallmentDetail $projectInstallmentDetail;

    public array $form = [
        'installment_type' => null,
        'date' => null,
        'amount' => null,
        'construction_material_quantity' => null,
        'remarks' => null
    ];

    protected $listeners = ['dateChanged'];

    public function mount($project)
    {
        $this->getProjectData($project);
    }

    public function dateChanged($nepaliDate, $englishDate)
    {
        $this->form['date'] = $nepaliDate;
    }

    public function create()
    {
        $this->createModalOpened = true;
    }

    public function edit(ProjectInstallmentDetail $projectInstallmentDetail)
    {
        $this->projectInstallmentDetail = $projectInstallmentDetail;
        $this->editModalOpened = true;
        foreach ($this->form as $key => $value) {
            $this->form[$key] = $projectInstallmentDetail[$key];
        }
    }

    public function closeModal()
    {
        $this->reset('form');
        $this->createModalOpened = false;
        $this->editModalOpened = false;
        $this->resetValidation();
    }

    public function getProjectData($project)
    {
        $this->project = $project->load('projectInstallmentDetails')->loadSum('projectInstallmentDetails', 'amount');
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

    public function store()
    {
        $this->project->projectInstallmentDetails()->create($this->validate()['form']);
        $this->closeModal();
        $this->getProjectData($this->project);

        $this->toastMessage('किस्ता विवरण सफलतापूर्वक थपियो');
    }

    public function update()
    {
        $this->projectInstallmentDetail->update($this->validate()['form']);
        $this->closeModal();
        $this->getProjectData($this->project);

        $this->toastMessage('किस्ता विवरण सफलतापूर्वक अद्यावधिक गरियो');
    }

    public function deleteInstallmentDetail(ProjectInstallmentDetail $projectInstallmentDetail)
    {
        $projectInstallmentDetail->delete();
        $this->getProjectData($this->project);

        $this->toastMessage('किस्ता विवरण सफलतापूर्वक मेटाइयो');
    }

    public function toastMessage($title)
    {
        $this->dispatchBrowserEvent('toast_message', [
            'type' => 'success',
            'title' => $title,
        ]);
    }

    public function render()
    {
        return view('plan::livewire.installment-detail-livewire');
    }
}
