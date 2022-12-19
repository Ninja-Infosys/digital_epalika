<?php

namespace Modules\Plan\Http\Livewire;

use Livewire\Component;
use Modules\Plan\Entities\BudgetHead;
use Modules\Plan\Entities\BudgetSource;
use Modules\Plan\Entities\PlanArea;
use Modules\Plan\Entities\PlanLevel;

class ProjectDetailLivewire extends Component
{
    public $planAreas = [];
    public $planLevels = [];
    public $budgetSources = [];
    public $budgetHeads = [];

    public object $project;

    public array $form = [
        'registration_no' => null,
        'project_name' => null,
        'plan_area_id' => null,
        'project_status' => null,
        'project_start_date' => null,
        'project_completion_date' => null,
        'plan_level_id' => null,
        'ward_no' => null,
        'budget_source_id' => null,
        'budget_head_id' => null,
        'allocated_amount' => null,
        'project_venue' => null,
        'purpose' => null,
        'operated_through' => null,
        'is_deadline_extended' => null,
        'extended_date' => null,
        'progress_spent_amount' => null,
        'physical_progress_target' => null,
        'physical_progress_completed' => null,
        'physical_progress_unit' => null,
    ];

    public function mount($project = null)
    {
        $this->planAreas = PlanArea::with('planAreas')->whereNull('plan_area_id')->get();
        $this->planLevels = PlanLevel::with('planLevels')->whereNull('plan_level_id')->get();
        $this->budgetSources = BudgetSource::all();
        $this->budgetHeads = BudgetHead::with('budgetHeads')->whereNull('budget_head_id')->get();

        if (!empty($project)) {
            $this->project = $project;
            foreach ($this->form as $key => $data) {
                $this->form[$key] = $project[$key];
            }
        }
    }

    protected $listeners = ['projectStartDateChanged', 'projectCompletionDateChanged','extendedDateChanged'];

    public function projectStartDateChanged($nepaliDate, $englishDate)
    {
        $this->form['project_start_date'] = $nepaliDate;
    }

    public function projectCompletionDateChanged($nepaliDate, $englishDate)
    {
        $this->form['project_completion_date'] = $nepaliDate;
    }

    public function extendedDateChanged($nepaliDate, $englishDate)
    {
        $this->form['extended_date'] = $nepaliDate;
    }

    public function rules(): array
    {
        return [
            'form.registration_no' => ['required','unique:projects,registration_no,'.$this->project->id],
            'form.project_name' => ['required'],
            'form.plan_area_id' => ['required'],
            'form.project_status' => ['required'],
            'form.project_start_date' => ['nullable'],
            'form.project_completion_date' => ['nullable','after:form.project_start_date'],
            'form.plan_level_id' => ['required'],
            'form.ward_no' => ['nullable', 'integer'],
            'form.budget_source_id' => ['nullable'],
            'form.budget_head_id' => ['nullable'],
            'form.allocated_amount' => ['nullable', 'numeric'],
            'form.project_venue' => ['nullable'],
            'form.purpose' => ['nullable'],
            'form.operated_through' => ['nullable'],
            'form.is_deadline_extended' => ['required', 'boolean'],
            'form.extended_date' => ['required_if:form.is_deadline_extended,1'],
            'form.progress_spent_amount' => ['nullable', 'numeric'],
            'form.physical_progress_target' => ['nullable', 'numeric'],
            'form.physical_progress_completed' => ['nullable', 'numeric'],
            'form.physical_progress_unit' => ['nullable']
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitFormData()
    {
        $this->project->update($this->validate()['form']);

        $this->dispatchBrowserEvent('toast_message', [
            'type' => 'success',
            'title' => 'परियोजना सफलतापूर्वक अद्यावधिक गरियो',
        ]);
    }

    public function render()
    {
        if ($this->form['is_deadline_extended']!=1) {
            $this->form['extended_date']=null;
        }

        return view('plan::livewire.project-detail-livewire');
    }
}
