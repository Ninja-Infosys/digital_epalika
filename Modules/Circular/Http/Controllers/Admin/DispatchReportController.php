<?php

namespace Modules\Circular\Http\Controllers\Admin;

use App\Models\Settings\FiscalYear;
use App\Traits\ExcelTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Modules\Circular\Entities\Dispatch;

class DispatchReportController extends Controller
{
    use ExcelTrait;
    public function index()
    {
        $fiscalYears = FiscalYear::get();
        $columnData = $this->getColumns();

        return view('circular::admin.report.dispatch.index', compact('fiscalYears', 'columnData'));
    }

    public function report(Request $request)
    {
        $request->validate([
            'en_from_dispatch_date' => ['nullable'],
            'en_to_dispatch_date' => ['nullable', 'after_or_equal:en_from_dispatch_date'],
            'en_from_letter_date' => ['nullable'],
            'en_to_letter_date' => ['nullable', 'after_or_equal:en_from_letter_date'],
            'columns' => ['nullable', 'array']
        ]);
        list($dispatchColumns, $fiscalYearColumns) = $this->resolveColumns($request);

        $lists = $this->getDataFromDispatch($request, $dispatchColumns);

        if (!empty($fiscalYearColumns)) {
            $lists->load(['fiscalYear' => function($query) use($fiscalYearColumns) {
                $query->select($fiscalYearColumns);
            }]);
        }

        $lists = $this->excludeColumnsFromListRegistration($lists);

        $excelUrl = $this->storeExcelFile($lists);
        return response()->json([
            'view' => (string)View::make('report.table', compact('lists','excelUrl'))
        ]);
    }

    private function getColumns(): Collection
    {
        $columnData = collect();

        (new Dispatch())
            ->ownAndRelatedModelsFillableColumns()
//            ->filter(function ($column) {
//                return array_keys($column, 'Dispatch');
//            })
            ->each(function ($column) use ($columnData) {
                $columnData->push(collect($column)->put('columns', $column['columns']));
            });
        return $columnData;
    }

    public function filterDataFromUser($q, Request $request): void
    {
        if (!empty($request->input('fiscal_year'))) {
            $q->whereIn('fiscal_year_id', $request->input('fiscal_year'));
        }

        if (!empty($request->input('en_from_dispatch_date'))) {
            $q->whereDate('en_dispatch_date', '>=', $request->input('en_from_dispatch_date'));
        }

        if (!empty($request->input('en_to_dispatch_date'))) {
            $q->whereDate('en_dispatch_date', '<=', $request->input('en_to_dispatch_date'));
        }
        if (!empty($request->input('en_from_letter_date'))) {
            $q->whereDate('en_letter_date', '>=', $request->input('en_from_letter_date'));
        }
        if (!empty($request->input('en_to_letter_date'))) {
            $q->whereDate('en_letter_date', '<=', $request->input('en_to_letter_date'));
        }

        if (!empty($request->input('dispatch_no'))) {
            $q->where('dispatch_no', $request->input('dispatch_no'));
        }
        if (!empty($request->input('letter_number'))) {
            $q->where('letter_number', $request->input('letter_number'));
        }
    }

    private function resolveColumns(Request $request): array
    {
        $dispatchColumns = [

            'dispatch_no',
            'dispatch_date',
            'letter_number',
            'letter_date',
            'subject',
            'receiver_name',
            'receiver_address',
            'receiver_contact',
            'remarks',
        ];
        $fiscalYearColumns = [];

        if (!empty($request->input('columns'))) {
            $dispatchColumns = ['id'];
            if (!empty($request->input('columns')['dispatches'])) {
                $dispatchColumns = $request->input('columns')['dispatches'];
            }

            if (!empty($request->input('columns')['fiscal_years'])) {
                $dispatchColumns[] = 'fiscal_year_id';

                $fiscalYearColumns = $request->input('columns')['fiscal_years'];
                $fiscalYearColumns[] = 'id';
            }

        }
        return array($dispatchColumns, $fiscalYearColumns);
    }

    private function getDataFromDispatch(Request $request, mixed $registrationColumns)
    {
        return Dispatch::where(function ($q) use ($request) {
            $this->filterDataFromUser($q, $request);
        })
            ->select($registrationColumns)
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
