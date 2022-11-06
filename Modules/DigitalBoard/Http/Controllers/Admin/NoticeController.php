<?php

namespace Modules\DigitalBoard\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Settings\OfficeSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Modules\DigitalBoard\Entities\Notice;
use Modules\DigitalBoard\Http\Requests\Notice\UpdateNoticeRequest;

class NoticeController extends Controller
{
    public function index($type)
    {
        abort_if(Gate::denies('digitalBoardNotice_access'),
            403,
            'तपाईंलाई डिजिटल बोर्ड सूचना पहुँच गर्न अनुमति छैन'
        );
        if ($type === 'News') {
            $notices = Notice::with('user')->where('type', 'News')->orderByDesc('date')->get();
        } else {
            $notices = Notice::with('user')->where('type', 'Notice')->orderByDesc('date')->get();
        }
        return view('digitalboard::notice.index', compact('notices', 'type'));

    }

    public function create($type)
    {
        abort_if(Gate::denies('digitalBoardNotice_create'),
            403,
            'तपाईंलाई डिजिटल बोर्ड सूचना सिर्जना गर्न अनुमति छैन'
        );

        return view('digitalboard::notice.create', compact('type'));
    }

    public function store($type, Request $request)
    {
        abort_if(Gate::denies('digitalBoardNotice_create'),
            403,
            'तपाईंलाई डिजिटल बोर्ड सूचना सिर्जना गर्न अनुमति छैन'
        );

        if ($type === 'News') {
            $data = $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'date' => ['required'],
                'description' => ['nullable'],
                'closed_at' => ['nullable'],
                'show_on_index' => ['nullable', 'boolean'],
                'files' => ['array', 'nullable'],
                'files.*' => ['mimes:png,jpeg,jpg'],
            ]);
        } else {
            $data = $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'date' => ['required'],
                'description' => ['nullable'],
                'closed_at' => ['nullable'],
                'show_on_index' => ['nullable', 'boolean'],
                'files' => ['array', 'required'],
                'files.*' => ['mimes:png,jpeg,jpg'],
            ]);
        }


        DB::transaction(function () use ($request, $type, $data) {
            $officeSetting = OfficeSetting::first();
            $notice = Notice::create($data + [
                    'user_id' => auth()->id(),
                    'type' => $type,
                    'fiscal_year_id' => $officeSetting->fiscal_year_id ?? null
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
        abort_if(Gate::denies('digitalBoardNotice_access'),
            403,
            'तपाईंलाई डिजिटल बोर्ड सूचना पहुँच गर्न अनुमति छैन'
        );

        $notice->load('files');
        return view('digitalboard::notice.show', compact('notice', 'type'));
    }

    public function edit($type, Notice $notice)
    {
        abort_if(Gate::denies('digitalBoardNotice_edit'),
            403,
            'तपाईंलाई डिजिटल बोर्ड सूचना अद्यावधिक गर्न अनुमति छैन'
        );

        return view('digitalboard::notice.edit', compact('notice', 'type'));
    }

    public function update($type, UpdateNoticeRequest $request, Notice $notice)
    {
        abort_if(Gate::denies('digitalBoardNotice_edit'),
            403,
            'तपाईंलाई डिजिटल बोर्ड सूचना अद्यावधिक गर्न अनुमति छैन'
        );

        DB::transaction(function () use ($request, $notice) {
            $notice->update($request->validated());
            if ($request->hasFile('files')) {
                $this->fileUpload($notice, $request);
            }
        });


        toast($type === 'News' ? 'समाचार सफलतापूर्वक अद्यावधिक गरियो' : 'सूचना सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.digitalBoard.notice.index', $type));
    }

    public function destroy($type, Notice $notice)
    {
        abort_if(Gate::denies('digitalBoardNotice_delete'),
            403,
            'तपाइलाई डिजिटल बोर्ड सूचना मेटाउन अनुमति छैन '
        );

        foreach ($notice->files as $file) {
            $this->deleteFile($file->file);
        }
        $notice->files()->delete();
        $notice->delete();

        toast($type . ' सफलतापूर्वक मेटियो', 'success');
        return back();
    }

    public function updateClosedDate($type, Notice $notice)
    {
        $notice->update([
            'closed_at' => !empty($notice->closed_at) ? null : now()
        ]);
        toast('स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();

    }

    public function updateShowOnIndex($type, Notice $notice)
    {
        $notice->update([
            'show_on_index' => !$notice->show_on_index
        ]);
        toast('स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();

    }

    public function fileUpload($notice, $request)
    {
        foreach ($request->file('files') as $file) {
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $notice->files()->create([
                'file_name' => $name,
                'extension' => $extension,
                'file' => $file->store('notice/' . Str::slug($request->input('title'), '_'), 'public')
            ]);
        }
    }
}
