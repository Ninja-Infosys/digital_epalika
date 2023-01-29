<?php

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\FeatureActivation;
use App\Models\Settings\OfficeSetting;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

if(!function_exists('officeSetting')){
    function officeSetting()
    {
        return Cache::rememberForever('office_setting', function () {
            return OfficeSetting::with('fiscalYear', 'province', 'district', 'localBody')->first();
        });
    }
}

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
if (!function_exists('getAllForSideBarFolders')) {
    function getAllForSideBarFolders(string $folder)
    {
        if (Storage::disk('public')->exists($folder)) {
            $directories = collect(Storage::disk('public')->directories($folder, true))->map(function ($item) {
                return explode('/', $item);
            });
            return convertPathsToTree($directories);
        }
        return [];
    }
}
if (!function_exists('getAllFilesAndFolder')) {
    function getAllFilesAndFolder(string $folder)
    {
        if (Storage::disk('public')->exists($folder)) {
            $directories = collect(Storage::disk('public')->directories($folder))->map(function ($item) {
                return explode('/', $item);
            });
            $files =  collect(Storage::disk('public')->files($folder))->map(function ($item) {
                return explode('/', $item);
            });

            return [
                'directories' => convertPathsToTree($directories),
                'files' => convertPathsToTree($files)
            ];
        }
        return [];
    }
}
if (!function_exists('convertPathsToTree')) {
    function convertPathsToTree($paths, $separator = '/', $parent = null)
    {
        return $paths
            ->groupBy(function ($parts) {
                return $parts[0];
            })->map(function ($parts, $key) use ($separator, $parent) {
                $childrenPaths = $parts->map(function ($parts) {
                    return array_slice($parts, 1);
                })->filter();

                $path = $parent . $key;

                $response = [
                    'label' => (string)$key,
                    'path' => $path,
                ];

                if ($isFile = File::isFile(public_path('storage/' . $path))) {
                    $response['isFile'] = $isFile;
                    $response['detail'] = [
                        'size' => convert_to_highest_unit(File::size(public_path('storage/' . $path))),
                        'icon' => getFileIconClass(File::mimeType(public_path('storage/' . $path))),
                        'extension' => File::extension(public_path('storage/' . $path)),
                        'name' => File::name(public_path('storage/' . $path)),
                    ];
                } else {
                    $response['isFile'] = false;
                    $response['children'] = convertPathsToTree(
                        $childrenPaths,
                        $separator,
                        $path . $separator
                    );
                }

                return $response;
            })->values();
    }
}

if (!function_exists('convert_to_highest_unit')) {
    function convert_to_highest_unit($bytes): string
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes >= 1) {
            $bytes = $bytes . ' bytes';
        } else {
            $bytes = '0 bytes';
        }
        return $bytes;
    }
}


if (!function_exists('getFileIconClass')) {
    function getFileIconClass(string $mime): string
    {
        return match ($mime) {
            'application/pdf' => 'fa-file-pdf',
            'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'fa-file-word',
            'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'fa-file-excel',
            'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'fa-file-powerpoint',
            'application/zip', 'application/x-rar-compressed' => 'fa-file-archive',
            'image/jpeg', 'image/png', 'image/gif' => 'fa-file-image',
            'audio/mpeg', 'audio/x-wav' => 'fa-file-audio',
            'video/mp4', 'video/x-msvideo' => 'fa-file-video',
            default => 'fa-file',
        };
    }
}








