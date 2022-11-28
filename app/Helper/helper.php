<?php

use App\Models\FeatureActivation;

if (!function_exists('get_setting')) {
    function get_setting($key, $default = null)
    {
        $settings = Cache::remember('settings', 86400, function () {
            return FeatureActivation::all();
        });

        $setting = $settings->where('feature_name_en', $key)->first();

        return $setting == null ? $default : $setting->feature_status;
    }
}
