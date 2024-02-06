<?php

namespace Modules\EMap\Http\Controllers\Clients\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ApplyMapNoticeNotification;
use App\Notifications\MapApplyNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Modules\EMap\Entities\AppliedDocument;
use Modules\EMap\Entities\ApplyMapNotice;
use Modules\EMap\Entities\Form;
use Modules\EMap\Entities\FormStore;
use Modules\EMap\Entities\FormStoreStatus;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\MapSetting;
use Modules\EMap\Entities\PaymentStore;
use Modules\EMap\Enums\DocumentStatusEnum;
use Modules\EMap\Enums\NoticeTypeEnum;
use function view;

class OrganizationApplicationsController extends Controller
{
    public function mapApplications()
    {
        $mapApplies = MapApply::with('houseOwner')
            ->where('organization_id', auth('organization')->user()->id)
            ->latest()
            ->get();

        return $mapApplies;
    }
}
