<?php

namespace Modules\Plan\Http\Livewire;

use Illuminate\Validation\Rules\Enum;
use Livewire\Component;
use Modules\Plan\Entities\BenefitedMemberDetail;
use Modules\Plan\Entities\Project;
use Modules\Plan\Entities\ProjectCostDetail;
use Modules\Plan\Entities\ProjectGrantDetail;
use Modules\Plan\Enums\GrantSourceEnum;

class ProjectCostDetailLivewire extends Component
{
    public array $form = [
        'estimated_total_cost' => 0,
        'federal_invest' => 0,
        'province_invest' => 0,
        'local_level_invest' => 0,
        'consumer_committee_invest' => 0,
        'ngo_invest' => 0,
        'foreign_donor_invest' => 0,
        'others_invest' => 0,
        'estimated_cost_excluding_vat' => 0,
        'benefited_organization' => 0,
        'others_benefited' => 0,
        'projectGrantDetails' => [],
        'benefitedMemberDetails' => [],
        'progress_spent_amount' => 0,
        'physical_progress_target' => 0,
        'physical_progress_completed' => 0,
        'physical_progress_unit' => '',
    ];

    public object $project;

    public function mount($project_id = null)
    {
        if (!empty($project_id)) {
            $this->assignProjectData($project_id);
        }
    }

    public function rules(): array
    {
        return [
            'form.estimated_total_cost' => ['required', 'numeric'],
            'form.federal_invest' => ['nullable', 'numeric'],
            'form.province_invest' => ['nullable', 'numeric'],
            'form.local_level_invest' => ['nullable', 'numeric'],
            'form.consumer_committee_invest' => ['nullable', 'numeric'],
            'form.ngo_invest' => ['nullable', 'numeric'],
            'form.foreign_donor_invest' => ['nullable', 'numeric'],
            'form.others_invest' => ['nullable', 'numeric'],
            'form.estimated_cost_excluding_vat' => ['nullable', 'numeric'],
            'form.benefited_organization' => ['required', 'numeric'],
            'form.others_benefited' => ['required', 'numeric'],
            'form.projectGrantDetails.*' => ['nullable', 'array'],
            'form.projectGrantDetails.*.grant_source' => ['required', new Enum(GrantSourceEnum::class)],
            'form.projectGrantDetails.*.asset_name' => ['required'],
            'form.projectGrantDetails.*.quantity' => ['required', 'numeric'],
            'form.projectGrantDetails.*.asset_unit' => ['required'],
            'form.benefitedMemberDetails.*.ward_no' => ['required', 'integer'],
            'form.benefitedMemberDetails.*.village' => ['required'],
            'form.benefitedMemberDetails.*.dalit_backward_no' => ['required', 'integer'],
            'form.benefitedMemberDetails.*.other_households_no' => ['required', 'integer'],
            'form.benefitedMemberDetails.*.no_of_male' => ['required', 'integer'],
            'form.benefitedMemberDetails.*.no_of_female' => ['required', 'integer'],
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

    public function addProjectGrantDetails()
    {
        $this->form['projectGrantDetails'][] = [];
    }

    public function removeProjectGrantDetails($index)
    {
        if (!empty($this->form['projectGrantDetails'][$index]['id'])) {
            ProjectGrantDetail::find($this->form['projectGrantDetails'][$index]['id'])->delete();
        }
        unset($this->form['projectGrantDetails'][$index]);
        $this->form['projectGrantDetails'] = array_values($this->form['projectGrantDetails']);
    }

    public function addBenefitedMemberDetails()
    {
        $this->form['benefitedMemberDetails'][] = [];
    }

    public function removeBenefitedMemberDetails($index)
    {
        if (!empty($this->form['benefitedMemberDetails'][$index]['id'])) {
            BenefitedMemberDetail::find($this->form['benefitedMemberDetails'][$index]['id'])->delete();
        }
        unset($this->form['benefitedMemberDetails'][$index]);
        $this->form['benefitedMemberDetails'] = array_values($this->form['benefitedMemberDetails']);
    }

    private function assignProjectData($project_id)
    {
        $project = Project::with('projectCostDetail', 'projectGrantDetails', 'benefitedMemberDetails')->find($project_id);

        $this->project = $project;

        $this->form['estimated_total_cost'] = $project->estimated_total_cost;
        $this->form['agencies_grants'] = $project->agencies_grants;
        $this->form['share_amount'] = $project->share_amount;
        $this->form['committee_share_amount'] = $project->committee_share_amount;
        $this->form['contingency_amount'] = $project->contingency_amount;
        $this->form['labor_amount'] = $project->labor_amount;
        $this->form['benefited_organization'] = $project->benefited_organization;
        $this->form['others_benefited'] = $project->others_benefited;
        $this->form['progress_spent_amount'] = $project->progress_spent_amount;
        $this->form['physical_progress_target'] = $project->physical_progress_target;
        $this->form['physical_progress_completed'] = $project->physical_progress_completed;
        $this->form['physical_progress_unit'] = $project->physical_progress_unit;


        foreach ($project->projectGrantDetails as $projectGrantDetail) {
            $this->form['projectGrantDetails'][] = [
                'id' => $projectGrantDetail->id ?? null,
                'grant_source' => $projectGrantDetail->grant_source ?? null,
                'asset_name' => $projectGrantDetail->asset_name ?? null,
                'quantity' => $projectGrantDetail->quantity ?? 0,
                'asset_unit' => $projectGrantDetail->asset_unit ?? null,
            ];
        }
        foreach ($project->benefitedMemberDetails as $benefitedMemberDetail) {
            $this->form['benefitedMemberDetails'][] = [
                'id' => $benefitedMemberDetail->id ?? null,
                'ward_no' => $benefitedMemberDetail->ward_no ?? null,
                'village' => $benefitedMemberDetail->village ?? null,
                'dalit_backward_no' => $benefitedMemberDetail->dalit_backward_no ?? 0,
                'other_households_no' => $benefitedMemberDetail->other_households_no ?? 0,
                'no_of_male' => $benefitedMemberDetail->no_of_male ?? 0,
                'no_of_female' => $benefitedMemberDetail->no_of_female ?? 0
            ];
        }
    }

    public function submitFormData()
    {

        $formData = $this->validate()['form'];
        $this->project->update([
            'progress_spent_amount' => $formData['progress_spent_amount'] ?? 0,
            'physical_progress_target' => $formData['physical_progress_target'] ?? 0,
            'physical_progress_completed' => $formData['physical_progress_completed'] ?? 0,
            'physical_progress_unit' => $formData['physical_progress_unit'] ?? null,
        ]);

        ProjectCostDetail::updateOrCreate(
            ['project_id' => $this->project->id],
            [
                'estimated_total_cost' => $formData['estimated_total_cost'] ?? 0,
                'federal_invest' => $formData['federal_invest'] ?? 0,
                'province_invest' => $formData['province_invest'] ?? 0,
                'local_level_invest' => $formData['local_level_invest'] ?? 0,
                'consumer_committee_invest' => $formData['consumer_committee_invest'] ?? 0,
                'ngo_invest' => $formData['ngo_invest'] ?? 0,
                'foreign_donor_invest' => $formData['foreign_donor_invest'] ?? 0,
                'others_invest' => $formData['others_invest'] ?? 0,
                'estimated_cost_excluding_vat' => $formData['estimated_cost_excluding_vat'] ?? 0,
                'benefited_organization' => $formData['benefited_organization'] ?? 0,
                'others_benefited' => $formData['others_benefited'] ?? 0
            ]
        );

        foreach ($this->form['projectGrantDetails'] as $projectGrantDetail) {
            ProjectGrantDetail::updateOrCreate(
                ['project_id' => $this->project->id, 'id' => $projectGrantDetail['id'] ?? null],
                $projectGrantDetail
            );
        }

        foreach ($this->form['benefitedMemberDetails'] as $benefitedMemberDetail) {
            BenefitedMemberDetail::updateOrCreate(
                ['project_id' => $this->project->id, 'id' => $benefitedMemberDetail['id'] ?? null],
                $benefitedMemberDetail
            );
        }

        $this->reset('form');
        $this->assignProjectData($this->project->id);

        $this->dispatchBrowserEvent('toast_message', [
            'type' => 'success',
            'title' => 'लागत विवरण सफलतापूर्वक अद्यावधिक गरियो',
        ]);
    }

    public function render()
    {
        return view('plan::livewire.project-cost-detail-livewire');
    }
}
