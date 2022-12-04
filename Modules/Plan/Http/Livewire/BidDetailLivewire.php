<?php

namespace Modules\Plan\Http\Livewire;

use Livewire\Component;
use Modules\Plan\Entities\Project;
use Modules\Plan\Entities\ProjectBidDetail;

class BidDetailLivewire extends Component
{
    public Project $project;

    public array $form = [
        'cost_estimation' => 0,
        'notice_published_date' => null,
        'newspaper_name' => null,
        'contract_evaluation_decision_date' => null,
        'intent_notice_publish_date' => null,
        'contract_newspaper_name' => null,
        'contract_acceptance_decision_date' => null,
        'contract_percentage' => 0,
        'contractor_name' => null,
        'contractor_address' => null,
        'contractor_phone' => null,
        'confession_number' => null,
        'contract_agreement_date' => null,
        'contract_assigned_date' => null,
        'bid_bond_amount' => 0,
        'bid_bond_no' => null,
        'bid_bond_bank_name' => null,
        'bid_bond_issue_date' => null,
        'bid_bond_expiry_date' => null,
        'performance_bond_no' => null,
        'performance_bond_amount' => 0,
        'performance_bond_bank' => null,
        'performance_bond_issue_date' => null,
        'performance_bond_expiry_date' => null,
        'performance_bond_extended_date' => null,
        'insurance_issue_date' => null,
        'insurance_expiry_date' => null,
        'insurance_extended_date' => null
    ];

    protected $listeners = [
        'noticePublishedDateChanged',
        'contractEvaluationDecisionDateChanged',
        'intentNoticePublishDateChanged',
        'contractAcceptanceDecisionDateChanged',
        'contractAgreementDateChanged',
        'contractAssignedDateChanged',
        'bidBondIssueDateChanged',
        'bidBondExpiryDateChanged',
        'performanceBondIssueDateChanged',
        'performanceBondExpiryDateChanged',
        'performanceBondExtendedDateChanged',
        'insuranceIssueDateChanged',
        'insuranceExpiryDateChanged',
        'insuranceExtendedDateChanged'
    ];

    public function mount($project)
    {
        $this->getBidDetailData($project);
    }

    public function noticePublishedDateChanged($nepaliDate, $englishDate)
    {
        $this->form['notice_published_date'] = $nepaliDate;
    }

    public function contractEvaluationDecisionDateChanged($nepaliDate, $englishDate)
    {
        $this->form['contract_evaluation_decision_date'] = $nepaliDate;
    }

    public function intentNoticePublishDateChanged($nepaliDate, $englishDate)
    {
        $this->form['intent_notice_publish_date'] = $nepaliDate;
    }

    public function contractAcceptanceDecisionDateChanged($nepaliDate, $englishDate)
    {
        $this->form['contract_acceptance_decision_date'] = $nepaliDate;
    }

    public function contractAgreementDateChanged($nepaliDate, $englishDate)
    {
        $this->form['contract_agreement_date'] = $nepaliDate;
    }

    public function contractAssignedDateChanged($nepaliDate, $englishDate)
    {
        $this->form['contract_assigned_date'] = $nepaliDate;
    }

    public function bidBondIssueDateChanged($nepaliDate, $englishDate)
    {
        $this->form['bid_bond_issue_date'] = $nepaliDate;
    }

    public function bidBondExpiryDateChanged($nepaliDate, $englishDate)
    {
        $this->form['bid_bond_expiry_date'] = $nepaliDate;
    }

    public function performanceBondIssueDateChanged($nepaliDate, $englishDate)
    {
        $this->form['performance_bond_issue_date'] = $nepaliDate;
    }

    public function performanceBondExpiryDateChanged($nepaliDate, $englishDate)
    {
        $this->form['performance_bond_expiry_date'] = $nepaliDate;
    }

    public function performanceBondExtendedDateChanged($nepaliDate, $englishDate)
    {
        $this->form['performance_bond_extended_date'] = $nepaliDate;
    }

    public function insuranceIssueDateChanged($nepaliDate, $englishDate)
    {
        $this->form['insurance_issue_date'] = $nepaliDate;
    }

    public function insuranceExpiryDateChanged($nepaliDate, $englishDate)
    {
        $this->form['insurance_expiry_date'] = $nepaliDate;
    }

    public function insuranceExtendedDateChanged($nepaliDate, $englishDate)
    {
        $this->form['insurance_extended_date'] = $nepaliDate;
    }

    public function getBidDetailData($project)
    {
        $this->project = $project->load('projectBidDetail');
        if ($projectBidDetail = $project->projectBidDetail) {
            foreach ($this->form as $key => $value) {
                $this->form[$key] = $projectBidDetail[$key];
            }
        }
    }

    public function rules(): array
    {
        return [
            'form.cost_estimation' => ['required', 'numeric'],
            'form.notice_published_date' => ['required'],
            'form.newspaper_name' => ['nullable'],
            'form.contract_evaluation_decision_date' => ['nullable'],
            'form.intent_notice_publish_date' => ['nullable'],
            'form.contract_newspaper_name' => ['nullable'],
            'form.contract_acceptance_decision_date' => ['nullable'],
            'form.contract_percentage' => ['required', 'numeric'],
            'form.contractor_name' => ['nullable'],
            'form.contractor_address' => ['nullable'],
            'form.contractor_phone' => ['nullable'],
            'form.confession_number' => ['nullable'],
            'form.contract_agreement_date' => ['nullable'],
            'form.contract_assigned_date' => ['nullable'],
            'form.bid_bond_amount' => ['nullable', 'numeric'],
            'form.bid_bond_no' => ['nullable'],
            'form.bid_bond_bank_name' => ['nullable'],
            'form.bid_bond_issue_date' => ['nullable'],
            'form.bid_bond_expiry_date' => ['nullable'],
            'form.performance_bond_no' => ['nullable'],
            'form.performance_bond_amount' => ['nullable', 'numeric'],
            'form.performance_bond_bank' => ['nullable'],
            'form.performance_bond_issue_date' => ['nullable'],
            'form.performance_bond_expiry_date' => ['nullable'],
            'form.performance_bond_extended_date' => ['nullable'],
            'form.insurance_issue_date' => ['nullable'],
            'form.insurance_expiry_date' => ['nullable'],
            'form.insurance_extended_date' => ['nullable']
        ];
    }

    public function submitFormData()
    {
        ProjectBidDetail::updateOrCreate(
            ['project_id' => $this->project->id],
            $this->validate()['form']
        );

        $this->dispatchBrowserEvent('toast_message', [
            'type' => 'success',
            'title' => 'बोलपत्र विवरण सफलतापूर्वक अद्यावधिक गरियो',
        ]);
    }

    public function render()
    {
        return view('plan::livewire.bid-detail-livewire');
    }
}
