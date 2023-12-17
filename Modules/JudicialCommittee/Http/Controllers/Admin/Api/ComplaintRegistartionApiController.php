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

    // public function complaintRegistration(StoreComplaintRegistrationRequest $request)
    // {
    //     $data = DB::transaction(function () use ($request) {
    //         $validatedData = $request->validated();

    //         $complaintRegistration = ComplaintApplication::create([
    //             'fiscal_year_id' => \officeSetting()->fiscal_year_id,
    //             'submission_no' => \officeSetting()->fiscalYear->title . '-' . Str::padLeft(ComplaintApplication::max('id') + 1, 4, 0),
    //             // 'subject' => ComplaintSubject::find($this->'complaint_subject_id')->subject ?? null,
    //             // 'application_status' => ComplaintApplicationStatusEnum::PENDING
    //         ] + $validatedData);

    //         $complainantDefendantsData = $validatedData['complainantDefendants'];
    //         $complainantDefendants = [];
    //         foreach ($complainantDefendantsData as $defendantData) {
    //             $complainantDefendants[] = new ComplainantDefendant([
    //                 'defendant_type' => $defendantData['defendant_type'],
    //                 // Add other fields as needed
    //             ]);
    //         }
    //         $complaintRegistration->complainantDefendants()->saveMany($complainantDefendants);

    //         $relatedMembersData = $validatedData['relatedMembers'];
    //         $complaintRegistration->relatedMembers()->createMany($relatedMembersData);

    //         $supportedDocumentsData = $validatedData['supportedDocuments'];
    //         $complaintRegistration->supportedDocuments()->createMany($supportedDocumentsData);

    //         return $complaintRegistration;
    //     });

    //     return response()->json([
    //         'message' => 'Complaint Applied Successfully',
    //     ], 201);
    // }

    public function complaintRegistration(StoreComplaintRegistrationRequest $request)
    {
        // return $request->validated();
        
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

}
