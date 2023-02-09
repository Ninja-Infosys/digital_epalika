<?php

namespace Modules\BusinessRegistration\Http\Controllers\Admin;

use App\Models\Settings\FiscalYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Modules\BusinessRegistration\Entities\BusinessDetail;
use Modules\BusinessRegistration\Entities\BusinessNature;
use Modules\BusinessRegistration\Entities\ObjectTransaction;
use Modules\BusinessRegistration\Transformers\Report\BusinessDetailResource;

class ReportController extends Controller
{
    public function index()
    {
        $fiscalYears = FiscalYear::all();
        $objectTransactions = ObjectTransaction::with('objectTransactions')->whereNull('object_transaction_id')->get();
        $businessNatures = BusinessNature::all();
        $columnData = $this->getColumns();
        return view('businessregistration::admin.report.index', compact('fiscalYears', 'columnData', 'businessNatures', 'objectTransactions'));
    }

    public function report(Request $request)
    {
        $request->validate([
            'from_date' => ['nullable'],
            'to_date' => ['nullable', 'after_or_equal:from_date'],
            'columns' => ['nullable', 'array']
        ]);

        if (empty($request->input('columns'))) {
            $request->request->add(
                ['columns' =>
                    [
                        'business_details' => ['name', 'registration_no', 'registration_date_ne', 'business_nature_id']
                    ]
                ]
            );
        }

        $projects = BusinessDetail::with('fiscalYear', 'province', 'localBody', 'district')->where(function ($q) use ($request) {
            $this->filterDataFromUser($q, $request);
        })->get();

        if (!empty($request->input('columns')['partners'])) {
            $projects->load(['partners' => function ($q) {
                $q->with('province', 'localBody', 'district', 'issueDistrict');
            }]);
        }

        if (!empty($request->input('columns')['registered_businesses'])) {
            $projects->load('registeredBusinesses');
        }

        if (!empty($request->input('columns')['business_renews'])) {
            $projects->load(['businessRenew' => function ($q) {
                $q->with('fiscalYear');
            }]);
        }

        return response()->json([
            'data' => BusinessDetailResource::collection($projects)
        ]);
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
        if (!empty($request->input('fiscal_year'))) {
            $q->whereIn('fiscal_year_id', $request->input('fiscal_year'));
        }

        if (!empty($request->input('from_date'))) {
            $q->whereDate('registration_date_ne', '>=', $request->input('from_date'));
        }

        if (!empty($request->input('to_date'))) {
            $q->whereDate('registration_date_ne', '<=', $request->input('to_date'));
        }

        if (!empty($request->input('object_transaction'))) {
            $q->whereIn('object_transaction_id', $request->input('object_transaction'));
        }

        if (!empty($request->input('business_nature'))) {
            $q->whereIn('business_nature_id', $request->input('business_nature'));
        }
    }

    public function businessRegistrationBook()
    {
        $fiscalYears = FiscalYear::all();
        $objectTransactions = ObjectTransaction::with('objectTransactions')->whereNull('object_transaction_id')->get();
        $businessNatures = BusinessNature::all();
        return view('businessregistration::admin.report.business-registration-book',compact('businessNatures','objectTransactions','fiscalYears'));
    }
}
