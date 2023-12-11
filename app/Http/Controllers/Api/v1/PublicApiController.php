<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\EmergencyCategoryResource;
use App\Http\Resources\Api\v1\LinkResource;
use App\Http\Resources\Api\v1\SettingResource;
use App\Http\Resources\Api\v1\SliderResource;
use App\Models\Settings\EmergencyCategory;
use App\Models\Settings\Employee;
use App\Models\Settings\OfficeSetting;
use App\Models\User;
use App\Models\Website\ImportantLink;
use App\Models\Website\Slider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Modules\DigitalBoard\Entities\Notice;
use Modules\DigitalBoard\Entities\PopUpNotice;
use Modules\DigitalBoard\Entities\Video;
use Modules\DigitalBoard\Transformers\api\v1\EmployeeResource;
use Modules\DigitalBoard\Transformers\api\v1\NewsResource;
use Modules\DigitalBoard\Transformers\api\v1\NoticeResource;
use Modules\DigitalBoard\Transformers\PopUpNoticeResource;
use Modules\DigitalBoard\Transformers\VideoResource;
use Nwidart\Modules\Facades\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\DigitalBoard\Entities\Audio;
use Modules\DigitalBoard\Entities\PhotoGallery;
use Modules\DigitalBoard\Transformers\AudioResource;
use Modules\DigitalBoard\Transformers\PhotoGalleryResource;
use Nette\Utils\Json;

class PublicApiController extends Controller
{
    public function getToken(): JsonResponse
    {
        if (auth('web')->check()) {
            $token = auth()->user()?->createToken('report user token');

            return response()->json([
                'message' => 'Successfully',
                'data' => $token->plainTextToken
            ]);
        }
        return response()->json(['message' => 'Please Login First'], 400);
    }

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

    public function emergencyCategory(): AnonymousResourceCollection
    {
        $emergencyCategories = EmergencyCategory::latest()->get();

        return EmergencyCategoryResource::collection($emergencyCategories);

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
                'notices' => NoticeResource::collection(Notice::with('files')->orderByDesc('date')->notice()->showInIndex()->nullClosedAt()->limit(3)->get()),
                'emergencyCategories' => EmergencyCategoryResource::collection(EmergencyCategory::get()),
                'latestNews' => NewsResource::collection(Notice::with('files')->news()->latest()->get()),
                'popups' => PopUpNoticeResource::collection(PopUpNotice::with('files')->latest()->get()),
                'video' => VideoResource::collection(Video::latest()->get()),
                'audio' => AudioResource::collection(Audio::latest()->get()),
                'photoGallery' => PhotoGalleryResource::collection(PhotoGallery::latest()->get())
            ];
        }
        return [
            'employees' => [],
            'news' => [],
            'notices' => [],
            'emergencyCategories' => [],
            'latestNews' => [],
            'popups' => [],
            'video' => [],
            'audio' => [],
            'photoGallery' => [],
        ];
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
//            'modules' => [
//                [
//                    'name' => 'गुनासो',
//                    'logo' => asset('assets/backend/images/modules/grievancehandling.png'),
//                    'url' => route('grievanceHandling.grievance')
//                ],
//                [
//                    'name' => 'घर-नक्सा',
//                    'logo' => asset('assets/backend/images/modules/emap.png'),
//                    'url' => route('ebps')
//                ],
//                [
//                    'name' => 'हेल्प डेस्क',
//                    'logo' => asset('assets/backend/images/modules/helpdesk.png'),
//                    'url' => route('helpdesk.helpdesk')
//                ],
//                [
//                    'name' => 'व्यवसाय दर्ता',
//                    'logo' => asset('assets/backend/images/modules/businessregistration.png'),
//                    'url' => route('businessRegistration.business')
//                ],
//                [
//                    'name' => 'अनुदान',
//                    'logo' => asset('assets/backend/images/modules/anudan.png'),
//                    'url' => route('grant.index')
//                ],
//                [
//                    'name' => 'तालिम',
//                    'logo' => asset('assets/backend/images/modules/roaster.png'),
//                    'url' => route('roaster.index')
//                ],
//            ]
        ];
    }
}
