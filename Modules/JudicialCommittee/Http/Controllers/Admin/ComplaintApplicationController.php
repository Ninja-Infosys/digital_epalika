<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Modules\Grant\Enums\GranteeEnum;
use Modules\JudicialCommittee\Entities\ComplaintApplication;
use Modules\JudicialCommittee\Entities\JudicialReceiptBill;
use Modules\JudicialCommittee\Http\Requests\JudicialReceiptBillRequest;

class ComplaintApplicationController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('complaintApplication_access');

        $complaintApplications = ComplaintApplication::with('lawsuitNature')->orderByDesc('date')->get();

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

        $complaintApplication->load('lawsuitNature', 'judicialReceiptBill');

        return view('judicialcommittee::admin.complaint_application.show', compact('complaintApplication'));
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

    public function receiptBill(ComplaintApplication $complaintApplication)
    {
        $this->checkAuthorization('complaintApplication_create');
        $complaintApplication->load('judicialReceiptBill');

        return view('judicialcommittee::admin.complaint_application.receipt_bill', compact('complaintApplication'));
    }

    public function receiptBillStore(JudicialReceiptBillRequest $request, ComplaintApplication $complaintApplication)
    {
        $this->checkAuthorization('complaintApplication_create');

        JudicialReceiptBill::updateOrCreate(
            ['complaint_application_id' => $complaintApplication->id],
            $request->validated()
        );

        toast('रसिद बिल सफलतापूर्वक थपियो', 'success');

        return redirect(route('admin.judicialCommittee.complaintApplication.show', $complaintApplication));
    }
}
