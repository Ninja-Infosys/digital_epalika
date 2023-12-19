<?php

namespace Modules\Recommendation\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class SipharishFormFieldResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id ?? '',
            'sipharish_form_type_id' => $this->sipharish_form_type_id ?? '',
            'field_name' => $this->field_name ?? '',
            'slug' => $this->slug ?? '',
            'created_by' => $this->createdBy?->name ?? '',
            'type' => $this->type ?? '',
            'sipharis_form_field_id' => $this->sipharis_form_field_id ?? '',
            'sipharishFormFields' => SipharishFormFieldResource::collection($this->whenLoaded('SipharishFormFields')) ?? null
        ];
    }
}
