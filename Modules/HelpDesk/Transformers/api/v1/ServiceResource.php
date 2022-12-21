<?php

namespace Modules\HelpDesk\Transformers\api\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id ?? '',
            'service_name' => $this->service_name ?? '',
            'time_taken' => $this->time_taken ?? '',
            'responsible_officer' => $this->responsible_officer ?? '',
            'office' => $this->office ?? '',
            'remarks' => $this->remarks ?? '',
            'branch' => BranchResource::make($this->whenLoaded('branch')),
            'serviceDocuments' => ServiceDocumentResource::collection($this->whenLoaded('serviceDocuments')),
            'serviceEmployees' => ServiceEmployeeResource::collection($this->whenLoaded('serviceEmployees')),
            'serviceProcesses' => ServiceProcessResource::collection($this->whenLoaded('serviceProcesses')),
        ];
    }
}
