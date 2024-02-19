<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LocalBodyResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id ?? '',
            'local_body' => $this->local_body ?? '',
            'local_body_en' => $this->local_body_en ?? '',
            'ward_no'=>$this->wards ?? 0,
            'wards'=>$this->ward_no ?? [],
        ];
    }
}
