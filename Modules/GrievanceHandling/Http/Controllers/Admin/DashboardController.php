<?php

namespace Modules\GrievanceHandling\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\NepaliDateConverter;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Modules\GrievanceHandling\Entities\GrievanceDetail;
use Modules\GrievanceHandling\Entities\GrievanceOffice;
use Modules\GrievanceHandling\Entities\GrievanceType;
use Modules\GrievanceHandling\Enums\GrievanceComplaintSeverity;
use Modules\GrievanceHandling\Enums\GrievanceStatus;

class DashboardController extends Controller
{
    use NepaliDateConverter;
    public Collection $grievanceDetails;
    public function __construct()
    {
        parent::__construct();
        $this->grievanceDetails = DB::table('grievance_details')->whereNull('grievance_detail_id')->whereNull('deleted_at')->get();
    }

    public function __invoke()
    {
        $this->checkAuthorization('grievanceHandlingDashboard_access');

        $grievanceCount = $this->grievanceDetails->count();
        $registeredGrievanceCount = $this->grievanceDetails->where('is_approved', 0)->count();
        $publicGrievanceCount = $this->grievanceDetails->where('is_public', 1)->count();
        $unseenGrievanceCount = $this->grievanceDetails->where('status', GrievanceStatus::UNSEEN->value)->count();
        $closedGrievanceCount = $this->grievanceDetails->where('status', GrievanceStatus::CLOSED->value)->count();
        $investigatedGrievanceCount = $this->grievanceDetails->where('status', GrievanceStatus::INVESTIGATED->value)->count();
        $seenGrievanceCount = $this->grievanceDetails->where('status', '!=', GrievanceStatus::UNSEEN->value)->count();
        if(request()->ajax()){
            return [
                'grievanceCountAccordingToSeverity' => $this->getDataAccordingToSeverity(),
            'grievanceCountAccordingToStatus' => $this->getDataAccordingToStatus(),
            'dataAccordingToGrievanceType' => $this->getDataAccordingToGrievanceType(),
            'dataAccordingToGrievanceOffice' => $this->getDataAccordingToGrievanceOffice(),
                'getDataAccordingToMonth' => $this->getDataAccordingToMonth(),
            ];
        }
        return view('grievancehandling::admin.dashboard', compact(
            'seenGrievanceCount',
            'registeredGrievanceCount',
            'publicGrievanceCount',
            'grievanceCount',
            'unseenGrievanceCount',
            'closedGrievanceCount',
            'investigatedGrievanceCount'
        ));
    }

    public function getDataAccordingToSeverity(): Collection
    {
        $grievanceComplaintSeverity = GrievanceComplaintSeverity::cases();

        $data = collect();
        foreach ($grievanceComplaintSeverity as $grievanceSeverity) {
            $data->push([
                'name'=>$grievanceSeverity->label(),
                'data'=>$this->grievanceDetails
                    ->where('complaint_severity', $grievanceSeverity->value)
                    ->count()
            ]);
        }
        return $data;
    }
    public function getDataAccordingToStatus(): Collection
    {
        $grievanceComplaintStatus = GrievanceStatus::cases();

        $data = collect();
        foreach ($grievanceComplaintStatus as $grievanceStatus) {
            $data->push([
                'name' => $grievanceStatus->label(),
                'data' => $this->grievanceDetails
                    ->where('status', $grievanceStatus->value)
                    ->count()
            ]);
        }
        return $data;
    }
    public function getDataAccordingToGrievanceType()
    {
        return GrievanceType::withCount(['grievanceDetails' => function ($query) {
            $query->whereNull('grievance_detail_id');
        }])->get()->map(function ($grievanceTypes){
            return [
                'name' => $grievanceTypes->title,
                'data' => $grievanceTypes->grievance_details_count
            ];
        });
    }
    public function getDataAccordingToGrievanceOffice()
    {
        return GrievanceOffice::withCount(['grievanceDetails' => function ($query) {
            $query->whereNull('grievance_detail_id');
        }])->get()->map(function ($grievanceOffice){
            return [
                'name' => $grievanceOffice->title,
                'data' => $grievanceOffice->grievance_details_count
            ];
        });
    }
    public function getDataAccordingToMonth()
    {
        $totalCount = collect([0 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0]);

        $this->grievanceDetails
            ->each(function ($grievanceDetail) use($totalCount) {
                $date = Carbon::parse($grievanceDetail->created_at);
                $nepaliDate = $this->get_nepali_date($date->format('Y'),$date->format('m'),$date->format('d'));
                $totalCount[(int)$nepaliDate['m']-1] +=1;
            });

        return [
            'labels' => $this->month_name,
            'dataSets' => [
                [
                    'data' => $totalCount,
                    'label' => 'जम्मा'
                ],
            ],
        ];
    }
}
