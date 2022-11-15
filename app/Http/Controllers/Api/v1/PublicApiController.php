<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\LinkResource;
use App\Http\Resources\Api\v1\SettingResource;
use App\Http\Resources\Api\v1\SliderResource;
use App\Models\Settings\OfficeSetting;
use App\Models\Website\ImportantLink;
use App\Models\Website\Slider;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Collection;
use Modules\DigitalBoard\Entities\Employee;
use Modules\DigitalBoard\Entities\Notice;
use Modules\DigitalBoard\Transformers\api\v1\EmployeeResource;
use Modules\DigitalBoard\Transformers\api\v1\NewsResource;
use Modules\DigitalBoard\Transformers\api\v1\NoticeResource;
use Nwidart\Modules\Facades\Module;


class PublicApiController extends Controller
{
    public function index(): Collection
    {
        $data = collect();

        $this->getDataFromMainModule($data);

        $this->checkModuleData($data);

        return $data;
    }

    public function setting(): SettingResource
    {
        $officeSetting = $this->getOfficeSetting();

        return SettingResource::make($officeSetting);
    }

    public function slider(): AnonymousResourceCollection
    {
        return SliderResource::collection(Slider::latest()->get());
    }

    public function importantLink(): AnonymousResourceCollection
    {
        return LinkResource::collection(ImportantLink::latest()->get());
    }

    public function introduction(): string
    {
        $setting = $this->getOfficeSetting();

        return strip_tags($setting->introduction ?? '') ?? '';
    }

    public function getOfficeSetting(): OfficeSetting
    {
        return OfficeSetting::latest()->firstOrFail();
    }

    /**
     * @param Collection $data
     * @return void
     */
    public function checkModuleData(Collection $data): void
    {
        $modules = Module::collections();

        $this->getDataFromDigitalBoardModule($modules, $data);
    }

    /**
     * @param $modules
     * @param Collection $data
     * @return void
     */
    public function getDataFromDigitalBoardModule($modules, Collection $data): void
    {
        if ($modules->has('DigitalBoard')) {
            $data->push([
                'employees' => EmployeeResource::collection(Employee::orderBy('position')->active()->showForMobileAppRequest()->get()),
                'news' => NewsResource::collection(Notice::orderByDesc('date')->news()->showInIndex()->nullClosedAt()->limit(3)->get()),
                'notice' => NoticeResource::collection(Notice::orderByDesc('date')->notice()->showInIndex()->nullClosedAt()->limit(3)->get()),
            ]);
        }
    }

    /**
     * @param Collection $data
     * @return void
     */
    public function getDataFromMainModule(Collection $data): void
    {
        $setting = $this->getOfficeSetting();

        $data->push([
            'setting' => SettingResource::make($setting),
            'introduction' => strip_tags($setting->introduction ?? '') ?? '',
            'sliders' => $this->slider(),
        ]);
    }

}
