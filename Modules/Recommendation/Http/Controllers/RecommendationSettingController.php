<?php

namespace Modules\Recommendation\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Settings\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\Recommendation\Entities\RecommendationSetting;

class RecommendationSettingController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('recommendationSetting_access');
        $users = User::all();
        $recommendationSetting = RecommendationSetting::where('ward', auth()->user()->ward_no)->first();

        return view('recommendation::admin.setting.employee', compact('users', 'recommendationSetting'));
    }

    public function store(Request $request)
    {
        $this->checkAuthorization('recommendationSetting_edit');
        $data = $request->validate([
            'approver_id' => ['required'],
            'checker_id' => ['required'],
        ]);

        $recommendationSetting = RecommendationSetting::where('ward', auth()->user()->ward_no)->first();
        if ($recommendationSetting) {
            $recommendationSetting->update($data);
        } else {
            RecommendationSetting::create($data + [
                'ward' => auth()->user()->ward_no,
            ]);
        }

        toast('सेटिङ सफलता पुर्वक सेट गरियो');

        return back();
    }
}
