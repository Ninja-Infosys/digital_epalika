<?php

namespace Modules\EMap\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\Client;
use Modules\EMap\Entities\MapApply;

class ApplyMapApplicationController extends Controller
{
    public function applyMapApplicationForm(Client $client ,MapApply $mapApply)
    {
        return view('emap::organization.clients.map.applyMapApplication.index', compact('client', 'mapApply'));
    }


    public function applyMapApplication(Request $request ,Client $client ,MapApply $mapApply)
    {

    }
}
