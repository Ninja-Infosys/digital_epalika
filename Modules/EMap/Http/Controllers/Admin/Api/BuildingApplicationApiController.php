<?php

namespace Modules\EMap\Http\Controllers\Admin\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\Organization;
use Modules\EMap\Enums\ApplicantTypeEnum;
use Modules\EMap\Enums\ApplicationFormTypeEnum;
use Modules\EMap\Enums\BuildingTypeEnum;
use Modules\EMap\Enums\BuildingUsageEnum;
use Modules\EMap\Enums\NeighbourTypeEnum;
use Modules\EMap\Enums\RoofTypeEnum;
use Modules\EMap\Enums\StoreyTypeEnum;
use Modules\EMap\Enums\TypeOfConstructionWorkEnum;
use Modules\Plan\Transformers\OrganizationResource;

class BuildingApplicationApiController extends Controller
{
    public function getBuildingSetting(): array
    {
        return [
            'organizations' => OrganizationResource::collection(Organization::with('organizationDetail')->acceptedOrganization()->get()),
            'allDistricts' => get_districts(),
            'applicantTypes' => ApplicantTypeEnum::getValuesWithLabels(),
            'roofCategories' => RoofTypeEnum::getValuesWithLabels(),
            'buildingUsages' => BuildingUsageEnum::getValuesWithLabels(),
            'buildingCategories' => BuildingTypeEnum::getValuesWithLabels(),
            'storeys' => StoreyTypeEnum::getValuesWithLabels(),
            'directions' => NeighbourTypeEnum::getValuesWithLabels(),
        ];
    }
}
