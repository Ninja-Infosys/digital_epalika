<?php

namespace Modules\BusinessRegistration\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\OfficeSetting;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Modules\BusinessRegistration\Entities\BusinessDetail;
use Modules\BusinessRegistration\Entities\BusinessPurpose;
use Modules\BusinessRegistration\Entities\InvestmentRevenue;
use Modules\BusinessRegistration\Entities\ObjectTransaction;
use Modules\BusinessRegistration\Entities\ProprietorDetail;
use Modules\BusinessRegistration\Enums\BusinessTypeEnum;
use Modules\EMap\Enums\BuildingUsageEnum;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $totalBusinessCount = ProprietorDetail::count();
        $totalBusinessDetailPurposeCount = BusinessPurpose::count();
        $totalObjectTransactionCategoryCount = ObjectTransaction::count();
        $totalInvestmentRevenueCount = InvestmentRevenue::count();

        $businessPurposesChartData = $this->getTotalBusinessPurposesData();

        $businessRegistrationAccordingToFiscalYear = $this->getBusinessRegistrationAccordingToFiscalYear();

        $businessDetailTransaction = $this->getTotalTransactionData();

        $businessDetailAccordingToBusinessType = $this->getBusinessDetailAccordingToBusinessTypes();

        return view('businessregistration::admin.dashboard', compact('businessDetailAccordingToBusinessType','businessDetailTransaction','totalBusinessCount', 'businessRegistrationAccordingToFiscalYear','totalBusinessDetailPurposeCount', 'totalObjectTransactionCategoryCount', 'totalInvestmentRevenueCount', 'businessPurposesChartData'));
    }

    public function getTotalBusinessPurposesData(): array
    {
        $businessPurposes = BusinessPurpose::withCount('businessDetails')->get();

        return [
            'labels' => $businessPurposes->pluck('title')->toArray(),
            'dataSets' => [
                [
                    'label' => 'व्यवसायको उदेश्य',
                    'data' => $businessPurposes->pluck('business_details_count')->toArray(),
                ],
            ],
        ];
    }


    public function getBusinessDetail($hasCurrentFiscalYear = null): Collection
    {

        return BusinessDetail::where(function ($query) use ($hasCurrentFiscalYear) {
                if ($hasCurrentFiscalYear) {
                    $query->where('fiscal_year_id', $hasCurrentFiscalYear);
                }
            })
            ->get();
    }



    public function getBusinessRegistrationAccordingToFiscalYear(): array
    {

        $businessDetails = $this->getBusinessDetail();
        return [
            'labels' =>['दर्ता भएका','दर्ता नभएका'],
            'dataSets' => [
                [
                    'label' => 'व्यवसाय',
                    'data' => [$businessDetails->whereNotNull('registration_no')->count(), $businessDetails->whereNull('registration_no')->count()],
                    'fill' => 'false',
                ],
            ],
        ];
    }


    public function getOfficeSetting(): mixed
    {
        return OfficeSetting::first();
    }

    public function getTotalTransactionData(): array
    {
        $transaction = ObjectTransaction::withCount('objectTransactions')->whereNull('object_transaction_id')->get();
        return [
            'labels'=>$transaction->pluck('title')->toArray(),
            'dataSets' => [
                [
                    'data' => $transaction->pluck('object_transactions_count')->toArray(),
                    'label' => 'उप श्रेणी ',
                    'fill' => 'false',
                ]
            ],
        ];

    }



    public function getBusinessDetailAccordingToBusinessTypes(): array
    {
        $businessDetail = DB::table('proprietor_details')
            ->whereNull('deleted_at')
            ->get()
            ->groupBy('business_type')
            ->map(function ($business_detail, $key) {
                return [
                    'business_type' => BusinessTypeEnum::tryFrom($key)?->label(),
                    'count' => count($business_detail),
                ];
            });

        return [
            'labels' => $businessDetail->pluck('business_type')->toArray(),
            'dataSets' => [
                [
                    'data' => $businessDetail->pluck('count')->toArray(),
                    'label' => 'जम्मा',
                    'fill' => 'false',
                ]
            ],


        ];
    }
}
