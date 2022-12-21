<?php

namespace Modules\HelpDesk\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Settings\Branch;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Modules\HelpDesk\Entities\Service;
use Modules\HelpDesk\Transformers\api\v1\BranchResource;
use Modules\HelpDesk\Transformers\api\v1\ServiceResource;

class PublicApiController extends Controller
{
    public function branch(): AnonymousResourceCollection
    {
        $branches = Branch::with('branches')->whereNull('branch_id')->get();

        return BranchResource::collection($branches);
    }

    public function getBranchDetail(Branch $branch): BranchResource
    {
        return BranchResource::make($branch->load('services'));
    }

    public function getBranchService(Branch $branch): AnonymousResourceCollection
    {
        $branch->load('services');
        return ServiceResource::collection($branch->services);
    }

    public function getAllService(): AnonymousResourceCollection
    {
        $services = Service::with('branch')->get();
        return ServiceResource::collection($services);
    }

    public function getService(Service $service): ServiceResource
    {
        return ServiceResource::make($service->load('serviceDocuments', 'serviceEmployees', 'serviceProcesses', 'branch'));
    }
}
