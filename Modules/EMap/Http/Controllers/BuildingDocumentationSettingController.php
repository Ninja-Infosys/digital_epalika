<?php

namespace Modules\EMap\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        } else {
            BuildingDocumentationSetting::create($data);
        }

        toast('सेटिङ सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect()->route('emap.admin.buildingDocumentationSetting.index');
    }


}
