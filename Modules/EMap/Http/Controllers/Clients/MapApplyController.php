<?php

namespace Modules\EMap\Http\Controllers\Clients;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\Client;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\MapSetting;
use Modules\EMap\Entities\StructureType;

class MapApplyController extends Controller
{
    public function index(Client $client)
    {
        return view('emap::index');
    }

    public function create(Client $client)
    {
        $mapSetting = MapSetting::first();
        $structureTypes = StructureType::latest()->get();
        return view('emap::organization.clients.map.create', compact('client', 'mapSetting', 'structureTypes'));
    }

    public function store(Request $request, Client $client)
    {
        dd($request->all());
    }

    public function show(Client $client, MapApply $mapApply)
    {
        return view('emap::show');
    }

    public function edit(Client $client, MapApply $mapApply)
    {
        return view('emap::edit');
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
