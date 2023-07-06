<?php

namespace Modules\EMap\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\MapSetting;

class OrganizationDashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $mapApplyCount = MapApply::where('organization_id', auth('organization')->user()->id)->count();
        $mapSetting = MapSetting::first();
        return view('emap::organization.dashboard', compact('mapApplyCount', 'mapSetting'));
    }
}
