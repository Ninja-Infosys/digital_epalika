<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Gate;

class SmsController extends Controller
{
    public function setting(): Factory|View|Application
    {
        abort_if(
            Gate::denies('sms_access'),
            403,
            'You are not allowed to access this resource'
        );
        return view('admin.setting.sms.index');
    }

    public function setSmsKeyInEnvironment(Request $request): Redirector|Application|RedirectResponse
    {
        abort_if(
            Gate::denies('sms_access'),
            403,
            'You are not allowed to access this resource'
        );
        $request->validate([
            'samaya_api_key' => ['required'],
            'samaya_sender_id' => ['required'],
        ]);

        $this->setEnvironmentValue('SMS_API_KEY', $request->input('samaya_api_key'));
        $this->setEnvironmentValue('SMS_SENDER_ID', $request->input('samaya_sender_id'));

        toast('Samaya Sms set Successfully');

        return redirect(route('admin.setting.sms'));
    }

    private function setEnvironmentValue($envKey, $envValue): void
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        $oldValue = env($envKey);

        $str = str_replace("{$envKey}='{$oldValue}'", "{$envKey}='{$envValue}'\n", $str);

        $fp = fopen($envFile, 'wb');
        fwrite($fp, $str);
        fclose($fp);
    }
}
