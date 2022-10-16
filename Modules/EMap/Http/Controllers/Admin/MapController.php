<?php

namespace Modules\EMap\Http\Controllers\Admin;

use App\Enums\ApplicationTypeEnum;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\ApplyMapApplication;
use Modules\EMap\Entities\MapApply;

class MapController extends Controller
{
    public function index()
    {
        $application_types = collect();

        foreach (ApplicationTypeEnum::cases() as $applicationType) {
            $application_types->push($applicationType->value);
        }

        $maps = MapApply::with(['fiscalYear', 'organization:id,name', 'mapApplyApplications'])->whereHas('mapApplyApplications', function ($query) {
            $query->selectRaw('id,map_apply_id,file_type,created_at')->whereNull('rejected_at')->latest();
        })->get();


        return view('emap::admin.map.index', compact('maps', 'application_types'));
    }

    public function show(MapApply $mapApply)
    {
        $mapApply->load(['fiscalYear', 'mapRegistration', 'mapRegistration.mapRegistrationParticulars', 'organization.organizationDetail', 'storeyDetails.mapFee', 'landDetail.unit', 'landOwner.citizenshipIssueDistrict', 'houseOwner.citizenshipIssueDistrict', 'fourForts', 'applicantDetail', 'criteriaDetails', 'buildingDetails', 'mapApplyApplications' => function ($query) {
            $query->latest();
        }]);
        return view('emap::admin.map.show', compact('mapApply'));

    }

    public function rejectApplication(MapApply $mapApply, ApplyMapApplication $applyMapApplication)
    {
        if ($applyMapApplication->rejected_at == null) {
            $applyMapApplication->update(['rejected_at' => now()]);
        } else {
            $applyMapApplication->update(['rejected_at' => null]);
        }

        toast('आवेदन सफलतापूर्वक अस्वीकार गरियो', 'success');
        return redirect(route('emap.admin.map.mapApply.show', $mapApply));
    }
}
