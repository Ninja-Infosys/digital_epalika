<?php

namespace Modules\EMap\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\EMap\Entities\BuildingDocumentationSetting;

class BuildingDocumentationSettingController extends Controller
{
    public function index(BuildingDocumentationSetting $buildingDocumentationSetting)
    {
        $buildingDocumentationSetting = BuildingDocumentationSetting::first();

        return view('emap::admin.buildingDocumentation.setting.index', compact('buildingDocumentationSetting'));
    }



    public function update(Request $request, BuildingDocumentationSetting $buildingDocumentationSetting)
    {
        $data = $request->validate([
                    'is_building_documentation' => ['nullable', 'boolean'],
                ]);
        $buildingDocumentationSetting->update($data);
        toast(' सेटिङ सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }
}
