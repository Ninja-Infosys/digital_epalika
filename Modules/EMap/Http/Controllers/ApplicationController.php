<?php

namespace Modules\EMap\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\Client;

class ApplicationController extends Controller
{
    public function approvalApplication(Client $client)
    {
        return view('emap::organization.applications.approvalApplication', compact('client'));
    }

    public function approvalApplicationFromTechnician()
    {

    }

    public function approvalApplicationFromDesigner()
    {

    }
}
