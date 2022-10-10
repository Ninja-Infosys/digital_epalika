<?php

namespace Modules\EMap\Http\Livewire;

use App\Models\Address\District;
use App\Models\Settings\Units\MeasurementUnit;
use App\Models\Settings\Units\Unit;
use App\Models\Settings\Units\UnitConversion;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\EMap\Entities\Client;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\MapSetting;
use Modules\EMap\Entities\StructureType;
use Modules\EMap\Enums\BuildingDetailEnum;
use Modules\EMap\Enums\DetailsRegardingCriteriaEnum;
use Modules\EMap\Enums\FourSideParticularEnum;
use Modules\EMap\Enums\PostsEnum;

class MapApplyLivewire extends Component
{
    use WithFileUploads;

    public Client $client;
    public $structureTypes = [];
    public int $currentStep = 1;
    public bool $open_structure_type = false;
    public $allDistricts = [];

    //    conversion
    public $conversion_units = [];

    public $conversion = [];
    public MapSetting $setting;

    public $conversion_id;

    public $units = [];

    public $convertedData = 0;

    public array $applyMap = [
        'construction_type' => null,
        'usage' => null,
        'building_category' => null,
        'structure_type_id' => null,
        'structure_type' => null,
        'current_storey' => null,
        'area_of_plinth' => null,
        'future_storey' => null,
        'length' => null,
        'breadth' => null,
        'height' => null,
        'storeyDetails' => []
    ];

    public array $landDescription = [
        'land_use_area' => null,
        'ward_no' => null,
        'former_ward_no' => null,
        'tole' => null,
        'street_code_no' => null,
        'plot_no' => null,
        'unit_value' => 0,
        'unit_id' => null,
        'percentage_of_area_covered_by_building' => null,
    ];

    public array $landOwner = [
        'land_owner_type' => null,
        'name' => null,
        'phone' => null,
        'father_name' => null,
        'citizenship_issue_district_id' => null,
        'citizenship_no' => null,
        'citizenship_issue_date' => null
    ];

    public array $houseOwner = [
        'name' => null,
        'phone' => null,
        'father_name' => null,
        'citizenship_issue_district_id' => null,
        'citizenship_no' => null,
        'citizenship_issue_date' => null
    ];

    public array $fourFortDetails = [];

    public array $designerDetails = [];

    public array $applicantDetail = [
        'applicant_type' => null,
        'relation_with_owner' => null,
        'name' => null,
        'phone' => null,
        'father_name' => null,
        'citizenship_issue_district_id' => null,
        'citizenship_no' => null,
        'citizenship_issue_date' => null,
        'application_date' => null,
        'signature' => null
    ];

    public array $criteriaDetails = [];

    public array $buildingDetails = [];

    public function mount(Client $client)
    {
        $this->setting = MapSetting::with('landMeasurement')->first();


        if (empty($this->setting->land_measurement_id)) {
            $this->redirect(route('emap.admin.setting.index'));
        }

        $this->conversion_units = MeasurementUnit::where('type_id', $this->setting->land_measurement_id)->get();

        $this->client = $client;
        $this->structureTypes = StructureType::latest()->get();
        $this->allDistricts = District::all();

        foreach (FourSideParticularEnum::cases() as $fourSide) {
            $this->fourFortDetails[] = [
                'detail' => $fourSide->value,
                'east' => null,
                'west' => null,
                'south' => null,
                'north' => null,
            ];
        }
        foreach (PostsEnum::cases() as $designerDetail) {
            $this->designerDetails[] = [
                'post' => $designerDetail->value,
                'name' => null,
                'nec_council_no' => null,
                'local_body_registration_no' => null,
                'consulting_firm_name' => null,
            ];
        }
        foreach (DetailsRegardingCriteriaEnum::cases() as $criteriaDetail) {
            $this->criteriaDetails[] = [
                'detail' => $criteriaDetail->value,
                'according_to_criteria' => null,
                'according_to_map' => null,
                'compliance' => null,
                'remarks' => $criteriaDetail->remarks()
            ];
        }

        foreach (BuildingDetailEnum::cases() as $buildingDetail) {
            $this->buildingDetails[] = [
                'detail' => $buildingDetail->value,
                'description' => null,
                'remarks' => null,
            ];
        }
    }

//    convert Functions
    public function convert()
    {
        if ((!empty($this->landDescription['unit_value'])) > 0 && !empty($this->conversion_id)) {
            $si_unit_value = $this->landDescription['unit_value'];

            $rate = $this->conversionToSmallest();


            $this->convertedData = $rate * $si_unit_value;
            $data = [];
            foreach ($this->units as $index => $unit) {
                $data['data' . $index] = $this->conversionLogic($unit);
            }
            $this->conversion = $data;
        }
    }

    public function conversionToSmallest(): float|int
    {
        $rate = 1;

        if ($this->setting->standardLandMeasurement->is_smallest != 1) {
            $getSmallerUnits = Unit::where('measurement_unit_id', $this->setting->standardLandMeasurement->measurement_unit_id)
                ->where('position', '>=', $this->setting->standardLandMeasurement->position)
                ->orderBy('position')
                ->get();


            foreach ($getSmallerUnits as $smallerUnit) {
                $rate = $rate * $this->getRate($smallerUnit);
            }
            $id = $getSmallerUnits->last()->id;
        } else {
            $id = $this->setting->land_measurement_standard_id;
        }
        $minUnit = $this->units->where('is_smallest', 1)->first();

        $conversionData = UnitConversion::where('conversion_to', $minUnit->id)
            ->where('conversion_from', $id)
            ->first();
        return $rate / $conversionData->rate;
    }

    public function getRate(Unit $biggerUnit): float|int
    {
        $smallerUnit = Unit::where('position', $biggerUnit->position + 1)
            ->whereMeasurementUnitId($biggerUnit->measurement_unit_id)
            ->first();

        if (!empty($smallerUnit)) {
            $conversionRate = UnitConversion::where('conversion_to', $smallerUnit->id)
                ->where('conversion_from', $biggerUnit->id)
                ->first();

            return $conversionRate->rate ?? 1;
        } else {
            return 1;
        }
    }

    public function conversionLogic(Unit $unit): float|int
    {
        if ($unit->position - 1 > 0) {
            $biggerUnit = Unit::where('position', $unit->position - 1)->first();
            if (!empty($biggerUnit)) {
                $conversionRate = UnitConversion::where('conversion_to', $biggerUnit->id)
                    ->where('conversion_from', $unit->id)
                    ->first();
                if (!empty($conversionRate->rate)) {
                    $totalData = $this->convertedData * $conversionRate->rate;
                    $wholePart = floor($totalData);
                    $fraction = $totalData - $wholePart;
                    $this->convertedData = $wholePart;
                    return ($fraction / $conversionRate->rate);
                }
                return 0;
            }
            return $this->convertedData;
        }
        return $this->convertedData;
    }


    public function addStoreyDetail()
    {
        $this->applyMap['storeyDetails'][] = [];
    }

    public function removeStoreyDetail($index): void
    {
        unset($this->applyMap['storeyDetails'][$index]);
        $this->applyMap['storeyDetails'] = array_values($this->applyMap['storeyDetails']);
    }

    public function setStructureType()
    {
        $this->open_structure_type = !$this->open_structure_type;
    }


    protected array $applyMapValidations = [
        'applyMap.construction_type' => ['required'],
        'applyMap.usage' => ['required'],
        'applyMap.building_category' => ['required'],
        'applyMap.structure_type_id' => ['nullable', 'exists:structure_types,id'],
        'applyMap.structure_type' => ['nullable'],
        'applyMap.current_storey' => ['required'],
        'applyMap.area_of_plinth' => ['required'],
        'applyMap.future_storey' => ['required'],
        'applyMap.length' => ['required', 'numeric'],
        'applyMap.breadth' => ['required', 'numeric'],
        'applyMap.height' => ['required', 'numeric'],
        'applyMap.storeyDetails' => ['nullable', 'array'],
        'applyMap.storeyDetails.*.storey' => ['required', 'integer'],
        'applyMap.storeyDetails.*.area_of_proposed_construction' => ['required', 'numeric'],
        'applyMap.storeyDetails.*.area_of_former_construction' => ['required', 'numeric'],
        'applyMap.storeyDetails.*.total_area' => ['required', 'numeric'],
        'applyMap.storeyDetails.*.height' => ['required', 'numeric'],
    ];

    protected array $landDescriptionValidations = [
        'landDescription.land_use_area' => ['required', 'numeric'],
        'landDescription.ward_no' => ['required', 'integer'],
        'landDescription.former_ward_no' => ['required', 'integer'],
        'landDescription.tole' => ['nullable'],
        'landDescription.street_code_no' => ['nullable'],
        'landDescription.plot_no' => ['required'],
        'landDescription.unit_value' => ['nullable'],
        'landDescription.percentage_of_area_covered_by_building' => ['required', 'numeric'],
    ];

    protected array $landOwnerValidations = [
        'landOwner.land_owner_type' => ['required'],
        'landOwner.name' => ['required'],
        'landOwner.phone' => ['nullable'],
        'landOwner.father_name' => ['required'],
        'landOwner.citizenship_issue_district_id' => ['required', 'exists:districts,id'],
        'landOwner.citizenship_no' => ['required'],
        'landOwner.citizenship_issue_date' => ['required']
    ];

    protected array $houseOwnerValidations = [
        'houseOwner.name' => ['required'],
        'houseOwner.phone' => ['nullable'],
        'houseOwner.father_name' => ['required'],
        'houseOwner.citizenship_issue_district_id' => ['required', 'exists:districts,id'],
        'houseOwner.citizenship_no' => ['required'],
        'houseOwner.citizenship_issue_date' => ['required']
    ];

    protected array $fourFortValidations = [
        'fourFortDetails' => ['required', 'array'],
        'fourFortDetails.*.detail' => ['required'],
        'fourFortDetails.*.east' => ['required'],
        'fourFortDetails.*.south' => ['required'],
        'fourFortDetails.*.west' => ['required'],
        'fourFortDetails.*.north' => ['required'],
    ];

    protected array $designerDetailValidations = [
        'designerDetails' => ['required', 'array'],
        'designerDetails.*.name' => ['required'],
        'designerDetails.*.post' => ['required'],
        'designerDetails.*.nec_council_no' => ['required'],
        'designerDetails.*.local_body_registration_no' => ['required'],
        'designerDetails.*.consulting_firm_name' => ['required'],
    ];

    protected array $applicantDetailValidations = [
        'applicantDetail.applicant_type' => ['required'],
        'applicantDetail.relation_with_owner' => ['required'],
        'applicantDetail.name' => ['required_if:applicantDetail.applicant_type,inheritance'],
        'applicantDetail.phone' => ['required_if:applicantDetail.applicant_type,inheritance'],
        'applicantDetail.father_name' => ['required_if:applicantDetail.applicant_type,inheritance'],
        'applicantDetail.citizenship_issue_district_id' => ['required_if:applicantDetail.applicant_type,inheritance'],
        'applicantDetail.citizenship_no' => ['required_if:applicantDetail.applicant_type,inheritance'],
        'applicantDetail.citizenship_issue_date' => ['required_if:applicantDetail.applicant_type,inheritance'],
        'applicantDetail.application_date' => ['nullable'],
        'applicantDetail.signature' => ['required', 'image']
    ];

    protected array $criteriaDetailValidations = [
        'criteriaDetails' => ['required', 'array'],
        'criteriaDetails.*.detail' => ['required'],
        'criteriaDetails.*.according_to_criteria' => ['required'],
        'criteriaDetails.*.according_to_map' => ['required'],
        'criteriaDetails.*.compliance' => ['required'],
        'criteriaDetails.*.remarks' => ['nullable'],
    ];

    protected array $buildingDetailValidations = [
        'buildingDetails' => ['required', 'array'],
        'buildingDetails.*.detail' => ['required'],
        'buildingDetails.*.description' => ['required'],
        'buildingDetails.*.remarks' => ['nullable'],
    ];

    public function rules()
    {
        switch ($this->currentStep) {
            case 1:
                {
                    return array_merge($this->applyMapValidations,
                        $this->landDescriptionValidations,
                        $this->landOwnerValidations,
                        $this->fourFortValidations,
                        $this->houseOwnerValidations,
                        $this->designerDetailValidations,
                        $this->applicantDetailValidations,
                        $this->criteriaDetailValidations,
                        $this->buildingDetailValidations
                    );
                }
                break;
            case 2:
                {
                    return $this->landDescriptionValidations;
                }
                break;
            default:
            {
                return $this->applyMapValidations;
            }
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveFormData()
    {
        $this->validate();

        DB::transaction(function () {
            $mapApply = $this->client->mapApplies()->create($this->applyMap);

            foreach ($this->applyMap['storeyDetails'] as $storeyDetail) {
                $mapApply->storeyDetails()->create($storeyDetail);
            }

            $mapApply->landDetail()->create($this->landDescription);

            $mapApply->landOwner()->create($this->landOwner);

            $mapApply->houseOwner()->create($this->houseOwner);

            foreach ($this->fourFortDetails as $fourFortDetail) {
                $mapApply->fourForts()->create($fourFortDetail);
            }

            foreach ($this->designerDetails as $designerDetail) {
                $mapApply->designerDetails()->create($designerDetail);
            }
            $mapApply->applicantDetail()->create($this->applicantDetail);

            foreach ($this->criteriaDetails as $criteriaDetail) {
                $mapApply->criteriaDetails()->create($criteriaDetail);
            }

            foreach ($this->buildingDetails as $buildingDetail) {
                $mapApply->buildingDetails()->create($buildingDetail);
            }
        });

        $this->reset('applyMap', 'landDescription', 'landOwner', 'houseOwner', 'fourFortDetails', 'designerDetails', 'applicantDetail', 'criteriaDetails', 'buildingDetails');

        $this->dispatchBrowserEvent('alert_message', [
            'type' => "success",
            'title' => "धन्यबाद",
            'text' => "तपाईको फारम सफलतापूर्वक दर्ता भयो",
        ]);
    }

    public function render()
    {
        $this->convert();
        if (!empty($this->conversion_id)) {
            $this->units = Unit::where('measurement_unit_id', $this->conversion_id)->orderByDesc('position')->get();
        }

        if ($this->applicantDetail['applicant_type'] != 'inheritance') {
            $this->applicantDetail['name'] = null;
            $this->applicantDetail['phone'] = null;
            $this->applicantDetail['father_name'] = null;
            $this->applicantDetail['citizenship_issue_district_id'] = null;
            $this->applicantDetail['citizenship_no'] = null;
            $this->applicantDetail['citizenship_issue_date'] = null;
        }


        return view('emap::livewire.map-apply-livewire');
    }
}
