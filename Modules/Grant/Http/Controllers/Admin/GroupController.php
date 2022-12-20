<?php

namespace Modules\Grant\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Grant\Entities\Group;
use Modules\Grant\Http\Requests\Group\StoreGroupRequest;
use Modules\Grant\Http\Requests\Group\UpdateGroupRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Modules\Grant\Entities\Farmer;

class GroupController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('group_access');

        $groups = Group::where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['unique_id', 'name', 'vat_pan', 'registration_date',], request('search'));
            }
        })
            ->latest()->paginate(10);

        return view('grant::admin.group.index', compact('groups'));
    }

    public function create()
    {
        $this->checkAuthorization('group_create');

        $farmers = Farmer::latest()->get();

        return view('grant::admin.group.create', compact('farmers'));
    }

    public function store(StoreGroupRequest $request)
    {
        $this->checkAuthorization('group_create');

        DB::transaction(function () use ($request) {
            $group = Group::create($request->validated());

            $group->farmers()->attach($request->input('farmers'));

        });
        toast('समूह सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function edit(Group $group)
    {
        $this->checkAuthorization('group_edit');

        $farmers = Farmer::latest()->get();
        $group->load('farmers');

        return view('grant::admin.group.edit', compact('farmers','group'));
    }

    public function update(UpdateGroupRequest $request, Group $group)
    {
        $this->checkAuthorization('group_edit');

        $group->update($request->validated());

        DB::transaction(function () use ($request, $group) {
            $group->update($request->validated());

            $group->farmers()->sync($request->input('farmers'));
        });

        toast('समूह सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.grant.group.index'));
    }

    public function destroy(Group $group)
    {
        $this->checkAuthorization('group_delete');

        $group->farmers()->detach();
        $group->delete();

        toast('समूह सफलतापूर्वक मेटाइयो', 'success');
        return back();
    }
}
