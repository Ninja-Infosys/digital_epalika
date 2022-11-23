<?php

namespace Modules\EMap\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use App\Models\Settings\OfficeSetting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\Organization;
use Modules\EMap\Entities\StructureType;
use Modules\EMap\Enums\ApplicationFormTypeEnum;
use Modules\EMap\Enums\BuildingUsageEnum;
use Modules\EMap\Enums\CategorizationEnum;
use Modules\EMap\Enums\TypeOfConstructionWorkEnum;
use Modules\Roaster\Entities\Subject;

class DashboardController extends Controller
{
    public function __invoke(): Factory|View|Application
    {

        $organization_count = Organization::count();
        $map_apply_count = MapApply::count();
        $mapAppliesAccordingToFiscalYears = $this->getMapApplyAccordingToFiscalYear();
        $mapApplyBuildingUsageAccordingToFiscalYears = $this->getMapApplyBuildingUsageAccordingToFiscalYear();
        $mapApplyBuildingCategoryAccordingToFiscalYears = $this->getMapApplyBuildingCategoryAccordingToFiscalYear();
        $mapApplyConstructionTypeAccordingToFiscalYears = $this->getMapApplyConstructionTypeAccordingToFiscalYear();
        $mapApplyStructureTypeAccordingToFiscalYears = $this->getMapApplyStructureTypeAccordingToFiscalYear();

        return view('emap::admin.dashboard', compact('mapApplyStructureTypeAccordingToFiscalYears', 'mapApplyBuildingUsageAccordingToFiscalYears', 'mapApplyBuildingCategoryAccordingToFiscalYears', 'organization_count', 'mapApplyConstructionTypeAccordingToFiscalYears', 'map_apply_count', 'mapAppliesAccordingToFiscalYears'));
    }


    public function getMapApplyStructureTypeAccordingToFiscalYear(): array
    {
        $structure = StructureType::withCount(['mapApply'])
            ->selectRaw('id,title')
            ->get();

        return [
            'labels' => $structure->pluck('title')->toArray(),
            'dataSets' => [
                [
                    'data' => $structure->pluck('map_apply_count')->toArray(),
                    'label' => 'जम्मा नक्सा',
                    'fill' => 'false',
                ],
            ],
            ];
    }

    public function getMapApplyAccordingToFiscalYear(): array
    {
        $fiscalYear = FiscalYear::withCount(['mapApplies',
            'mapApplies as mapRegistrationCount' => function ($query) {
            $query->where('application_type', ApplicationFormTypeEnum::MAP_REGISTRATION);
        }, 'mapApplies as mapVerificationCount' => function ($query) {
            $query->where('application_type', ApplicationFormTypeEnum::MAP_VERIFIED);
        },])
            ->selectRaw('id,title')
            ->get();
        return [
            'labels' => $fiscalYear->pluck('title')->toArray(),
            'dataSets' => [
                [
                    'data' => $fiscalYear->pluck('map_applies_count')->toArray(),
                    'label' => 'जम्मा नक्सा',
                    'fill' => 'false',
                ],
                [
                    'data' => $fiscalYear->pluck('mapRegistrationCount')->toArray(),
                    'label' => 'नक्सा दर्ता',
                    'fill' => 'false',
                ],
                [
                    'data' => $fiscalYear->pluck('mapVerificationCount')->toArray(),
                    'label' => 'नक्सा प्रमाणित',
                    'fill' => 'false',
                ]
            ],


        ];
    }

    public function getMapApply($hasCurrentFiscalYear = null): Collection
    {

        return DB::table('map_applies')
            ->select('usage', 'building_category', 'application_type', 'construction_type','deleted_at')
            ->whereNull('deleted_at')
            ->where(function ($query) use ($hasCurrentFiscalYear) {
                if ($hasCurrentFiscalYear) {
                    $query->where('fiscal_year_id', $hasCurrentFiscalYear);
                }
            })
            ->get();
    }

    public function getMapApplyBuildingUsageAccordingToFiscalYear(): array
    {
        $officeSetting = $this->getOfficeSetting();

        $map_applies = $this->getMapApply($officeSetting->fiscal_year_id)
            ->groupBy('usage')
            ->map(function ($map_apply, $key) {
                return [
                    'usage' => BuildingUsageEnum::tryFrom($key)?->label(),
                    'count' => count($map_apply)
                ];
            });

        return [
            'labels' => $map_applies->pluck('usage')->toArray(),
            'dataSets' => [
                [
                    'data' => $map_applies->pluck('count')->toArray(),
                    'fill' => 'false',
                ]
            ],


        ];
    }

    public function getMapApplyBuildingCategoryAccordingToFiscalYear(): array
    {
        $officeSetting = $this->getOfficeSetting();

        $map_applies = $this->getMapApply($officeSetting->fiscal_year_id)
            ->groupBy('building_category')
            ->map(function ($map_apply, $key) {
                return [
                    'building_category' => CategorizationEnum::tryFrom($key)?->label(),
                    'count' => count($map_apply),
                    'mapRegistrationCount' => count($map_apply->where('application_type', ApplicationFormTypeEnum::MAP_REGISTRATION->value)),
                    'mapVerificationCount' => count($map_apply->where('application_type', ApplicationFormTypeEnum::MAP_VERIFIED->value)),
                ];
            });

        return [
            'labels' => $map_applies->pluck('building_category')->toArray(),
            'dataSets' => [
                [
                    'data' => $map_applies->pluck('count')->toArray(),
                    'label' => 'कुल नक्सा',
                    'fill' => 'false',
                ],
                [
                    'data' => $map_applies->pluck('mapRegistrationCount')->toArray(),
                    'label' => 'नक्सा दर्ता',
                    'fill' => 'false',
                ],
                [
                    'data' => $map_applies->pluck('mapVerificationCount')->toArray(),
                    'label' => 'नक्सा प्रमाणीकरण',
                    'fill' => 'false',
                ],
            ],


        ];
    }


    public function getMapApplyConstructionTypeAccordingToFiscalYear(): array
    {
        $officeSetting = $this->getOfficeSetting();

        $map_applies = $this->getMapApply($officeSetting->fiscal_year_id)
            ->groupBy('construction_type')
            ->map(function ($map_apply, $key) {
                return [
                    'construction_type' => TypeOfConstructionWorkEnum::tryFrom($key)?->label(),
                    'count' => count($map_apply),
                ];
            });

        return [
            'labels' => $map_applies->pluck('construction_type')->toArray(),
            'dataSets' => [
                [
                    'data' => $map_applies->pluck('count')->toArray(),
                    'label' => 'जम्मा',
                    'fill' => 'false',
                ],
            ],


        ];
    }

    /**
     * @return mixed
     */
    public function getOfficeSetting(): mixed
    {
        return OfficeSetting::first();
    }
}
