<?php

namespace Modules\BusinessRegistration\Http\Controllers\Api\v1;

use App\Models\Settings\FiscalYear;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Modules\BusinessRegistration\Entities\BusinessDetail;
use Modules\BusinessRegistration\Entities\BusinessPurpose;
use Modules\BusinessRegistration\Entities\InvestmentRevenue;
use Modules\BusinessRegistration\Entities\ObjectTransaction;
use Modules\BusinessRegistration\Transformers\BusinessPurposeResource;
use Modules\BusinessRegistration\Transformers\FiscalYearResource;
use Modules\BusinessRegistration\Transformers\InvestmentRevenueResource;
use Modules\BusinessRegistration\Transformers\ObjectTransactionResource;

class ReportController extends Controller
{
    public function getRequiredData(): JsonResponse
    {
        $fiscalYears = FiscalYear::get();
        $businessPurposes = BusinessPurpose::get();
        $objectTransactions = ObjectTransaction::get();
        $investmentRevenues = InvestmentRevenue::get();
        $businessYears = $this->setBusinessYear();
        $investmentData = $this->setInvestmentData();
        $employmentData = $this->setEmploymentData();
        $introBoardData = $this->setIntroBoardData();
        $getColumns = $this->getColumns();

        return response()->json([
            'investment_data' => $investmentData,
            'employment_data' => $employmentData,
            'intro_board_data' => $introBoardData,
            'businessYear' => $businessYears,
            'get_columns' => $getColumns,
            'fiscal_year' => FiscalYearResource::collection($fiscalYears),
            'business_purpose' => BusinessPurposeResource::collection($businessPurposes),
            'object_transaction' => ObjectTransactionResource::collection($objectTransactions),
            'investment_revenue' => InvestmentRevenueResource::collection($investmentRevenues),
        ]);
    }

    public function report(Request $request)
    {
        $request->validate([
            'date.from' => ['nullable', 'date', 'before_or_equal:date.to_date'],
            'date.to' => ['nullable', 'date', 'after_or_equal:date.from_date'],
            'columns' => ['nullable', 'array']
        ]);

        if (!empty($request->input('columns.business_details'))) {
            $filteredColumns = $request->input('columns.business_details');
        }

        $businessDetails = BusinessDetail::select(!empty($filteredColumns)
            ? array_merge($filteredColumns, ['id'])
            : '*')
            ->where(function ($q) use ($request) {
                $this->filterDataFromUser($q, $request);
            })
            ->get();


        $businessDetails = $this->filterObjectTransaction($businessDetails, $request);

        $businessDetails = $this->filterRegistrationRenewal($businessDetails, $request);

        return $businessDetails;
    }

    private function filterObjectTransaction($businessDetails, $request)
    {
        if (!empty($this->form['object_transaction'])) {
            $businessDetails = $businessDetails
                ->filter(function ($detail) use ($request) {
                    if (!empty($detail->investmentRevenue)) {
                        $objectTransactionId = (int)$detail->investmentRevenue->object_transaction_id;
                        return in_array($objectTransactionId, $request->input('object_transaction'), true);
                    }
                    return false;
                });
        }
        return $businessDetails;
    }

    private function filterRegistrationRenewal($businessDetails, $request)
    {
        if (!empty($request->input('registration_renewal'))) {
            $businessDetails = $businessDetails->filter(function ($detail) use ($request) {
                if (!empty($detail->proprietorDetail)) {
                    $businessType = (int)$detail->proprietorDetail->business_type;
                    return in_array($businessType, $request->input('registration_renewal'), true);
                }
                return false;
            });
        }
        return $businessDetails;
    }


    private function setBusinessYear(): array
    {
        $years = [];
        $minYear = Carbon::create(BusinessDetail::select('establish_year')->min('establish_year'));
        $maxYear = Carbon::create(BusinessDetail::select('establish_year')->max('establish_year'));
        $range = CarbonPeriod::create($minYear, '1 year', $maxYear);

        foreach ($range as $year) {
            $years[] = $year->year;
        }
        return $years;
    }

    private function setInvestmentData(): array
    {
        return [
            'from' => 0,
            'to' => (int)BusinessDetail::select('amount_cost')->max('amount_cost')
        ];

    }

    private function setEmploymentData(): array
    {
        return [
            'from' => 0,
            'to' => (int)BusinessDetail::select('employment')->max('employment')
        ];
    }

    private function setIntroBoardData(): array
    {
        return [
            'from' => 0,
            'to' => (int)BusinessDetail::select('square')->max('square'),
        ];
    }

    private function getColumns(): Collection
    {
        $columnData = collect();

        (new BusinessDetail())
            ->ownAndRelatedModelsFillableColumns()
            ->filter(function ($column) {
                return array_keys($column, 'BusinessDetail')
                    || array_keys($column, 'proprietorDetail')
                    || array_keys($column, 'partnerDetails')
                    || array_keys($column, 'businessPurposes')
                    || array_keys($column, 'registeredBusinesses');
            });

        return $columnData;
    }

    public function filterDataFromUser($q, Request $request): void
    {
        $this->filterFromIntroBoard($request, $q);
        $this->filterFronRegistrationDate($request, $q);

        if (!empty($request->input('fiscal_year'))) {
            $q->whereIn('fiscal_year_id', $request->input('fiscal_year'));
        }

        if (!empty($request->input('business_nature'))) {
            $q->whereIn('business_nature', $request->input('business_nature'));
        }

        if (!empty($request->input('business_purpose'))) {
            $q->whereIn('investment_revenue_id', $request->input('business_purpose'));
        }

        if (!empty($request->input('investment_revenue'))) {
            $q->whereIn('investment_revenue_id', $request->input('investment_revenue'));
        }

        if (!empty($request->input('investment.from'))) {
            $q->where('amount_cost', '>=', (int)$request->input('investment.from'));
        }

        if (!empty($request->input('investment.to'))) {
            $q->where('amount_cost', '<=', (int)$request->input('investment.to'));
        }

        if (!empty($request->input('employment.from'))) {
            $q->where('employment', '>=', (int)$request->input('employment.from'));
        }
        if (!empty($request->input('employment.to'))) {
            $q->where('employment', '<=', (int)$request->input('employment.to'));
        }

        if (!empty($request->input('business_year'))) {
            $q->whereIn('establish_year', $request->input('business_year'));
        }
    }

    /**
     * @param Request $request
     * @param $q
     * @return void
     */
    public function filterFronRegistrationDate(Request $request, $q): void
    {
        if (!empty($request->input('date.from'))) {
            $q->whereDate('registration_date_ne', '>=', $request->input('date.from'));
        }
        if (!empty($request->input('date.to'))) {
            $q->whereDate('registration_date_ne', '<=', $request->input('date.to'));
        }
    }

    /**
     * @param Request $request
     * @param $q
     * @return void
     */
    public function filterFromIntroBoard(Request $request, $q): void
    {
        if (!empty($request->input('introBoard.from'))) {
            $q->where('square', '>=', $request->input('introBoard.from'));
        }
        if (!empty($request->input('introBoard.to'))) {
            $q->where('square', '<=', $request->input('introBoard.to'));
        }
    }
}
