<?php

namespace Modules\EMap\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\MapSetting;

class MapSettingController extends Controller
{
    public function index()
    {
        $mapSetting = MapSetting::first();
        return view('emap::admin.setting.index', compact('mapSetting'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'map_request_form_format' => ['required'],
        ]);
        if (!empty($mapSetting = MapSetting::first())) {
            $mapSetting->update($data);
        } else {
            MapSetting::create($data);
        }
        toast('नक्सा सेटिंग अद्यावधिक गरियो', 'success');
        return redirect(route('emap.admin.setting.index'));
    }

}
