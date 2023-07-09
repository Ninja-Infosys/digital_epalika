<?php

namespace Modules\Identity\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Identity\Entities\IdentityMeeting;
use Modules\Identity\Http\Requests\IdentityMeeting\StoreIdentityMeetingRequest;

class IdentityMeetingController extends Controller
{
    public function index()
    {
        return view('identity::admin.identityMeeting.index');
    }

    public function create()
    {
        return view('identity::admin.identityMeeting.create');
    }

    public function store(StoreIdentityMeetingRequest $request)
    {
        DB::transaction(function () use ($request) {
            $identityMeeting=IdentityMeeting::create($request->validated());

            $identityMeeting->disabilityCommittees()->attach($request->validated()['committees']);
        });

        toast('बैठक सफलतापुर्बक थपियो', 'success');

        return back();
    }

    public function show($id)
    {
        return view('identity::show');
    }

    public function edit($id)
    {
        return view('identity::edit');
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
