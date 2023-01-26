<?php

namespace Modules\Plan\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Modules\EMap\Entities\EMapTemplate;
use Modules\EMap\Enums\NoticeTypeEnum;
use Modules\EMap\Enums\PostsEnum;
use Modules\Plan\Entities\PlanTemplate;
use Modules\Plan\Enums\PlanTemplateTypeEnum;

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
                'ठेक्का स्वीकृतीको निर्णय मिति' => '[@projectBidDetail.contract_acceptance_decision_date]',
                'ठेक्का विलो प्रतिशत' => '[@projectBidDetail.contract_percentage]',
                'ठेकेदारको नाम' => '[@projectBidDetail.contractor_name]',
                'ठेकेदारको ठेगाना' => '[@projectBidDetail.contractor_address]',
                'सम्पर्क नम्बर' => '[@projectBidDetail.contractor_phone]',
                'कबोल अंक' => '[@projectBidDetail.confession_number]',
                'ठेक्का सम्झौता मिति' => '[@projectBidDetail.contract_agreement_date]',
                'कार्यादेशको मिति' => '[@projectBidDetail.contract_assigned_date]',
                'विडवण्ड रकम' => '[@projectBidDetail.bid_bond_amount]',
                'विडवण्ड नं.' => '[@projectBidDetail.bid_bond_no]',
                'विडवण्ड बैंकको नाम' => '[@projectBidDetail.bid_bond_bank_name]',
                'विडवण्ड जारी मिति' => '[@projectBidDetail.bid_bond_issue_date]',
                'विडवण्ड म्याद सकिने मिति' => '[@projectBidDetail.bid_bond_expiry_date]',
                'परफरमेन्स वण्ड नं.' => '[@projectBidDetail.performance_bond_no]',
                'परफरमेन्स वण्ड रकम' => '[@projectBidDetail.performance_bond_amount]',
                'परफरमेन्स वण्ड बैंकको नाम' => '[@projectBidDetail.performance_bond_bank]',
                'परफरमेन्स वण्ड जारी मिति' => '[@projectBidDetail.performance_bond_issue_date]',
                'परफरमेन्स वण्ड म्याद सकिने मिति' => '[@projectBidDetail.performance_bond_expiry_date]',
                'परफरमेन्स वण्ड म्याद थपको मिति' => '[@projectBidDetail.performance_bond_extended_date]',
                'इन्स्योरेन्स जारी मिति' => '[@projectBidDetail.insurance_issue_date]',
                'इन्स्योरेन्स सकिने मिति' => '[@projectBidDetail.insurance_expiry_date]',
                'इन्स्योरेन्स म्याद थप हुने मिति' => '[@projectBidDetail.insurance_extended_date]',
            ],
        ],
        [
            'title' => 'मोविलाईजेशन पेश्की/रनिङ विल विवरण',
            'data' => [
                'विवरण' => '[@projectBidSubmissions]',
            ],
        ],
    ];

    public function getTemplateDataAttribute(): Collection
    {
        return $this->getPlanTemplates()->map(function ($planTemplate) {
            $data = $this->getData($planTemplate->data);

            return [
                'type' => $planTemplate->type,
                'data' => $data,
            ];
        });
    }

    public function getSpecificTemplateData(PlanTemplateTypeEnum $planTemplateTypeEnum): string
    {
        $planTemplates = $this->getPlanTemplates();
        $planTemplate = $planTemplates->where('type', $planTemplateTypeEnum);
        if (!empty($this->operated_through)) {
            $planTemplate = $planTemplate->where('template_for', $this->operated_through);
        }
        $planTemplate = $planTemplate->first();

        if ($planTemplate) {
            return $this->getData($planTemplate->data);
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
            $this->getProjectReplacement(),
            $this->getProjectCostDetailReplacement(),
            $replace
        );

        return Str::replace(array_keys($replace), $replace, $data);
    }

    public function getProjectReplacement(): array
    {
        return [
            '[@project_name]' => $this->project_name ?? '',
            '[@registration_no]' => $this->registration_no ?? '',
            '[@plan_area]' => $this->planArea->area_name ?? '',
            '[@project_status]' => $this->project_status?->label() ?? '',
            '[@project_start_date]' => $this->project_start_date ?? '',
            '[@project_completion_date]' => $this->project_completion_date ?? '',
            '[@plan_level]' => $this->planLevel->level_name ?? '',
            '[@ward_no]' => $this->ward_no ?? '',
            '[@budget_source]' => $this->budgetSource->source_name ?? '',
            '[@budget_head]' => $this->budgetHead->title ?? '',
            '[@allocated_amount]' => $this->allocated_amount ?? '',
            '[@project_venue]' => $this->project_venue ?? '',
            '[@purpose]' => $this->purpose ?? '',
            '[@operated_through]' => $this->operated_through ?? '',
            '[@extended_date]' => $this->extended_date ?? '',
            '[@progress_spent_amount]' => $this->progress_spent_amount ?? '',
            '[@physical_progress_target]' => $this->physical_progress_target ?? '',
            '[@physical_progress_completed]' => $this->physical_progress_completed ?? '',
            '[@physical_progress_unit]' => $this->physical_progress_unit ?? '',
        ];
    }

    public function getProjectCostDetailReplacement(): array
    {
        return [
            '[@projectCostDetail.estimated_total_cost]' => $this->projectCostDetail->estimated_total_cost ?? '',
            '[@projectCostDetail.federal_invest]' => $this->projectCostDetail->federal_invest ?? '',
            '[@projectCostDetail.province_invest]' => $this->projectCostDetail->province_invest ?? '',
            '[@projectCostDetail.local_level_invest]' => $this->projectCostDetail->local_level_invest ?? '',
            '[@projectCostDetail.consumer_committee_invest]' => $this->projectCostDetail->consumer_committee_invest ?? '',
            '[@projectCostDetail.ngo_invest]' => $this->projectCostDetail->ngo_invest ?? '',
            '[@projectCostDetail.foreign_donor_invest]' => $this->projectCostDetail->foreign_donor_invest ?? '',
            '[@projectCostDetail.others_invest]' => $this->projectCostDetail->others_invest ?? '',
            '[@projectCostDetail.estimated_cost_excluding_vat]' => $this->projectCostDetail->estimated_cost_excluding_vat ?? '',
            '[@projectCostDetail.benefited_organization]' => $this->projectCostDetail->benefited_organization??'',
            '[@projectCostDetail.others_benefited]' => $this->projectCostDetail->others_benefited ?? '',
         ];
    }
//
//    private function getMapApplyReplacement(): array
//    {
//        return [
//            '[@registration_no]' => $this->registration_no ?? '',
//            '[@registration_date]' => $this->registration_date ?? '',
//            '[@construction_type]' => $this->construction_type?->label() ?? '',
//            '[@usage]' => $this->usage?->label() ?? '',
//            '[@building_category]' => $this->building_category?->label() ?? '',
//            '[@structureType]' => $this->structureType->title ?? '',
//            '[@current_storey]' => $this->current_storey ?? '',
//            '[@future_storey]' => $this->future_storey ?? '',
//            '[@area_of_plinth]' => $this->area_of_plinth ?? '',
//            '[@length]' => $this->length ?? '',
//            '[@breadth]' => $this->breadth ?? '',
//            '[@height]' => $this->height ?? '',
//        ];
//    }
//
//    private function getLandDetailReplacement(): array
//    {
//        return [
//            '[@landDetail.land_use_area]' => $this->landDetail->land_use_area ?? '',
//            '[@landDetail.ward_no]' => $this->landDetail->ward_no ?? '',
//            '[@landDetail.former_ward_no]' => $this->landDetail->former_ward_no ?? '',
//            '[@landDetail.tole]' => $this->landDetail->tole ?? '',
//            '[@landDetail.street_code_no]' => $this->landDetail->street_code_no ?? '',
//            '[@landDetail.plot_no]' => $this->landDetail->plot_no ?? '',
//            '[@landDetail.area]' => $this->landDetail->area ?? '',
//            '[@landDetail.percentage_of_area_covered_by_building]' => $this->landDetail->percentage_of_area_covered_by_building ?? '',
//        ];
//    }
//
//    private function getLandOwnerReplacement(): array
//    {
//        return [
//            '[@landOwner.land_owner_type]' => $this->landOwner->land_owner_type->label() ?? '',
//            '[@landOwner.name]' => $this->landOwner->name ?? '',
//            '[@landOwner.phone]' => $this->landOwner->phone ?? '',
//            '[@landOwner.father_name]' => $this->landOwner->father_name ?? '',
//            '[@landOwner.grandfather_name]' => $this->landOwner->grandfather_name ?? '',
//            '[@landOwner.citizenship_issue_district]' => $this->landOwner->citizenshipIssueDistrict->district ?? '',
//            '[@landOwner.citizenship_no]' => $this->landOwner->citizenship_no ?? '',
//            '[@landOwner.citizenship_issue_date]' => $this->landOwner->citizenship_issue_date ?? '',
//            '[@landOwner.address]' => $this->landOwner->address ?? '',
//            '[@landOwner.local_body]' => $this->landOwner->local_body ?? '',
//            '[@landOwner.ward_no]' => $this->landOwner->ward_no ?? '',
//        ];
//    }
//
//    private function getHouseOwnerReplacement(): array
//    {
//        return [
//            '[@houseOwner.name]' => $this->houseOwner->name ?? '',
//            '[@houseOwner.phone]' => $this->houseOwner->phone ?? '',
//            '[@houseOwner.father_name]' => $this->houseOwner->father_name ?? '',
//            '[@houseOwner.grandfather_name]' => $this->houseOwner->grandfather_name ?? '',
//            '[@houseOwner.citizenship_issue_district]' => $this->houseOwner->citizenshipIssueDistrict->district ?? '',
//            '[@houseOwner.citizenship_no]' => $this->houseOwner->citizenship_no ?? '',
//            '[@houseOwner.citizenship_issue_date]' => $this->houseOwner->citizenship_issue_date ?? '',
//            '[@houseOwner.address]' => $this->houseOwner->address ?? '',
//            '[@houseOwner.local_body]' => $this->houseOwner->local_body ?? '',
//            '[@houseOwner.ward_no]' => $this->houseOwner->ward_no ?? '',
//        ];
//    }
//
//    private function getFourFortsReplacement(): array
//    {
//        return [
//            '[@fourForts]' => (string)View::make('emap::inc.four_forts_table', [
//                'fourForts' => $this->fourForts,
//            ]),
//        ];
//    }

//    private function getDesignerDetailsReplacement(): array
//    {
//        $designerDetail = $this->designerDetails->where('post', PostsEnum::DESIGNER)->first();
//
//        return [
//            '[@designerDetail.name]' => $designerDetail->name ?? '',
//            '[@designerDetail.father_name]' => $designerDetail->father_name ?? '',
//            '[@designerDetail.phone]' => $designerDetail->name ?? '',
//            '[@designerDetail.address]' => $designerDetail->address ?? '',
//            '[@designerDetail.local_body]' => $designerDetail->local_body ?? '',
//            '[@designerDetail.ward_no]' => $designerDetail->ward_no ?? '',
//            '[@designerDetail.nec_council_no]' => $designerDetail->nec_council_no ?? '',
//            '[@designerDetail.local_body_registration_no]' => $designerDetail->local_body_registration_no ?? '',
//            '[@designerDetail.consulting_firm_name]' => $designerDetail->consulting_firm_name ?? '',
//        ];
//    }

    /**
     * @return mixed
     */
    public function getPlanTemplates(): mixed
    {
        return Cache::rememberForever('plan_templates', function () {
            return PlanTemplate::all();
        });
    }
}
