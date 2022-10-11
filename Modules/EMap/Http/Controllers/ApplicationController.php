<?php

namespace Modules\EMap\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\EMap\Entities\Client;
use Modules\EMap\Entities\MapApply;

class ApplicationController extends Controller
{
    public function mapAcceptance(Client $client, MapApply $mapApply)
    {
        $mapApply->load('houseOwner', 'landDetail', 'landDetail.unit');
        return view('emap::organization.clients.map.application.map_acceptance', compact('client', 'mapApply'));
    }

    public function technicianApproval(Client $client, MapApply $mapApply)
    {
        $client->load('province',
            'district',
            'localBody');
        return view('emap::organization.clients.map.application.technician_approval', compact('client', 'mapApply'));
    }

    public function engineerApproval(Client $client, MapApply $mapApply)
    {
        $client->load('province',
            'district',
            'localBody');
        return view('emap::organization.clients.map.application.engineer_approval', compact('client', 'mapApply'));
    }

    public function engineerApprovalPrint(Client $client, MapApply $mapApply)
    {
        $client->load('province',
            'district',
            'localBody');
        return view('emap::organization.clients.map.application.engineer_approval_print', compact('client', 'mapApply'));

    }
}
