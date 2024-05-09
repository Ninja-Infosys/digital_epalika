<?php

namespace Modules\BusinessRegistration\Http\Controllers\Admin;

use App\Models\Settings\FiscalYear;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\BusinessRegistration\Entities\BusinessDetail;
use Modules\BusinessRegistration\Entities\BusinessNature;
use Modules\BusinessRegistration\Entities\ObjectTransaction;
use Modules\BusinessRegistration\Entities\OrganizationRegistration;
use Modules\BusinessRegistration\Transformers\Report\BusinessDetailResource;

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
        ]);

        $projects = OrganizationRegistration::with('fiscalYear', 'province', 'localBody', 'district')->where(function ($q) use ($request) {
            $this->filterDataFromUser($q, $request);
        })->whereNotNull('registration_no')->get();

        return response()->json([
            'data' => BusinessDetailResource::collection($projects)
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
            $q->whereIn('name', $request->input('name'));
        }

        if (!empty($request->input('business_nature'))) {
            $q->whereIn('business_nature_id', $request->input('business_nature'));
        }
        if (!empty($request->input('ward_no'))) {
            $q->whereIn('ward_no', $request->input('ward_no'));
        }
    }

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
