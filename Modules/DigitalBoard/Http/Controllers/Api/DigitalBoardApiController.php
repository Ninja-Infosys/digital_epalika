<?php

namespace Modules\DigitalBoard\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OfficeHeader;
use App\Models\Settings\Employee;
use App\Models\Settings\OfficeSetting;
use Modules\DigitalBoard\Entities\CitizenCharter;
use Modules\DigitalBoard\Entities\Notice;
use Modules\DigitalBoard\Entities\Program;
use Modules\DigitalBoard\Entities\Video;
use Modules\DigitalBoard\Transformers\api\HeaderResource;
use Modules\DigitalBoard\Transformers\api\ProgramResource;
use Modules\DigitalBoard\Transformers\api\v1\CitizenCharterResource;
use Modules\DigitalBoard\Transformers\EmployeeResource;
use Modules\DigitalBoard\Transformers\NewsResource;
use Modules\DigitalBoard\Transformers\NoticeResource;
use Modules\DigitalBoard\Transformers\OfficeSettingResource;

class DigitalBoardApiController extends Controller
{
    public function home()
    {
        return $this->extracted();

    }

    public function ward($ward)
    {
        return $this->extracted($ward);

    }

    public function officeSetting()
    {
        $officeSetting = OfficeSetting::whereNull('ward_no')->first();

        return OfficeSettingResource::make($officeSetting);

    }

    /**
     * @param  null  $ward
     */
    public function extracted($ward = null): array
    {
        $notices = Notice::contentType('News')
            ->showInIndex()
            ->where(function ($q) use ($ward) {
                if (! empty($ward)) {
                    $q->whereRaw("FIND_IN_SET('$ward', ward) > 0");
                } else {
                    $q->MainPageDisplay();
                }
            })
            ->whereNull('closed_at')
            ->orderByDesc('date')
            ->get();

        $employees = Employee::active()
            ->showInIndex()
            ->where(function ($q) use ($ward) {
                if (! empty($ward)) {
                    $q->whereRaw("FIND_IN_SET('$ward', ward) > 0");
                } else {
                    $q->MainPageDisplay();
                }
            })
            ->orderBy('position')
            ->get();

        $videos = Video::where('status', 1)
            ->where(function ($q) use ($ward) {
                if (! empty($ward)) {
                    $q->whereRaw("FIND_IN_SET('$ward', ward) > 0");
                } else {
                    $q->MainPageDisplay();
                }
            })
            ->latest()
            ->get()
            ->pluck('video');

        $citizenCharters = CitizenCharter::with('branch')
            ->where(function ($q) use ($ward) {
                if (! empty($ward)) {
                    $q->whereRaw("FIND_IN_SET('$ward', ward) > 0");
                } else {
                    $q->MainPageDisplay();
                }
            })
            ->orderBy('branch_id')
            ->get();

        $programs = Program::where('is_displayed', 1)
            ->where('status', 1)
            ->orderByDesc('date')
            ->get();

        $headers = OfficeHeader::where(function ($q) use ($ward) {
            if (! empty($ward)) {
                $q->where('ward', $ward);
            } else {
                $q->whereNull('ward');
            }
        })
            ->orderBy('position')
            ->get();

        return [
            'notices' => NoticeResource::collection($notices),


            'videos' => $videos,
            'employees' => [
                'representative' => EmployeeResource::collection($employees->where('is_employee', 0)),
                'employee' => EmployeeResource::collection($employees->where('is_employee', 1)),
            ],
            'citizenCharters' => CitizenCharterResource::collection($citizenCharters),
            'programs' => ProgramResource::collection($programs),
            'headers' => HeaderResource::collection($headers),
            'officeSettings' => $this->officeSetting(),

        ];
    }
}
