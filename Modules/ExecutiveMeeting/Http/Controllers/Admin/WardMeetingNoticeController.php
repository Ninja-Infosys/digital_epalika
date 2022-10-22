<?php

namespace Modules\ExecutiveMeeting\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\ExecutiveMeeting\Entities\MeetingDetail;
use Modules\ExecutiveMeeting\Entities\WardMeetingNotice;
use Modules\ExecutiveMeeting\Http\Requests\WardMeetingNotice\StoreNoticeRequest;
use Modules\ExecutiveMeeting\Http\Requests\WardMeetingNotice\UpdateNoticeRequest;

class WardMeetingNoticeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('wardMeeting_access'),
            403,
            'You are not allowed to ward meeting access'
        );

        $wardMeetingNotices = WardMeetingNotice::orderByDesc('broadcast_date')->get();

        return view('executivemeeting::admin.wardMeeting_notice.index', compact('wardMeetingNotices'));
    }

    public function create()
    {
        abort_if(Gate::denies('wardMeeting_create'),
            403,
            'You are not allowed to ward meeting create'
        );

        return view('executivemeeting::admin.wardMeeting_notice.create');
    }

    public function store(StoreNoticeRequest $request)
    {
        abort_if(Gate::denies('wardMeeting_create'),
            403,
            'You are not allowed to ward meeting create'
        );
        WardMeetingNotice::create($request->validated());

        toast('सूचना सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(WardMeetingNotice $wardMeetingNotice)
    {
        abort_if(Gate::denies('wardMeeting_access'),
            403,
            'You are not allowed to ward meeting access'
        );
    }

    public function edit(WardMeetingNotice $wardMeetingNotice)
    {
        abort_if(Gate::denies('wardMeeting_edit'),
            403,
            'You are not allowed to ward meeting edit'
        );

        return view('executivemeeting::admin.wardMeeting_notice.edit', compact('wardMeetingNotice'));
    }

    public function update(UpdateNoticeRequest $request, WardMeetingNotice $wardMeetingNotice)
    {
        abort_if(Gate::denies('wardMeeting_edit'),
            403,
            'You are not allowed to ward meeting edit'
        );

        $wardMeetingNotice->update($request->validated());

        toast('सूचना सफलतापूर्वक सम्पादन गरियो', 'success');

        return redirect(route('admin.executiveMeeting.wardMeetingNotice.index'));
    }

    public function destroy(WardMeetingNotice $wardMeetingNotice)
    {
        abort_if(Gate::denies('wardMeeting_delete'),
            403,
            'You are not allowed to ward meeting delete'
        );

        $wardMeetingNotice->meetingDetails()->delete();
        $wardMeetingNotice->delete();

        toast('सूचना सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }

    public function wardMeetingDetails()
    {
        $meetingDetails = MeetingDetail::where('model_type', WardMeetingNotice::class)->latest()->get();

        return view('executivemeeting::admin.wardMeeting_notice.meetingDetails', compact('meetingDetails'));
    }

    public function wardMeetingDetailsReport()
    {
        $model_type = WardMeetingNotice::class;

        return view('executivemeeting::admin.wardMeeting_notice.meeting_report', compact('model_type'));
    }
}
