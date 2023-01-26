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
            'title' => 'आयोजना मर्मत संम्भार सम्बन्धी व्यवस्था',
            'data' => [
                'जिम्मा लिने समिती संस्थाको नाम' => '[@projectMaintenanceArrangement.office_name',
                'जनश्रमदान' => '[@projectMaintenanceArrangement.public_service',
                'सेवा शुल्क' => '[@projectMaintenanceArrangement.service_fee',
                'दस्तुर, चन्दाबाट' => '[@projectMaintenanceArrangement.from_fee_donation',
                'अन्य केहि भए' => '[@projectMaintenanceArrangement.others'
            ],
        ],
        [
            'title'=>'सम्झौताको शर्तहरु',
            'data'=>[
                'डाटा'=>'[@projectAgreementTerm.data]'
            ],
        ]
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
            $this->getConsumerCommitteeReplacement(),
            $this->getProjectBidDetailReplacement(),
            $this->getProjectMaintenanceArrangementReplacement(),
            $this->getProjectAgreementTermReplacement(),
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
            '[@ward_no]' => implode(',', $this->ward_no ?? ''),
            '[@budget_source]' => $this->budgetSource->source_name ?? '',
            '[@budget_head]' => $this->budgetHead->title ?? '',
            '[@allocated_amount]' => $this->allocated_amount ?? '',
            '[@project_venue]' => $this->project_venue ?? '',
            '[@purpose]' => $this->purpose ?? '',
            '[@operated_through]' => $this->operated_through?->label() ?? '',
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
            '[@projectCostDetail.benefited_organization]' => $this->projectCostDetail->benefited_organization ?? '',
            '[@projectCostDetail.others_benefited]' => $this->projectCostDetail->others_benefited ?? '',
        ];
    }

    public function getConsumerCommitteeReplacement(): array
    {
        return [
            '[@consumerCommittee.name]' => $this->consumerCommittee->name ?? '',
            '[@consumerCommittee.address]' => $this->consumerCommittee->address ?? '',
            '[@consumerCommittee.phone]' => $this->consumerCommittee->phone ?? '',
            '[@consumerCommittee.formation_date]' => $this->consumerCommittee->formation_date ?? '',
            '[@consumerCommittee.committee_registration_date]' => $this->consumerCommittee->committee_registration_date ?? '',
            '[@consumerCommittee.meeting_date]' => $this->consumerCommittee->meeting_date ?? '',
            '[@consumerCommittee.registration_no]' => $this->consumerCommittee->registration_no ?? '',
            '[@consumerCommittee.beneficiary_no]' => $this->consumerCommittee->beneficiary_no ?? '',
            '[@consumerCommittee.member_number]' => $this->consumerCommittee->member_number ?? '',
            '[@consumerCommittee.experience_in_project]' => $this->consumerCommittee->experience_in_project ?? '',
            '[@consumerCommittee.consumerCommitteeOfficials]' => $this->consumerCommittee->consumerCommitteeOfficials ?? '',
        ];
    }

    public function getProjectBidDetailReplacement(): array
    {
        return [
            '[@projectBidDetail.cost_estimation]' => $this->projectBidDetail->cost_estimation ?? '',
            '[@projectBidDetail.notice_published_date]' => $this->projectBidDetail->notice_published_date ?? '',
            '[@projectBidDetail.newspaper_name]' => $this->projectBidDetail->newspaper_name ?? '',
            '[@projectBidDetail.contract_evaluation_decision_date]' => $this->projectBidDetail->contract_evaluation_decision_date ?? '',
            '[@projectBidDetail.intent_notice_publish_date]' => $this->projectBidDetail->intent_notice_publish_date ?? '',
            '[@projectBidDetail.contract_newspaper_name]' => $this->projectBidDetail->contract_newspaper_name ?? '',
            '[@projectBidDetail.contract_acceptance_decision_date]' => $this->projectBidDetail->contract_acceptance_decision_date ?? '',
            '[@projectBidDetail.contract_percentage]' => $this->projectBidDetail->contract_percentage ?? '',
            '[@projectBidDetail.contractor_name]' => $this->projectBidDetail->contractor_name ?? '',
            '[@projectBidDetail.contractor_address]' => $this->projectBidDetail->contractor_address ?? '',
            '[@projectBidDetail.contractor_phone]' => $this->projectBidDetail->contractor_phone ?? '',
            '[@projectBidDetail.confession_number]' => $this->projectBidDetail->confession_number ?? '',
            '[@projectBidDetail.contract_agreement_date]' => $this->projectBidDetail->contract_agreement_date ?? '',
            '[@projectBidDetail.contract_assigned_date]' => $this->projectBidDetail->contract_assigned_date ?? '',
            '[@projectBidDetail.bid_bond_amount]' => $this->projectBidDetail->bid_bond_amount ?? '',
            '[@projectBidDetail.bid_bond_no]' => $this->projectBidDetail->bid_bond_no ?? '',
            '[@projectBidDetail.bid_bond_bank_name]' => $this->projectBidDetail->bid_bond_bank_name ?? '',
            '[@projectBidDetail.bid_bond_issue_date]' => $this->projectBidDetail->bid_bond_issue_date ?? '',
            '[@projectBidDetail.bid_bond_expiry_date]' => $this->projectBidDetail->bid_bond_expiry_date ?? '',
            '[@projectBidDetail.performance_bond_no]' => $this->projectBidDetail->performance_bond_no ?? '',
            '[@projectBidDetail.performance_bond_amount]' => $this->projectBidDetail->performance_bond_amount ?? '',
            '[@projectBidDetail.performance_bond_bank]' => $this->projectBidDetail->performance_bond_bank ?? '',
            '[@projectBidDetail.performance_bond_issue_date]' => $this->projectBidDetail->performance_bond_issue_date ?? '',
            '[@projectBidDetail.performance_bond_expiry_date]' => $this->projectBidDetail->performance_bond_expiry_date ?? '',
            '[@projectBidDetail.performance_bond_extended_date]' => $this->projectBidDetail->performance_bond_extended_date ?? '',
            '[@projectBidDetail.insurance_issue_date]' => $this->projectBidDetail->insurance_issue_date ?? '',
            '[@projectBidDetail.insurance_expiry_date]' => $this->projectBidDetail->insurance_expiry_date ?? '',
            '[@projectBidDetail.insurance_extended_date]' => $this->projectBidDetail->insurance_extended_date ?? '',
        ];
    }

    public function getProjectMaintenanceArrangementReplacement(): array
    {
        return [
            '[@projectMaintenanceArrangement.office_name]' => $this->projectMaintenanceArrangement->office_name ?? '',
            '[@projectMaintenanceArrangement.public_service]' => $this->projectMaintenanceArrangement->public_service ?? '',
            '[@projectMaintenanceArrangement.service_fee]' => $this->projectMaintenanceArrangement->service_fee ?? '',
            '[@projectMaintenanceArrangement.from_fee_donation]' => $this->projectMaintenanceArrangement->from_fee_donation ?? '',
            '[@projectMaintenanceArrangement.others]' => $this->projectMaintenanceArrangement->others ?? '',
        ];
    }

    public function getProjectAgreementTermReplacement(): array
    {
        return [
            '[@projectAgreementTerm.data]' => $this->projectAgreementTerm->data ?? '',
        ];
    }
    public function getPlanTemplates(): mixed
    {
        return Cache::rememberForever('plan_templates', function () {
            return PlanTemplate::all();
        });
    }
}
