<?php

namespace Modules\BusinessRegistration\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\OfficeSetting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Modules\BusinessRegistration\Entities\BusinessDetail;
use Modules\BusinessRegistration\Entities\BusinessPurpose;
use Modules\BusinessRegistration\Entities\InvestmentRevenue;
use Modules\BusinessRegistration\Entities\ObjectTransaction;
use Modules\BusinessRegistration\Entities\ProprietorDetail;
use Modules\BusinessRegistration\Enums\BusinessTypeEnum;

class DashboardController extends Controller
{
    public function __invoke(): Factory|View|Application
    {
        $totalBusinessCount = ProprietorDetail::count();
        $totalBusinessDetailPurposeCount = BusinessPurpose::count();
        $totalObjectTransactionCategoryCount = ObjectTransaction::count();
        $totalInvestmentRevenueCount = InvestmentRevenue::count();

        $businessPurposesChartData = $this->getTotalBusinessPurposesData();

        $businessRegistrationAccordingToFiscalYear = $this->getBusinessRegistrationAccordingToFiscalYear();

        $businessDetailTransaction = $this->getTotalTransactionData();

        $businessDetailAccordingToBusinessType = $this->getBusinessDetailAccordingToBusinessTypes();
        $investmentRevenueDetail = $this->getInvestmentRevenueData();

        return view('businessregistration::admin.dashboard', compact('investmentRevenueDetail', 'businessDetailAccordingToBusinessType', 'businessDetailTransaction', 'totalBusinessCount', 'businessRegistrationAccordingToFiscalYear', 'totalBusinessDetailPurposeCount', 'totalObjectTransactionCategoryCount', 'totalInvestmentRevenueCount', 'businessPurposesChartData'));
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
            'labels' => ['दर्ता भएका', 'दर्ता नभएका'],
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
            'labels' => $transaction->pluck('title')->toArray(),
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
        $officeSetting = $this->getOfficeSetting();
        $proprietorDetail = ProprietorDetail::whereHas('businessDetail', function ($query) use ($officeSetting) {
            $query->where('fiscal_year_id', $officeSetting->fiscal_year_id);
        })->get();
        return [
            'labels' => ['नयाँ दर्ता', 'नवीकरण'],
            'dataSets' => [
                [
                    'data' => [$proprietorDetail->where('business_type', BusinessTypeEnum::NEW_REGISTRATION)->count(),
                        $proprietorDetail->where('business_type', BusinessTypeEnum::RENEWAL)->count()
                    ],
                    'label' => 'जम्मा',
                    'fill' => 'false',
                ]
            ],
        ];
    }


    public function getInvestmentRevenueData(): array
    {
        $investmentRevenues = InvestmentRevenue::withCount(['businessDetails',
            'businessDetails as registered_business_count' => fn ($q) => $q->whereNotNull('registration_no'),
            'businessDetails as not_registered_business_count' => fn ($q) => $q->whereNull('registration_no'),
        ])
            ->get();
        return [
            'labels' => $investmentRevenues->pluck('title')->toArray(),
            'dataSets' => [
                [
                    'data' => $investmentRevenues->pluck('business_details_count')->toArray(),
                    'label' => 'जम्मा व्यवसाय',
                    'fill' => 'false',
                ],
                [
                    'data' => $investmentRevenues->pluck('registered_business_count')->toArray(),
                    'label' => 'दर्ता भएका',
                    'fill' => 'false',
                ],
                [
                    'data' => $investmentRevenues->pluck('not_registered_business_count')->toArray(),
                    'label' => 'दर्ता नभएको',
                    'fill' => 'false',
                ]
            ],
        ];
    }
}
