<?php

namespace Modules\DigitalBoard\Transformers\api;


use Illuminate\Http\Resources\Json\JsonResource;

class HeaderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->title ?? '',
            'font' => $this->font ?? '',
            'font_size' => $this->font_size ?? '',
            'position' => $this->position ?? '',
            'font_color' => $this->font_color ?? '',
        ];
    }
}
