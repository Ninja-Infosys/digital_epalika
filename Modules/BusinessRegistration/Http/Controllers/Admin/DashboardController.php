<?php

namespace Modules\BusinessRegistration\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use App\Models\Settings\OfficeSetting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Modules\BusinessRegistration\Entities\BusinessDetail;
use Modules\BusinessRegistration\Entities\BusinessNature;
use Modules\BusinessRegistration\Entities\ObjectTransaction;
use Modules\BusinessRegistration\Entities\Partner;
use Modules\BusinessRegistration\Enums\BusinessTypeEnum;
use mysql_xdevapi\DocResult;

class DashboardController extends Controller
{

    protected Collection $businessDetail;

    public function __construct()
    {
        parent::__construct();

        $this->businessDetail = BusinessDetail::selectRaw('fiscal_year_id,ward_no,registration_no')->whereNotNull('registration_no')->get();
    }
    public function __invoke(): Factory|View|Application
    {
        $totalBusinessCount = $this->businessDetail->count();
        $totalBusinessDetailNatureCount = BusinessNature::count();
        $totalObjectTransactionCategoryCount = ObjectTransaction::count();
        $businessRegistrationAccordingToFiscalYear = $this->getBusinessRegistrationAccordingToFiscalYear();
        $businessDetailTransaction = $this->getTotalTransactionData();
        $wardWise = $this->getWardWiseData();
        $fiscalYearWise = $this->getFiscalYearWiseData();
        return view('businessregistration::admin.dashboard', compact( 'fiscalYearWise','businessDetailTransaction', 'totalBusinessCount', 'businessRegistrationAccordingToFiscalYear', 'totalBusinessDetailNatureCount', 'totalObjectTransactionCategoryCount','wardWise'));
    }


    public function getBusinessRegistrationAccordingToFiscalYear(): array
    {
        $businessDetails = $this->businessDetail->where('fiscal_year_id',\officeSetting()->fiscal_year_id);
        return [
            'labels' => ['दर्ता भएका'],
            'dataSets' => [
                [
                    'label' => 'व्यवसाय',
                    'data' => [$businessDetails->whereNotNull('registration_no')->count()],
                    'fill' => 'false',
                ],
            ],
        ];
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

    public function getWardWiseData()
    {
        $wardsData = collect();
        foreach (\officeSetting()->localBody->ward_no as $ward)
        {
            $wardsData->push([
                'ward_no' => "वडा नं. $ward",
                'business_detail_count' => $this->businessDetail
                    ->where('fiscal_year_id',\officeSetting()->fiscal_year_id)
                    ->where('ward_no',$ward)
                    ->count()
            ]);
        }

        return [
            'labels' => $wardsData->pluck('ward_no')->toArray(),
            'dataSets' => [
                [
                    'data' => $wardsData->pluck('business_detail_count')->toArray(),
                    'label' => 'जम्मा',
                    'fill' => 'false',
                ],
            ],
        ];
    }

    public function getFiscalYearWiseData()
    {
        $fiscalYear = collect();

        foreach (FiscalYear::all() as $year)
        {
            $fiscalYear->push([
                'title'=>$year->title,
                'business_detail_count'=> $this->businessDetail->where('fiscal_year_id',$year->id)->count()
            ]);
        }

        return [
            'labels' => $fiscalYear->pluck('title')->toArray(),
            'dataSets' => [
                [
                    'data' => $fiscalYear->pluck('business_detail_count')->toArray(),
                    'label' => 'जम्मा',
                    'fill' => 'false',
                ],
            ],
        ];
    }



}
