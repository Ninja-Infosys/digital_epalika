<?php

namespace Modules\Plan\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $request_columns = $request->input('columns')['organizations'] ?? [];

        return [
            'id'=>$this->id??'',
            'name'=>$this->name??'',
            'email'=>$this->email??'',
            'phone'=>$this->phone??'',
            'is_active'=>$this->is_active??'',
            'is_organization'=>$this->is_organization??'',
            'password'=>$this->password??'',
        ];
    }
}
