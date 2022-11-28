<?php

namespace Modules\Grant\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Grant\Entities\ThematicArea;
use Modules\Grant\Http\Requests\ThematicArea\StoreThematicAreaRequest;
use Modules\Grant\Http\Requests\ThematicArea\UpdateThematicAreaRequest;

class ThematicAreaController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('thematicArea_access');

        $thematicAreas = ThematicArea::all();

        return view('grant::admin.thematic_area.index', compact('thematicAreas'));
    }

    public function create()
    {
        $this->checkAuthorization('thematicArea_create');

        return view('grant::admin.thematic_area.create');
    }

    public function store(StoreThematicAreaRequest $request)
    {
        $this->checkAuthorization('thematicArea_create');

        ThematicArea::create($request->validated());

        toast('विषयगत क्षेत्र सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(ThematicArea $thematicArea)
    {
        $this->checkAuthorization('thematicArea_access');

        return view('grant::show');
    }

    public function edit(ThematicArea $thematicArea)
    {
        $this->checkAuthorization('thematicArea_edit');

        return view('grant::admin.thematic_area.edit', compact('thematicArea'));
    }

    public function update(UpdateThematicAreaRequest $request, ThematicArea $thematicArea)
    {
        $this->checkAuthorization('thematicArea_edit');

        $thematicArea->update($request->validated());

        toast('विषयगत क्षेत्र सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.grant.thematicArea.index'));
    }

    public function destroy(ThematicArea $thematicArea)
    {
        $this->checkAuthorization('thematicArea_delete');
        $thematicArea->delete();

        toast('विषयगत क्षेत्र सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
