<?php

namespace Modules\Circular\Http\Controllers\Admin;

use App\Models\Settings\FiscalYear;
use App\Traits\ExcelTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Modules\Circular\Entities\Registration;

class RegistrationReportController extends Controller
{
    use ExcelTrait;

    public function index()
    {
        $fiscalYears = FiscalYear::get();
        $columnData = $this->getColumns();

        return view('circular::admin.report.registration.index', compact('fiscalYears', 'columnData'));
    }

    public function report(Request $request)
    {
        $request->validate([
            'en_from_registration_date' => ['nullable'],
            'en_to_registration_date' => ['nullable', 'after_or_equal:en_from_registration_date'],
            'en_from_letter_date' => ['nullable'],
            'en_to_letter_date' => ['nullable', 'after_or_equal:en_from_letter_date'],
            'columns' => ['nullable', 'array']
        ]);

        list($registrationColumns, $fiscalYearColumns) = $this->resolveColumns($request);

        $lists = $this->getDataFromRegistrations($request,$registrationColumns);

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

        (new Registration())
            ->ownAndRelatedModelsFillableColumns()
//            ->filter(function ($column) {
//                return array_keys($column, 'Registration');
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

        if (!empty($request->input('en_from_registration_date'))) {
            $q->whereDate('en_registration_date', '>=', $request->input('en_from_registration_date'));
        }

        if (!empty($request->input('en_to_registration_date'))) {
            $q->whereDate('en_registration_date', '<=', $request->input('en_to_registration_date'));
        }
        if (!empty($request->input('en_from_letter_date'))) {
            $q->whereDate('en_letter_date', '>=', $request->input('en_from_letter_date'));
        }
        if (!empty($request->input('en_to_letter_date'))) {
            $q->whereDate('en_letter_date', '<=', $request->input('en_to_letter_date'));
        }

        if (!empty($request->input('registration_no'))) {
            $q->where('registration_no', $request->input('registration_no'));
        }
        if (!empty($request->input('letter_number'))) {
            $q->where('letter_number', $request->input('letter_number'));
        }
    }

    private function resolveColumns(Request $request): array
    {
        $registrationColumns = [
            'registration_no',
            'registration_date',
            'letter_number',
            'letter_date',
            'sender_name',
            'subject',
            'receiver_name',
            'phone',
            'date',
            'remarks',

        ];
        $fiscalYearColumns = [];

        if (!empty($request->input('columns'))) {
            $registrationColumns = ['id'];
            if (!empty($request->input('columns')['registrations'])) {
                $registrationColumns = $request->input('columns')['registrations'];
            }

            if (!empty($request->input('columns')['fiscal_years'])) {
                $registrationColumns[] = 'fiscal_year_id';

                $fiscalYearColumns = $request->input('columns')['fiscal_years'];
                $fiscalYearColumns[] = 'id';
            }

        }
        return array($registrationColumns, $fiscalYearColumns);
    }

    private function getDataFromRegistrations(Request $request, mixed $registrationColumns)
    {
        return Registration::where(function ($q) use ($request) {
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
