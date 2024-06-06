<?php

namespace Modules\EMap\Http\Controllers\Admin\BuildingDocumentation;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\BuildingDocumentation;
use Modules\EMap\Entities\LandReport;
use Modules\EMap\Events\LandReportLogEvent;
use Modules\EMap\Http\Requests\LandReport\StoreLandReportRequest;

class LandReportController extends Controller
{
    public function index(BuildingDocumentation $buildingDocumentation)
    {
        $this->checkAuthorization('landReport_access');

        $buildingDocumentation->load(['landReports']);

        return view('emap::admin.buildingDocumentation.landReport.index', compact('buildingDocumentation'));
    }

    public function create(BuildingDocumentation $buildingDocumentation)
    {
        $this->checkAuthorization('landReport_create');

        return view('emap::admin.buildingDocumentation.landReport.create', compact('buildingDocumentation'));
    }

    public function store(StoreLandReportRequest $request,BuildingDocumentation $buildingDocumentation)
    {
        $this->checkAuthorization('landReport_create');

        $landReport = $buildingDocumentation->landReports()->create($request->validated());

        event(new LandReportLogEvent($buildingDocumentation->id, LandReport::class, $landReport->id, 'प्रविधिक प्रतिबेदन', "मिति $landReport->submitted_date गते प्रविधिक प्रतिबेदन पेश गरियो।"));

        toast('प्रविधिक प्रतिबेदन सफलतापूर्वक थपियो', 'success');

        return redirect(route('emap.admin.buildingDocumentation.landReport.index', $buildingDocumentation));
    }
    public function uploadSupportedDocument(Request $request, ComplaintApplication $complaintApplication)
    {
        $request->validate(
            [
            'document_name' => ['required', 'string', 'max:255'],
            'document' => ['required', 'mimes:jpg,jpeg,png,pdf']
        ],
            ['document_name.required' => 'फाइलको नाम आवश्यक छ'],
            ['document.required' => 'फाइल आवश्यक छ'],
        );

        $complaintApplication->supportedDocuments()->create([
            'type' => ComplainantDefendantTypeEnum::DEFENDANT,
            'document_name' => $request->input('document_name'),
            'document' => $request->file('document')
        ]);

        toast('फाइल सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show($id)
    {
        return view('emap::show');
    }

    public function edit($id)
    {
        return view('emap::edit');
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
