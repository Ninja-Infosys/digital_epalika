<?php

namespace Modules\EMap\Http\Livewire;

use Livewire\Component;
use Modules\EMap\Entities\Client;
use Modules\EMap\Entities\StructureType;

class MapApplyLivewire extends Component
{
    public Client $client;
    public $structureTypes = [];
    public int $currentStep = 1;
    public bool $open_structure_type = false;

    public array $applyMap = [
        'construction_type' => null,
        'usage' => null,
        'building_category' => null,
        'structure_type_id' => null,
        'structure_type' => null,
        'current_storey' => null,
        'area_of_plinth' => null,
        'future_storey' => null,
        'length' => null,
        'breadth' => null,
        'height' => null,
        'storeyDetails' => []
    ];

    public array $landDescription = [
        'land_use_area' => null,
        'ward_no' => null,
        'former_ward_no' => null,
        'tole' => null,
        'street_code_no' => null,
        'plot_no' => null,
        'bigha' => null,
        'kattha' => null,
        'dhur' => null,
        'square_meter' => null,
        'percentage_of_area_covered_by_building' => null,
    ];

    public array $landOwner = [
        'land_owner_type' => null,
        'name' => null,
        'phone' => null,
        'father_name' => null,
        'citizenship_issue_district' => null,
        'citizenship_no' => null,
        'citizenship_issue_date' => null
    ];

    public function addStoreyDetail()
    {
        $this->applyMap['storeyDetails'][] = [];
    }

    public function removeStoreyDetail($index): void
    {
        unset($this->applyMap['storeyDetails'][$index]);
        $this->applyMap['storeyDetails'] = array_values($this->applyMap['storeyDetails']);
    }

    public function setStructureType()
    {
        $this->open_structure_type = !$this->open_structure_type;
    }

    public function mount(Client $client)
    {
        $this->client = $client;
        $this->structureTypes = StructureType::latest()->get();
    }

    protected array $applyMapValidations = [
        'applyMap.construction_type' => ['required'],
        'applyMap.usage' => ['required'],
        'applyMap.building_category' => ['required'],
        'applyMap.structure_type_id' => ['nullable', 'exists:structure_types,id'],
        'applyMap.structure_type' => ['nullable'],
        'applyMap.current_storey' => ['required'],
        'applyMap.area_of_plinth' => ['required'],
        'applyMap.future_storey' => ['required'],
        'applyMap.length' => ['required'],
        'applyMap.breadth' => ['required'],
        'applyMap.height' => ['required'],
        'applyMap.storeyDetails' => ['nullable', 'array'],
        'applyMap.storeyDetails.*.storey' => ['required'],
        'applyMap.storeyDetails.*.area_of_proposed_construction' => ['required'],
        'applyMap.storeyDetails.*.area_of_former_construction' => ['required'],
        'applyMap.storeyDetails.*.total_area' => ['required'],
        'applyMap.storeyDetails.*.height' => ['required'],
    ];

    protected array $landDescriptionValidations = [
        'landDescription.land_use_area' => ['required'],
        'landDescription.ward_no' => ['required'],
        'landDescription.former_ward_no' => ['required'],
        'landDescription.tole' => ['nullable'],
        'landDescription.street_code_no' => ['nullable'],
        'landDescription.plot_no' => ['required'],
        'landDescription.bigha' => ['nullable'],
        'landDescription.kattha' => ['nullable'],
        'landDescription.dhur' => ['nullable'],
        'landDescription.square_meter' => ['nullable'],
        'landDescription.percentage_of_area_covered_by_building' => ['required'],
    ];

    public function rules()
    {
        switch ($this->currentStep) {
            case 1:
                {
                    return array_merge($this->applyMapValidations, $this->landDescriptionValidations);
                }
                break;
            case 2:
                {
                    return $this->landDescriptionValidations;
                }
                break;
            default:
            {
                return $this->applyMapValidations;
            }
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveFormData()
    {
        $this->validate();
        dd($this->applyMap);
    }

    public function render()
    {

        return view('emap::livewire.map-apply-livewire');
    }
}
