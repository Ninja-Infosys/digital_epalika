<?php

namespace Modules\Plan\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Modules\EMap\Entities\EMapTemplate;
use Modules\EMap\Enums\NoticeTypeEnum;
use Modules\EMap\Enums\PostsEnum;

trait PlanTemplateTrait
{
    private array $template = [
        [
            'title' => 'आयोजनाको विवरण',
            'data' => [
                'योजना/कार्यक्रमको नाम' => '[@project_name]',
                'दर्ता नं.' => '[@registration_no]',
                'योजनाको क्षेत्र' => '[@plan_area]',
                'योजनाको अबस्था' => '[@project_status]',
                'आयोजना सुरु हुने मिति' => '[@project_start_date]',
                'आयोजना सम्पन्न हुने मिति' => '[@project_completion_date]',
                'योजनाको स्तर' => '[@plan_level]',
                'वडा नं.' => '[@ward_no]',
                'बजेटको श्रोत' => '[@budget_source]',
                'बजेट शिर्षक' => '[@budget_head]',
                'विनियोजित रकम' => '[@allocated_amount]',
                'आयोजना स्थल' => '[@project_venue]',
                'उद्देश्य' => '[@purpose]',
                'खरिद बिधि' => '[@operated_through]',
                'म्याद थप मिति' => '[@extended_date]',
                'वित्तीय प्रगति खर्च रकम' => '[@progress_spent_amount]',
                'भौतिक प्रगति लक्ष्य परिमाण' => '[@physical_progress_target]',
                'भौतिक प्रगति सम्पन्न परिमाण' => '[@physical_progress_completed]',
                'भौतिक प्रगति एकाइ' => '[@physical_progress_unit]',
            ],
        ],
        [
            'title' => 'आयोजनाको लागत सम्वन्धि विवरण',
            'data' => [
                'अनुमानित लागत' => '[@projectCostDetail.estimated_total_cost]',
                'सघंबाट' => '[@projectCostDetail.federal_invest]',
                'प्रदेशबाट' => '[@projectCostDetail.province_invest]',
                'स्थानीय तह/कार्यालय बाट' => '[@projectCostDetail.local_level_invest]',
                'जन श्रमदान/उपभोक्ता समिति बाट' => '[@projectCostDetail.consumer_committee_invest]',
                'गैरसरकारी सघंसंस्थाबाट' => '[@projectCostDetail.ngo_invest]',
                'विदेशी दात्री सघंसंस्थाबाट' => '[@projectCostDetail.foreign_donor_invest]',
                'अन्य लगानी' => '[@projectCostDetail.others_invest]',
                'लागत अनुमान (भ्याट, ओभर हेड, कन्टिन्जेन्सी बाहेक)' => '[@projectCostDetail.estimated_cost_excluding_vat]',
                'बस्तुगत अनुदान सम्बन्धी विवरण' => '[@projectGrantDetails]',
                'संगठित संस्था' => '[@projectCostDetail.benefited_organization]',
                'अन्य' => '[@projectCostDetail.others_benefited]',
                'योजनाबाट प्रत्यक्ष रुपमा लाभान्वित हुने घरधुरी तथा जनसंख्याको विवरण' => '[@benefitedMemberDetails]',
            ],
        ],
        [
            'title' => 'उपभोक्ता समिति/समुदायमा आधारित संस्था/गैरसरकारी संस्थाको विवरण',
            'data' => [
                'उपभोक्त्ता समितिको नाम' => '[@consumerCommittee.name]',
                'ठेगाना' => '[@consumerCommittee.address]',
                'सम्पर्क नं.' => '[@consumerCommittee.phone]',
                'गठन भएको मिति' => '[@consumerCommittee.formation_date]',
                'समिती दर्ता मिति' => '[@consumerCommittee.committee_registration_date]',
                'बैठक बसेको मिति' => '[@consumerCommittee.meeting_date]',
                'समिती दर्ता नं.' => '[@consumerCommittee.registration_no]',
                'गठन गर्दा उपस्थित लाभान्वितको संख्या' => '[@consumerCommittee.beneficiary_no]',
                'सदस्य संख्या' => '[@consumerCommittee.member_number]',
                'आयोजना संचालन सम्बन्धी अनुभव' => '[@consumerCommittee.experience_in_project]',
                'उपभोक्ता समिति सदस्य विवरण' => '[@consumerCommittee.consumerCommitteeOfficials]',
            ],
        ],
        [
            'title' => 'उपभोक्ता समिति समुदायमा अधारित संस्था गैरसरकारी संस्थाले प्राप्त गर्ने किस्ता विवरण: ',
            'data' => [
                'विवरण' => '[@projectInstallmentDetails]',
            ],
        ],
        [
            'title' => 'बोलपत्र सम्वन्धि विवरण',
            'data' => [
                'कार्यालयको स्वीकृत विभागिय लागत अनुमान' => '[@projectBidDetail.cost_estimation]',
                'बोलपत्रको सुचना प्रकाशित मिति' => '[@projectBidDetail.notice_published_date]',
                'पत्रिकाको नाम' => '[@projectBidDetail.newspaper_name]',
                'ठेक्का मुल्यांकनको निर्णय मिति' => '[@projectBidDetail.contract_evaluation_decision_date]',
                'आशयको सुचना प्रकाशित मिति' => '[@projectBidDetail.intent_notice_publish_date]',
                'ठेक्का पत्रिकाको नाम' => '[@projectBidDetail.contract_newspaper_name]',
            ],
        ],
    ];

    public function getTemplateDataAttribute(): Collection
    {
        return $this->getEmapTemplates()->map(function ($applicationTemplate) {
            $data = $this->getData($applicationTemplate->data);

            return [
                'for' => $applicationTemplate->for,
                'data' => $data,
            ];
        });
    }

    public function getSpecificTemplateData(NoticeTypeEnum $noticeTypeEnum): string
    {
        $eMapTemplate = $this->getEmapTemplates();
        $mapTemplate = $eMapTemplate->where('for', $noticeTypeEnum)->where('status',1)->first();

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
            $this->getMapApplyReplacement(),
            $replace,
            $this->getLandDetailReplacement(),
            $this->getLandOwnerReplacement(),
            $this->getHouseOwnerReplacement(),
            $this->getFourFortsReplacement(),
            $this->getApplicantDetailReplacement(),
            $this->getCriteriaDetailsReplacement(),
            $this->getBuildingDetailsReplacement(),
            $this->getDesignerDetailsReplacement(),
            $this->getSupervisorDetailsReplacement(),
            $this->getContractorDetailsReplacement()
        );

        return Str::replace(array_keys($replace), $replace, $data);
    }

    private function getMapApplyReplacement(): array
    {
        return [
            '[@registration_no]' => $this->registration_no ?? '',
            '[@registration_date]' => $this->registration_date ?? '',
            '[@construction_type]' => $this->construction_type?->label() ?? '',
            '[@usage]' => $this->usage?->label() ?? '',
            '[@building_category]' => $this->building_category?->label() ?? '',
            '[@structureType]' => $this->structureType->title ?? '',
            '[@current_storey]' => $this->current_storey ?? '',
            '[@future_storey]' => $this->future_storey ?? '',
            '[@area_of_plinth]' => $this->area_of_plinth ?? '',
            '[@length]' => $this->length ?? '',
            '[@breadth]' => $this->breadth ?? '',
            '[@height]' => $this->height ?? '',
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

    private function getLandOwnerReplacement(): array
    {
        return [
            '[@landOwner.land_owner_type]' => $this->landOwner->land_owner_type->label() ?? '',
            '[@landOwner.name]' => $this->landOwner->name ?? '',
            '[@landOwner.phone]' => $this->landOwner->phone ?? '',
            '[@landOwner.father_name]' => $this->landOwner->father_name ?? '',
            '[@landOwner.grandfather_name]' => $this->landOwner->grandfather_name ?? '',
            '[@landOwner.citizenship_issue_district]' => $this->landOwner->citizenshipIssueDistrict->district ?? '',
            '[@landOwner.citizenship_no]' => $this->landOwner->citizenship_no ?? '',
            '[@landOwner.citizenship_issue_date]' => $this->landOwner->citizenship_issue_date ?? '',
            '[@landOwner.address]' => $this->landOwner->address ?? '',
            '[@landOwner.local_body]' => $this->landOwner->local_body ?? '',
            '[@landOwner.ward_no]' => $this->landOwner->ward_no ?? '',
        ];
    }

    private function getHouseOwnerReplacement(): array
    {
        return [
            '[@houseOwner.name]' => $this->houseOwner->name ?? '',
            '[@houseOwner.phone]' => $this->houseOwner->phone ?? '',
            '[@houseOwner.father_name]' => $this->houseOwner->father_name ?? '',
            '[@houseOwner.grandfather_name]' => $this->houseOwner->grandfather_name ?? '',
            '[@houseOwner.citizenship_issue_district]' => $this->houseOwner->citizenshipIssueDistrict->district ?? '',
            '[@houseOwner.citizenship_no]' => $this->houseOwner->citizenship_no ?? '',
            '[@houseOwner.citizenship_issue_date]' => $this->houseOwner->citizenship_issue_date ?? '',
            '[@houseOwner.address]' => $this->houseOwner->address ?? '',
            '[@houseOwner.local_body]' => $this->houseOwner->local_body ?? '',
            '[@houseOwner.ward_no]' => $this->houseOwner->ward_no ?? '',
        ];
    }

    private function getFourFortsReplacement(): array
    {
        return [
            '[@fourForts]' => (string)View::make('emap::inc.four_forts_table', [
                'fourForts' => $this->fourForts,
            ]),
        ];
    }

    private function getDesignerDetailsReplacement(): array
    {
        $designerDetail = $this->designerDetails->where('post', PostsEnum::DESIGNER)->first();

        return [
            '[@designerDetail.name]' => $designerDetail->name ?? '',
            '[@designerDetail.father_name]' => $designerDetail->father_name ?? '',
            '[@designerDetail.phone]' => $designerDetail->name ?? '',
            '[@designerDetail.address]' => $designerDetail->address ?? '',
            '[@designerDetail.local_body]' => $designerDetail->local_body ?? '',
            '[@designerDetail.ward_no]' => $designerDetail->ward_no ?? '',
            '[@designerDetail.nec_council_no]' => $designerDetail->nec_council_no ?? '',
            '[@designerDetail.local_body_registration_no]' => $designerDetail->local_body_registration_no ?? '',
            '[@designerDetail.consulting_firm_name]' => $designerDetail->consulting_firm_name ?? '',
        ];
    }

    private function getSupervisorDetailsReplacement(): array
    {
        $supervisorDetail = $this->designerDetails->where('post', PostsEnum::SUPERVISOR)->first();

        return [
            '[@supervisorDetail.name]' => $supervisorDetail->name ?? '',
            '[@supervisorDetail.father_name]' => $supervisorDetail->father_name ?? '',
            '[@supervisorDetail.phone]' => $supervisorDetail->name ?? '',
            '[@supervisorDetail.address]' => $supervisorDetail->address ?? '',
            '[@supervisorDetail.local_body]' => $supervisorDetail->local_body ?? '',
            '[@supervisorDetail.ward_no]' => $supervisorDetail->ward_no ?? '',
            '[@supervisorDetail.nec_council_no]' => $supervisorDetail->nec_council_no ?? '',
            '[@supervisorDetail.local_body_registration_no]' => $supervisorDetail->local_body_registration_no ?? '',
            '[@supervisorDetail.consulting_firm_name]' => $supervisorDetail->consulting_firm_name ?? '',
        ];
    }

    private function getContractorDetailsReplacement(): array
    {
        $contractorDetail = $this->designerDetails->where('post', PostsEnum::CONTRACTOR)->first();

        return [
            '[@contractorDetail.name]' => $contractorDetail->name ?? '',
            '[@contractorDetail.father_name]' => $contractorDetail->father_name ?? '',
            '[@contractorDetail.phone]' => $contractorDetail->name ?? '',
            '[@contractorDetail.address]' => $contractorDetail->address ?? '',
            '[@contractorDetail.local_body]' => $contractorDetail->local_body ?? '',
            '[@contractorDetail.ward_no]' => $contractorDetail->ward_no ?? '',
            '[@contractorDetail.nec_council_no]' => $contractorDetail->nec_council_no ?? '',
            '[@contractorDetail.local_body_registration_no]' => $contractorDetail->local_body_registration_no ?? '',
            '[@contractorDetail.consulting_firm_name]' => $contractorDetail->consulting_firm_name ?? '',
        ];
    }

    private function getApplicantDetailReplacement(): array
    {
        return [
            '[@applicantDetail.applicant_type]' => $this->applicantDetail->applicant_type->label() ?? '',
            '[@applicantDetail.relation_with_owner]' => $this->applicantDetail->relation_with_owner->label() ?? '',
            '[@applicantDetail.name]' => $this->applicantDetail->name ?? '',
            '[@applicantDetail.phone]' => $this->applicantDetail->phone ?? '',
            '[@applicantDetail.father_name]' => $this->applicantDetail->father_name ?? '',
            '[@applicantDetail.citizenship_issue_district]' => $this->applicantDetail->citizenshipIssueDistrict->district ?? '',
            '[@applicantDetail.citizenship_no]' => $this->applicantDetail->citizenship_no ?? '',
            '[@applicantDetail.citizenship_issue_date]' => $this->applicantDetail->citizenship_issue_date ?? '',
            '[@applicantDetail.signature_url]' => $this->applicantDetail->signature_url ?? '',
        ];
    }

    private function getCriteriaDetailsReplacement(): array
    {
        return [
            '[@criteriaDetails]' => (string)View::make('emap::inc.criteria_details', [
                'criteriaDetails' => $this->criteriaDetails,
            ]),
        ];
    }

    private function getBuildingDetailsReplacement(): array
    {
        return [
            '[@buildingDetails]' => (string)View::make('emap::inc.building_details', [
                'buildingDetails' => $this->buildingDetails,
            ]),
        ];
    }

    /**
     * @return mixed
     */
    public function getEmapTemplates(): mixed
    {
        return Cache::rememberForever('eMapTemplates', function () {
            return EMapTemplate::all();
        });
    }
}
