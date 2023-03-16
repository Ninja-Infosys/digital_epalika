<?php

namespace Modules\ExecutiveMeeting\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class MeetingResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id ?? '',
            'title' => $this->meeting_name ?? '',
            'start' => $this->en_start_date ?? '',
            'end' => $this->en_end_date ?? '',
        ];
    }
}
