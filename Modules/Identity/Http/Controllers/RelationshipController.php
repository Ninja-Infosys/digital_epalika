<?php

namespace Modules\Identity\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Identity\Entities\Relationship;
use Modules\Identity\Http\Requests\Relationship\StoreRelationshipRequest;
use Modules\Identity\Http\Requests\Relationship\UpdateRelationshipRequest;

class RelationshipController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('relationship_access');
        $relationships = Relationship::latest()->paginate(10);
        return view('identity::admin.setting.relationship.index', compact('relationships'));
    }

    public function create()
    {
        $this->checkAuthorization('relationship_create');
        return view('identity::admin.setting.relationship.create');
    }

    public function store(StoreRelationshipRequest $request): RedirectResponse
    {
        $this->checkAuthorization('relationship_create');
        Relationship::create($request->validated());
        toast('नाता सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(Relationship $relationship)
    {
        $this->checkAuthorization('relationship_access');
        return view('identity::show');
    }

    public function edit(Relationship $relationship)
    {
        $this->checkAuthorization('relationship_edit');
        return view('identity::admin.setting.relationship.edit', compact('relationship'));
    }

    public function update(UpdateRelationshipRequest $request, Relationship $relationship)
    {
        $this->checkAuthorization('relationship_edit');
        $relationship->update($request->validated());
        toast('नाता सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('identity.admin.setting.relationship.index'));
    }

    public function destroy(Relationship $relationship): RedirectResponse
    {
        $this->checkAuthorization('relationship_delete');
        $relationship->delete();
        toast('नाता सफलतापूर्वक मेटियो', 'success');
        return back();
    }
}
