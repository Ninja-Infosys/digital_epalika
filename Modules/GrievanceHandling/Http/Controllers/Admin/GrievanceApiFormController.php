<?php

namespace Modules\GrievanceHandling\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Modules\GrievanceHandling\Entities\GrievanceDetail;
use Modules\GrievanceHandling\Entities\GrievanceType;
use Modules\GrievanceHandling\Transformers\GrievanceFormResource;

class GrievanceApiFormController extends Controller
{
    public function grievanceForm()
    {
        $grievanceDetails = GrievanceDetail::with([
        'grievanceDetails',
        'grievanceUser',
        'user',
        'grievanceType',
        'grievanceOffice',
        'publisher'
        ])
        ->get();
        return GrievanceFormResource::collection($grievanceDetails);
    }


}
