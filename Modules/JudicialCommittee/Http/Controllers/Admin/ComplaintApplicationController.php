<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\OfficeSetting;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\Grant\Enums\GranteeEnum;
use Modules\JudicialCommittee\Entities\ComplaintApplication;
use Modules\JudicialCommittee\Entities\JudicialReceiptBill;
use Modules\JudicialCommittee\Http\Requests\JudicialReceiptBillRequest;

class ComplaintApplicationController extends Controller
{
    public function registeredApplications()
    {
        $complaintApplications = ComplaintApplication::with('lawsuitNature')->whereHas('judicialReceiptBill')
            ->where(function (Builder $q) {
                if (!is_null(request('search'))) {
                    $q->whereLike(['submission_no', 'registration_no', 'subject', 'date'], request('search'));
                }
            })->orderByDesc('date')->paginate(10);

        return view('judicialcommittee::admin.registered_application', compact('complaintApplications'));
    }

    public function index()
    {
        $this->checkAuthorization('complaintApplication_access');

        $complaintApplications = ComplaintApplication::with('lawsuitNature')
            ->where(function (Builder $q) {
                if (!is_null(request('search'))) {
                    $q->whereLike(['submission_no', 'registration_no', 'subject', 'date'], request('search'));
                }
            })->orderByDesc('date')->paginate(10);

        return view('judicialcommittee::admin.complaint_application.index', compact('complaintApplications'));
    }

    public function create()
    {
        $this->checkAuthorization('complaintApplication_create');

        return view('judicialcommittee::admin.complaint_application.create');
    }

    public function show(ComplaintApplication $complaintApplication)
    {
        $this->checkAuthorization('complaintApplication_access');

        $complaintApplication->load('lawsuitNature', 'judicialReceiptBill', 'relatedMembers','complainantDefendants.province','complainantDefendants.district','complainantDefendants.localBody','witnesses');

        return view('judicialcommittee::admin.complaint_application.show', compact('complaintApplication'));
    }

    public function edit(ComplaintApplication $complaintApplication)
    {
        $this->checkAuthorization('complaintApplication_edit');

        $complaintApplication->load('complainantDefendants', 'relatedMembers','witnesses');

        return view('judicialcommittee::admin.complaint_application.edit', compact('complaintApplication'));
    }

    public function destroy(ComplaintApplication $complaintApplication)
    {
        $this->checkAuthorization('complaintApplication_delete');

        if ($complaintApplication->applicant_signature) {
            $this->deleteFile($complaintApplication->applicant_signature);
        }

        $complaintApplication->relatedMembers()->delete();
        $complaintApplication->complainantDefendants()->delete();
        if ($complaintApplication->applicant_signature) {
            $this->deleteFile($complaintApplication->applicant_signature);
        }
        $complaintApplication->delete();

        toast('आवेदन सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
