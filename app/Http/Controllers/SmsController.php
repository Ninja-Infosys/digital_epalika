<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function setting()
    {
        return view('admin.setting.sms.index');
    }

    public function setSmsKeyInEnvironment(Request $request)
    {
        $request->validate([
            'samaya_api_key' => ['required'],
            'samaya_sender_id' => ['required'],
        ]);

        $this->setEnvironmentValue('SMS_API_KEY', $request->input('samaya_api_key'));
        $this->setEnvironmentValue('SMS_SENDER_ID', $request->input('samaya_sender_id'));

        toast('Samaya Sms set Successfully');

        return redirect(route('admin.setting.sms'));
    }

    public function setEnvironmentValue($envKey, $envValue): void
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
