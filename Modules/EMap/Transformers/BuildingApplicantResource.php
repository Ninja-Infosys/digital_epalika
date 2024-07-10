<?php

namespace Modules\EMap\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class BuildingApplicantResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id ?? '',
            'applicant_type' => $this->applicant_type ?? '',
            'applicant_name' => $this->applicant_name ?? '',
            'applicant_phone' => $this->applicant_phone ?? '',
            'father_name' => $this->father_name ?? '',
            'applicant_age' => $this->applicant_age ?? '',
            'application_date' => $this->application_date ?? '',
            'applicant_signature_url' => $this->applicant_signature_url ?? '',
            'province_id' => $this->province_id ?? '',
            'district_id' => $this->district_id ?? '',
            'local_body_id' => $this->local_body_id ?? '',
            'applicant_tole' => $this->applicant_tole ?? '',
            'applicant_ward_no' => $this->applicant_ward_no ?? '',
        ];
    }
}
