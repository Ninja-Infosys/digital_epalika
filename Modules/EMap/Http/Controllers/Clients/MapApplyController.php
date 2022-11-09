<?php

namespace Modules\EMap\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\EMap\Entities\Client;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\MapSetting;

class MapApplyController extends Controller
{
    public function index(Client $client)
    {
        $mapApplies = MapApply::where('organization_id', auth('organization')->user()->id)->get();
        return view('emap::organization.map-applies.index', compact('mapApplies'));
    }


    public function show(Client $client, MapApply $mapApply)
    {
        $mapApply->load('fiscalYear', 'storeyDetails.mapFee', 'landDetail.unit', 'landOwner.citizenshipIssueDistrict', 'houseOwner.citizenshipIssueDistrict', 'fourForts', 'applicantDetail', 'criteriaDetails', 'buildingDetails');

        return view('emap::organization.clients.map.show', compact('client', 'mapApply'));
    }

    public function edit( MapApply $mapApply)
    {
        $mapSetting = MapSetting::first();
        return view('emap::organization.map-applies.edit', compact( 'mapSetting', 'mapApply'));
    }

    public function update(Request $request, Client $client, MapApply $mapApply)
    {
        //
    }

    public function destroy(Client $client, MapApply $mapApply)
    {
        //
    }
}
