<?php

namespace Modules\BusinessRegistration\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\SamayaSms;
use Modules\BusinessRegistration\Entities\BusinessPurpose;
use Modules\BusinessRegistration\Entities\InvestmentRevenue;
use Modules\BusinessRegistration\Entities\ObjectTransaction;
use Modules\BusinessRegistration\Entities\ProprietorDetail;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $totalBusinessCount = ProprietorDetail::count();
        $totalBusinessDetailPurposeCount = BusinessPurpose::count();
        $totalObjectTransactionCategoryCount = ObjectTransaction::count();
        $totalInvestmentRevenueCount = InvestmentRevenue::count();

        $businessPurposesChartData = $this->getTotalBusinessPurposesData();

        return view('businessregistration::admin.dashboard', compact('totalBusinessCount', 'totalBusinessDetailPurposeCount', 'totalObjectTransactionCategoryCount', 'totalInvestmentRevenueCount', 'businessPurposesChartData'));
    }

    public function getTotalBusinessPurposesData(): array
    {
        $businessPurposes = BusinessPurpose::withCount('businessDetails')->get();

        return [
            "labels" => $businessPurposes->pluck('title')->toArray(),
            "dataSets" => [
                [
                    "label" => 'व्यवसायको उदेश्य',
                    "data" => $businessPurposes->pluck('business_details_count')->toArray()
                ]
            ]
        ];

    }
}
