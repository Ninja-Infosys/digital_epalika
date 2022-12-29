<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\JudicialCommittee\Entities\ComplaintApplication;
use Modules\JudicialCommittee\Entities\DateCompensation;
use Modules\JudicialCommittee\Entities\JudicialCommitteeTemplate;
use Modules\JudicialCommittee\Enums\JudicialTemplateTypeEnum;
use Modules\JudicialCommittee\Http\Requests\DateCompensation\StoreDateCompensationRequest;

class DateCompensationController extends Controller
{
    public function index(ComplaintApplication $complaintApplication)
    {
        $this->checkAuthorization('dateCompensation_access');

        if (!$complaintApplication->dateCompensation) {
            return redirect(route('admin.judicialCommittee.complaintApplication.dateCompensation.create', $complaintApplication));
        }

        if (JudicialCommitteeTemplate::where('type', JudicialTemplateTypeEnum::DATE_COMPENSATION)->count() == 0) {
            toast('टेम्प्लेट सेट गरिएको छैन', 'error');
            return redirect(route('admin.judicialCommittee.judicialCommitteeTemplate.index'));
        }

        return view('judicialcommittee::admin.date_compensation.index', compact('complaintApplication'));
    }

    public function create(ComplaintApplication $complaintApplication)
    {
        $this->checkAuthorization('dateCompensation_create');

        $complaintApplication->load('dateCompensation');

        return view('judicialcommittee::admin.date_compensation.create', compact('complaintApplication'));
    }

    public function store(StoreDateCompensationRequest $request, ComplaintApplication $complaintApplication)
    {
        $this->checkAuthorization('dateCompensation_create');

        DateCompensation::updateOrCreate(
            ['complaint_application_id' => $complaintApplication->id],
            $request->validated()
        );

        toast('तारिख भरपाई सफलतापूर्वक पेश गरियो', 'success');

        return redirect(route('admin.judicialCommittee.complaintApplication.dateCompensation.index', $complaintApplication));
    }

    public function show(ComplaintApplication $complaintApplication, DateCompensation $dateCompensation)
    {
        $this->checkAuthorization('dateCompensation_access');

        return view('judicialcommittee::show');
    }

    public function edit(ComplaintApplication $complaintApplication, DateCompensation $dateCompensation)
    {
        $this->checkAuthorization('dateCompensation_access');

        return view('judicialcommittee::edit');
    }

    public function update(Request $request, ComplaintApplication $complaintApplication, DateCompensation $dateCompensation)
    {
        $this->checkAuthorization('dateCompensation_edit');
    }

    public function destroy(ComplaintApplication $complaintApplication, DateCompensation $dateCompensation)
    {
        $this->checkAuthorization('dateCompensation_delete');
    }
}
