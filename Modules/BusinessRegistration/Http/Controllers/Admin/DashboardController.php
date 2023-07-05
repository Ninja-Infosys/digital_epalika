<?php

namespace Modules\BusinessRegistration\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use App\Traits\NepaliDateConverter;
use Illuminate\Support\Collection;
use Modules\BusinessRegistration\Entities\BusinessDetail;
use Modules\BusinessRegistration\Entities\BusinessNature;
use Modules\BusinessRegistration\Entities\BusinessRenew;
use Modules\BusinessRegistration\Entities\ObjectTransaction;

class DashboardController extends Controller
{
    use NepaliDateConverter;

    protected Collection $businessDetail;

    public function __construct()
    {
        parent::__construct();

        $this->businessDetail = BusinessDetail::selectRaw('fiscal_year_id,ward_no,registration_no,registration_date_ne')->whereNotNull('registration_no')->get();
    }
    public function __invoke()
    {
        $this->checkAuthorization('businessRegistrationDashboard_access');

        $totalBusinessCount = $this->businessDetail->count();
        $totalBusinessDetailNatureCount = BusinessNature::count();
        $totalObjectTransactionCategoryCount = ObjectTransaction::count();
        $businessRenewCount = BusinessRenew::where('fiscal_year_id', officeSetting()->fiscal_year_id)->count();

        if (request()->ajax()) {
            return [
                'businessRegistration' => $this->getBusinessRegistrationAccordingToFiscalYear(),
                'wardWise' => $this->getWardWiseData(),
                'businessNature' => $this->getBusinessNature(),
                'monthWise' => $this->getMonthlyWise()
            ];
        }
        return view('businessregistration::admin.dashboard', compact(
            'totalBusinessCount',
            'totalBusinessDetailNatureCount',
            'totalObjectTransactionCategoryCount',
            'businessRenewCount'
        ));
    }


    public function getBusinessRegistrationAccordingToFiscalYear(): Collection
    {
        $fiscalYears = FiscalYear::all();
        $data = collect();
        foreach ($fiscalYears as $fiscalYear) {
            $data->push([
                'name' => $fiscalYear->title,
                'data' => $this->businessDetail
                ->where('fiscal_year_id', $fiscalYear->id)
                ->whereNotNull('registration_no')
                ->count()]);
        }
        return $data;
    }

    public function getWardWiseData()
    {
        $wardsData = collect();
        foreach (\officeSetting()->localBody->ward_no as $ward) {
            $wardsData->push([
                'ward_no' => "वडा नं. $ward",
                'business_detail_count' => $this->businessDetail
                    ->where('fiscal_year_id', \officeSetting()->fiscal_year_id)
                    ->where('ward_no', $ward)
                    ->count()
            ]);
        }

        return [
            'labels' => $wardsData->pluck('ward_no')->toArray(),
            'dataSets' => [
                [
                    'data' => $wardsData->pluck('business_detail_count')->toArray(),
                    'label' => 'जम्मा',
                ],
            ],
        ];
    }

    public function getBusinessNature()
    {
        return BusinessNature::withCount('businessDetails')
            ->get()
            ->map(function ($businessNature) {
                return [
                    'name' => $businessNature->title,
                    'data' => (int)$businessNature->business_details_count,
                ];
            });
    }


    public function getMonthlyWise(): array
    {
        $monthlyRegistrations = [];

        foreach ($this->month_name as $key => $month) {
            $monthlyRegistrations[] = $this->businessDetail->where('fiscal_year_id', \officeSetting()->fiscal_year_id)
                ->where('registration_month', ($key + 1))
                ->count();
        }
        return [
            'labels' => $this->month_name,
            'dataSets' => [
                [
                    'data' => $monthlyRegistrations,
                    'label' => 'दर्ता',
                ],
            ],
        ];
    }
}
