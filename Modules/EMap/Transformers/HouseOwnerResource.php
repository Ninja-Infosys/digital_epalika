<?php

namespace Modules\EMap\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class HouseOwnerResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id ?? '',
            'name' => $this->name ?? '',
            'phone' => $this->phone ?? '',
            'father_name' => $this->father_name ?? '',
            'grandfather_name' => $this->grandfather_name ?? '',
            'citizenship_issue_district_id' => $this->citizenship_issue_district_id ?? '',
            'citizenship_no' => $this->citizenship_no ?? '',
            'citizenship_issue_date' => $this->citizenship_issue_date ?? '',
            'address' => $this->address ?? '',
            'local_body' => $this->local_body ?? '',
            'ward_no' => $this->ward_no ?? '',
            'document_url' => $this->document_url ?? '',
            'photo_url' => $this->photo_url ?? '',
            'status' => $this->status,
        ];
    }
}
