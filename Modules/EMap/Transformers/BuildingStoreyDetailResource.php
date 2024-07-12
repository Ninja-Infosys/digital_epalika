<?php

namespace Modules\EMap\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Plan\Transformers\MapFeeResource;

class BuildingStoreyDetailResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id ?? '',
            'map_fee_id' => $this->map_fee_id ?? '',
            'area_of_former_construction' => $this->area_of_former_construction ?? '',
            'land_area' => $this->land_area ?? '',  
            'remarks' => $this->remarks ?? '',
            'mapFee' => MapFeeResource::make($this->whenLoaded('mapFee')),

        ];
    }
}
