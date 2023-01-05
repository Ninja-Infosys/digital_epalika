<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\OfficeSetting;
use App\Traits\NepaliDateConverter;
use Illuminate\Support\Collection;
use Modules\JudicialCommittee\Entities\ComplaintApplication;
use function _\internal\parent;

class DashboardController extends Controller
{
    use NepaliDateConverter;

    protected OfficeSetting $officeSetting;
    protected Collection $currentYearApplications;

    public function __construct()
    {
        parent::__construct();

        $this->officeSetting = OfficeSetting::first();
        $this->currentYearApplications = ComplaintApplication::where('fiscal_year_id', $this->officeSetting->fiscal_year_id)->get();
    }

    public function __invoke()
    {
        $today_nepali_date = $this->get_nepali_date(now()->format('Y'), now()->format('m'), now()->format('d'));

        $totalApplicationsCount = ComplaintApplication::count();
        $registeredApplicationsCount = ComplaintApplication::whereHas('judicialReceiptBill')->count();
        $currentYearApplicationsCount = $this->currentYearApplications->count();
        $currentMonthApplicationsCount = $this->currentYearApplications->where('month', $today_nepali_date['m'])->count();
        $monthlyApplications = $this->getMonthlyApplications();

        return view('judicialcommittee::admin.dashboard', compact(
            'totalApplicationsCount',
            'registeredApplicationsCount',
            'currentYearApplicationsCount',
            'currentMonthApplicationsCount',
            'monthlyApplications'
        ));
    }

    private function getMonthlyApplications()
    {
        $registeredApplications = [];
        $unregisteredApplications = [];

        foreach ($this->month_name as $key => $month) {
            $registeredApplications[] = $this->currentYearApplications->where('month', ($key + 1))->where('is_registered', true)->count();
            $unregisteredApplications[] = $this->currentYearApplications->where('month', ($key + 1))->where('is_registered', false)->count();
        }

        return [
            'labels' => $this->month_name,
            'dataSets' => [
                [
                    'data' => $registeredApplications,
                    'label' => 'दर्ता भएका',
                    'fill' => 'false',
                ],
                [
                    'data' => $unregisteredApplications,
                    'label' => 'दर्ता नभएका',
                    'fill' => 'false',
                ],
            ],
        ];
    }
}
