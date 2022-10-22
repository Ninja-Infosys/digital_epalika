<?php

namespace Modules\ExecutiveMeeting\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\ExecutiveMeeting\Http\Requests\MeetingEvent\StoreMeetingEventRequest;

class MeetingEventController extends Controller
{
    public function index()
    {
        return view('emap::admin.meeting_event.index');
    }

    public function create()
    {
        return view('emap::admin.meeting_event.create');
    }

    public function store(StoreMeetingEventRequest $request)
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
