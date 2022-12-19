<?php

namespace Modules\HelpDesk\Transformers\api\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceEmployeeResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'employee_name' => $this->employee_name ?? '',
            'photo' => $this->photo_url ?? '',
            'email' => $this->email ?? '',
            'phone' => $this->phone ?? '',
            'designation' => $this->designation ?? '',
        ];
    }
}
