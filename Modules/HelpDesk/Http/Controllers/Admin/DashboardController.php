<?php

namespace Modules\HelpDesk\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\Branch;
use Modules\HelpDesk\Entities\Service;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $main_branch_count = Branch::mainBranch()->count();
        $sub_branch_count = Branch::subBranch()->count();
        $service_count = Service::count();

        $branchesData = $this->getTotalBranchesData();
        $branchServicesData = $this->getTotalServiceData();
        $subBranchServicesData = $this->getTotalSubBranchesData();


        return view('helpdesk::admin.dashboard', compact(
            'main_branch_count',
            'sub_branch_count',
            'service_count',
            'branchesData',
            'branchServicesData',
            'subBranchServicesData'
        ));
    }

    public function getTotalServiceData(): array
    {
        $branches = Branch::mainBranch()->get();

        return [
            'labels'=>$branches->pluck('branch_name')->toArray(),
            'dataSets' => [
                [
                    'data' => $branches->pluck('total_service_count')->toArray(),
                    'label' => 'उप शाखा ',
                    'fill' => 'false',
                ]
            ],
        ];
    }


    public function getTotalBranchesData(): array
    {
        $branches = Branch::withCount('branches')->mainBranch()->get();

        return [
            'labels' => $branches->pluck('branch_name')->toArray(),
            'dataSets' => [
                [
                    'data' => $branches->pluck('branches_count')->toArray(),
                    'label' => 'सेवा',
                    'fill' => 'false',
                ]
            ],
        ];
    }
    public function getTotalSubBranchesData(): array
    {
        $branches = Branch::withCount('services')->subBranch()->get();

        return [
            'labels' => $branches->pluck('branch_name')->toArray(),
            'dataSets' => [
                [
                    'data' => $branches->pluck('services_count')->toArray(),
                    'label' => 'सेवा',
                    'fill' => 'false',
                ]
            ],
        ];
    }
}
