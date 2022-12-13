<?php

namespace Modules\Plan\Http\Controllers\Admin;

use App\Models\Settings\OfficeSetting;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Plan\Entities\Project;
use Modules\Plan\Enums\ProjectStatusEnum;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $not_started_project_count = Project::where('project_status', ProjectStatusEnum::NOT_STARTED)->count();
        $in_progress_project_count = Project::where('project_status', ProjectStatusEnum::IN_PROGRESS)->count();
        $completed_project_count = Project::where('project_status', ProjectStatusEnum::COMPLETED)->count();
        $wardWiseProjects=$this->getWardWiseProjects();

        return view('plan::admin.dashboard', compact(
            'not_started_project_count',
            'in_progress_project_count',
            'completed_project_count',
            'wardWiseProjects'
        ));
    }

    private function getWardWiseProjects()
    {
        $wardsData=collect();

        $projects=Project::where('fiscal_year_id',$this->getOfficeSetting()->fiscal_year_id)->get();

        foreach ($this->getOfficeSetting()->localBody->ward_no as $ward){
            $wardsData->push([
                'ward_no'=>"वार्ड नं. $ward",
                'projects_count'=>$projects->where('ward_no',$ward)->count()
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

    private function getOfficeSetting()
    {
        return OfficeSetting::with('fiscalYear','localBody')->first();
    }
}
