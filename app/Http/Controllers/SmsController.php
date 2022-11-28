<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class SmsController extends Controller
{
    public function setting(): Factory|View|Application
    {
        $this->checkAuthorization('sms_access');

        return view('admin.setting.sms.index');
    }

    public function setSamayaSmsConfig(Request $request)
    {
        $this->checkAuthorization('sms_access');

        $request->validate([
            'samaya_api_key' => ['required'],
            'samaya_sender_id' => ['required'],
            'samaya_is_active' => ['nullable', 'boolean'],
        ]);

        config()->set('sms.samaya.is_active', $request->boolean('samaya_is_active'));
        config()->set('sms.samaya.api_key', $request->input('samaya_api_key'));
        config()->set('sms.samaya.sms_id', $request->input('samaya_sender_id'));

        toast('Samaya Sms set Successfully');

        return redirect(route('admin.setting.sms'));
    }

    public function setAakashSmsConfig(Request $request)
    {
        $this->checkAuthorization('sms_access');

        $request->validate([
            'aakash_api_key' => ['required'],
            'aakash_is_active' => ['nullable', 'boolean'],
        ]);

        \Config::set("sms.aakash.is_active", $request->boolean('aakash_is_active'));
        \Config::set("sms.aakash.api_key", $request->input('aakash_api_key'));

        toast('Aakash Sms set Successfully');

        return redirect(route('admin.setting.sms'));
    }
}
