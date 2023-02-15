<?php

namespace Modules\EMap\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use App\Traits\NepaliDateConverter;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\Organization;
use Modules\EMap\Entities\StructureType;
use Modules\EMap\Enums\ApplicationFormTypeEnum;
use Modules\EMap\Enums\BuildingUsageEnum;
use Modules\EMap\Enums\CategorizationEnum;
use Modules\EMap\Enums\TypeOfConstructionWorkEnum;

class DashboardController extends Controller
{
    use NepaliDateConverter;

    public function __invoke()
    {
        $organization_count = Organization::count();
        $map_apply_count = MapApply::count();
        $mapAppliesAccordingToFiscalYears = $this->getMapApplyAccordingToFiscalYear();
        $mapApplyBuildingUsageAccordingToFiscalYears = $this->getMapApplyBuildingUsageAccordingToFiscalYear();
        $mapApplyBuildingCategoryAccordingToFiscalYears = $this->getMapApplyBuildingCategoryAccordingToFiscalYear();
        $mapApplyConstructionTypeAccordingToFiscalYears = $this->getMapApplyConstructionTypeAccordingToFiscalYear();
        $mapApplyStructureTypeAccordingToFiscalYears = $this->getMapApplyStructureTypeAccordingToFiscalYear();

        if (request()->ajax()) {
            return [
                'mapApply' => $this->getMapApplyAccordingToFiscalYear(),
                'buildingUsage' => $this->getMapApplyBuildingUsageAccordingToFiscalYear(),
                'buildingCategory' => $this->getMapApplyBuildingCategoryAccordingToFiscalYear(),
                'constructionType' => $this->getMapApplyConstructionTypeAccordingToFiscalYear(),
                'structureType' => $this->getMapApplyStructureTypeAccordingToFiscalYear(),
                'mapAccordingToMonth' => $this->mapAccordingToMonth(),

            ];
        }
        return view('emap::admin.dashboard', compact('mapApplyStructureTypeAccordingToFiscalYears', 'mapApplyBuildingUsageAccordingToFiscalYears', 'mapApplyBuildingCategoryAccordingToFiscalYears', 'organization_count', 'mapApplyConstructionTypeAccordingToFiscalYears', 'map_apply_count', 'mapAppliesAccordingToFiscalYears'));
    }


    public function getMapApplyStructureTypeAccordingToFiscalYear()
    {
        return StructureType::withCount(['mapApply'])
            ->selectRaw('id,title')
            ->get()
            ->map(function ($structure) {
                return [
                    'name' => $structure->title,
                    'data' => (int)$structure->map_apply_count
                ];
            });
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
            ->get()
        ->map(function ($fiscalYear){
            return [
                'title' => $fiscalYear->title,
                'map_applies_count'=> (int)$fiscalYear->map_applies_count,
                'mapRegistrationCount'=> (int)$fiscalYear->mapRegistrationCount,
                'mapVerificationCount' => (int)$fiscalYear->mapVerificationCount,
            ];
        });
        return [
            'labels' => $fiscalYear->pluck('title')->toArray(),
            'dataSets' => [
                [
                    'data' => $fiscalYear->pluck('map_applies_count')->toArray(),
                    'label' => 'जम्मा नक्सा',
                ],
                [
                    'data' => $fiscalYear->pluck('mapRegistrationCount')->toArray(),
                    'label' => 'नक्सा दर्ता',
                ],
                [
                    'data' => $fiscalYear->pluck('mapVerificationCount')->toArray(),
                    'label' => 'नक्सा प्रमाणित',
                ]
            ],


        ];
    }

    public function getMapApply($hasCurrentFiscalYear = null): Collection
    {
        return DB::table('map_applies')
            ->select('registration_date','usage', 'building_category', 'application_type', 'construction_type', 'deleted_at')
            ->whereNull('deleted_at')
            ->where(function ($query) use ($hasCurrentFiscalYear) {
                if ($hasCurrentFiscalYear) {
                    $query->where('fiscal_year_id', $hasCurrentFiscalYear);
                }
            })
            ->get();
    }

    public function getMapApplyBuildingUsageAccordingToFiscalYear()
    {
        $officeSetting = $this->getOfficeSetting();

        $mapApplies = $this->getMapApply($officeSetting->fiscal_year_id);
        $buildingUsages = $mapApplies->pluck('usage')->unique();

        $result = collect();
        foreach ($buildingUsages as $usage) {
            $count = $mapApplies->where('usage', $usage)->count();
            $label = BuildingUsageEnum::tryFrom($usage)?->label();
            $result->push([
                'name' => $label,
                'data' => $count
            ]);
        }

        return $result;

    }

    public function getMapApplyBuildingCategoryAccordingToFiscalYear()
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


    public function getMapApplyConstructionTypeAccordingToFiscalYear()
    {
        $officeSetting = $this->getOfficeSetting();
        $mapApplies = $this->getMapApply($officeSetting->fiscal_year_id);
        $buildingUsages = $mapApplies->pluck('construction_type')->unique();

        $result = collect();
        foreach ($buildingUsages as $usage) {
            $count = $mapApplies->where('construction_type', $usage)->count();
            $label = TypeOfConstructionWorkEnum::tryFrom($usage)?->label();
            $result->push([
                'name' => $label,
                'data' => $count
            ]);
        }

        return $result;
    }

    public function getOfficeSetting()
    {
        return officeSetting();
    }

    public function mapAccordingToMonth()
    {
        $officeSetting = $this->getOfficeSetting();
        $mapApplies = $this->getMapApply($officeSetting->fiscal_year_id);
        $month = [0 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0];

        foreach ($mapApplies as $mapApply) {
            if (!empty($mapApply->registration_date)) {
                $registration_date = Carbon::parse($mapApply->registration_date);
                $registrationDate = $this->get_nepali_date($registration_date->format('Y'), $registration_date->format('m'), $registration_date->format('d'));
                $month[$registrationDate['m'] - 1] += 1;
            }
        }

        return [
            'labels' => $this->month_name,
            'dataSets' => [
                [
                    'data' => $month,
                    'label' => 'नक्सा दर्ता',
                ]
            ]
        ];
    }
}
