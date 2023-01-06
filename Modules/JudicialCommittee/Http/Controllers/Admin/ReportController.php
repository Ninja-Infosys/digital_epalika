<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin;

use App\Models\Settings\FiscalYear;
use App\Traits\ExcelTrait;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Modules\JudicialCommittee\Entities\ComplaintApplication;
use Modules\JudicialCommittee\Entities\LawsuitNature;
use Modules\JudicialCommittee\Transformers\ComplaintApplicationResource;

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

        list($complaintApplicationColumns, $fiscalYearColumns, $provinceColumns, $districtColumns, $localBodyColumns,) = $this->resolveColumns($request);

        $lists = $this->getDataFromComplaintApplications($request, $complaintApplicationColumns);

        $this->getFiscalYearRelationData($fiscalYearColumns, $lists);
        $this->getProvinceRelationData($provinceColumns, $lists);
        $this->getDistrictRelationData($districtColumns, $lists);
        $this->getLocalBodyRelationData($localBodyColumns, $lists);

        $excelUrl = $this->storeExcelFile($lists);

        return response()->json([
            'data' => ComplaintApplicationResource::collection($lists),
            'excelUrl' => $excelUrl
        ]);
    }

    private function getFiscalYearRelationData($fiscalYearColumns, $lists): void
    {
        if (!empty($fiscalYearColumns)) {
            $lists->load(['fiscalYear' => function ($query) use ($fiscalYearColumns) {
                $query->select($fiscalYearColumns);
            }]);
        }
    }

    private function getProvinceRelationData($provinceColumns, $lists): void
    {
        if (!empty($provinceColumns)) {
            $lists->load(['province' => function ($query) use ($provinceColumns) {
                $query->select($provinceColumns);
            }]);
        }
    }

    private function getDistrictRelationData($districtColumns, $lists): void
    {
        if (!empty($districtColumns)) {
            $lists->load(['district' => function ($query) use ($districtColumns) {
                $query->select($districtColumns);
            }]);
        }
    }


    private function getLocalBodyRelationData($localBodyColumns, $lists): void
    {
        if (!empty($localBodyColumns)) {
            $lists->load(['localBody' => function ($query) use ($localBodyColumns) {
                $query->select($localBodyColumns);
            }]);
        }
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

    private function resolveColumns(Request $request): array
    {
        $complaintApplicationColumns = ['submission_no', 'registration_no','date','applicant_name'];
        $fiscalYearColumns = [];
        $provinceColumns = [];
        $districtColumns = [];
        $localBodyColumns = [];

        if (!empty($request->input('columns'))) {
            if (!empty($request->input('columns')['complaint_applications'])) {
                $complaintApplicationColumns = $request->input('columns')['complaint_applications'];
                $complaintApplicationColumns[] = 'id';
            }

            if (!empty($request->input('columns')['fiscal_years'])) {
                $complaintApplicationColumns[] = 'fiscal_year_id';
                $fiscalYearColumns = $request->input('columns')['fiscal_years'];
                $fiscalYearColumns[] = 'id';
            }
        }
        return array($complaintApplicationColumns, $fiscalYearColumns, $provinceColumns, $districtColumns, $localBodyColumns);
    }

    private function getDataFromComplaintApplications(Request $request, mixed $complaintApplicationColumns)
    {
        return ComplaintApplication::where(function ($q) use ($request) {
            $this->filterDataFromUser($q, $request);
        })
            ->select($complaintApplicationColumns)
            ->get();

    }

    private function excludeColumnsFromComplaintApplications($lists)
    {
        return $lists
            ->map(function ($list) {
                return removeColumns($list->toArray(), ['id','created_at', 'updated_at', 'deleted_at', 'fiscal_year_id', 'lawsuit_nature_id']);
            });
    }
}
