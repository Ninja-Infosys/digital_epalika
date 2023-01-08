<?php

namespace Modules\JudicialCommittee\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ComplaintApplicationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'आर्थिक बर्ष' => $this->fiscal_year ?? '',
            'सबमिशन नं.' => $this->submission_no ?? '',
            'दर्ता नम्बर' => $this->registration_no ?? '',
            'मुद्दा प्रकृति' => $this->lawsuit_nature ?? '',
            'निवेदकको नाम' => $this->applicant_name ?? '',
            'निवेदकको फोन' => $this->applicant_phone ?? '',
            'निवेदकको ठेगाना' => $this->applicant_address ?? '',
        ];
    }
}
