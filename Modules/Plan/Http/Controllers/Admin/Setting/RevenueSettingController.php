<?php

namespace Modules\Plan\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Settings\Units\Type;
use App\Models\Settings\Units\Unit;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Modules\EMap\Entities\MapSetting;

class RevenueSettingController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('revenueSetting_access');
        $mapSetting = MapSetting::first();
        $unitTypes = Type::all();
        $units = Unit::all();

        return view('emap::admin.setting.index', compact('mapSetting', 'unitTypes', 'units'));
    }

    public function store(Request $request)
    {
        $this->checkAuthorization('revenueSetting_create');
        $data = $request->validate([
            'land_measurement_id' => ['nullable', Rule::exists('types', 'id')->withoutTrashed()],
            'land_measurement_standard_id' => ['nullable', Rule::exists('units', 'id')->withoutTrashed()],
        ]);

        MapSetting::updateOrCreate([
            'id' => 1,
        ], $data);

        toast('सेटिंग अद्यावधिक गरियो', 'success');

        return redirect(route('emap.admin.mapSetting.index'));
    }
}
