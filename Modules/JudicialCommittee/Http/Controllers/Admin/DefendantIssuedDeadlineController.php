<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\JudicialCommittee\Entities\ComplaintApplication;
use Modules\JudicialCommittee\Entities\DefendantIssuedDeadline;
use Modules\JudicialCommittee\Entities\JudicialCommitteeTemplate;
use Modules\JudicialCommittee\Enums\JudicialTemplateTypeEnum;
use Modules\JudicialCommittee\Http\Requests\DefendantIssuedDeadline\StoreDefendantIssuedDeadlineRequest;

class DefendantIssuedDeadlineController extends Controller
{
    public function index(ComplaintApplication $complaintApplication)
    {
        $this->checkAuthorization('defendantIssuedDeadline_access');

        if (!$complaintApplication->defendantIssuedDeadline) {
            return redirect(route('admin.judicialCommittee.complaintApplication.defendantIssuedDeadline.create', $complaintApplication));
        }

        if (JudicialCommitteeTemplate::where('type', JudicialTemplateTypeEnum::DEFENDANT_ISSUED_DEADLINE)->count() == 0) {
            toast('टेम्प्लेट सेट गरिएको छैन', 'error');
            return redirect(route('admin.judicialCommittee.judicialCommitteeTemplate.index'));
        }

        return view('judicialcommittee::admin.defendant_issued_deadline.index', compact('complaintApplication'));
    }

    public function create(ComplaintApplication $complaintApplication)
    {
        $this->checkAuthorization('defendantIssuedDeadline_create');

        $complaintApplication->load('defendantIssuedDeadline');

        return view('judicialcommittee::admin.defendant_issued_deadline.create', compact('complaintApplication'));
    }

    public function store(StoreDefendantIssuedDeadlineRequest $request, ComplaintApplication $complaintApplication)
    {
        $this->checkAuthorization('defendantIssuedDeadline_create');

        DefendantIssuedDeadline::updateOrCreate(
            ['complaint_application_id' => $complaintApplication->id],
            $request->validated()
        );

        toast('प्रतिवादी म्याद जारी सफलतापूर्वक पेश गरियो', 'success');

        return redirect(route('admin.judicialCommittee.complaintApplication.defendantIssuedDeadline.index', $complaintApplication));
    }

    public function show(ComplaintApplication $complaintApplication, DefendantIssuedDeadline $defendantIssuedDeadline)
    {
        return view('judicialcommittee::show');
    }

    public function edit(ComplaintApplication $complaintApplication, DefendantIssuedDeadline $defendantIssuedDeadline)
    {
        return view('judicialcommittee::edit');
    }

    public function update(Request $request, ComplaintApplication $complaintApplication, DefendantIssuedDeadline $defendantIssuedDeadline)
    {
        //
    }

    public function destroy(ComplaintApplication $complaintApplication, DefendantIssuedDeadline $defendantIssuedDeadline)
    {
        //
    }
}
