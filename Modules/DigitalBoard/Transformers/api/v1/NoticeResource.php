<?php

namespace Modules\DigitalBoard\Transformers\api\v1;

use App\Http\Resources\FileResource;
use Illuminate\Http\Resources\Json\JsonResource;

class NoticeResource extends JsonResource
{
    public function toArray($request)
    {
        return[
            'id' => $this->id ?? '',
            'title' => $this->title ?? '',
            'date' => $this->date ?? '',
            'type' => 'सूचना',
            $this->mergeWhen(\Route::is('api-public.show-notice'),[
                'description' => $this->description ?? '',
                'files' => FileResource::collection($this->whenLoaded('files')),
            ]),

        ];
    }
}
