<?php

namespace Modules\Identity\Http\Controllers;

use App\Models\Settings\FiscalYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Modules\Identity\Entities\SeniorCitizenDetail;
use Modules\Identity\Transformers\SeniorCitizenDetailResource;
use Modules\JudicialCommittee\Entities\ComplaintApplication;

class SeniorCitizenDetailReportController extends Controller
{
    public function index()
    {
        $fiscalYears = FiscalYear::all();
        $columnData = $this->getColumns();
        return view('identity::admin.seniorCitizen.report', compact('fiscalYears','columnData'));
    }


    private function getColumns(): Collection
    {
        $columnData = collect();

        (new SeniorCitizenDetail())
            ->ownAndRelatedModelsFillableColumns()
            ->filter(function ($column) {
                return !array_keys($column, 'printedData');
            })
            ->each(function ($column) use ($columnData) {
                $columnData->push(collect($column)->put('columns', $column['columns']));
            });
        return $columnData;
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
                        'senior_citizen_details' => ['name', 'gender','card_no','dob_bs','blood_group']
                    ]
                ]
            );
        }

        $seniorCitizenDetail = SeniorCitizenDetail::with($this->relations)
            ->where(function ($q) use ($request) {
                $this->filterDataFromUser($q, $request);
            })
            ->get();


        return response()->json([
            'data' => SeniorCitizenDetailResource::collection($seniorCitizenDetail),
        ]);
    }

    private array $relations = [
        'fiscalYear',
        'province',
        'district',
        'localBody',
        'employeeSignature',
    ];

    private function filterDataFromUser($q, Request $request): void
    {
        if (!empty($request->input('fiscal_year'))) {
            $q->whereIn('fiscal_year_id', Arr::wrap($request->input('fiscal_year')));
        }

        if (!empty($request->input('from_date'))) {
            $q->whereDate('created_at', '>=', $request->input('from_date'));
        }

        if (!empty($request->input('to_date'))) {
            $q->whereDate('created_at', '<=', $request->input('to_date'));
        }
    }

}
