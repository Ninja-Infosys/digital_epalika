<?php

namespace Modules\EMap\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class BuildingStoreyDetailResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id ?? '',
            'storey' => $this->storey ?? '',
            'area_of_former_construction' => $this->area_of_former_construction ?? '',
            'land_area' => $this->land_area ?? '',
            'remarks' => $this->remarks ?? '',
        ];
    }
}
