<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\FeatureActivation;

class FeatureActivationController extends Controller
{
    public function showFeatureActivationPage()
    {
        $this->checkAuthorization('feature_access');

        $featureActivations = FeatureActivation::get()->groupBy(function ($feature) {
            return $feature->getRawOriginal('feature_type');
        });

        return view('admin.setting.feature.index', compact('featureActivations'));
    }

    public function updateFeatureActivation(FeatureActivation $featureActivation)
    {
        $this->checkAuthorization('feature_access');

        FeatureActivation::where('feature_type', $featureActivation->feature_type)
            ->where('id', '!=', $featureActivation->id)
            ->update([
                'feature_status' => 0
            ]);

        $featureActivation->update([
            'feature_status' => !$featureActivation->feature_status
        ]);
        toast('Featured Updated Successfully', 'success');
        return back();
    }
}
