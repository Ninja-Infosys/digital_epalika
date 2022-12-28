<?php

namespace Modules\ListRegistration\Http\Controllers\Admin;

use App\Exports\ReportExport;
use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use App\Traits\ExcelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use LaravelIdea\Helper\Modules\ListRegistration\Entities\_IH_ListRegistration_C;
use Maatwebsite\Excel\Facades\Excel;
use Modules\ListRegistration\Entities\ListRegistration;

class ReportController extends Controller
{
    use ExcelTrait;

    public function index()
    {
        $fiscalYears = FiscalYear::get();
        $columnData = $this->getColumns();

        return view('listregistration::admin.report.index', compact('fiscalYears', 'columnData'));
    }

    public function report(Request $request)
    {
        $request->validate([
            'from_date' => ['nullable'],
            'to_date' => ['nullable', 'after_or_equal:from_date'],
            'columns' => ['nullable', 'array']
        ]);

        list($listRegistrationColumns, $fiscalYearColumns) = $this->resolveColumns($request);
        $lists = $this->getDataFromListRegistrations($request, $listRegistrationColumns);

        if (!empty($fiscalYearColumns)) {
            $lists->load(['fiscalYear' => function ($query) use ($fiscalYearColumns) {
                $query->select($fiscalYearColumns);
            }]);
        }

        $lists = $this->excludeColumnsFromListRegistration($lists);

        $excelUrl = $this->storeExcelFile($lists);

        return response()->json([
            'view' => (string)View::make('report.table', compact('lists', 'excelUrl'))
        ]);
    }

    private function getColumns(): Collection
    {
        $columnData = collect();

        (new ListRegistration())
            ->ownAndRelatedModelsFillableColumns()
//            ->filter(function ($column) {
//                return array_keys($column, 'ListRegistration');
//            })
            ->each(function ($column) use ($columnData) {
                $columnData->push(collect($column)->put('columns', $column['columns']));
            });
        return $columnData;
    }

    private function filterDataFromUser($q, Request $request): void
    {
        if (!empty($request->input('fiscal_year'))) {
            $q->whereIn('fiscal_year_id', $request->input('fiscal_year'));
        }

        if (!empty($request->input('from_date'))) {
            $q->whereDate('date', '>=', $request->input('from_date'));
        }

        if (!empty($request->input('to_date'))) {
            $q->whereDate('date', '<=', $request->input('to_date'));
        }

        if (!empty($request->input('registration_no'))) {
            $q->where('registration_no', $request->input('registration_no'));
        }

        if (!empty($request->input('applicant_type'))) {
            $q->whereIn('applicant_type', $request->input('applicant_type'));
        }

        if (!empty($request->input('business_nature'))) {
            $q->whereIn('business_nature', $request->input('business_nature'));
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    private function resolveColumns(Request $request): array
    {
        $listRegistrationColumns = ['registration_no', 'applicant_type', 'name', 'address', 'mailing_address', 'main_person', 'telephone', 'mobile_no', 'business_nature', 'business_nature_description', 'date'];
        $fiscalYearColumns = [];

        if (!empty($request->input('columns'))) {
            $listRegistrationColumns = ['id'];
            if (!empty($request->input('columns')['list_registrations'])) {
                $listRegistrationColumns = $request->input('columns')['list_registrations'];
            }

            if (!empty($request->input('columns')['fiscal_years'])) {
                $listRegistrationColumns[] = 'fiscal_year_id';

                $fiscalYearColumns = $request->input('columns')['fiscal_years'];
                $fiscalYearColumns[] = 'id';
            }

        }
        return array($listRegistrationColumns, $fiscalYearColumns);
    }


    private function getDataFromListRegistrations(Request $request, mixed $listRegistrationColumns)
    {
        return ListRegistration::where(function ($q) use ($request) {
            $this->filterDataFromUser($q, $request);
        })
            ->select($listRegistrationColumns)
            ->get();
    }

    private function excludeColumnsFromListRegistration($lists)
    {
        return $lists
            ->map(function ($list) {
                return removeColumns($list->toArray(), ['id', 'created_at', 'updated_at', 'deleted_at', 'fiscal_year_id']);
            });
    }
}
