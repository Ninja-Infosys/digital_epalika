<?php

namespace Modules\HelpDesk\Transformers\api\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceProcessResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'description' => $this->description ?? '',
        ];
    }
}
