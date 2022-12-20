<?php

namespace Modules\Grant\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Factory;
use Illuminate\Console\Application;
use Illuminate\Contracts\View\View;
use Modules\Grant\Entities\Group;
use Modules\Grant\Http\Requests\Group\StoreGroupRequest;

class GroupController extends Controller
{
    public function index(): Factory|View|Application
    {
        $this->checkAuthorization('group_access');

        $groups = Group::latest()->get();

        return view('grant::admin.group.index', compact('groups'));
    }

    public function create()
    {
        $this->checkAuthorization('group_create');

        return view('grant::admin.group.create');
    }

    public function store(StoreGroupRequest $request)
    {
        $this->checkAuthorization('group_create');

        Group::create($request->validated());
        toast('समूह सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function edit(Group $group)
    {
        $this->checkAuthorization('group_edit');
        return view('grant::admin.group.edit');
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
