<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin\Api;

use App\Models\Settings\OfficeSetting;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\JudicialCommittee\Entities\ComplainantDefendant;
use Modules\JudicialCommittee\Entities\ComplaintApplication;
use Modules\JudicialCommittee\Entities\ComplaintSubject;
use Modules\JudicialCommittee\Enums\ComplainantDefendantTypeEnum;
use Modules\JudicialCommittee\Enums\ComplaintApplicationStatusEnum;
use Modules\JudicialCommittee\Http\Requests\ComplaintRegistration\StoreComplaintRegistrationRequest;
use Illuminate\Support\Facades\DB;
use Workbench\App\Models\User;
use Illuminate\Support\Str;

class ComplaintRegistartionApiController extends Controller
{
    public function complaintRegistration(StoreComplaintRegistrationRequest $request)
    {        
        $data = DB::transaction(function () use ($request) {
            $complaintRegistration = ComplaintApplication::create($request->validated() + [
                'fiscal_year_id' => OfficeSetting::first()->fiscal_year_id,
                'mobile_user_id' => auth()->id(),
                'submission_no' => time(),
            ]);

            foreach ($request->validated()['complainantDefendents'] as $complainantDefendant) {
                $complaintRegistration->complainantDefendants()->create($complainantDefendant + [
                    'type' => ComplainantDefendantTypeEnum::COMPLAINANT
                ]
                );
            }

            foreach ($request->validated()['witnesses'] as $witness) {
                $complaintRegistration->witnesses()->create($witness
                    + ['type' => 'wintesses']
                );
            }
            
            foreach ($request->validated()['supportedDocuments'] as $supportedDocument) {
                $complaintRegistration->supportedDocuments()->create($supportedDocument
                + ['type' => ComplainantDefendantTypeEnum::COMPLAINANT]);
            }
            foreach ($request->validated()['relatedMembers'] as $relatedMember) {
                $complaintRegistration->relatedMembers()->create($relatedMember);
            }
            return $complaintRegistration;
        });

        return response()->json([
            'message' => 'Complaint Registered Successfully'
        ], 201);
    }
  
  public function complaintRegistrationSetting()
    {
        return [
            'complaintSubjects'=> ComplaintSubject::selectRaw('id,subject')->get()


        ];
    }
}
