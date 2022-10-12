<?php

namespace Modules\EMap\Http\Controllers;

use App\Models\Settings\Units\Type;
use App\Models\Settings\Units\Unit;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Modules\EMap\Entities\MapSetting;

class MapSettingController extends Controller
{
    public function index()
    {
        $mapSetting = MapSetting::first();
        $unitTypes = Type::all();
        $units = Unit::all();
        return view('emap::admin.setting.index', compact('mapSetting', 'unitTypes', 'units'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'map_request_form_format' => ['nullable'],
            'land_measurement_id' => ['nullable', Rule::exists('types', 'id')->withoutTrashed()],
            'land_measurement_standard_id' => ['nullable', Rule::exists('units', 'id')->withoutTrashed()],
        ]);
        if (!empty($mapSetting = MapSetting::first())) {
            $mapSetting->update($data);
        } else {
            MapSetting::create($data);
        }
        toast('नक्सा सेटिंग अद्यावधिक गरियो', 'success');
        return redirect(route('emap.admin.mapSetting.index'));
    }

}
