<?php

namespace Modules\EMap\Http\Controllers\Admin\BuildingDocumentation;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\EMap\Entities\BuildingDocumentation;
use Modules\EMap\Entities\LandReport;
use Modules\EMap\Enums\BuildingDocumentationStatusEnum;
use Modules\EMap\Events\LandReportLogEvent;
use Modules\EMap\Http\Requests\LandReport\StoreLandReportRequest;

class LandReportController extends Controller
{
    public function index(BuildingDocumentation $buildingDocumentation)
    {
        $this->checkAuthorization('landReport_access');


        if (!$buildingDocumentation->landReport) {
            return redirect(route('emap.admin.buildingDocumentation.landReport.create', $buildingDocumentation));
        }

        $buildingDocumentation->load('landReport.files');

        return view('emap::admin.buildingDocumentation.landReport.index', compact('buildingDocumentation'));
    }

    public function create(BuildingDocumentation $buildingDocumentation)
    {
        if(is_null(auth()->user()->ward_no))
        $this->checkAuthorization('landReport_create');
        return view('emap::admin.buildingDocumentation.landReport.create', compact('buildingDocumentation'));
    }

    public function store(StoreLandReportRequest $request,BuildingDocumentation $buildingDocumentation)
    {
        $this->checkAuthorization('landReport_create');

        $landReport = DB::transaction(function () use ($request, $buildingDocumentation) {
            $landReport = LandReport::updateOrCreate(
                ['building_documentation_id' => $buildingDocumentation->id],
                $request->validated()
            );
            $buildingDocumentation->update([
                'status' => BuildingDocumentationStatusEnum::REPORT->value,
            ]);

            $this->uploadFiles($request, $landReport);

            return $landReport;
        });

        if ($landReport->wasRecentlyCreated) {
            event(new LandReportLogEvent($buildingDocumentation->id, LandReport::class, $landReport->id, 'निर्णय', "मिति $landReport->submitted_date गते प्रविधिक प्रतिबेदन पेश गरियो।"));
        }

        toast('प्रविधिक प्रतिबेदन सफलतापूर्वक पेश गरियो', 'success');

        return redirect(route('emap.admin.buildingDocumentation.landReport.index', $buildingDocumentation));
    }

    private function uploadFiles($request, $landReport)
    {
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $landReport->files()->create([
                    'file_name' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                    'extension' => $file->getClientOriginalExtension(),
                    'file' => $file->store('emap/buildingDocumentation/files', 'public'),
                ]);
            }
        }
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
