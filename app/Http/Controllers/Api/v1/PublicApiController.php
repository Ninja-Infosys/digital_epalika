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
use Modules\DigitalBoard\Entities\Employee;
use Modules\DigitalBoard\Entities\Notice;
use Modules\DigitalBoard\Transformers\api\v1\EmployeeResource;
use Modules\DigitalBoard\Transformers\api\v1\NewsResource;
use Modules\DigitalBoard\Transformers\api\v1\NoticeResource;
use Nwidart\Modules\Facades\Module;


class PublicApiController extends Controller
{
    public function index(): array
    {
        return array_merge($this->getDataFromMainModule(), $this->checkModuleData(), $this->getAllModulesData());
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

    public function introduction(): array
    {
        $setting = $this->getOfficeSetting();

        return [
            'introduction' => strip_tags($setting->introduction ?? '') ?? ''
        ];
    }

    public function getOfficeSetting(): OfficeSetting
    {
        return OfficeSetting::latest()->firstOrFail();
    }

    public function checkModuleData(): array
    {
        $modules = Module::collections();

        return $this->getDataFromDigitalBoardModule($modules);
    }


    public function getDataFromDigitalBoardModule($modules): array
    {
        if ($modules->has('DigitalBoard')) {
            return [
                'employees' => EmployeeResource::collection(Employee::orderBy('position')->active()->showForMobileAppRequest()->get()),
                'news' => NewsResource::collection(Notice::orderByDesc('date')->news()->showInIndex()->nullClosedAt()->limit(3)->get()),
                'notices' => NoticeResource::collection(Notice::orderByDesc('date')->notice()->showInIndex()->nullClosedAt()->limit(3)->get()),
            ];
        }
        return [];
    }


    public function getDataFromMainModule(): array
    {
        $setting = $this->getOfficeSetting();
        return [
            'setting' => SettingResource::make($setting),
            'sliders' => $this->slider(),
        ];

    }


    public function getAllModulesData(): array
    {
        return [
            'modules' => [
                [
                    'name' => 'गुनासो',
                    'logo' => asset('assets/backend/images/modules/grievancehandling.png'),
                    'url' => route('grievanceHandling.grievance')
                ],
                [
                    'name' => 'घर-नक्सा',
                    'logo' => asset('assets/backend/images/modules/emap.png'),
                    'url' => route('e-map')
                ],
                [
                    'name' => 'हेल्प डेस्क',
                    'logo' => asset('assets/backend/images/modules/helpdesk.png'),
                    'url' => route('helpdesk.helpdesk')
                ],
                [
                    'name' => 'व्यवसाय दर्ता',
                    'logo' => asset('assets/backend/images/modules/businessregistration.png'),
                    'url' => route('businessRegistration.business')
                ],
                [
                    'name' => 'अनुदान',
                    'logo' => asset('assets/backend/images/modules/anudan.png'),
                    'url' => route('grant.index')
                ],
                [
                    'name' => 'तालिम',
                    'logo' => asset('assets/backend/images/modules/roaster.png'),
                    'url' => route('roaster.index')
                ],
            ]
        ];

    }

}
