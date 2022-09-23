<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\OfficeHeader;
use App\Models\Settings\OfficeSetting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OfficeSettingController extends Controller
{
    public function index()
    {
        $officeSetting = OfficeSetting::first();
        $officeHeaders = OfficeHeader::orderBy('position')->get();
        return view('admin.setting.officeSetting.index', compact('officeSetting','officeHeaders'));
    }


    public function update(Request $request, OfficeSetting $officeSetting)
    {
        $validationData = $request->validate([
            'name' => ['required', 'string'],
            'logo' => ['nullable', 'mimes:png,jpg,jpeg,gif'],
            'logo1' => ['nullable', 'mimes:png,jpg,jpeg,gif'],
            'logo2' => ['nullable', 'mimes:png,jpg,jpeg,gif'],
            'background_image' => ['nullable', 'mimes:png,jpg,jpeg'],
            'google_map' => ['nullable'],
            'province_id' => ['required', Rule::exists('provinces', 'id')->withoutTrashed()],
            'district_id' => ['required', Rule::exists('districts', 'id')->withoutTrashed()],
            'local_body_id' => ['required', Rule::exists('local_bodies', 'id')->withoutTrashed()],
            'ward_no' => ['required'],
            'phone' => ['nullable'],
            'introduction' => ['nullable'],
            'email' => ['nullable', 'email'],
            'website' => ['nullable', 'url'],
            'facebook_link' => ['nullable', 'url']
        ],[
            'name.required'=>'नाम अनिवार्य छ|'
            ]

        );

        if ($request->hasFile('logo') && $officeSetting->logo) {
            $this->deleteFile($officeSetting->logo);
        }
        if ($request->hasFile('logo1') && $officeSetting->logo1) {
            $this->deleteFile($officeSetting->logo1);
        }
        if ($request->hasFile('logo2') && $officeSetting->logo2) {
            $this->deleteFile($officeSetting->logo2);
        }
        if ($request->hasFile('background_image') && $officeSetting->background_image) {
            $this->deleteFile($officeSetting->background_image);
        }
        $officeSetting->update($validationData);

        toast('कार्यालय सेटिङ सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }

}
