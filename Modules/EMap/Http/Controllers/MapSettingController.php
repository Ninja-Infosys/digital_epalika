<?php

namespace Modules\EMap\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Settings\Units\Type;
use App\Models\Settings\Units\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Modules\EMap\Entities\MapSetting;

class MapSettingController extends Controller
{
    public function index()
    {

        abort_if(
            Gate::denies('mapSetting_access'),
            403,
            'You are not allowed to employee access'
        );
        $mapSetting = MapSetting::first();
        $unitTypes = Type::all();
        $units = Unit::all();

        return view('emap::admin.setting.index', compact('mapSetting', 'unitTypes', 'units'));
    }

    public function store(Request $request)
    {

        abort_if(
            Gate::denies('mapSetting_create'),
            403,
            'You are not allowed to employee access'
        );
        $data = $request->validate([
            'map_request_form_format' => ['nullable'],
            'land_measurement_id' => ['nullable', Rule::exists('types', 'id')->withoutTrashed()],
            'land_measurement_standard_id' => ['nullable', Rule::exists('units', 'id')->withoutTrashed()],
        ]);
        if (! empty($mapSetting = MapSetting::first())) {
            $mapSetting->update($data);
        } else {
            MapSetting::create($data);
        }
        toast('नक्सा सेटिंग अद्यावधिक गरियो', 'success');

        return redirect(route('emap.admin.mapSetting.index'));
    }
}
