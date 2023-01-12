<?php

namespace Modules\JudicialCommittee\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ComplaintApplicationResource extends JsonResource
{
    public function toArray($request): array
    {
        $complaint_applications = $request->input('columns')['complaint_applications'];

        return [
            'आर्थिक बर्ष' => $this->when(in_array('fiscal_year_id', $complaint_applications), $this->fiscalYear->title ?? ''),
            'सबमिशन नं.' => $this->when(in_array('submission_no', $complaint_applications), $this->submission_no ?? ''),
            'दर्ता नम्बर' => $this->when(in_array('registration_no', $complaint_applications), $this->registration_no ?? ''),
            'मुद्दा प्रकृति' => $this->when(in_array('lawsuit_nature_id', $complaint_applications), $this->lawsuitNature->title ?? ''),
            'निवेदकको नाम' => $this->when(in_array('applicant_name', $complaint_applications), $this->applicant_name ?? ''),
            'निवेदकको फोन' => $this->when(in_array('applicant_phone', $complaint_applications), $this->applicant_phone ?? ''),
            'निवेदकको ठेगाना' => $this->when(in_array('applicant_address', $complaint_applications), $this->applicant_address ?? ''),
            'वादीको नाम' => $this->when(in_array('complainant_name', $complaint_applications), $this->complainant_name ?? ''),
            'वादीको अभिभावकको नाम' => $this->when(in_array('complainant_guardian_name', $complaint_applications), $this->complainant_guardian_name ?? ''),
            'वादी नाता' => $this->when(in_array('complainant_relationship', $complaint_applications), $this->complainant_relationship ?? ''),
            'वादीको उमेर' => $this->when(in_array('complainant_age', $complaint_applications), $this->complainant_age ?? ''),
            'वादीको ठेगाना' => $this->when((bool)array_intersect(['complainant_province_id', 'complainant_district_id', 'complainant_local_body_id', 'complainant_ward_no', 'complainant_tole'], $complaint_applications), function () use ($complaint_applications) {
                return $this->resolveComplainantAddress($complaint_applications);
            }),
            'प्रतिवादीको नाम' => $this->when(in_array('defendant_name', $complaint_applications), $this->defendant_name ?? ''),
            'प्रतिवादीको अभिभावकको नाम' => $this->when(in_array('defendant_guardian_name', $complaint_applications), $this->defendant_guardian_name ?? ''),
            'प्रतिवादी नाता' => $this->when(in_array('defendant_relationship', $complaint_applications), $this->defendant_relationship ?? ''),
            'प्रतिवादीको उमेर' => $this->when(in_array('defendant_age', $complaint_applications), $this->defendant_age ?? ''),
            'प्रतिवादीको ठेगाना' => $this->when((bool)array_intersect(['defendant_province_id', 'defendant_district_id', 'defendant_local_body_id', 'defendant_ward_no', 'defendant_tole'], $complaint_applications), function () use ($complaint_applications) {
                return $this->resolveDefendantAddress($complaint_applications);
            }),
            'विषय' => $this->when(in_array('subject', $complaint_applications), $this->subject ?? ''),
            'विवरण' => $this->when(in_array('complaint_detail', $complaint_applications), $this->complaint_detail ?? ''),
            'मिति बि.सं.' => $this->when(in_array('date', $complaint_applications), $this->date ?? ''),
            'मिति इ.सं.' => $this->when(in_array('en_date', $complaint_applications), $this->en_date ?? ''),
            'निवेदकको हस्ताक्षर' => $this->when(in_array('applicant_signature', $complaint_applications), $this->applicant_signature ?? ''),
            'सम्बन्धित सदस्यहरू' => RelatedMemberResource::collection($this->whenLoaded('relatedMembers')),
            'तारिख पर्चा विवरण' => DateSheetResource::collection($this->whenLoaded('dateSheets')),
        ];
    }

    private function resolveComplainantAddress($complaint_applications): string
    {
        $complainant_address = '';
        if (in_array('complainant_local_body_id', $complaint_applications)) {
            $complainant_address .= $this->complainantLocalBody->local_body ?? '';
        }
        if (in_array('complainant_ward_no', $complaint_applications)) {
            $complainant_address .= '-' . ($this->complainant_ward_no ?? '');
        }
        if (in_array('complainant_tole', $complaint_applications)) {
            $complainant_address .= ', ' . ($this->complainant_tole ?? '');
        }
        if (in_array('complainant_district_id', $complaint_applications)) {
            $complainant_address .= ', ' . ($this->complainantDistrict->district ?? '');
        }
        if (in_array('complainant_province_id', $complaint_applications)) {
            $complainant_address .= ', ' . ($this->complainantProvince->province ?? '');
        }
        return $complainant_address;
    }

    private function resolveDefendantAddress($complaint_applications): string
    {
        $defendant_address = '';
        if (in_array('defendant_local_body_id', $complaint_applications)) {
            $defendant_address .= $this->defendantLocalBody->local_body ?? '';
        }
        if (in_array('defendant_ward_no', $complaint_applications)) {
            $defendant_address .= '-' . ($this->defendant_ward_no ?? '');
        }
        if (in_array('defendant_tole', $complaint_applications)) {
            $defendant_address .= ', ' . ($this->defendant_tole ?? '');
        }
        if (in_array('defendant_district_id', $complaint_applications)) {
            $defendant_address .= ', ' . ($this->defendantDistrict->district ?? '');
        }
        if (in_array('defendant_province_id', $complaint_applications)) {
            $defendant_address .= ', ' . ($this->defendantProvince->province ?? '');
        }
        return $defendant_address;
    }
}
