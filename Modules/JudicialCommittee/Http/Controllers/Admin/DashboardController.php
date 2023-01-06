<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use App\Models\Settings\OfficeSetting;
use App\Traits\NepaliDateConverter;
use Illuminate\Support\Collection;
use Modules\JudicialCommittee\Entities\ComplaintApplication;
use Modules\JudicialCommittee\Entities\LawsuitNature;
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
        $this->currentYearApplications = ComplaintApplication::with('judicialReceiptBill')->where('fiscal_year_id', $this->officeSetting->fiscal_year_id)->get();
    }

    public function __invoke()
    {
        $today_nepali_date = $this->get_nepali_date(now()->format('Y'), now()->format('m'), now()->format('d'));

        $totalApplicationsCount = ComplaintApplication::count();
        $registeredApplicationsCount = ComplaintApplication::whereHas('judicialReceiptBill')->count();
        $currentYearApplicationsCount = $this->currentYearApplications->count();
        $currentMonthApplicationsCount = $this->currentYearApplications->where('month', $today_nepali_date['m'])->count();
        $monthlyApplications = $this->getMonthlyApplications();
        $lawsuitNatureWiseApplications = $this->getLawsuitNatureWiseApplications();
        $fiscalYearWiseApplications = $this->getFiscalYearWiseApplications();
        $lawsuitNatureWiseApplicationsData = $this->getLawsuitNatureWiseApplicationsData();

        return view('judicialcommittee::admin.dashboard', compact(
            'totalApplicationsCount',
            'registeredApplicationsCount',
            'currentYearApplicationsCount',
            'currentMonthApplicationsCount',
            'monthlyApplications',
            'lawsuitNatureWiseApplications',
            'fiscalYearWiseApplications',
            'lawsuitNatureWiseApplicationsData'
        ));
    }

    private function getMonthlyApplications()
    {
        $registeredApplications = [];
        $unregisteredApplications = [];

        foreach ($this->month_name as $key => $month) {
            $registeredApplications[] = $this->currentYearApplications->where('month', ($key + 1))->where('judicialReceiptBill', '!=', null)->count();
            $unregisteredApplications[] = $this->currentYearApplications->where('month', ($key + 1))->where('judicialReceiptBill', null)->count();
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

    private function getLawsuitNatureWiseApplications()
    {
        $lawsuitNatures = LawsuitNature::withCount(['complaintApplications' => function ($query) {
            $query->where('fiscal_year_id', $this->officeSetting->fiscal_year_id);
        }])->get();

        return [
            'labels' => $lawsuitNatures->pluck('title')->toArray(),
            'dataSets' => [
                [
                    'data' => $lawsuitNatures->pluck('complaint_applications_count')->toArray(),
                    'label' => 'जम्मा',
                    'fill' => 'false',
                ]
            ],

        ];
    }

    private function getFiscalYearWiseApplications()
    {
        $fiscalYears = FiscalYear::with('complaintApplications.judicialReceiptBill')->get()->map(function ($fiscalYear) {
            $registeredApplicationsCount = 0;
            $unregisteredApplicationsCount = 0;
            $registeredApplicationsCount += $fiscalYear->complaintApplications->where('judicialReceiptBill', '!=', null)->count();
            $unregisteredApplicationsCount += $fiscalYear->complaintApplications->where('judicialReceiptBill', null)->count();

            return [
                'title' => $fiscalYear->title,
                'registered_applications_count' => $registeredApplicationsCount,
                'unregistered_applications_count' => $unregisteredApplicationsCount
            ];
        });

        return [
            'labels' => $fiscalYears->pluck('title')->toArray(),
            'dataSets' => [
                [
                    'data' => $fiscalYears->pluck('registered_applications_count'),
                    'label' => 'दर्ता भएका',
                    'fill' => 'false',
                ],
                [
                    'data' => $fiscalYears->pluck('unregistered_applications_count'),
                    'label' => 'दर्ता नभएका',
                    'fill' => 'false',
                ],
            ],
        ];
    }

    private function getLawsuitNatureWiseApplicationsData()
    {
        $lawsuitNatures = LawsuitNature::with(['complaintApplications' => function ($query) {
            $query->with('judicialReceiptBill')->where('fiscal_year_id', $this->officeSetting->fiscal_year_id);
        }])->get()->map(function ($lawsuitNature) {
            $registeredApplicationsCount = 0;
            $unregisteredApplicationsCount = 0;
            $registeredApplicationsCount += $lawsuitNature->complaintApplications->where('judicialReceiptBill', '!=', null)->count();
            $unregisteredApplicationsCount += $lawsuitNature->complaintApplications->where('judicialReceiptBill', null)->count();

            return [
                'title' => $lawsuitNature->title,
                'registered_applications_count' => $registeredApplicationsCount,
                'unregistered_applications_count' => $unregisteredApplicationsCount,
                'total_applications_count' => $registeredApplicationsCount + $unregisteredApplicationsCount
            ];
        });

        return [
            'labels' => $lawsuitNatures->pluck('title')->toArray(),
            'dataSets' => [
                [
                    'data' => $lawsuitNatures->pluck('total_applications_count'),
                    'label' => 'जम्मा निवेदन',
                    'fill' => 'false',
                ],
                [
                    'data' => $lawsuitNatures->pluck('registered_applications_count'),
                    'label' => 'दर्ता भएका',
                    'fill' => 'false',
                ],
                [
                    'data' => $lawsuitNatures->pluck('unregistered_applications_count'),
                    'label' => 'दर्ता नभएका',
                    'fill' => 'false',
                ],
            ],
        ];
    }
}
