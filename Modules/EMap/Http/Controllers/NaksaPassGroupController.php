<?php

namespace Modules\EMap\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\New\MapPassGroup;
use Illuminate\Contracts\Support\Renderable;
use Modules\EMap\Http\Requests\NaksaPassGroup\StoreNaksaPassRequest;
use Modules\EMap\Http\Requests\NaksaPassGroup\UpdateNaksaPassRequest;

class NaksaPassGroupController extends Controller
{
    public function index()
    {
        $naksaPassGroups = MapPassGroup::latest()->get();
        return view('emap::admin.mapPassGroup.index',compact('naksaPassGroups'));
    }

    public function create()
    {
        return view('emap::admin.mapPassGroup.create');
    }

    public function store(StoreNaksaPassRequest $request)
    {
        MapPassGroup::create($request->validated());
        toast('नक्शा पास समूह थपियो', 'success');
        return back();
    }

    public function show($id)
    {
        return view('emap::show');
    }

    public function edit(MapPassGroup $naksaPassGroup)
    {
        return view('emap::admin.mapPassGroup.edit',compact('naksaPassGroup'));
    }

    public function update(UpdateNaksaPassRequest $request, MapPassGroup $naksaPassGroup)
    {
        $naksaPassGroup->update($request->validated());
        toast('नक्शा पास समूह सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }

    public function destroy(MapPassGroup $naksaPassGroup)
    {
        if ($naksaPassGroup->status) {
            toast('सक्रिय भएको नक्शा पास समूह मेटाउन मनाहि छ', 'error');
            return back();
        }
        $naksaPassGroup->delete();
        toast('नक्शा पास समूह मेटियो', 'success');
        return back();
    }
    public function updateStatus(MapPassGroup $naksaPassGroup)
    {
        $this->checkAuthorization('recommendationTemplate_access');

        $naksaPassGroup->update([
            'status' => !$naksaPassGroup->status
        ]);
        toast('नक्शा पास समूह सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }
}
