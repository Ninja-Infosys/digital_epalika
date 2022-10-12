<?php

namespace Modules\EMap\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\EMap\Entities\MapApply;

class MapController extends Controller
{
    public function index()
    {
        $maps = MapApply::get();
        return view('emap::admin.map.index', compact('maps'));
    }


}
