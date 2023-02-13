<?php

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\FeatureActivation;
use App\Models\OfficeHeader;
use App\Models\RevenueSetting;
use App\Models\Settings\LetterHead;
use App\Models\Settings\OfficeSetting;
use App\Models\Settings\Units\Unit;
use App\Models\Settings\Units\UnitConversion;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Modules\Revenue\Entities\Revenue;
use Modules\Revenue\Entities\RevenueCategory;

if (!function_exists('officeSetting')) {
    function officeSetting()
    {
        return Cache::rememberForever('office_setting', function () {
            return OfficeSetting::with('fiscalYear', 'province', 'district', 'localBody')->first();
        });
    }
}
if (!function_exists('get_revenue_setting')) {
    function get_revenue_setting()
    {
        return Cache::rememberForever('revenue_setting', function () {
            return RevenueSetting::with('landMeasurement', 'standardLandMeasurement')->first();
        });
    }
}
if (!function_exists('get_office_header')) {
    function get_office_header()
    {
        return Cache::rememberForever('officeHeaders', function () {
            return OfficeHeader::orderBy('position')->get();
        });
    }
}
if (!function_exists('letterHead')) {
    function letterHead($type = 'header')
    {
        $letterHead = auth()->user()->letterHead ?? (auth()->user()->role->letterHead ?? null) ?? LetterHead::first();

        return $type == 'letter_head' ? ($letterHead->letter_head ?? '') : ($letterHead->header ?? '');
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
        $startPos = strpos($base64String, ':') + 1;
        $endPos = strpos($base64String, ';');
        return substr($base64String, $startPos, $endPos - $startPos);
    }
}
if (!function_exists('base64ToFile')) {
    function base64ToFile($base64String, $fileType): string
    {
        $randomString = Str::random(32);
        $extension = explode('/', $fileType)[1];
        $fileName = "images/{$randomString}.{$extension}";
        $data = base64_decode($base64String);
        Storage::put($fileName, $data);
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
    function getAllFilesAndFolder(string $folder): array
    {
        if (Storage::disk('public')->exists($folder)) {
            $directories = collect(Storage::disk('public')->directories($folder))->map(function ($item) {
                return explode('/', $item);
            });
            $files = collect(Storage::disk('public')->files($folder))->map(function ($item) {
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
if (!function_exists('get_revenue_categories')) {
    function get_revenue_categories(int $revenueCategoryId = null, bool $all = false)
    {
        $revenueCategories = Cache::rememberForever('revenueCategories', function () {
            return RevenueCategory::with('revenueCategories')->get();
        });
        if (!$all) {
            $revenueCategories = $revenueCategories->whereNull('revenue_category_id');
        }
        if ($revenueCategoryId !== null) {
            $revenueCategories = $revenueCategories->where('id', $revenueCategoryId)->first();
        }
        return $revenueCategories ?? [];
    }
}
if (!function_exists('get_revenues')) {
    function get_revenues($revenueCategories = [], int $revenueId = null)
    {
        $revenueCategories = is_array($revenueCategories) ? $revenueCategories : [$revenueCategories];
        $revenues = Cache::rememberForever('revenues', function () {
            return Revenue::orderBy('revenue_category_id')->get();
        });
        if (!empty($revenueCategories)) {
            $revenues = $revenues->whereIn('revenue_category_id', $revenueCategories);
        }
        if ($revenueId !== null) {
            $revenues = $revenues->where('id', $revenueId)->first();
        }
        return $revenues ?? [];
    }
}

/*function convert($from, $to)
{
    if ($from->is($to)) {
        return 1;
    }else{
        $si_unit_value = $this->landDescription['unit_value'];

        $rate = $this->conversionToSmallest();


        $this->convertedData = $rate * $si_unit_value;
        $data = [];
        foreach ($this->units as $index => $unit) {
            $data['data' . $index] = $this->conversionLogic($unit);
        }
        $this->conversion = $data;
    }
}*/
/*
function conversionToSmallest(): float|int
{
    $rate = 1;

    if ($this->setting->standardLandMeasurement->is_smallest != 1) {
        $getSmallerUnits = Unit::where('measurement_unit_id', $this->setting->standardLandMeasurement->measurement_unit_id)
            ->where('position', '>=', $this->setting->standardLandMeasurement->position)
            ->orderBy('position')
            ->get();


        foreach ($getSmallerUnits as $smallerUnit) {
            $rate = $rate * $this->getRate($smallerUnit);
        }
        $id = $getSmallerUnits->last()->id;
    } else {
        $id = $this->setting->land_measurement_standard_id;
    }
    $minUnit = $this->units->where('is_smallest', 1)->first();

    $conversionData = UnitConversion::where('conversion_to', $minUnit->id)
        ->where('conversion_from', $id)
        ->first();
    return $rate / $conversionData->rate;
}

function getRate(Unit $biggerUnit): float|int
{
    $smallerUnit = Unit::where('position', $biggerUnit->position + 1)
        ->whereMeasurementUnitId($biggerUnit->measurement_unit_id)
        ->first();

    if (!empty($smallerUnit)) {
        $conversionRate = UnitConversion::where('conversion_to', $smallerUnit->id)
            ->where('conversion_from', $biggerUnit->id)
            ->first();

        return $conversionRate->rate ?? 1;
    } else {
        return 1;
    }
}


function conversionLogic(Unit $unit): float|int
{
    if ($unit->position - 1 > 0) {
        $biggerUnit = Unit::where('position', $unit->position - 1)->first();
        if (!empty($biggerUnit)) {
            $conversionRate = UnitConversion::where('conversion_to', $biggerUnit->id)
                ->where('conversion_from', $unit->id)
                ->first();
            if (!empty($conversionRate->rate)) {
                $totalData = $this->convertedData * $conversionRate->rate;
                $wholePart = floor($totalData);
                $fraction = $totalData - $wholePart;
                $this->convertedData = $wholePart;
                return ($fraction / $conversionRate->rate);
            }
            return 0;
        }
        return $this->convertedData;
    }
    return $this->convertedData;
}*/
