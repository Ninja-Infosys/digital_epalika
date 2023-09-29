<?php

namespace Modules\EMap\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\New\MapPassGroup;
use Illuminate\Contracts\Support\Renderable;
use Modules\EMap\Http\Requests\NaksaPassGroupUser\StoreNaksaPassGroupUserRequest;

class NaksaPassGroupUserController extends Controller
{
    public function index()
    {
        return view('emap::admin.naksaPassGroupUser.index');
    }

    public function create()
    {
        $naksaPassGroups = MapPassGroup::latest()->get();
        $users           = User::latest()->get();
        return view('emap::admin.naksaPassGroupUser.create',compact('naksaPassGroups','users'));
    }

    public function store(StoreNaksaPassGroupUserRequest $request)
    {
        //dd($request->all());
        $naksaPassGroupId = $request->validated()['group_id'];
        foreach ($request->validated()['user_id'] as $userId) {
            $user = User::find($userId);
            $user->mapPassGroups()->attach($naksaPassGroupId);
        }
        toast('नक्शा पास समूह मेटियो', 'success');
        return back();
    }

    public function show($id)
    {
        return view('emap::show');
    }

    public function edit($id)
    {
        return view('emap::admin.naksaPassGroupUser.edit');
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
