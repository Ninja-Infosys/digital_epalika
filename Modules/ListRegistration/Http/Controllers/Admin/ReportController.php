<?php

namespace Modules\ListRegistration\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Modules\ListRegistration\Entities\ListRegistration;

class ReportController extends Controller
{
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
        $listRegistrations = ListRegistration::where(function ($q) use ($request) {
            $this->filterDataFromUser($q, $request);
        })
            ->selectRaw(!empty($request->input('columns')['list_registrations'])
                ? implode(',', $request->input('columns')['list_registrations'])
                : '*'
            )

//            ->select('applicant_type_label as applicant_type')
            ->get();

        return response()->json([
            'view' => (string)View::make('listregistration::admin.report.table_data', compact('listRegistrations'))
        ]);
    }

    private function getColumns(): Collection
    {
        $columnData = collect();

        (new ListRegistration())
            ->ownAndRelatedModelsFillableColumns()
            ->filter(function ($column) {
                return array_keys($column, 'ListRegistration');
            })
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
}
