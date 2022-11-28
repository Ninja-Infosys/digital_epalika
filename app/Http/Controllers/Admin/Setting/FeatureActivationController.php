<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\FeatureActivation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FeatureActivationController extends Controller
{
    public function showFeatureActivationPage()
    {
        $this->checkAuthorization('feature_access');

        $featureActivations = FeatureActivation::get()->groupBy(function ($feature){

            return $feature->getRawOriginal('feature_type');
        });

        return view('admin.setting.feature.index', compact('featureActivations'));
    }

    public function updateFeatureActivationPage(FeatureActivation $featureActivation)
    {
        $this->checkAuthorization('feature_access');

        $featureActivation->update([
            'feature_status' => !$featureActivation->feature_status
        ]);
        toast('Featured Updated Successfully', 'success');
        return back();
    }

    public function smsSetting(): Factory|View|Application
    {
        $this->checkAuthorization('sms_access');

        return view('admin.setting.sms.index');
    }

    public function UpdateSmsSetting(): Factory|View|Application
    {
        $this->checkAuthorization('sms_access');

        return view('admin.setting.sms.index');
    }

    public function mailSetting()
    {
        $this->checkAuthorization('mail_access');

        return view('admin.setting.sms.index');
    }

    public function updateMailSetting()
    {
        $this->checkAuthorization('mail_access');

        toast('Mail Updated Successfully', 'success');
        return back();
    }


    public function overWriteEnvFile($type, $val)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            $val = '"' . trim($val) . '"';
            if (is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0) {
                file_put_contents($path, str_replace(
                    $type . '="' . env($type) . '"', $type . '=' . $val, file_get_contents($path)
                ));
            } else {
                file_put_contents($path, file_get_contents($path) . "\r\n" . $type . '=' . $val);
            }
        }
    }
}
