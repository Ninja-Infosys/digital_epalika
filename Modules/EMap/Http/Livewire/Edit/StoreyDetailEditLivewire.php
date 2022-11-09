<?php

namespace Modules\EMap\Http\Livewire\Edit;

use Livewire\Component;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\MapFee;

class StoreyDetailEditLivewire extends Component
{

    public MapApply $mapApply;
    public $mapFees;
    public $storeyDetails = [];

    public function mount(MapApply $mapApply): void
    {
        $this->mapApply = $mapApply;

        $this->mapFees = MapFee::with('unit')->get();
        $mapApply->load('storeyDetails')->loadCount('storeyDetails');
        foreach ($mapApply->storeyDetails as $storeyDetail) {
            $this->storeyDetails[] = [
                'id' => $storeyDetail->id ?? null,
                'map_fee_id' => $storeyDetail->map_fee_id ?? null,
                'area_of_proposed_construction' => $storeyDetail->area_of_proposed_construction ?? null,
                'area_of_former_construction' => $storeyDetail->area_of_former_construction ?? null,
                'total_area' => $storeyDetail->total_area ?? null,
                'height' => $storeyDetail->height ?? null,
            ];
        }

        for ($i = $mapApply->storey_details_count; $i <= $mapApply->current_storey; $i++) {
            $this->storeyDetails[] = [];
        }
    }

    public function render()
    {
        return view('emap::livewire.edit.storey-detail-edit-livewire');
    }
}
