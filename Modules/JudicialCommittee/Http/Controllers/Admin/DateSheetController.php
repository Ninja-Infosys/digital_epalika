<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\JudicialCommittee\Entities\ComplaintApplication;
use Modules\JudicialCommittee\Entities\DateSheet;
use Modules\JudicialCommittee\Entities\JudicialCommitteeTemplate;
use Modules\JudicialCommittee\Enums\JudicialTemplateTypeEnum;
use Modules\JudicialCommittee\Http\Requests\DateSheet\StoreDateSheetRequest;

class DateSheetController extends Controller
{
    public function index(ComplaintApplication $complaintApplication)
    {
        $this->checkAuthorization('dateSheet_access');

        if (!$complaintApplication->dateSheet) {
            return redirect(route('admin.judicialCommittee.complaintApplication.dateSheet.create', $complaintApplication));
        }

        if (JudicialCommitteeTemplate::where('type', JudicialTemplateTypeEnum::DATE_SHEET)->count() == 0) {
            toast('टेम्प्लेट सेट गरिएको छैन', 'error');
            return redirect(route('admin.judicialCommittee.judicialCommitteeTemplate.index'));
        }


        return view('judicialcommittee::admin.date_sheet.index', compact('complaintApplication'));
    }

    public function create(ComplaintApplication $complaintApplication)
    {
        $this->checkAuthorization('dateSheet_create');

        $complaintApplication->load('dateSheet');

        return view('judicialcommittee::admin.date_sheet.create', compact('complaintApplication'));
    }

    public function store(StoreDateSheetRequest $request, ComplaintApplication $complaintApplication)
    {
        $this->checkAuthorization('dateSheet_create');

        DateSheet::updateOrCreate(
            ['complaint_application_id' => $complaintApplication->id],
            $request->validated()
        );

        toast('तारिख पर्चा सफलतापूर्वक पेश गरियो', 'success');

        return redirect(route('admin.judicialCommittee.complaintApplication.dateSheet.index', $complaintApplication));
    }

    public function show(ComplaintApplication $complaintApplication, DateSheet $dateSheet)
    {
        return view('judicialcommittee::show');
    }

    public function edit(ComplaintApplication $complaintApplication, DateSheet $dateSheet)
    {
        return view('judicialcommittee::edit');
    }

    public function update(Request $request, ComplaintApplication $complaintApplication, DateSheet $dateSheet)
    {
        //
    }

    public function destroy(ComplaintApplication $complaintApplication, DateSheet $dateSheet)
    {
        //
    }
}
