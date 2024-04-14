<?php

namespace Modules\Recommendation\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
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
        $sipharisSetting = SipharisSetting::first();
        $users = User::get();
        return view('recommendation::admin.setting.sipharisSetting.index', compact('users', 'sipharisSetting'));
    }

    public function store(StoreSipharisSettingRequest $request)
    {
        DB::table('sipharis_settings')->truncate();
        $wardNo = auth()->user()->ward_no ?? '';
        $sipharisSetting = SipharisSetting::create($request->validated() + ['ward' => $wardNo]);
        Cache::forget('sipharis_settings');
        toast('सिफारिस सफलतापूर्वक थपियो', 'success');
        return back();

    }

}
