<?php

namespace Modules\ExecutiveMeeting\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\ExecutiveMeeting\Entities\NoticeEvent;
use Modules\ExecutiveMeeting\Transformers\NoticeEventResource;

class NoticeEventController extends Controller
{
    public function index(Request $request)

    {

        $data = NoticeEvent::select(['title', 'start', 'end'])->whereDate('start', '>=', $request->start)
            ->whereDate('end', '<=', $request->end)
            ->get();
        return NoticeEventResource::collection($data);


    }

    public function store(Request $request)
    {


        $event = NoticeEvent::create([
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
            'className' => 'bg-success'
        ]);


        return NoticeEventResource::make($event);


    }
}
