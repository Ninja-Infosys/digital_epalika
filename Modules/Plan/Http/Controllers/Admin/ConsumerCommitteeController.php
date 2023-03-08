<?php

namespace Modules\Plan\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;
use Modules\Plan\Entities\ConsumerCommittee;
use Modules\Plan\Entities\ConsumerCommitteeOfficial;
use Modules\Plan\Entities\Project;
use Modules\Plan\Enums\ConsumerCommitteePostEnum;
use Modules\Plan\Enums\ProjectStatusEnum;

class ConsumerCommitteeController extends Controller
{
    public function index(Project $project)
    {
        return view('plan::admin.consumer_committee.index', compact('project'));
    }

    public function create(Project $project)
    {
        return view('plan::create');
    }

    public function store(Request $request, Project $project)
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
            'member_number' => ['required', 'integer'],
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
                    'member_number' => $request->input('member_number'),
                    'experience_in_project' => $request->input('experience_in_project')
                ]
            );
            foreach ($request->input('consumerCommitteeOfficials') as $consumerCommitteeOfficial) {
                ConsumerCommitteeOfficial::updateOrCreate(
                    ['consumer_committee_id' => $consumerCommittee->id, 'id' => $consumerCommitteeOfficial['id'] ?? null],
                    $consumerCommitteeOfficial
                );
            }
        });

        toast('उपभोक्ता समिति सफलतापूर्वक अद्यावधिक गरियो','success');

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
