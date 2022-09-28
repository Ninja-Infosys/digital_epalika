<?php

namespace Modules\EMap\Http\Livewire;

use Livewire\Component;
use Modules\EMap\Entities\Client;
use Modules\EMap\Entities\StructureType;

class MapApplyLivewire extends Component
{
    public Client $client;
    public $structureTypes = [];
    public bool $open_structure_type = false;

    public $applyMap = [
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
    ];

    public $storeyDetails = [];

    public $landDescription = [
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

    public function addStoreyDetail()
    {
        $this->storeyDetails[] = [];
    }

    public function removeStoreyDetail($index): void
    {
        unset($this->storeyDetails[$index]);
        $this->storeyDetails = array_values($this->storeyDetails);
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

    public function render()
    {

        return view('emap::livewire.map-apply-livewire');
    }
}
