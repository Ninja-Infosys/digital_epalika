<?php

namespace Modules\Recommendation\Transformers;

use App\Http\Resources\FileResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SifarishFormResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'=> $this->id ??'',
            'status'=> $this->status ??'',
            // 'personal_detail_id' => $this->personal_detail_id ?? '',
            'sipharis_category_id' => $this->sipharis_category_id ?? '',
            'sipharis_sub_category_id' => $this->sipharis_sub_category_id ?? '',
            'status' => $this->status ?? '',
            'sipharis_form_type_id' => $this->sipharis_form_type_id ?? '',
            'files' => FileResource::collection($this->whenLoaded('files'))??'',
            'fields' => SifarishFormFieldResource::collection('fields'),
            'personal_details' => PersonalDetailResource::make($this->whenLoaded('personal_details'))

        ];
    }
}
