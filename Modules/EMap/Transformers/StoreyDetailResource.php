<?php

namespace Modules\EMap\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Plan\Transformers\MapFeeResource;

class StoreyDetailResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id ?? '',
            'map_fee_id' => $this->map_fee_id ?? '',
            'area_of_proposed_construction' => $this->area_of_proposed_construction ?? '',
            'area_of_former_construction' => $this->area_of_former_construction ?? '',
            'total_area' => $this->total_area ?? '',
            'height' => $this->height ?? '',
            'mapFee' => MapFeeResource::make($this->whenLoaded('mapFee'))
        ];
    }
}
