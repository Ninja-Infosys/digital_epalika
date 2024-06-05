<?php

namespace Modules\EMap\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\EMap\Entities\BuildingDocumentationSetting;

class BuildingDocumentationSettingController extends Controller
{
    public function index(BuildingDocumentationSetting $buildingDocumentationSetting)
    {
        return view('emap::admin.buildingDocumentation.setting.index', compact('buildingDocumentationSetting'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'is_building_documentation' => ['nullable', 'boolean'],
        ]);

        // Find the latest BuildingDocumentationSetting record or create a new one
        $buildingDocumentationSetting = BuildingDocumentationSetting::latest()->first();

        if ($buildingDocumentationSetting) {
            $buildingDocumentationSetting->update($data);
        }
        toast('सेटिङ सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }
}
