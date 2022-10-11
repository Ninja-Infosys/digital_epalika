<?php

namespace Modules\EMap\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\Client;
use Modules\EMap\Entities\MapApply;

class ApplicationController extends Controller
{
    public function mapAcceptance(Client $client, MapApply $mapApply)
    {
        return view('emap::organization.clients.map.application.map_acceptance', compact('client','mapApply'));
    }
    public function mapAcceptancePrint(Client $client, MapApply $mapApply)
    {
        return view('emap::organization.clients.map.application.map_acceptance_print', compact('client'));
    }

    public function technicianApproval(Client $client, MapApply $mapApply)
    {
        return view('emap::organization.clients.map.application.technician_approval', compact('client','mapApply'));
    }

    public function technicianApprovalPrint(Client $client, MapApply $mapApply)
    {
        return view('emap::organization.clients.map.application.technician_approval_print', compact('client'));

    }

    public function approvalApplicationFromDesigner(Client $client, MapApply $mapApply)
    {

    }
}
