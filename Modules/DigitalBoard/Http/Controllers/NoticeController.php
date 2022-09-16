<?php

namespace Modules\DigitalBoard\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\DigitalBoard\Entities\Notice;
use Modules\DigitalBoard\Http\Requests\Notice\StoreNoticeRequest;
use Modules\DigitalBoard\Http\Requests\Notice\UpdateNoticeRequest;

class NoticeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('digitalBoardNotice_access'),
            403,
            'You are not allowed to digital board notice access'
        );

        $notices = Notice::with('user')->orderByDesc('date')->get();

        return view('digitalboard::notice.index', compact('notices'));
    }

    public function create()
    {
        abort_if(Gate::denies('digitalBoardNotice_create'),
            403,
            'You are not allowed to digital board notice create'
        );

        return view('digitalboard::notice.create');
    }

    public function store(StoreNoticeRequest $request)
    {
        abort_if(Gate::denies('digitalBoardNotice_create'),
            403,
            'You are not allowed to digital board notice create'
        );


        Notice::create($request->validated() + [
                'user_id' => auth()->id()
            ]);

        toast('सूचना सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(Notice $notice)
    {
        abort_if(Gate::denies('digitalBoardNotice_access'),
            403,
            'You are not allowed to digital board notice access'
        );

        return view('digitalboard::notice.show', compact('notice'));
    }

    public function edit(Notice $notice)
    {
        abort_if(Gate::denies('digitalBoardNotice_edit'),
            403,
            'You are not allowed to digital board notice edit'
        );

        return view('digitalboard::notice.edit', compact('notice'));
    }

    public function update(UpdateNoticeRequest $request, Notice $notice)
    {
        abort_if(Gate::denies('digitalBoardNotice_edit'),
            403,
            'You are not allowed to digital board notice edit'
        );

        $notice->update($request->validated());

        toast('सूचना सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }

    public function destroy(Notice $notice)
    {
        abort_if(Gate::denies('digitalBoardNotice_delete'),
            403,
            'You are not allowed to digital board notice delete'
        );

        $notice->delete();

        toast('Notice Deleted Successfully', 'success');
    }
}
