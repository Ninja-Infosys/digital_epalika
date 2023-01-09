<?php

namespace Modules\JudicialCommittee\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ComplaintApplicationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'आर्थिक बर्ष' => $this->whenLoaded('fiscalYear',function (){
                return $this->fiscalYear->title??'';
            }),
            'सबमिशन नं.' =>  $this->submission_no??'',
            'दर्ता नम्बर' => $this->registration_no ?? '',
            'मुद्दा प्रकृति' => $this->lawsuit_nature ?? '',
            'निवेदकको नाम' => $this->applicant_name ?? '',
            'निवेदकको फोन' => $this->applicant_phone ?? '',
            'निवेदकको ठेगाना' => $this->applicant_address ?? '',
            'वादीको नाम' => $this->complainant_name ?? '',
            'वादीको वडा नं.' => $this->complainant_ward_no ?? '',
            'वादीको टोल' => $this->complainant_tole ?? '',
            'वादीको अभिभावकको नाम' => $this->complainant_guardian_name ?? '',
            'वादी नाता' => $this->complainant_relationship ?? '',
            'वादीको उमेर' => $this->complainant_age ?? '',
            'प्रतिवादीको नाम' => $this->defendant_name ?? '',
            'प्रतिवादीको वार्ड नं.' => $this->defendant_ward_no ?? '',
            'प्रतिवादीको टोल' => $this->defendant_tole ?? '',
            'प्रतिवादीको अभिभावकको नाम' => $this->defendant_guardian_name ?? '',
            'प्रतिवादी नाता' => $this->defendant_relationship ?? '',
            'प्रतिवादीको उमेर' => $this->defendant_age ?? ''
        ];
    }
}
