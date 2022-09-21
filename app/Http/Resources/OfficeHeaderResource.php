<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfficeHeaderResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id ?? '',
            'title' => $this->title ?? '',
            'font' => $this->font ?? '',
            'font_family' => $this->font_family ?? '',
            'font_size' => $this->font_size ?? '',
            'font_color' => $this->font_color ?? ''

        ];
    }
}
