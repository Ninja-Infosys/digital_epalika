<?php

namespace Modules\EMap\Http\Controllers;

use App\Enums\ApplicationTypeEnum;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\MapApply;

class MapController extends Controller
{
    public function index()
    {
        $application_types = collect();

        foreach (ApplicationTypeEnum::cases() as $applicationType) {
            $application_types->push($applicationType->value);
        }

        $maps = MapApply::with(['fiscalYear', 'mapApplyApplications' => function ($query) {
            $query->selectRaw('id,map_apply_id,file_type')->whereNull('rejected_at');
        }])->latest()->get();


        return view('emap::admin.map.index', compact('maps','application_types'));
    }


}
