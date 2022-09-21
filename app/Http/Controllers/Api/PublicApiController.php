<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Livewire\OfficeHeader;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\NoticeResource;
use App\Http\Resources\OfficeHeaderResource;
use App\Http\Resources\OfficeSettingResource;
use App\Http\Resources\VideoResource;
use App\Models\Settings\OfficeSetting;
use Illuminate\Http\Request;
use Modules\DigitalBoard\Entities\Employee;
use Modules\DigitalBoard\Entities\Notice;
use Modules\DigitalBoard\Entities\Video;

class PublicApiController extends Controller
{
    public function home()
    {
        $notices = Notice::where(['type' => 'Notice', 'show_on_index' => 1, 'closed_at' === null])->orderBy('date', 'desc')->get();
        $news = Notice::where(['type' => 'News', 'show_on_index' => 1, 'closed_at' === null])->latest()->get();
        $employees = Employee::where('status', 1)->orderBy('position')->get();
        $videos = Video::latest()->get();
        return [
            'notices' => NoticeResource::collection($notices),
            'employees' => EmployeeResource::collection($employees),
            'videos' => VideoResource::collection($videos)
        ];
    }
    public function officeSetting()
    {
        $officeSetting = OfficeSetting::first();
        $officeHeaders = OfficeHeader::orderBy('position')->get();
        return [
            'office_setting' => new OfficeSettingResource($officeSetting),
            'office_headers' =>  OfficeHeaderResource::collection($officeHeaders)
        ];
    }
}
