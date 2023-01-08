<?php

namespace Modules\BusinessRegistration\Http\Controllers\Admin;

use App\Models\Settings\FiscalYear;
use App\Traits\ExcelTrait;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Modules\BusinessRegistration\Entities\BusinessDetail;
use Modules\BusinessRegistration\Entities\BusinessPurpose;
use Modules\BusinessRegistration\Entities\InvestmentRevenue;
use Modules\BusinessRegistration\Entities\ObjectTransaction;
use Illuminate\Support\Facades\View;
use Modules\BusinessRegistration\Transformers\BusinessDetailResource;

class ReportController extends Controller
{
    use ExcelTrait;

    public function getRequiredData()
    {
        $fiscalYears = FiscalYear::get();
        $businessPurposes = BusinessPurpose::get();
        $objectTransactions = ObjectTransaction::get();
        $investmentRevenues = InvestmentRevenue::get();
        $businessYears = $this->setBusinessYear();
        $investmentData = $this->setInvestmentData();
        $employmentData = $this->setEmploymentData();
        $introBoardData = $this->setIntroBoardData();
        $columnData = $this->getColumns();

        return view('businessregistration::admin.businessRegistrationReport.index', compact(['fiscalYears', 'businessPurposes', 'objectTransactions', 'investmentRevenues', 'businessYears', 'investmentData', 'employmentData', 'introBoardData', 'columnData',]));
    }

    public function report(Request $request)
    {
        $request->validate([
            'from_date' => ['nullable'],
            'to_date' => ['nullable', 'after_or_equal:from_date'],
            'columns' => ['nullable', 'array']
        ]);

        list($businessRegistrationColumns, $fiscalYearColumns, $investmentRevenueColumns, $provinceColumns, $districtColumns, $localBodyColumns, $objectTransactionColumns) = $this->resolveColumns($request);

        $lists = $this->getDataFromListRegistrations($request, $businessRegistrationColumns);

        $this->getFiscalYearRelationData($fiscalYearColumns, $lists);
        $this->getInvestmentRevenueRelationData($investmentRevenueColumns, $lists);
        $this->getProvinceRelationData($provinceColumns, $lists);
        $this->getDistrictRelationData($districtColumns, $lists);
        $this->getLocalBodyRelationData($localBodyColumns, $lists);
        $this->getObjectTransactionRelationData($objectTransactionColumns, $lists);

        $excelUrl = $this->storeExcelFile($lists);
        return response()->json([
            'data' => BusinessDetailResource::collection($lists),
            'excelUrl' => $excelUrl
        ]);
    }

    private function getFiscalYearRelationData($fiscalYearColumns, $lists): void
    {
        if (!empty($fiscalYearColumns)) {
            $lists->load(['fiscalYear' => function ($query) use ($fiscalYearColumns) {
                $query->select($fiscalYearColumns);
            }]);
        }
    }

    private function getInvestmentRevenueRelationData($investmentRevenueColumns, $lists): void
    {
        if (!empty($investmentRevenueColumns)) {
            $lists->load(['investmentRevenue' => function ($query) use ($investmentRevenueColumns) {
                $query->select($investmentRevenueColumns);
            }]);
        }
    }

    private function getProvinceRelationData($provinceColumns, $lists): void
    {
        if (!empty($provinceColumns)) {
            $lists->load(['province' => function ($query) use ($provinceColumns) {
                $query->select($provinceColumns);
            }]);
        }
    }

    private function getDistrictRelationData($districtColumns, $lists): void
    {
        if (!empty($districtColumns)) {
            $lists->load(['district' => function ($query) use ($districtColumns) {
                $query->select($districtColumns);
            }]);
        }
    }


    private function getLocalBodyRelationData($localBodyColumns, $lists): void
    {
        if (!empty($localBodyColumns)) {
            $lists->load(['localBody' => function ($query) use ($localBodyColumns) {
                $query->select($localBodyColumns);
            }]);
        }
    }

    private function getObjectTransactionRelationData($objectTransactionColumns, $lists): void
    {
        if (!empty($objectTransactionColumns)) {
            $lists->load(['objectTransaction' => function ($query) use ($objectTransactionColumns) {
                $query->select($objectTransactionColumns);
            }]);
        }
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
                return !array_keys($column, 'printedData');
            })
            ->each(function ($column) use ($columnData) {
                $columnData->push(collect($column)->put('columns', $column['columns']));
            });
        return $columnData;
    }

    private function filterDataFromUser($q, Request $request): void
    {
        $this->filterFromIntroBoard($request, $q);
        $this->filterFromRegistrationDate($request, $q);

        if (!empty($request->input('fiscal_year'))) {
            $q->whereIn('fiscal_year_id', Arr::wrap($request->input('fiscal_year')));
        }

        if (!empty($request->input('business_nature'))) {
            $q->whereIn('business_nature', Arr::wrap($request->input('business_nature')));
        }

        if (!empty($request->input('business_purpose'))) {
            $q->whereIn('investment_revenue_id', Arr::wrap($request->input('business_purpose')));
        }

        if (!empty($request->input('investment_revenue'))) {
            $q->whereIn('investment_revenue_id', Arr::wrap($request->input('investment_revenue')));
        }

        if (!empty($request->input('object_transaction'))) {
            $q->whereIn('object_transaction_id', Arr::wrap($request->input('object_transaction')));
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
            $q->whereIn('establish_year', Arr::wrap($request->input('business_year')));
        }
    }

    private function filterFromRegistrationDate(Request $request, $q): void
    {
        if (!empty($request->input('from_date'))) {
            $q->whereDate('registration_date_ne', '>=', $request->input('from_date'));
        }

        if (!empty($request->input('to_date'))) {
            $q->whereDate('registration_date_ne', '<=', $request->input('to_date'));
        }
    }

    private function filterFromIntroBoard(Request $request, $q): void
    {
        if (!empty($request->input('introBoard.from'))) {
            $q->where('square', '>=', $request->input('introBoard.from'));
        }

        if (!empty($request->input('introBoard.to'))) {
            $q->where('square', '<=', $request->input('introBoard.to'));
        }
    }

    private function resolveColumns(Request $request): array
    {
        $businessRegistrationColumns = ['business_type', 'business_nature', 'business_detail_name', 'establish_year', 'registration_date', 'pan_no', 'amount_cost', 'source_of_capital', 'purpose', 'ward_no'];
        $fiscalYearColumns = [];
        $investmentRevenueColumns = [];
        $provinceColumns = [];
        $districtColumns = [];
        $localBodyColumns = [];
        $objectTransactionColumns = [];

        if (!empty($request->input('columns'))) {
            if (!empty($request->input('columns')['business_details'])) {
                $businessRegistrationColumns = $request->input('columns')['business_details'];
                $businessRegistrationColumns[] = 'id';
            }

            if (!empty($request->input('columns')['fiscal_years'])) {
                $businessRegistrationColumns[] = 'fiscal_year_id';
                $fiscalYearColumns = $request->input('columns')['fiscal_years'];
                $fiscalYearColumns[] = 'id';
            }

            if (!empty($request->input('columns')['investment_revenues'])) {
                $businessRegistrationColumns[] = 'investment_revenue_id';
                $investmentRevenueColumns = $request->input('columns')['investment_revenues'];
                $investmentRevenueColumns[] = 'id';
            }

            if (!empty($request->input('columns')['provinces'])) {
                $businessRegistrationColumns[] = 'province_id';
                $provinceColumns = $request->input('columns')['provinces'];
                $provinceColumns[] = 'id';
            }

            if (!empty($request->input('columns')['districts'])) {
                $businessRegistrationColumns[] = 'district_id';
                $districtColumns = $request->input('columns')['districts'];
                $districtColumns[] = 'id';
            }

            if (!empty($request->input('columns')['local_bodies'])) {
                $businessRegistrationColumns[] = 'local_body_id';
                $localBodyColumns = $request->input('columns')['local_bodies'];
                $localBodyColumns[] = 'id';
            }
            if (!empty($request->input('columns')['object_transactions'])) {
                $businessRegistrationColumns[] = 'object_transaction_id';
                $objectTransactionColumns = $request->input('columns')['object_transactions'];
                $objectTransactionColumns[] = 'id';
            }

        }
        return array($businessRegistrationColumns, $fiscalYearColumns, $investmentRevenueColumns, $provinceColumns, $districtColumns, $localBodyColumns, $objectTransactionColumns);
    }

    private function getDataFromListRegistrations(Request $request, mixed $businessRegistrationColumns)
    {
        return BusinessDetail::where(function ($q) use ($request) {
            $this->filterDataFromUser($q, $request);
        })
            ->select($businessRegistrationColumns)
            ->get();


    }

    private function excludeColumnsFromListRegistration($lists)
    {
        return $lists
            ->map(function ($list) {
                return removeColumns($list->toArray(), ['id', 'created_at', 'updated_at', 'deleted_at', 'fiscal_year_id', 'investment_revenue_id', 'object_transaction_id']);
            });
    }
}
