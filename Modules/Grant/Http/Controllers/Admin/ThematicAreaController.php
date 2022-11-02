<?php

namespace Modules\Grant\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Grant\Entities\ThematicArea;
use Modules\Grant\Http\Requests\ThematicArea\StoreThematicAreaRequest;
use Modules\Grant\Http\Requests\ThematicArea\UpdateThematicAreaRequest;

class ThematicAreaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('thematicArea_access'),
            403,
            'You are not allowed to access this resource'
        );

        $thematicAreas=ThematicArea::all();

        return view('grant::admin.thematic_area.index', compact('thematicAreas'));
    }

    public function create()
    {
        abort_if(Gate::denies('thematicArea_create'),
            403,
            'You are not allowed to access this resource'
        );

        return view('grant::admin.thematic_area.create');
    }

    public function store(StoreThematicAreaRequest $request)
    {
        abort_if(Gate::denies('thematicArea_create'),
            403,
            'You are not allowed to access this resource'
        );

        ThematicArea::create($request->validated());

        toast('विषयगत क्षेत्र सफलतापूर्वक थपियो','success');
        return back();
    }

    public function show(ThematicArea $thematicArea)
    {
        abort_if(Gate::denies('thematicArea_access'),
            403,
            'You are not allowed to access this resource'
        );
        return view('grant::show');
    }

    public function edit(ThematicArea $thematicArea)
    {
        abort_if(Gate::denies('thematicArea_edit'),
            403,
            'You are not allowed to access this resource'
        );
        return view('grant::admin.thematic_area.edit',compact('thematicArea'));
    }

    public function update(UpdateThematicAreaRequest $request, ThematicArea $thematicArea)
    {
        abort_if(Gate::denies('thematicArea_edit'),
            403,
            'You are not allowed to access this resource'
        );

        $thematicArea->update($request->validated());

        toast('विषयगत क्षेत्र सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.grant.thematicArea.index'));
    }

    public function destroy(ThematicArea $thematicArea)
    {
        abort_if(Gate::denies('thematicArea_delete'),
            403,
            'You are not allowed to access this resource'
        );
        $thematicArea->delete();

        toast('विषयगत क्षेत्र सफलतापूर्वक मेटाइयो','success');
        return back();
    }
}
