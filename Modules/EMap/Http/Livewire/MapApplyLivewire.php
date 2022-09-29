<?php

namespace Modules\EMap\Http\Livewire;

use App\Models\Settings\Units\MeasurementUnit;
use App\Models\Settings\Units\Unit;
use App\Models\Settings\Units\UnitConversion;
use App\Models\Address\District;
use Livewire\Component;
use Modules\EMap\Entities\Client;
use Modules\EMap\Entities\MapSetting;
use Modules\EMap\Entities\StructureType;
use Modules\EMap\Enums\FourSideParticularEnum;

class MapApplyLivewire extends Component
{
    public Client $client;
    public $structureTypes = [];
    public int $currentStep = 1;
    public bool $open_structure_type = false;
    public $allDistricts = [];

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
        'unit_id'=>null,
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


//    conversion
    public $conversion_units = [];

    public $conversion = [];
    public MapSetting $setting;

    public $conversion_id;

    public $units = [];

    public $convertedData = 0;


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
    }

//    convert Functions
    public function convert()
    {
        if (!empty($this->landDescription['unit_value']) > 0 && !empty($this->conversion_id)) {
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
        'landDescription.land_use_area' => ['required'],
        'landDescription.ward_no' => ['required'],
        'landDescription.former_ward_no' => ['required'],
        'landDescription.tole' => ['nullable'],
        'landDescription.street_code_no' => ['nullable'],
        'landDescription.plot_no' => ['required'],
        'landDescription.unit_value' => ['nullable'],
        'landDescription.percentage_of_area_covered_by_building' => ['required'],
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

    public function rules()
    {
        switch ($this->currentStep) {
            case 1:
                {
                    return array_merge($this->applyMapValidations, $this->landDescriptionValidations, $this->landOwnerValidations, $this->houseOwnerValidations);
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
        dd($this->validate());
    }

    public function render()
    {
        $this->convert();
        if (!empty($this->conversion_id)) {
            $this->units = Unit::where('measurement_unit_id', $this->conversion_id)->orderByDesc('position')->get();
        }

        return view('emap::livewire.map-apply-livewire');
    }
}
