<?php

namespace Modules\ExecutiveMeeting\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class MeetingEventResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id ?? '',
            'title'=>$this->event_name ?? '',
            'start'=>$this->en_start_date?->toDateString() ?? '',
            'end'=>$this->en_end_date?->toDateString() ?? '',
        ];
    }
}
