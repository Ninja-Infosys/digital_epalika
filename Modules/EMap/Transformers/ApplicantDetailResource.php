<?php

namespace Modules\EMap\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantDetailResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id ?? '',
            'applicant_type' => $this->applicant_type ?? '',
            'relation_with_owner' => $this->relation_with_owner ?? '',
            'name' => $this->name ?? '',
            'address' => $this->address ?? '',
            'phone' => $this->phone ?? '',
            'father_name' => $this->father_name ?? '',
            'citizenship_issue_district_id' => $this->citizenship_issue_district_id ?? '',
            'citizenship_no' => $this->citizenship_no ?? '',
            'citizenship_issue_date' => $this->citizenship_issue_date ?? '',
            'application_date' => $this->application_date ?? '',
            'signature_url' => $this->signature_url ?? '',
            'province_id' => $this->province_id ?? '',
            'district_id' => $this->district_id ?? '',
            'local_body_id' => $this->local_body_id ?? '',
            'tole' => $this->tole ?? '',
            'ward_no' => $this->ward_no ?? '',
        ];
    }
}
