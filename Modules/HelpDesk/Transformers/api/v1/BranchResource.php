<?php

namespace Modules\HelpDesk\Transformers\api\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id ?? '',
            'branch_name' => $this->branch_name ?? '',
            'isExpanded' => false ,
            'branch' => self::collection($this->whenLoaded('branch')),
            'branches' => self::collection($this->whenLoaded('branches')),
            'services' => ServiceResource::collection($this->whenLoaded('services'))
        ];
    }
}
