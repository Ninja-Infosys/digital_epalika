<?php

namespace Modules\Plan\Http\Livewire;

use Livewire\Component;
use Modules\Plan\Entities\Project;
use Modules\Plan\Entities\ProjectBill;

class ProjectBillLivewire extends Component
{
    public bool $createModalOpened = false;
    public bool $editModalOpened = false;
    public Project $project;
    public ProjectBill $projectBill;

    public array $form = [
        'amount' => null,
        'bill_date' => null
    ];

    protected $listeners = ['billDateChanged'];

    public function mount($project)
    {
        $this->getProjectData($project);
    }

    public function billDateChanged($nepaliDate, $englishDate)
    {
        $this->form['bill_date'] = $nepaliDate;
    }

    public function create()
    {
        $this->createModalOpened = true;
    }

    public function edit(ProjectBill $projectBill)
    {
        $this->projectBill = $projectBill;
        $this->editModalOpened = true;
        foreach ($this->form as $key => $value) {
            $this->form[$key] = $projectBill[$key];
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
        $this->project = $project->load('projectBills');
    }

    public function rules(): array
    {
        return [
            'form.amount' => ['required', 'numeric'],
            'form.bill_date' => ['required'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->project->projectBills()->create($this->validate()['form']);
        $this->closeModal();
        $this->getProjectData($this->project);

        $this->toastMessage('पेश्की विवरण सफलतापूर्वक थपियो');
    }

    public function update()
    {
        $this->projectBill->update($this->validate()['form']);
        $this->closeModal();
        $this->getProjectData($this->project);

        $this->toastMessage('पेश्की विवरण सफलतापूर्वक अद्यावधिक गरियो');
    }

    public function deleteProjectBill(ProjectBill $projectBill)
    {
        $projectBill->delete();
        $this->getProjectData($this->project);

        $this->toastMessage('पेश्की विवरण सफलतापूर्वक मेटाइयो');
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
        return view('plan::livewire.project-bill-livewire');
    }
}
