<?php

namespace Modules\EMap\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\OldMap;

class OldMapController extends Controller
{
    public function index()
    {
        $oldMaps = OldMap::with('houseOwner','fiscalYear')->get();
        return view('emap::admin.oldMap.index',compact('oldMaps'));
    }

    public function create()
    {
        return view('emap::admin.oldMap.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('emap::show');
    }

    public function edit($id)
    {
        return view('emap::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
