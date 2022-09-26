<?php

namespace Modules\DigitalBoard\Http\Controllers\Api;


use App\Models\OfficeHeader;
use App\Models\Settings\OfficeSetting;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\DigitalBoard\Entities\Employee;
use Modules\DigitalBoard\Entities\Notice;
use Modules\DigitalBoard\Entities\Video;
use Modules\DigitalBoard\Transformers\EmployeeResource;
use Modules\DigitalBoard\Transformers\NewsResource;
use Modules\DigitalBoard\Transformers\NoticeResource;
use Modules\DigitalBoard\Transformers\OfficeHeaderResource;
use Modules\DigitalBoard\Transformers\OfficeSettingResource;
use Modules\DigitalBoard\Transformers\VideoResource;


class DigitalBoardApiController extends Controller
{
    public function home()
    {
        $notices = Notice::with('files')->where(['show_on_index' => 1, 'closed_at' => null])->orderBy('date', 'desc')->get();
        $employees = Employee::where('status', 1)->orderBy('position')->get();
        $videos = Video::latest()->get();
        return [
            'notices' => NoticeResource::collection($notices->where('type', 'Notice')),
            'newses' => NewsResource::collection($notices->where('type', 'News')),
            'videos' => VideoResource::collection($videos),
            'employees' => EmployeeResource::collection($employees)
        ];
    }

    public function officeSetting()
    {
        $officeSetting = OfficeSetting::with('province','district','localBody')->first();
        $officeHeaders = OfficeHeader::orderBy('position')->get();
        return [
            'office_headers' => OfficeHeaderResource::collection($officeHeaders),
            'office_setting' => new OfficeSettingResource($officeSetting),
        ];
    }
}
