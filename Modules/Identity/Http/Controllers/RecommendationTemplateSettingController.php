<?php

namespace Modules\Identity\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Identity\Entities\RecommendationTemplateSetting;

class RecommendationTemplateSettingController extends Controller
{
    public function index()
    {
        $recommendationTemplateSetting = $this->recommendationTemplateSettingData();
        return view('identity::admin.setting.recommendationSetting.index', compact('recommendationTemplateSetting'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['required'],
        ]);
        $recommendationTemplateSetting = $this->recommendationTemplateSettingData();
        if ($recommendationTemplateSetting) {
            $recommendationTemplateSetting->update($data);
        } else {
            RecommendationTemplateSetting::create($data);
        }
        toast('टेम्पलेट सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function updateStatus(RecommendationTemplateSetting $recommendationTemplateSetting)
    {
        $recommendationTemplateSetting->update([
            'status'=>!$recommendationTemplateSetting->status
        ]);
        toast('टेम्पलेट सफलतापूर्वक थपियो', 'success');
        return back();
    }

    private function recommendationTemplateSettingData()
    {
        return RecommendationTemplateSetting::first();
    }
}
