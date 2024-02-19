<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProvinceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id ?? '',
            'province' => $this->province ?? '',
            'province_en' => $this->province_en ?? '',
            'districts' => DistrictResource::collection($this->whenLoaded('districts'))
        ];
    }
}
