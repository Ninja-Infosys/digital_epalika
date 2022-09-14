<?php

namespace Modules\DigitalBoard\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\DigitalBoard\Entities\Video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::latest()->get();

        return view('digitalboard::video.index', compact('videos'));
    }

    public function create()
    {
        return view('digitalboard::video.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Video $video)
    {
        //
    }

    public function edit(Video $video)
    {
        return view('digitalboard::video.edit');
    }

    public function update(Request $request, Video $video)
    {
        //
    }

    public function destroy(Video $video)
    {
        //
    }
}
