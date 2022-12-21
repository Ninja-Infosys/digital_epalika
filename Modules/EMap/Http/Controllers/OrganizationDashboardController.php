<?php

namespace Modules\EMap\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\EMap\Entities\MapApply;

class OrganizationDashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $mapApplyCount = MapApply::where('organization_id', auth('organization')->user()->id)->count();

        return view('emap::organization.dashboard', compact('mapApplyCount'));
    }
}
