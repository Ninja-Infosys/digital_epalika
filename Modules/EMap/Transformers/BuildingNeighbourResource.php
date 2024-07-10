<?php

namespace Modules\EMap\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class BuildingNeighbourResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id ?? '',
            'neighbour_name' => $this->neighbour_name ?? '',
            'direction' => $this->direction ?? '',
            'ward_no' => $this->ward_no ?? '',
            'plot_no' => $this->plot_no ?? '',
        ];
    }
}
