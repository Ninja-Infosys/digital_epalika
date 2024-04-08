<?php

namespace Modules\DigitalBoard\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Modules\DigitalBoard\Entities\Video;
use Modules\DigitalBoard\Http\Requests\Video\StoreVideoRequest;
use Modules\DigitalBoard\Http\Requests\Video\UpdateVideoRequest;
use Illuminate\Database\Eloquent\Builder;

class VideoController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('digitalBoardVideo_access');

        $videos = Video::where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['title'], request('search'));
            }

            if (!empty(auth()->user()->ward_no)) {
                $authWardNo = auth()->user()->ward_no;

                // Check if $authWardNo is an array
                if (is_array($authWardNo)) {
                    foreach ($authWardNo as $ward) {
                        $q->orWhereRaw("FIND_IN_SET('$ward', ward) > 0");
                    }
                } else {
                    // If it's not an array, use it directly
                    $q->whereRaw("FIND_IN_SET('$authWardNo', ward) > 0");
                }
            }
        })
        ->latest()->paginate(10);


        return view('digitalboard::admin.video.index', compact('videos'));
    }

    public function create()
    {
        $this->checkAuthorization('digitalBoardVideo_create');

        return view('digitalboard::admin.video.create');
    }

    public function store(StoreVideoRequest $request)
    {
        $this->checkAuthorization('digitalBoardVideo_create');

        Video::create($request->validated() + [ 'user_id' => auth()->id(),  'ward' => auth()->user()->ward_no]);

        toast('भिडियो सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(Video $video)
    {
        $this->checkAuthorization('digitalBoardVideo_access');
    }

    public function edit(Video $video)
    {
        $this->checkAuthorization('digitalBoardVideo_edit');
        $users = User::all();

        return view('digitalboard::admin.video.edit', compact('video','users'));
    }

    public function update(UpdateVideoRequest $request, Video $video)
    {
        $this->checkAuthorization('digitalBoardVideo_edit');
        if ($video->video !== $request->input('video')) {
            $this->deleteFile($video->video);
        }

        $video->update($request->validated());

        toast('भिडियो सफलतापूर्वक अपडेट गरियो', 'success');

        return redirect(route('admin.digitalBoard.video.index'));
    }

    public function destroy(Video $video)
    {
        $this->checkAuthorization('digitalBoardVideo_delete');

        if ($video->video) {
            $this->deleteFile($video->video);
        }
        $video->delete();

        toast('भिडियो सफलतापूर्वक मेटियो', 'success');

        return back();
    }
}
