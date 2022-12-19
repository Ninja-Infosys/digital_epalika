<?php

namespace Modules\Circular\Http\Controllers\Admin;

use App\Models\Settings\FiscalYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Modules\Circular\Entities\Registration;

class RegistrationReportController extends Controller
{
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

        $registrations = Registration::with('fiscalYear')->where(function ($q) use ($request) {
            $this->filterDataFromUser($q, $request);
        })
            ->get();

        return response()->json([
            'view' => (string)View::make('circular::admin.report.registration.table_data', compact('registrations'))
        ]);
    }

    private function getColumns(): Collection
    {
        $columnData = collect();

        (new Registration())
            ->ownAndRelatedModelsFillableColumns()
            ->filter(function ($column) {
                return array_keys($column, 'Registration');
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
}
