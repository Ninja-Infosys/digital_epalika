<?php

namespace Modules\Plan\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class MapFeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $request_columns = $request->input('columns')['map_frees'] ?? [];

        return [
            'storey'=>$this->storey??'',
            'unit_id'=>$this->unit_id??'',
            'rate'=>$this->rate??'',
        ];
    }
}
