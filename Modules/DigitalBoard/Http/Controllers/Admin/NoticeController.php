<?php

namespace Modules\DigitalBoard\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\OfficeSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\DigitalBoard\Entities\Notice;
use Modules\DigitalBoard\Http\Requests\Notice\UpdateNoticeRequest;
use Illuminate\Database\Eloquent\Builder;

class NoticeController extends Controller
{
    public function index($type)
    {
        $this->checkAuthorization('digitalBoardNotice_access');
        // Check if the authenticated user has a ward number
        $notices = Notice::with('user')
            ->where(function ($q) {
                if (!empty (auth()->user()->ward_no)) {
                    $q->where('ward', auth()->user()->ward_no);
                }
            })
            ->contentType($type)
            ->orderByDesc('date')
            ->where(function (Builder $q) {
                if (!empty (auth()->user()->ward_no)) {
                    $authWardNo = auth()->user()->ward_no;
                    $wardString = implode(',', (array) $authWardNo);
                    $q->whereRaw("FIND_IN_SET('$wardString', ward) > 0");
                }
            })
            ->latest()->paginate(10);

        // Pass notices and type to the view
        return view('digitalboard::admin.notice.index', compact('notices', 'type'));

    }

    public function create($type)
    {
        $this->checkAuthorization('digitalBoardNotice_create');

        return view('digitalboard::admin.notice.create', compact('type'));
    }

    public function store($type, Request $request)
    {
        $this->checkAuthorization('digitalBoardNotice_create');

        if ($type === 'News') {
            $data = $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'date' => ['required'],

                'description' => ['nullable'],
                'closed_at' => ['nullable'],
                'show_on_index' => ['nullable', 'boolean'],
                'files' => ['array', 'nullable'],
                'files.*' => ['mimes:png,jpeg,jpg,pdf'],
                'ward' => ['nullable', 'array'],
                'is_displayed' => ['nullable', 'boolean'],

            ]);
        } else {
            $data = $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'date' => ['required'],

                'description' => ['nullable'],
                'closed_at' => ['nullable'],
                'show_on_index' => ['nullable', 'boolean'],
                'files' => ['array', 'required'],
                'files.*' => ['mimes:png,jpeg,jpg,pdf'],
                'ward' => ['nullable', 'array'],
                'is_displayed' => ['nullable', 'boolean']
            ]);
        }


        DB::transaction(function () use ($request, $type, $data) {
            $officeSetting = OfficeSetting::first();
            $notice = Notice::create($data + [
                'ward' => auth()->user()->ward_no,
                'user_id' => auth()->id(),
                'type' => $type,
                'fiscal_year_id' => $officeSetting->fiscal_year_id ?? null,
            ]);
            if ($request->hasFile('files')) {
                $this->fileUpload($notice, $request);
            }
        });


        toast($type === 'News' ? 'समाचार सफलतापूर्वक थपियो' : 'सूचना सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show($type, Notice $notice)
    {
        $this->checkAuthorization('digitalBoardNotice_access');

        $notice->load('files');

        return view('digitalboard::admin.notice.show', compact('notice', 'type'));
    }

    public function edit($type, Notice $notice)
    {
        $this->checkAuthorization('digitalBoardNotice_edit');

        return view('digitalboard::admin.notice.edit', compact('notice', 'type'));
    }

    public function update($type, UpdateNoticeRequest $request, Notice $notice)
    {
        $this->checkAuthorization('digitalBoardNotice_edit');

        DB::transaction(function () use ($request, $notice) {
            $notice->update($request->validated());
            if ($request->hasFile('files')) {
                $this->fileUpload($notice, $request);
            }
        });

        toast($type === 'News' ? 'समाचार सफलतापूर्वक अद्यावधिक गरियो' : 'सूचना सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.digitalBoard.notice.index', $type));
    }

    public function destroy($type, Notice $notice): RedirectResponse
    {
        $this->checkAuthorization('digitalBoardNotice_delete');

        foreach ($notice->files as $file) {
            $this->deleteFile($file->file);
        }
        $notice->files()->delete();
        $notice->delete();

        toast($type . ' सफलतापूर्वक मेटियो', 'success');

        return back();
    }

    public function updateClosedDate($type, Notice $notice): RedirectResponse
    {
        $notice->update([
            'closed_at' => !empty($notice->closed_at) ? null : now(),
        ]);
        toast('स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }

    public function updateShowOnIndex($type, Notice $notice): RedirectResponse
    {
        $notice->update([
            'show_on_index' => !$notice->show_on_index,
        ]);
        toast('स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }

    public function fileUpload($notice, $request): void
    {
        foreach ($request->file('files') as $file) {
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $notice->files()->create([
                'file_name' => $name,
                'extension' => $extension,
                'file' => $file->store('notice/' . Str::slug($request->input('title'), '_'), 'public'),
            ]);
        }
    }
}
