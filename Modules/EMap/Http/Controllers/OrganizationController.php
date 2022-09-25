<?php

namespace Modules\EMap\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\EMap\Entities\Organization;

class OrganizationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('organization_access'),
            403,
            'You are not allowed to employee access'
        );
        $organizations = Organization::with('organizationDetail')->latest()->get();
        return view('emap::admin.organization.index', compact('organizations'));
    }

    public function updateLoginStatus(Organization $organization)
    {
        abort_if(Gate::denies('organization_edit'),
            403,
            'You are not allowed to employee access'
        );
        $organization->update([
            'is_active' => !$organization->is_active
        ]);
        toast('संगठन स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }

    public function show(Organization $organization)
    {
        abort_if(Gate::denies('organization_access'),
            403,
            'You are not allowed to employee access'
        );
        $organization->load(['userDetail.citizenshipIssuedDistrict',
            'userDetail.permanentLocalBody',
            'userDetail.permanentDistrict',
            'userDetail.permanentProvince',
            'userDetail.temporaryLocalBody',
            'userDetail.temporaryDistrict',
            'userDetail.temporaryProvince',
        ]);
        return view('emap::admin.organization.show', compact('organization'));
    }

    public function destroy(Organization $organization)
    {
        abort_if(Gate::denies('organization_delete'),
            403,
            'You are not allowed to employee access'
        );
        $organization->delete();
        toast(' संगठन सफलतापूर्वक मेटाइयो', 'success');
        return back();
    }
}
