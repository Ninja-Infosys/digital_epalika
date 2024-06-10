<?php

namespace Modules\EMap\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\EMap\Entities\BuildingDocumentationSetting;

class BuildingDocumentationSettingController extends Controller
{
    public function index()
    {
        $buildingDocumentationSetting = BuildingDocumentationSetting::first();

        return view('emap::admin.buildingDocumentation.setting.index', compact('buildingDocumentationSetting'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'is_building_documentation' => ['nullable', 'boolean'],
        ]);

        $buildingDocumentationSetting = BuildingDocumentationSetting::first();

        if ($buildingDocumentationSetting) {
            $buildingDocumentationSetting->update($data);
            toast('सेटिङ सफलतापूर्वक अद्यावधिक गरियो', 'success');
        } else {
            BuildingDocumentationSetting::create($data);
            toast('सेटिङ सफलतापूर्वक सिर्जना गरियो', 'success');
        }

        return back();
    }

}
