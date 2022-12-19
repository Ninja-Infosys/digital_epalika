<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\JudicialCommittee\Entities\ComplaintApplication;

class ComplaintApplicationController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('complaintApplication_access');

        $complaintApplications = ComplaintApplication::orderByDesc('date')->get();

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

        return view('judicialcommittee::show');
    }

    public function edit(ComplaintApplication $complaintApplication)
    {
        $this->checkAuthorization('complaintApplication_edit');

        return view('judicialcommittee::edit');
    }

    public function destroy(ComplaintApplication $complaintApplication)
    {
        $this->checkAuthorization('complaintApplication_delete');
        if ($complaintApplication->applicant_signature) {
            $this->deleteFile($complaintApplication->applicant_signature);
        }

        $complaintApplication->delete();

        toast('आवेदन सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
