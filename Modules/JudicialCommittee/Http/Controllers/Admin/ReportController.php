<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use App\Traits\ExcelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Modules\JudicialCommittee\Entities\ComplaintApplication;
use Modules\JudicialCommittee\Entities\LawsuitNature;
use Modules\JudicialCommittee\Transformers\Report\ComplaintApplicationResource;

class ReportController extends Controller
{
    use ExcelTrait;

    public function index()
    {
        $fiscalYears = FiscalYear::get();
        $lawsuitNatures = LawsuitNature::all();
        $columnData = $this->getColumns();

        return view('judicialcommittee::admin.report.index', compact('fiscalYears', 'lawsuitNatures', 'columnData'));
    }

    private function getColumns(): Collection
    {
        $columnData = collect();

        (new ComplaintApplication())
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
                        'complaint_applications' => ['submission_no', 'registration_no', 'date', 'subject', 'lawsuit_nature_id']
                    ]
                ]
            );
        }

        $complaintApplications = ComplaintApplication::with('fiscalYear', 'lawsuitNature')
            ->where(function ($q) use ($request) {
                $this->filterDataFromUser($q, $request);
            })
            ->get();
        if (!empty($request->input('columns')['complainant_defendants'])) {
            $complaintApplications->load('complainantDefendants.province', 'complainantDefendants.district', 'complainantDefendants.localBody');
        }
        if (!empty($request->input('columns')['witnesses'])) {
            $complaintApplications->load('witnesses');
        }
        if (!empty($request->input('columns')['related_members'])) {
            $complaintApplications->load('relatedMembers');
        }
        if (!empty($request->input('columns')['date_sheets'])) {
            $complaintApplications->load('dateSheets');
        }
        if (!empty($request->input('columns')['defendant_issued_deadlines'])) {
            $complaintApplications->load('defendantIssuedDeadlines');
        }

        return response()->json([
            'data' => ComplaintApplicationResource::collection($complaintApplications)
        ]);
    }

    private function filterDataFromUser($q, Request $request): void
    {
        if (!empty($request->input('fiscal_year'))) {
            $q->whereIn('fiscal_year_id', Arr::wrap($request->input('fiscal_year')));
        }

        if (!empty($request->input('lawsuit_nature_id'))) {
            $q->whereIn('lawsuit_nature_id', Arr::wrap($request->input('lawsuit_nature_id')));
        }

        if (!empty($request->input('from_date'))) {
            $q->whereDate('date', '>=', $request->input('from_date'));
        }

        if (!empty($request->input('to_date'))) {
            $q->whereDate('date', '<=', $request->input('to_date'));
        }
    }
}
