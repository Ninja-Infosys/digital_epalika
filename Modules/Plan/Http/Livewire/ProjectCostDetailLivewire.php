<?php

namespace Modules\Plan\Http\Livewire;

use Illuminate\Validation\Rules\Enum;
use Livewire\Component;
use Modules\Plan\Entities\Project;
use Modules\Plan\Entities\ProjectCostDetail;
use Modules\Plan\Entities\ProjectGrantDetail;
use Modules\Plan\Enums\GrantSourceEnum;

class ProjectCostDetailLivewire extends Component
{
    public array $form = [
        'estimated_total_cost' => null,
        'federal_invest' => null,
        'province_invest' => null,
        'local_level_invest' => null,
        'consumer_committee_invest' => null,
        'ngo_invest' => null,
        'foreign_donor_invest' => null,
        'others_invest' => null,
        'estimated_cost_excluding_vat' => null,
        'benefited_organization' => null,
        'others_benefited' => null,
        'projectGrantDetails' => []
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

    private function assignProjectData($project_id)
    {
        $project = Project::with('projectCostDetail', 'projectGrantDetails')->find($project_id);
        $this->project = $project;
        if ($projectCostDetail = $project->projectCostDetail) {
            foreach ($this->form as $key => $data) {
                if ($key != 'projectGrantDetails') {
                    $this->form[$key] = $projectCostDetail[$key];
                }
            }
        }
        foreach ($project->projectGrantDetails as $projectGrantDetail) {
            $this->form['projectGrantDetails'][] = [
                'id' => $projectGrantDetail->id ?? null,
                'grant_source' => $projectGrantDetail->grant_source ?? null,
                'asset_name' => $projectGrantDetail->asset_name ?? null,
                'quantity' => $projectGrantDetail->quantity ?? 0,
                'asset_unit' => $projectGrantDetail->asset_unit ?? null,
            ];
        }
    }

    public function submitFormData()
    {
        $formData = $this->validate()['form'];

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
