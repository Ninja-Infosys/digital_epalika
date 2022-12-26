<?php

namespace Modules\JudicialCommittee\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Modules\EMap\Enums\NoticeTypeEnum;
use Modules\JudicialCommittee\Entities\JudicialCommitteeTemplate;

trait JudicialCommitteeTemplateTrait
{
    private array $template = [
        [
            'title' => 'निवेदक को विवरण',
            'data' => [
                'आवेदकको नाम' => '[@applicant_name]',
                'आवेदक फोन' => '[@applicant_phone]',
                'आवेदक ठेगाना' => '[@applicant_address]',
            ],
        ],
        [
            'title' => 'वादीको विवरण',
            'data' => [
                'वादीको नाम' => '[@complainant_name]',
                'वादीको उमेर' => '[@complainant_age]',
                'अभिभावकको नाम' => '[@complainant_guardian_name]',
                'नाता' => '[@complainant_relationship]',
                'प्रदेश' => '[@complainant_province]',
                'जिल्ला' => '[@complainant_district]',
                'स्थानीय तह' => '[@complainant_local_body]',
                'वडा नं.' => '[@complainant_ward_no]',
                'टोल' => '[@complainant_tole]'
            ],
        ],
        [
            'title' => 'प्रतिवादी विवरण',
            'data' => [
                'प्रतिवादीको नाम' => '[@defendant_name]',
                'प्रतिवादीको उमेर' => '[@defendant_age]',
                'अभिभावकको नाम' => '[@defendant_guardian_name]',
                'नाता' => '[@defendant_relationship]',
                'प्रदेश' => '[@defendant_province]',
                'जिल्ला' => '[@defendant_district]',
                'स्थानीय तह' => '[@defendant_local_body]',
                'वडा नं.' => '[@defendant_ward_no]',
                'टोल' => '[@defendant_tole]'
            ],
        ],
        [
            'title' => 'उजुरी विवरण',
            'data' => [
                'सबमिशन नं.' => '[@submission_no]',
                'दर्ता नम्बर' => '[@registration_no]',
                'मुद्दा प्रकृति' => '[@lawsuit_nature]',
                'विषय' => '[@subject]',
                'मिति' => '[@date]',
                'विवरण' => '[@complaint_detail]',
            ],
        ],
    ];

    public function getTemplateDataAttribute(): Collection
    {
        return $this->getJudicialCommitteeTemplates()->map(function ($applicationTemplate) {
            $data = $this->getData($applicationTemplate->data);

            return [
                'for' => $applicationTemplate->for,
                'data' => $data,
            ];
        });
    }

    public function getSpecificTemplateData(NoticeTypeEnum $noticeTypeEnum): string
    {
        $eMapTemplate = $this->getJudicialCommitteeTemplates();
        $mapTemplate = $eMapTemplate->where('for', $noticeTypeEnum)->where('status', 1)->first();

        if ($mapTemplate) {
            return $this->getData($mapTemplate->data);
        }

        return '';
    }

    public function getTemplateOptions(): array
    {
        return $this->template;
    }

    private function getData($data): string
    {
        $replace = [];

        $replace = array_merge(
            $this->getComplaintApplicationReplacement(),
            $replace,
            $this->getLandDetailReplacement()
        );

        return Str::replace(array_keys($replace), $replace, $data);
    }

    private function getComplaintApplicationReplacement(): array
    {
        return [
            '[@applicant_name]' => $this->applicant_name ?? '',
            '[@applicant_phone]' => $this->applicant_phone ?? '',
            '[@applicant_address]' => $this->applicant_address ?? '',
            //complainant detail
            '[@complainant_name]' => $this->complainant_name ?? '',
            '[@complainant_age]' => $this->complainant_age ?? '',
            '[@complainant_guardian_name]' => $this->complainant_guardian_name ?? '',
            '[@complainant_relationship]' => $this->complainant_relationship ?? '',
            '[@complainant_province]' => $this->complainantProvince->province ?? '',
            '[@complainant_district]' => $this->complainantDistrict->district ?? '',
            '[@complainant_local_body]' => $this->complainantLocalBody->local_body ?? '',
            '[@complainant_ward_no]' => $this->complainant_ward_no ?? '',
            '[@complainant_tole]' => $this->complainant_tole ?? '',
            //defendant detail
            '[@defendant_name]' => $this->defendant_name ?? '',
            '[@defendant_age]' => $this->defendant_age ?? '',
            '[@defendant_guardian_name]' => $this->defendant_guardian_name ?? '',
            '[@defendant_relationship]' => $this->defendant_relationship ?? '',
            '[@defendant_province]' => $this->defendantProvince->province ?? '',
            '[@defendant_district]' => $this->defendantDistrict->district ?? '',
            '[@defendant_local_body]' => $this->defendantLocalBody->local_body ?? '',
            '[@defendant_ward_no]' => $this->defendant_ward_no ?? '',
            '[@defendant_tole]' => $this->defendant_tole ?? '',
            //complaint details
            '[@submission_no]' => $this->submission_no ?? '',
            '[@registration_no]' => $this->registration_no ?? '',
            '[@lawsuit_nature]' => $this->lawsuitNature->title ?? '',
            '[@subject]' => $this->subject ?? '',
            '[@date]' => $this->date ?? '',
            '[@complaint_detail]' => $this->complaint_detail ?? '',
        ];
    }

    private function getLandDetailReplacement(): array
    {
        return [
            '[@landDetail.land_use_area]' => $this->landDetail->land_use_area ?? '',
            '[@landDetail.ward_no]' => $this->landDetail->ward_no ?? '',
            '[@landDetail.former_ward_no]' => $this->landDetail->former_ward_no ?? '',
            '[@landDetail.tole]' => $this->landDetail->tole ?? '',
            '[@landDetail.street_code_no]' => $this->landDetail->street_code_no ?? '',
            '[@landDetail.plot_no]' => $this->landDetail->plot_no ?? '',
            '[@landDetail.area]' => $this->landDetail->area ?? '',
            '[@landDetail.percentage_of_area_covered_by_building]' => $this->landDetail->percentage_of_area_covered_by_building ?? '',
        ];
    }

    /**
     * @return mixed
     */
    public function getJudicialCommitteeTemplates(): mixed
    {
        return Cache::rememberForever('judicialCommitteeTemplates', function () {
            return JudicialCommitteeTemplate::all();
        });
    }
}
