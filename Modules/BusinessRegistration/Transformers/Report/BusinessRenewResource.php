<?php

namespace Modules\BusinessRegistration\Transformers\Report;

use Illuminate\Http\Resources\Json\JsonResource;

class BusinessRenewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
