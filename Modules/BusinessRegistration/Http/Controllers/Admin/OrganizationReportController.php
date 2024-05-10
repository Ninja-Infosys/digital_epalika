<?php

namespace Modules\BusinessRegistration\Http\Controllers\Admin;

use App\Models\Settings\FiscalYear;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\BusinessRegistration\Entities\OrganizationRegistration;
use Modules\BusinessRegistration\Transformers\OrganizationReport\OrganizationRegistrationResource;
use Illuminate\Support\Collection;


class OrganizationReportController extends Controller
{
    public function index()
    {
        $fiscalYears = FiscalYear::all();
        return view('businessregistration::admin.organizationReport.index', compact('fiscalYears'));
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
                        'organization_registrations' => ['name', 'registration_no', 'registration_date_ne','purpose']
                    ]
                ]
            );
        }
        $projects = OrganizationRegistration::with('fiscalYear', 'province', 'localBody', 'district')->where(function ($q) use ($request) {
            $this->filterDataFromUser($q, $request);
        })->whereNotNull('registration_no')->get();

        if (!empty($request->input('columns')['partners'])) {
            $projects->load(['partners' => function ($q) {
                $q->with('province', 'localBody', 'district', 'issueDistrict');
            }]);
        }

        if (!empty($request->input('columns')[''])) {
            $projects->load(['organizationRenew' => function ($q) {
                $q->with('fiscalYear');
            }]);
        }

        return response()->json([
            'data' => OrganizationRegistrationResource::collection($projects)
        ]);
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

        if (!empty($request->input('name'))) {
            $q->where('name', 'like', '%' . $request->input('name') . '%');
        }


        if (!empty($request->input('ward_no'))) {
            $q->whereIn('ward_no', $request->input('ward_no'));
        }
    }
    // private function getColumns(): Collection
    // {
    //     $columnData = collect();

    //     (new OrganizationRegistration())
    //         ->ownAndRelatedModelsFillableColumns()
    //         ->filter(function ($column) {
    //             return !array_keys($column, 'printedData');
    //         })
    //         ->each(function ($column) use ($columnData) {
    //             $columnData->push(collect($column)->put('columns', $column['columns']));
    //         });
    //     return $columnData;
    // }


    public function create()
    {
        return view('businessregistration::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('businessregistration::show');
    }

    public function edit($id)
    {
        return view('businessregistration::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
