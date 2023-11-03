<?php

namespace Modules\Plan\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class LandUseAreaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $request_columns = $request->input('columns')['land_use_areas'] ?? [];

        return [
            'title'=>$this->title??'',
        'coordinates'=>$this->coordinates??'',
        ];
    }
}
