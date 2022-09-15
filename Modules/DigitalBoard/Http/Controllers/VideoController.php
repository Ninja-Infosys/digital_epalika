<?php

namespace Modules\DigitalBoard\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\DigitalBoard\Entities\Video;
use Modules\DigitalBoard\Http\Requests\Video\StoreVideoRequest;
use Modules\DigitalBoard\Http\Requests\Video\UpdateVideoRequest;

class VideoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('digitalBoardVideo_access'),
            403,
            'You are not allowed to digital board video access'
        );

        $videos = Video::latest()->get();

        return view('digitalboard::video.index', compact('videos'));
    }

    public function create()
    {
        abort_if(Gate::denies('digitalBoardVideo_create'),
            403,
            'You are not allowed to digital board video create'
        );

        return view('digitalboard::video.create');
    }

    public function store(StoreVideoRequest $request)
    {
        abort_if(Gate::denies('digitalBoardVideo_create'),
            403,
            'You are not allowed to digital board video create'
        );

        Video::create($request->validated());

        toast('भिडियो सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(Video $video)
    {
        abort_if(Gate::denies('digitalBoardVideo_access'),
            403,
            'You are not allowed to digital board video access'
        );
    }

    public function edit(Video $video)
    {
        abort_if(Gate::denies('digitalBoardVideo_edit'),
            403,
            'You are not allowed to digital board video edit'
        );

        return view('digitalboard::video.edit', compact('video'));
    }

    public function update(UpdateVideoRequest $request, Video $video)
    {
        abort_if(Gate::denies('digitalBoardVideo_edit'),
            403,
            'You are not allowed to digital board video edit'
        );
        if ($request->hasFile('video') && $video->video) {
            $this->deleteFile($video->video);
        }

        $video->update($request->validated());

        toast('भिडियो सफलतापूर्वक अपडेट गरियो', 'success');

        return redirect(route('admin.digitalBoard.video.index'));
    }

    public function destroy(Video $video)
    {
        abort_if(Gate::denies('digitalBoardVideo_delete'),
            403,
            'You are not allowed to digital board video delete'
        );

        if ($video->video) {
            $this->deleteFile($video->video);
        }
        $video->delete();

        toast('भिडियो सफलतापूर्वक मेटियो', 'success');

        return back();
    }
}
