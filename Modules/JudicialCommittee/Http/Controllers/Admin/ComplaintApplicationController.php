<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\JudicialCommittee\Entities\ComplaintApplication;

class ComplaintApplicationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('complaintApplication_access'),
            403,
            'You are not allowed to access this resource'
        );

        $complaintApplications = ComplaintApplication::orderByDesc('date')->get();

        return view('judicialcommittee::admin.complaint_application.index', compact('complaintApplications'));
    }

    public function create()
    {
        abort_if(Gate::denies('complaintApplication_create'),
            403,
            'You are not allowed to access this resource'
        );

        return view('judicialcommittee::admin.complaint_application.create');
    }

    public function show(ComplaintApplication $complaintApplication)
    {
        abort_if(Gate::denies('complaintApplication_access'),
            403,
            'You are not allowed to access this resource'
        );

        return view('judicialcommittee::show');
    }

    public function edit(ComplaintApplication $complaintApplication)
    {
        abort_if(Gate::denies('complaintApplication_edit'),
            403,
            'You are not allowed to access this resource'
        );

        return view('judicialcommittee::edit');
    }

    public function destroy(ComplaintApplication $complaintApplication)
    {
        abort_if(Gate::denies('complaintApplication_delete'),
            403,
            'You are not allowed to access this resource'
        );
        if ($complaintApplication->applicant_signature) {
            $this->deleteFile($complaintApplication->applicant_signature);
        }

        $complaintApplication->delete();

        toast('आवेदन सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
