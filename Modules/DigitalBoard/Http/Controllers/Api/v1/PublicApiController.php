<?php

namespace Modules\DigitalBoard\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Modules\DigitalBoard\Entities\Employee;
use Modules\DigitalBoard\Entities\Notice;
use Modules\DigitalBoard\Transformers\api\v1\EmployeeResource;
use Modules\DigitalBoard\Transformers\api\v1\NewsResource;
use Modules\DigitalBoard\Transformers\api\v1\NoticeResource;

class PublicApiController extends Controller
{
    public function employee(): AnonymousResourceCollection
    {
        $employees = Employee::orderBy('position')->active()->employee()->showForMobileAppRequest()->get();

        return EmployeeResource::collection($employees);
    }

    public function publicRepresentative(): AnonymousResourceCollection
    {
        $employees = Employee::orderBy('position')->active()->peopleRepresentative()->showForMobileAppRequest()->get();

        return EmployeeResource::collection($employees);
    }

    public function news(): AnonymousResourceCollection
    {
        $newses = Notice::orderByDesc('date')->news()->showInIndex()->nullClosedAt()->get();

        return NewsResource::collection($newses);
    }

    public function notice(): AnonymousResourceCollection
    {
        $notices = Notice::orderByDesc('date')->notice()->showInIndex()->nullClosedAt()->get();

        return NoticeResource::collection($notices);
    }

    public function showNotice(Notice $notice): NoticeResource
    {
        return NoticeResource::make($notice->load('files'));
    }
}
