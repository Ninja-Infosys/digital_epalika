<?php

namespace Modules\Plan\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;
use Modules\Plan\Entities\ConsumerCommittee;
use Modules\Plan\Entities\ConsumerCommitteeOfficial;
use Modules\Plan\Entities\Project;
use Modules\Plan\Entities\ProjectBidDetail;
use Modules\Plan\Enums\ConsumerCommitteePostEnum;
use Modules\Plan\Enums\ProjectStatusEnum;

class ProjectAgreementController extends Controller
{
    public function index(Project $project)
    {
        return view('plan::admin.project_agreement.index', compact('project'));
    }

    public function storeConsumerCommittee(Request $request, Project $project)
    {
        $request->validate([
            'name' => ['required'],
            'address' => ['nullable'],
            'phone' => ['nullable'],
            'formation_date' => ['required'],
            'committee_registration_date' => ['required'],
            'meeting_date' => ['nullable'],
            'registration_no' => ['required'],
            'beneficiary_no' => ['required', 'integer'],
            'experience_in_project' => ['nullable'],
            'consumerCommitteeOfficials' => ['nullable', 'array'],
            'consumerCommitteeOfficials.*.post' => ['required', new Enum(ConsumerCommitteePostEnum::class)],
            'consumerCommitteeOfficials.*.name' => ['required'],
            'consumerCommitteeOfficials.*.father_name' => ['nullable'],
            'consumerCommitteeOfficials.*.grandfather_name' => ['nullable'],
            'consumerCommitteeOfficials.*.address' => ['nullable'],
            'consumerCommitteeOfficials.*.gender' => ['nullable'],
            'consumerCommitteeOfficials.*.phone' => ['nullable'],
            'consumerCommitteeOfficials.*.citizenship_no' => ['nullable'],
            'contract_date' => ['required'],
            'project_start_date' => ['required'],
            'project_completion_date' => ['required', 'after:form.project_start_date'],
        ]);

        DB::transaction(function () use ($project, $request) {
            $project->update([
                'is_contracted' => 1,
                'project_status' => ProjectStatusEnum::IN_PROGRESS,
                'contract_date' => $request->input('contract_date'),
                'project_start_date' => $request->input('project_start_date'),
                'project_completion_date' => $request->input('project_completion_date')
            ]);

            $consumerCommittee = ConsumerCommittee::updateOrCreate(
                ['project_id' => $project->id],
                [
                    'name' => $request->input('name'),
                    'address' => $request->input('address'),
                    'phone' => $request->input('phone'),
                    'formation_date' => $request->input('formation_date'),
                    'committee_registration_date' => $request->input('committee_registration_date'),
                    'meeting_date' => $request->input('meeting_date'),
                    'registration_no' => $request->input('registration_no'),
                    'beneficiary_no' => $request->input('beneficiary_no'),
                    'experience_in_project' => $request->input('experience_in_project')
                ]
            );
            foreach ($request->input('consumerCommitteeOfficials') as $consumerCommitteeOfficial) {
                ConsumerCommitteeOfficial::updateOrCreate(
                    ['consumer_committee_id' => $consumerCommittee->id, 'id' => $consumerCommitteeOfficial['id'] ?? null],
                    $consumerCommitteeOfficial
                );
            }
            $project->consumerCommittee?->consumerCommitteeOfficials()->whereNotIn('id', Arr::pluck($request->input('consumerCommitteeOfficials'), 'id'))->delete();
        });

        toast('उपभोक्ता समिति सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.plan.project.index'));
    }

    public function storeProjectBidDetail(Request $request, Project $project)
    {
        $validated = $request->validate([
            'bid_no' => ['nullable'],
            'cost_estimation' => ['required', 'numeric'],
            'notice_published_date' => ['required'],
            'newspaper_name' => ['nullable'],
            'contract_evaluation_decision_date' => ['nullable'],
            'intent_notice_publish_date' => ['nullable'],
            'contract_newspaper_name' => ['nullable'],
            'contract_acceptance_decision_date' => ['nullable'],
            'contract_percentage' => ['required', 'numeric'],
            'contractor_name' => ['nullable'],
            'contractor_address' => ['nullable'],
            'contractor_phone' => ['nullable'],
            'confession_number' => ['nullable'],
            'contract_agreement_date' => ['nullable'],
            'contract_assigned_date' => ['nullable'],
            'bid_bond_amount' => ['nullable', 'numeric'],
            'bid_bond_no' => ['nullable'],
            'bid_bond_bank_name' => ['nullable'],
            'bid_bond_issue_date' => ['nullable'],
            'bid_bond_expiry_date' => ['nullable'],
            'performance_bond_no' => ['nullable'],
            'performance_bond_amount' => ['nullable', 'numeric'],
            'performance_bond_bank' => ['nullable'],
            'performance_bond_issue_date' => ['nullable'],
            'performance_bond_expiry_date' => ['nullable'],
            'performance_bond_extended_date' => ['nullable'],
            'insurance_issue_date' => ['nullable'],
            'insurance_expiry_date' => ['nullable'],
            'insurance_extended_date' => ['nullable'],
            'contract_date' => ['required'],
            'project_start_date' => ['required'],
            'project_completion_date' => ['required', 'after:project_start_date'],
        ]);

        DB::transaction(function () use ($project, $validated) {
            $projectBidDetail = ProjectBidDetail::updateOrCreate(
                ['project_id' => $project->id],
                $validated
            );

            $project->update([
                'is_contracted' => 1,
                'project_status' => ProjectStatusEnum::IN_PROGRESS,
                'contract_date' => $validated['contract_date'] ?? null,
                'project_start_date' => $validated['project_start_date'] ?? null,
                'project_completion_date' => $validated['project_completion_date'] ?? null,
            ]);
        });

        toast('बोलपत्र विवरण सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.plan.project.index'));
    }
}
