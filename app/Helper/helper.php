<?php

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\FeatureActivation;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

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

if (!function_exists('get_provinces')) {
    function get_provinces(int $provinceId = null)
    {
        $provinces = Cache::rememberForever('provinces', function () {
            return Province::all();
        });

        if ($provinceId !== null) {
            $provinces = $provinces->where('id', $provinceId)->first();
        }

        return $provinces ?? [];
    }
}

if (!function_exists('get_districts')) {
    function get_districts(array $province_ids = [], int $districtId = null)
    {
        $allDistricts = Cache::rememberForever('allDistricts', function () {
            return District::orderBy('province_id')->get();
        });
        if (!empty($province_ids)) {
            $allDistricts = $allDistricts->whereIn('province_id', $province_ids);
        }

        if ($districtId !== null) {
            $allDistricts = $allDistricts->where('id', $districtId)->first();
        }

        return $allDistricts ?? [];
    }
}

if (!function_exists('get_local_bodies')) {
    function get_local_bodies(array $district_ids = [], int $localBodyId = null)
    {
        $allLocalBodies = Cache::rememberForever('localBodies', function () {
            return LocalBody::all();
        });
        if (!empty($district_ids)) {
            $allLocalBodies = $allLocalBodies->whereIn('district_id', $district_ids);
        }

        if ($localBodyId !== null) {
            $allLocalBodies = $allLocalBodies->where('id', $localBodyId)->first();
        }
        return $allLocalBodies ?? [];
    }
}

if (!function_exists('getArrayKeys')) {
    function getArrayKeys($array = []): array
    {

        $keys = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $keys = array_merge($keys, getArrayKeys($value));
            } else {
                $keys[] = $key;
            }
        }

        return array_unique($keys);
    }
}

if (!function_exists('removeColumns')) {
    function removeColumns($array, $excludeColumns): Collection
    {
        foreach ($array as &$element) {
            if (is_array($element)) {
                $element = removeColumns($element, $excludeColumns);
            } else {
                foreach ($excludeColumns as $column) {
                    if (array_key_exists($column, $array)) {
                        unset($array[$column]);
                    }
                }
            }
        }
        return collect($array);
    }
}
