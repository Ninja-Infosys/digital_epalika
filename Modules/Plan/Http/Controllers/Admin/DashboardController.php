<?php

namespace Modules\Plan\Http\Controllers\Admin;

use App\Models\Settings\OfficeSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Modules\Plan\Entities\BudgetHead;
use Modules\Plan\Entities\PlanArea;
use Modules\Plan\Entities\PlanLevel;
use Modules\Plan\Entities\Project;
use Modules\Plan\Enums\ProjectStatusEnum;

class DashboardController extends Controller
{
    protected Collection $projects;
    protected OfficeSetting $officeSetting;

    public function __construct()
    {
        parent::__construct();

        $this->officeSetting = OfficeSetting::with('localBody')->first();
        $this->projects = Project::where('fiscal_year_id', $this->officeSetting->fiscal_year_id)->get();
    }

    public function __invoke()
    {
        $not_started_project_count = $this->projects->where('project_status', ProjectStatusEnum::NOT_STARTED)->count();
        $in_progress_project_count = $this->projects->where('project_status', ProjectStatusEnum::IN_PROGRESS)->count();
        $completed_project_count = $this->projects->where('project_status', ProjectStatusEnum::COMPLETED)->count();
        $wardWiseProjects = $this->getWardWiseProjects();
        $planAreaWiseProjects = $this->getPlanAreaWiseProjects();
        $budgetHeadWiseProjects = $this->getBudgetHeadWiseProjects();
        $planLevelWiseProjects = $this->getPlanLevelWiseProjects();

        return view('plan::admin.dashboard', compact(
            'not_started_project_count',
            'in_progress_project_count',
            'completed_project_count',
            'wardWiseProjects',
            'planAreaWiseProjects',
            'budgetHeadWiseProjects',
            'planLevelWiseProjects'
        ));
    }

    private function getWardWiseProjects()
    {
        $wardsData = collect();

        foreach ($this->officeSetting->localBody->ward_no as $ward) {
            $wardsData->push([
                'ward_no' => "वार्ड नं. $ward",
                'projects_count' => $this->projects->where('ward_no', $ward)->count()
            ]);
        }

        return [
            'labels' => $wardsData->pluck('ward_no')->toArray(),
            'dataSets' => [
                [
                    'data' => $wardsData->pluck('projects_count')->toArray(),
                    'label' => 'जम्मा',
                    'fill' => 'false',
                ],
            ],
        ];
    }

    private function getPlanAreaWiseProjects()
    {
        $planAreas = PlanArea::withCount(['projects' => function ($query) {
            $query->where('fiscal_year_id', $this->officeSetting->fiscal_year_id);
        }])
            ->with(['planAreas' => function ($query) {
                $query->withCount(['projects' => function ($sub_query) {
                    $sub_query->where('fiscal_year_id', $this->officeSetting->fiscal_year_id);
                }]);
            }])->whereNull('plan_area_id')->get()->map(function ($planArea) {
                return [
                    'area_name' => $planArea->area_name,
                    'projects_count' => $planArea->projects_count + $planArea->planAreas->sum('projects_count')
                ];
            });

        return [
            'labels' => $planAreas->pluck('area_name')->toArray(),
            'dataSets' => [
                [
                    'data' => $planAreas->pluck('projects_count')->toArray(),
                    'label' => 'शुरु नभएका योजनाहरु ',
                    'fill' => 'false',
                ],
                [
                    'data' => $planAreas->pluck('projects_count')->toArray(),
                    'label' => 'चालु योजनाहरु',
                    'fill' => 'false',
                ],
                [
                    'data' => $planAreas->pluck('projects_count')->toArray(),
                    'label' => 'सम्पन्न योजनाहरू',
                    'fill' => 'false',
                ],
            ],

        ];
    }

    private function getBudgetHeadWiseProjects()
    {
        $budgetHeads = BudgetHead::withCount(['projects' => function ($query) {
            $query->where('fiscal_year_id', $this->officeSetting->fiscal_year_id);
        }])
            ->with(['budgetHeads' => function ($query) {
                $query->withCount(['projects' => function ($sub_query) {
                    $sub_query->where('fiscal_year_id', $this->officeSetting->fiscal_year_id);
                }]);
            }])->whereNull('budget_head_id')->get()->map(function ($budgetHead) {
                return [
                    'title' => $budgetHead->title,
                    'projects_count' => $budgetHead->projects_count + $budgetHead->budgetHeads->sum('projects_count')
                ];
            });

        return [
            'labels' => $budgetHeads->pluck('title')->toArray(),
            'dataSets' => [
                [
                    'data' => $budgetHeads->pluck('projects_count')->toArray(),
                    'label' => 'जम्मा',
                    'fill' => 'false',
                ]
            ],

        ];
    }

    private function getPlanLevelWiseProjects()
    {
        $planLevels = PlanLevel::withCount(['projects' => function ($query) {
            $query->where('fiscal_year_id', $this->officeSetting->fiscal_year_id);
        }])
            ->with(['planLevels' => function ($query) {
                $query->withCount(['projects' => function ($sub_query) {
                    $sub_query->where('fiscal_year_id', $this->officeSetting->fiscal_year_id);
                }]);
            }])->whereNull('plan_level_id')->get()->map(function ($planLevel) {
                return [
                    'level_name' => $planLevel->level_name,
                    'projects_count' => $planLevel->projects_count + $planLevel->planLevels->sum('projects_count')
                ];
            });

        return [
            'labels' => $planLevels->pluck('level_name')->toArray(),
            'dataSets' => [
                [
                    'data' => $planLevels->pluck('projects_count')->toArray(),
                    'label' => 'जम्मा',
                    'fill' => 'false',
                ]
            ],

        ];
    }
}
