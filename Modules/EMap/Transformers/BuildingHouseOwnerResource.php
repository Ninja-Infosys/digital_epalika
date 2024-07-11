<?php

namespace Modules\EMap\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class BuildingHouseOwnerResource extends JsonResource
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
            'province_id'=>$this->province_id ?? '',
            'district_id'=>$this->district_id ?? '',
            'local_body_id'=>$this->local_body_id ?? '',
            'tole'=>$this->tole ?? '',
            'ward_no' => $this->ward_no ?? '',
            'photo_url' => $this->photo_url ?? '',
        ];
    }
}
