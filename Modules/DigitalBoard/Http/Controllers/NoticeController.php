<?php

namespace Modules\DigitalBoard\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\DigitalBoard\Entities\Notice;

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

    public function store(Request $request)
    {
        abort_if(Gate::denies('digitalBoardNotice_create'),
            403,
            'You are not allowed to digital board notice create'
        );
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

    public function update(Request $request, Notice $notice)
    {
        abort_if(Gate::denies('digitalBoardNotice_edit'),
            403,
            'You are not allowed to digital board notice edit'
        );
    }

    public function destroy(Notice $notice)
    {
        abort_if(Gate::denies('digitalBoardNotice_delete'),
            403,
            'You are not allowed to digital board notice delete'
        );
    }
}
