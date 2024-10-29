<?php

namespace Modules\Recommendation\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Modules\Recommendation\Entities\SipharisSetting;
use Modules\Recommendation\Http\Requests\sipharisSetting\StoreSipharisSettingRequest;

class SipharisSettingController extends Controller
{
    public function index()
    {

        $this->checkAuthorization('recommendationTemplate_access');
        $sipharisSetting = SipharisSetting::first();
        $users = User::get();

        return view('recommendation::admin.setting.sipharisSetting.index', compact('users', 'sipharisSetting'));
    }

    public function store(StoreSipharisSettingRequest $request)
    {
        $this->checkAuthorization('recommendationTemplate_edit');
        DB::table('sipharis_settings')->truncate();
        $wardNo = auth()->user()->ward_no ?? '';
        SipharisSetting::create($request->validated() + ['ward' => $wardNo]);
        Cache::forget('sipharis_settings');
        toast('सिफारिस सफलतापूर्वक थपियो', 'success');

        return back();

    }
}
