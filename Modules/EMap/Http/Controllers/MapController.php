<?php

namespace Modules\EMap\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\EMap\Entities\MapApply;

class MapController extends Controller
{
    public function index()
    {
        $maps = MapApply::with(['fiscalYear', 'mapApplyApplications' => function ($query) {
            $query->selectRaw('id,map_apply_id,file_type')->whereNull('rejected_at');
        }])->latest()->get();
        return view('emap::admin.map.index', compact('maps'));
    }


}
