<?php

namespace Modules\DigitalBoard\Transformers\api;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->title ?? '',
            'image' => $this->image ?? '',
            'date' => $this->date ?? '',
        ];
    }
}
