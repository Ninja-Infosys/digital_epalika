<?php

namespace Modules\DigitalBoard\Http\Controllers;


use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Modules\DigitalBoard\Entities\News;
use Modules\DigitalBoard\Entities\Notice;
use Modules\DigitalBoard\Http\Requests\Notice\StoreNoticeRequest;
use Modules\DigitalBoard\Http\Requests\Notice\UpdateNoticeRequest;

class NoticeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('digitalBoardNotice_access'),
            403,
            'तपाईंलाई डिजिटल बोर्ड सूचना पहुँच गर्न अनुमति छैन'
        );

        $notices = Notice::with('user')->orderByDesc('date')->get();

        return view('digitalboard::notice.index', compact('notices'));
    }

    public function create()
    {
        abort_if(Gate::denies('digitalBoardNotice_create'),
            403,
            'तपाईंलाई डिजिटल बोर्ड सूचना सिर्जना गर्न अनुमति छैन'
        );

        return view('digitalboard::notice.create');
    }

    public function store(StoreNoticeRequest $request)
    {
        abort_if(Gate::denies('digitalBoardNotice_create'),
            403,
            'तपाईंलाई डिजिटल बोर्ड सूचना सिर्जना गर्न अनुमति छैन'
        );

        DB::transaction(function () use ($request) {
            $notice = Notice::create($request->validated() + [
                    'user_id' => auth()->id()
                ]);

            if ($request->hasFile('files')) {
                $this->fileUpload($notice,$request);
            }
        });
        toast('सूचना सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(Notice $notice)
    {
        abort_if(Gate::denies('digitalBoardNotice_access'),
            403,
            'तपाईंलाई डिजिटल बोर्ड सूचना पहुँच गर्न अनुमति छैन'
        );

        return view('digitalboard::notice.show', compact('notice'));
    }

    public function edit(Notice $notice)
    {
        abort_if(Gate::denies('digitalBoardNotice_edit'),
            403,
            'तपाईंलाई डिजिटल बोर्ड सूचना अद्यावधिक गर्न अनुमति छैन'
        );

        return view('digitalboard::notice.edit', compact('notice'));
    }

    public function update(UpdateNoticeRequest $request, Notice $notice)
    {
        abort_if(Gate::denies('digitalBoardNotice_edit'),
            403,
            'तपाईंलाई डिजिटल बोर्ड सूचना अद्यावधिक गर्न अनुमति छैन'
        );

        DB::transaction(function () use($request,$notice){
            $notice->update($request->validated());
            if($request->hasFile('files'))
            {
                $this->fileUpload($notice,$request);
            }
        });


        toast('सूचना सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }

    public function destroy(Notice $notice)
    {
        abort_if(Gate::denies('digitalBoardNotice_delete'),
            403,
            'तपाइलाई डिजिटल बोर्ड सूचना मेटाउन अनुमति छैन '
        );

        $notice->delete();

        toast('सूचना सफलतापूर्वक मेटियो', 'success');
    }

//    public function updateClosedDate(News $news)
//    {
//        $news->update([
//            'closed_at'=> !empty($news->closed_at) ? null :now()
//        ]);
//        toast('समाचार स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
//        return back();
//
//    }

    public function fileUpload($notice,$request)
    {
        foreach ($request->file('files') as $file) {
            $extension = $file->getClientOriginalExtension();
            $name = $file->getClientOriginalName();
            $notice->files()->create([
                'file_name' => $name,
                'extension' => $extension,
                'file' => $file->store('notice/' . Str::words($request->input('title'), '_'), 'public')
            ]);
        }
    }
}
