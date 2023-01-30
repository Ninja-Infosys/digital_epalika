<?php

namespace Modules\Plan\Http\Livewire;

use Livewire\Component;
use Modules\Plan\Entities\Project;
use Modules\Plan\Entities\TechnicalCostEstimate;

class TechnicalCostEstimateLivewire extends Component
{
    public Project $project;

    public array $technicalCostEstimates = [];

    public function mount(Project $project)
    {
        $this->assignTechnicalCostEstimateData($project);
    }

    public function addTechnicalCostEstimates()
    {
        $this->technicalCostEstimates[] = [];
    }

    public function removeTechnicalCostEstimate($index)
    {
        if (!empty($this->technicalCostEstimates[$index]['id'])) {
            TechnicalCostEstimate::find($this->technicalCostEstimates[$index]['id'])->delete();
        }
        unset($this->technicalCostEstimates[$index]);
        $this->technicalCostEstimates = array_values($this->technicalCostEstimates);
    }

    private function assignTechnicalCostEstimateData($project)
    {
        $this->project = $project->load('technicalCostEstimates');

        foreach ($project->technicalCostEstimates as $technicalCostEstimate) {
            $this->technicalCostEstimates[] = [
                'id' => $technicalCostEstimate->id ?? null,
                'detail' => $technicalCostEstimate->detail ?? null,
                'number' => $technicalCostEstimate->number ?? 0,
                'length' => $technicalCostEstimate->length ?? 0,
                'breadth' => $technicalCostEstimate->breadth ?? 0,
                'height' => $technicalCostEstimate->height ?? 0,
                'quantity' => $technicalCostEstimate->quantity ?? 0,
                'unit' => $technicalCostEstimate->unit ?? null,
                'rate' => $technicalCostEstimate->rate ?? 0
            ];
        }
    }

    public function rules(): array
    {
        return [
            'technicalCostEstimates.*.detail' => ['required', 'string', 'max:255'],
            'technicalCostEstimates.*.number' => ['nullable', 'numeric'],
            'technicalCostEstimates.*.length' => ['nullable', 'numeric'],
            'technicalCostEstimates.*.breadth' => ['nullable', 'numeric'],
            'technicalCostEstimates.*.height' => ['nullable', 'numeric'],
            'technicalCostEstimates.*.quantity' => ['required', 'numeric'],
            'technicalCostEstimates.*.unit' => ['required', 'string', 'max:255'],
            'technicalCostEstimates.*.rate' => ['required', 'numeric']
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitFormData()
    {
        $this->validate();

        foreach ($this->technicalCostEstimates as $technicalCostEstimate) {
            TechnicalCostEstimate::updateOrCreate(
                ['project_id' => $this->project->id, 'id' => $technicalCostEstimate['id'] ?? null],
                [
                    'detail' => !empty($technicalCostEstimate['detail']) ? $technicalCostEstimate['detail'] : null,
                    'number' => !empty($technicalCostEstimate['number']) ? $technicalCostEstimate['number'] : 0,
                    'length' => !empty($technicalCostEstimate['length']) ? $technicalCostEstimate['length'] : 0,
                    'breadth' => !empty($technicalCostEstimate['breadth']) ? $technicalCostEstimate['breadth'] : 0,
                    'height' => !empty($technicalCostEstimate['height']) ? $technicalCostEstimate['height'] : 0,
                    'quantity' => !empty($technicalCostEstimate['quantity']) ? $technicalCostEstimate['quantity'] : 0,
                    'unit' => !empty($technicalCostEstimate['unit']) ? $technicalCostEstimate['unit'] : null,
                    'rate' => !empty($technicalCostEstimate['rate']) ? $technicalCostEstimate['rate'] : 0
                ]
            );
        }

        $this->reset('technicalCostEstimates');
        $this->assignTechnicalCostEstimateData($this->project);

        $this->dispatchBrowserEvent('toast_message', [
            'type' => 'success',
            'title' => 'प्राविधिक लागत अनुमान सफलतापूर्वक पेश गरियो',
        ]);
    }

    public function messages(): array
    {
        return [
            'technicalCostEstimates.*.detail.required' => 'विवरण आवश्यक छ',
            'technicalCostEstimates.*.quantity.required' => 'परिमाण आवश्यक छ',
            'technicalCostEstimates.*.unit.required' => 'इकाई आवश्यक छ',
            'technicalCostEstimates.*.rate.required' => 'दर आवश्यक छ'
        ];
    }

    public function render()
    {
        return view('plan::livewire.technical-cost-estimate-livewire');
    }
}
