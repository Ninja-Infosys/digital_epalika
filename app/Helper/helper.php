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
    function get_districts($province_ids = [], int $districtId = null)
    {
        $province_ids = is_array($province_ids) ? $province_ids : [$province_ids];

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
    function get_local_bodies($district_ids = [], int $localBodyId = null)
    {
        $district_ids = is_array($district_ids) ? $district_ids : [$district_ids];
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

if (!function_exists('renderListData')) {
    function renderListData($data): void
    {
        foreach ($data as $value) {
            if (is_array($value)) {
                renderListData($value);
            } else {
                echo '<td>' . $value . '</td>';
            }
        }
    }
}

if (!function_exists('getFileType')) {
    function getFileType($base64String): string
    {
// Get the start position of the file type string (e.g., "data:image/png;base64,")
        $startPos = strpos($base64String, ':') + 1;

// Get the end position of the file type string
        $endPos = strpos($base64String, ';');

// Extract the file type string
        return substr($base64String, $startPos, $endPos - $startPos); // Outputs "image/png"
    }
}

if (!function_exists('base64ToFile')) {
    function base64ToFile($base64String, $fileType): string
    {
        $randomString = Str::random(32);

        // Get the file extension from the file type
        $extension = explode('/', $fileType)[1];

        // Construct the file name
        $fileName = "images/{$randomString}.{$extension}";

        // Decode the base64 string
        $data = base64_decode($base64String);

        // Use the Storage facade to write the file to the public folder
        Storage::put($fileName, $data);

        // Return the file name
        return $fileName;
    }
}
if (!function_exists('isBase64')) {
    function isBase64($string): bool
    {
        $bool = false;
        if (str_contains($string, 'data:')) {
            $bool = true;
        }
        return $bool;
    }
}
if (!function_exists('getAllFilesAndFolders')) {
    function getAllFilesAndFolders(string $folder): array
    {
        $files = Storage::disk('public')->directories('directory_name');
dd($files);
        return $files;
    }
}
