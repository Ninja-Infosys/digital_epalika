<?php

namespace Modules\GrievanceHandling\Http\Controllers\Admin;

use App\Models\Settings\Branch;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Modules\GrievanceHandling\Entities\GrievanceDetail;
use Modules\GrievanceHandling\Entities\GrievanceType;
use Modules\GrievanceHandling\Enums\GrievanceComplaintSeverity;
use Modules\GrievanceHandling\Transformers\GrievanceFormResource;

class GrievanceApiFormController extends Controller
{
    public function grievanceFormSetting()
    {
        return [
            'grievanceTypes' => GrievanceType::selectRaw('id,title')->get(),
            'branches' => Branch::selectRaw('id,branch_name')->get(),
            'grievanceSeverity' => GrievanceComplaintSeverity::getValuesWithLabels(),
        ];
    }


}
