<?php

namespace Modules\DigitalBoard\Transformers\api\v1;

use App\Http\Resources\FileResource;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id ?? '',
            'title' => $this->title ?? '',
            'date' => $this->date ?? '',
            $this->mergeWhen(\Route::is('api-public.show-notice'), [
                'description' => $this->description ?? '',
                'files' => FileResource::collection($this->whenLoaded('files')),
            ]),
        ];
    }
}
