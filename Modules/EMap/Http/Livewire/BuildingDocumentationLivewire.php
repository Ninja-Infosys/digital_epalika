<?php

namespace Modules\EMap\Http\Livewire;

use Illuminate\Support\Arr;
use Livewire\Component;

class BuildingDocumentationLivewire extends Component
{
    public $provinces = [];

    public $districts = [];

    public $localBodies = [];

    public $wards = [];

    public array $form = [
        'house_owner_name' => null,
        'applicant_name' => null,
        'application_date' => null,
        'province_id' => null,
        'district_id' => null,
        'local_body_id' => null,
        'ward_no' => null,
        'tole' => null,
        'former_province_id' => null,
        'former_district_id' => null,
        'former_local_body_id' => null,
        'former_ward_no' => null,
        'former_tole' => null,
        'phone' => null,
        'plot_no' => null,
        'land_area' => null,
        'house_start_date' => null,
        'house_end_date' => null,
        'room' => null,
        'storey' => null,
        'area' => null,
        'building_category' => null,
        'length' => null,
        'breadth' => null,
        'height' => null,
        'road_jurisdiction' => null,
        'land_detail' => null,
        'neighbours' => [],
        'required_documents' => [],
        'files' => [],
    ];

    public function mount($buildingDocuments = null)
    {
        $this->provinces = get_provinces();
        if (! empty($buildingDocuments)) {
            $this->buildingDocument = $buildingDocuments;

            $this->assignBuildingDocumentData();
        } else {
            $this->partnerArrayIncrement();
            $this->form['province_id'] = officeSetting()->province_id;
            $this->form['district_id'] = officeSetting()->district_id;
            $this->form['local_body_id'] = officeSetting()->local_body_id;
        }
    }

    private function assignBuildingDocumentData()
    {
        foreach (Arr::except($this->form, ['neighbours', 'required_documents', 'files']) as $key => $data) {
            $this->form[$key] = $this->buildingDocument[$key];
        }

        foreach ($this->buildingDocument->neighbours as $neighbour) {
            $this->form['neighbours'][] = [
                'neighbour_name' => $neighbour->neighbour_name ?? null,
                'direction' => $neighbour->direction ?? null,
                'ward_no' => $neighbour->ward_no ?? null,

            ];
        }
        foreach ($this->buildingDocument->requiredDocuments as $requiredDocument) {
            $this->form['neighbours'][] = [
                'citizenship' => $requiredDocument->citizenship ?? null,
                'landowner_proved' => $requiredDocument->landowner_proved ?? null,
                'revenue' => $requiredDocument->revenue ?? null,
                'building_map' => $requiredDocument->building_map ?? null,
                'land_map' => $requiredDocument->land_map ?? null,
                'all_round_house_pic' => $requiredDocument->all_round_house_pic ?? null,
                'photo' => $requiredDocument->photo ?? null,
                'other' => $requiredDocument->other ?? null,

            ];
        }
    }

    protected array $secondStepValidations = [
        'form.neighbours' => ['required', 'array'],
        'form.neighbours.*.neighbour_name' => ['required', 'string'],
        'form.neighbours.*.direction' => ['required'],
        'form.neighbours.*.ward_no' => ['required', 'integer'],

    ];

    protected function firstStepValidation(): array
    {
        return [

            'form.house_owner_name' => ['required', 'string'],
            'form.applicant_name' => ['required', 'string'],
            'form.application_date' => ['required', 'string'],
            'form.province_id' => ['required', 'integer', 'exists:provinces,id'],
            'form.district_id' => ['required', 'integer', 'exists:districts,id'],
            'form.local_body_id' => ['required', 'integer', 'exists:local_bodies,id'],
            'form.ward_no' => ['required', 'integer'],
            'form.tole' => ['required', 'string'],
            'form.former_province_id' => ['required', 'integer', 'exists:provinces,id'],
            'form.former_district_id' => ['required', 'integer', 'exists:districts,id'],
            'form.former_local_body_id' => ['required', 'integer', 'exists:local_bodies,id'],
            'form.former_ward_no' => ['required', 'string'],
            'form.former_tole' => ['required', 'string'],
            'form.phone' => ['required', 'string'],
            'form.plot_no' => ['required', 'string'],
            'form.land_area' => ['required', 'string'],
            'form.house_start_date' => ['required', 'string'],
            'form.house_end_date' => ['required', 'string'],
            'form.room' => ['required', 'string'],
            'form.storey' => ['required', 'string'],
            'form.area' => ['required', 'string'],
            'form.building_category' => ['required', 'string'],
            'form.length' => ['required', 'string'],
            'form.breadth' => ['required', 'string'],
            'form.height' => ['required', 'string'],
            'form.road_jurisdiction' => ['required', 'string'],
            'form.land_detail' => ['required', 'string'],
        ];
    }

    protected array $thirdStepValidations = [
        'form.required_documents' => ['required', 'array'],
        'form.required_documents.*.citizenship' => ['required'],
        'form.required_documents.*.landowner_proved' => ['required'],
        'form.required_documents.*.revenue' => ['required'],
        'form.required_documents.*.building_map' => ['required'],
        'form.required_documents.*.land_map' => ['required'],
        'form.required_documents.*.all_round_house_pic' => ['required'],
        'form.required_documents.*.photo' => ['required'],
        'form.required_documents.*.other' => ['nullable'],
    ];

    protected function secondStepValidations(): array
    {
        return ! empty($this->buildingDocument)
            ? array_merge($this->secondStepValidations, [
                'form.partners.*.photo' => ['required'],
                'form.partners.*.citizenship_front' => ['required'],
                'form.partners.*.citizenship_back' => ['required'],
            ])
            : array_merge($this->secondStepValidations, [
                'form.partners.*.photo' => ['nullable'],
                'form.partners.*.citizenship_front' => ['nullable'],
                'form.partners.*.citizenship_back' => ['nullable'],
            ]);
    }

    public function rules(): array
    {
        return match ($this->currentStep) {
            2 => $this->secondStepValidations(),
            3 => $this->thirdStepValidations(),
            default => $this->firstStepValidation(),
        };
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function nextStep($step): void
    {
        $this->validate();
        $this->currentStep = $step;
        $this->calculateProgressPercentage();
    }

    public function backStep($step): void
    {
        $this->currentStep = $step;
        $this->calculateProgressPercentage();
    }

    public function render()
    {
        return view('emap::livewire.building-documentation-livewire');
    }
}
