<?php

namespace Modules\Plan\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Plan\Entities\Project;
use Modules\Plan\Entities\ProjectBidDetail;
use Modules\Plan\Enums\ProjectStatusEnum;

class ProjectBidDetailController extends Controller
{
    public function index(Project $project)
    {
        return redirect(route('admin.plan.project.projectBidDetail.create',$project));

        return view('plan::admin.project_bid_detail.index', compact('project'));
    }

    public function create(Project $project)
    {
        return view('plan::admin.project_bid_detail.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $validated = $request->validate([
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

        toast('बोलपत्र विवरण सफलतापूर्वक अद्यावधिक गरियो','success');
        return redirect(route('admin.plan.project.index'));
    }

    public function show($id)
    {
        return view('plan::show');
    }

    public function edit($id)
    {
        return view('plan::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
