<?php

namespace Modules\EMap\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Plan\Transformers\MapFeeResource;

class StoreyDescriptionResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id ?? '',
            'map_fee_id' => $this->map_fee_id ?? '',
            'length' => $this->length ?? '',
            'width' => $this->width ?? '',
            'height' => $this->height ?? '',
            'mapFee' => MapFeeResource::make($this->whenLoaded('mapFee')),

        ];
    }
}
