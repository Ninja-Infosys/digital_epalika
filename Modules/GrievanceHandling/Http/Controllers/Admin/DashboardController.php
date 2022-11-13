<?php

namespace Modules\GrievanceHandling\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\GrievanceHandling\Entities\GrievanceDetail;
use Modules\GrievanceHandling\Entities\GrievanceOffice;
use Modules\GrievanceHandling\Entities\GrievanceType;
use Modules\GrievanceHandling\Enums\GrievanceComplaintSeverity;
use Modules\GrievanceHandling\Enums\GrievanceStatus;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $grievanceCount = GrievanceDetail::whereNull('grievance_detail_id')->count();
        $registeredGrievanceCount = GrievanceDetail::whereNull('grievance_detail_id')->approved()->count();
        $publicGrievanceCount = GrievanceDetail::whereNull('grievance_detail_id')->public()->count();

        $unseenGrievanceCount = GrievanceDetail::whereNull('grievance_detail_id')->where('status', GrievanceStatus::UNSEEN->value)->count();
        $closedGrievanceCount = GrievanceDetail::whereNull('grievance_detail_id')->where('status', GrievanceStatus::CLOSED->value)->count();
        $investigatedGrievanceCount = GrievanceDetail::whereNull('grievance_detail_id')->where('status', GrievanceStatus::INVESTIGATED->value)->count();
        $seenGrievanceCount = GrievanceDetail::whereNull('grievance_detail_id')->where('status', '!=', GrievanceStatus::UNSEEN->value)->count();

        $grievanceCountAccordingToSeverity = $this->getDataAccordingToSeverity();

        $grievanceCountAccordingToStatus = $this->getDataAccordingToStatus();

        $dataAccordingToGrievanceType = $this->getDataAccordingToGrievanceType();

        $dataAccordingToGrievanceOffice = $this->getDataAccordingToGrievanceOffice();

        return view('grievancehandling::admin.dashboard', compact(
            'grievanceCountAccordingToSeverity',
            'seenGrievanceCount',
            'registeredGrievanceCount',
            'publicGrievanceCount',
            'grievanceCount',
            'unseenGrievanceCount',
            'closedGrievanceCount',
            'investigatedGrievanceCount',
            'grievanceCountAccordingToStatus',
            'dataAccordingToGrievanceType',
            'dataAccordingToGrievanceOffice'
        ));
    }

    public function getDataAccordingToSeverity(): array
    {
        $grievanceComplaintSeverity = GrievanceComplaintSeverity::cases();

        $label = [];
        $grievanceAccordingToSeverityCount = [];
        foreach ($grievanceComplaintSeverity as $grievanceSeverity) {
            $label[] = $grievanceSeverity->label();
            $grievanceAccordingToSeverityCount[] = GrievanceDetail::whereNull('grievance_detail_id')
                ->where('complaint_severity', $grievanceSeverity->value)
                ->count();
        }

        return [
            'labels' => $label,
            'dataSets' => [
                [
                    'label' => 'गुनासो गम्भीरता',
                    'data' => $grievanceAccordingToSeverityCount,
                ],
            ],
        ];
    }

    public function getDataAccordingToStatus(): array
    {
        $grievanceComplaintStatus = GrievanceStatus::cases();

        $label = [];
        $grievanceAccordingToStatusCount = [];
        foreach ($grievanceComplaintStatus as $grievanceStatus) {
            $label[] = $grievanceStatus->label();
            $grievanceAccordingToStatusCount[] = GrievanceDetail::whereNull('grievance_detail_id')
                ->where('status', $grievanceStatus->value)
                ->count();
        }

        return [
            'labels' => $label,
            'dataSets' => [
                [
                    'label' => 'गुनासोको स्थिति',
                    'data' => $grievanceAccordingToStatusCount,
                ],
            ],
        ];
    }

    public function getDataAccordingToGrievanceType(): array
    {
        $grievanceTypes = GrievanceType::withCount(['grievanceDetails' => function ($query) {
            $query->whereNull('grievance_detail_id');
        }])->get();

        return [
            'labels' => $grievanceTypes->pluck('title')->toArray(),
            'dataSets' => [
                [
                    'label' => 'गुनासोको प्रकार',
                    'data' => $grievanceTypes->pluck('grievance_details_count')->toArray(),
                ],
            ],
        ];
    }

    public function getDataAccordingToGrievanceOffice(): array
    {
        $grievanceOffice = GrievanceOffice::withCount(['grievanceDetails' => function ($query) {
            $query->whereNull('grievance_detail_id');
        }])->get();

        return [
            'labels' => $grievanceOffice->pluck('title')->toArray(),
            'dataSets' => [
                [
                    'label' => 'गुनासो शाखा',
                    'data' => $grievanceOffice->pluck('grievance_details_count')->toArray(),
                ],
            ],
        ];
    }
}
