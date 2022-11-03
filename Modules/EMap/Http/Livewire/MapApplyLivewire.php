<?php

namespace Modules\EMap\Http\Livewire;

use App\Models\Address\District;
use App\Models\Settings\OfficeSetting;
use App\Models\Settings\Units\MeasurementUnit;
use App\Models\Settings\Units\Unit;
use App\Models\Settings\Units\UnitConversion;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\EMap\Entities\Client;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\MapFee;
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
    public object $officeSetting;

    public $conversion_id;

    public $units = [];
    public $mapFees = [];

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
        'storeyDetails' => [],
        'consultant_signature' => null,
        'consultant_name' => null,
        'consultant_mobile_no' => null,
        'consultant_nec_no' => null
    ];

    public array $landDescription = [
        'land_use_area' => null,
        'ward_no' => null,
        'former_ward_no' => null,
        'tole' => null,
        'street_code_no' => null,
        'plot_no' => null,
        'unit_value' => 0,
        'percentage_of_area_covered_by_building' => null,
    ];

    public array $landOwner = [
        'land_owner_type' => null,
        'name' => null,
        'phone' => null,
        'father_name' => null,
        'grandfather_name' => null,
        'citizenship_issue_district_id' => null,
        'citizenship_no' => null,
        'citizenship_issue_date' => null,
        'address' => null,
        'local_body' => null,
        'ward_no' => null,
    ];

    public array $houseOwner = [
        'name' => null,
        'phone' => null,
        'father_name' => null,
        'grandfather_name' => null,
        'citizenship_issue_district_id' => null,
        'citizenship_no' => null,
        'citizenship_issue_date' => null,
        'address' => null,
        'local_body' => null,
        'ward_no' => null,
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
        $this->mapFees = MapFee::with('unit')->get();
        $this->officeSetting = OfficeSetting::with('localBody')->first();

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
                'father_name' => null,
                'grandfather_name' => null,
                'phone' => null,
                'address' => null,
                'local_body' => null,
                'ward_no' => null,
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
        'applyMap.current_storey' => ['required', 'numeric'],
        'applyMap.area_of_plinth' => ['required', 'numeric'],
        'applyMap.future_storey' => ['required', 'numeric'],
        'applyMap.length' => ['required', 'numeric'],
        'applyMap.breadth' => ['required', 'numeric'],
        'applyMap.height' => ['required', 'numeric'],
        'applyMap.storeyDetails' => ['nullable', 'array'],
        'applyMap.storeyDetails.*.map_fee_id' => ['required', 'exists:map_fees,id'],
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
        'landOwner.grandfather_name' => ['required'],
        'landOwner.citizenship_issue_district_id' => ['required', 'exists:districts,id'],
        'landOwner.citizenship_no' => ['required'],
        'landOwner.citizenship_issue_date' => ['required'],
        'landOwner.address' => ['required'],
        'landOwner.local_body' => ['required'],
        'landOwner.ward_no' => ['required', 'integer'],
    ];

    protected array $houseOwnerValidations = [
        'houseOwner.name' => ['required'],
        'houseOwner.phone' => ['nullable'],
        'houseOwner.father_name' => ['required'],
        'houseOwner.grandfather_name' => ['required'],
        'houseOwner.citizenship_issue_district_id' => ['required', 'exists:districts,id'],
        'houseOwner.citizenship_no' => ['required'],
        'houseOwner.citizenship_issue_date' => ['required'],
        'houseOwner.address' => ['required'],
        'houseOwner.local_body' => ['required'],
        'houseOwner.ward_no' => ['required', 'integer'],
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
        'designerDetails.*.father_name' => ['required'],
        'designerDetails.*.grandfather_name' => ['required'],
        'designerDetails.*.phone' => ['required'],
        'designerDetails.*.address' => ['required'],
        'designerDetails.*.local_body' => ['required'],
        'designerDetails.*.ward_no' => ['required', 'integer'],
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
        'applicantDetail.signature' => ['nullable', 'image']
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

    protected array $consultantDetailValidations = [
        'applyMap.consultant_signature' => ['nullable', 'image'],
        'applyMap.consultant_name' => ['required'],
        'applyMap.consultant_mobile_no' => ['required'],
        'applyMap.consultant_nec_no' => ['required'],
    ];

    public function rules()
    {
        return array_merge($this->applyMapValidations,
            $this->landDescriptionValidations,
            $this->landOwnerValidations,
            $this->fourFortValidations,
            $this->houseOwnerValidations,
            $this->designerDetailValidations,
            $this->applicantDetailValidations,
            $this->criteriaDetailValidations,
            $this->buildingDetailValidations,
            $this->consultantDetailValidations
        );
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveFormData()
    {
        $this->validate();

        DB::transaction(function () {

            if ($this->applyMap['structure_type']) {
                $structure_type = StructureType::create(['title' => $this->applyMap['structure_type']]);

                $this->applyMap['structure_type_id'] = $structure_type->id ?? '';
            }

            $mapApply = $this->client->mapApplies()->create($this->applyMap);

            foreach ($this->applyMap['storeyDetails'] as $storeyDetail) {
                $mapApply->storeyDetails()->create($storeyDetail);
            }

            $mapApply->landDetail()->create($this->landDescription + [
                    'unit_id' => MapSetting::first()->land_measurement_standard_id ?? null
                ]);

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

    public function messages(): array
    {
        return [
            'applyMap.construction_type.required' => 'निर्माण कार्यको किसिम अनिवार्य छ |',
            'applyMap.usage.required' => 'प्रयोजन अनिवार्य छ |',
            'applyMap.building_category.required' => ' भवनको वर्गीकरण अनिवार्य छ|',
            'applyMap.current_storey.required' => 'तल्ला संख्या अनिवार्य छ|',
            'applyMap.current_storey.numeric' => 'तल्ला संख्या नम्बरमा हुनुपर्छ|',
            'applyMap.area_of_plinth.required' => 'क्षेत्रफल अनिवार्य छ|',
            'applyMap.area_of_plinth.numeric' => 'क्षेत्रफल नम्बरमा हुनुपर्छ|',
            'applyMap.future_storey.required' => 'तल्ला संख्या अनिवार्य छ|',
            'applyMap.future_storey.numeric' => 'तल्ला संख्या नम्बरमा हुनुपर्छ|',
            'applyMap.length.required' => 'भवनको लम्बाई अनिवार्य छ|',
            'applyMap.length.numeric' => 'भवनको लम्बाई नम्बरमा हुनुपर्छ|',
            'applyMap.breadth.required' => 'भवनको चौडाई अनिवार्य छ|',
            'applyMap.breadth.numeric' => 'भवनको चौडाई नम्बरमा हुनुपर्छ|',
            'applyMap.height.required' => 'भवनको उचाई अनिवार्य छ|',
            'applyMap.height.numeric' => 'भवनको उचाई नम्बरमा हुनुपर्छ|',
            'applyMap.storeyDetails.*.map_fee_id.required' => 'तल्ला अनिवार्य छ|',
            'applyMap.storeyDetails.*.area_of_proposed_construction.required' => ' प्रस्तावित  क्षेत्रफल अनिवार्य छ|',
            'applyMap.storeyDetails.*.area_of_proposed_construction.numeric' => 'प्रस्तावित  क्षेत्रफल नम्बरमा हुनुपर्छ|',
            'applyMap.storeyDetails.*.area_of_former_construction.required' => 'साविक क्षेत्रफल अनिवार्य छ|',
            'applyMap.storeyDetails.*.area_of_former_construction.numeric' => 'साविक क्षेत्रफल नम्बरमा हुनुपर्छ|',
            'applyMap.storeyDetails.*.total_area.required' => 'जम्मा क्षेत्रफल अनिवार्य छ|',
            'applyMap.storeyDetails.*.total_area.numeric' => 'जम्मा क्षेत्रफल नम्बरमा हुनुपर्छ|',
            'applyMap.storeyDetails.*.height.required' => 'उचाई अनिवार्य छ|',
            'applyMap.storeyDetails.*.height.numeric' => 'उचाई नम्बरमा हुनुपर्छ|',
            'landDescription.land_use_area.required' => 'भू-उपयोग्य क्षेत्र अनिवार्य छ|',
            'landDescription.land_use_area.numeric' => 'भू-उपयोग्य क्षेत्र नम्बरमा हुनुपर्छ|',
            'landDescription.ward_no.required' => 'वडा नं अनिवार्य छ|',
            'landDescription.ward_no.integer' => 'वडा नं नम्बरमा हुनुपर्छ|',
            'landDescription.former_ward_no.required' => ' साविक वडा नं अनिवार्य छ|',
            'landDescription.former_ward_no.integer' => ' साविक वडा नं नम्बरमा हुनुपर्छ|',
            'landDescription.plot_no.required' => 'कित्ता नं अनिवार्य छ|',
            'landDescription.percentage_of_area_covered_by_building.required' => ' क्षेत्रफलको प्रतिशत अनिवार्य छ|',
            'landDescription.percentage_of_area_covered_by_building.numeric' => 'क्षेत्रफलको प्रतिशत नम्बरमा हुनुपर्छ|',
            'landOwner.land_owner_type.required' => 'जग्गा धनीको किसिम अनिवार्य छ|',
            'landOwner.name.required' => 'नाम अनिवार्य छ|',
            'landOwner.father_name.required' => ' बुवाको नाम अनिवार्य छ|',
            'landOwner.citizenship_issue_district_id.required' => 'जिल्ला अनिवार्य छ|',
            'landOwner.citizenship_no.required' => 'नागरिकत नम्बर अनिवार्य छ|',
            'landOwner.citizenship_issue_date.required' => ' मिति अनिवार्य छ|',
            'landOwner.address.required' => ' ठेगाना अनिवार्य छ|',
            'houseOwner.name.required' => 'घर धनीको नाम अनिवार्य छ|',
            'houseOwner.father_name.required' => 'बुवाको नाम अनिवार्य छ|',
            'houseOwner.citizenship_issue_district_id.required' => 'जिल्ला अनिवार्य छ|',
            'houseOwner.citizenship_no.required' => ' नागरिकत नम्बर अनिवार्य छ|',
            'houseOwner.citizenship_issue_date.required' => 'मिति अनिवार्य छ|',
            'houseOwner.address.required' => 'ठेगाना अनिवार्य छ|',
            'fourFortDetails.required' => 'चार किल्लाको विवरण अनिवार्य छ|',
            'fourFortDetails.*.east.required' => 'पूर्व दिशा अनिवार्य छ|',
            'fourFortDetails.*.south.required' => 'दक्षिण दिशा अनिवार्य छ|',
            'fourFortDetails.*.west.required' => 'पश्चिम दिशा अनिवार्य छ|',
            'fourFortDetails.*.north.required' => 'उत्तर दिशा अनिवार्य छ|',
            'designerDetails.required' => 'डिजाइनरको विवरण अनिवार्य छ|',
            'designerDetails.*.name.required' => ' नाम अनिवार्य छ|',
            'designerDetails.*.father_name.required' => 'बुबाको नाम अनिवार्य छ|',
            'designerDetails.*.grand_father_name.required' => 'हजुरबुबाको नाम अनिवार्य छ|',
            'designerDetails.*.phone.required' => ' फोन अनिवार्य छ|',
            'designerDetails.*.address.required' => ' ठेगाना अनिवार्य छ|',
            'designerDetails.*.local_body.required' => ' पालिका  अनिवार्य छ|',
            'designerDetails.*.ward_no.required' => ' वडा नं.   अनिवार्य छ|',
            'designerDetails.*.post.required' => 'पद अनिवार्य छ|',
            'designerDetails.*.nec_council_no.required' => 'NEC Council No. अनिवार्य छ|',
            'designerDetails.*.local_body_registration_no.required' => 'पालिकाको दर्ता नं अनिवार्य छ|',
            'designerDetails.*.consulting_firm_name.required' => 'कन्सल्टिंग फर्म नाम अनिवार्य छ|',
            'applicantDetail.applicant_type.required' => 'निवेदकको प्रकार अनिवार्य छ|',
            'applicantDetail.relation_with_owner.required' => ' सम्बन्ध अनिवार्य छ|',
            'applicantDetail.name.required' => 'नाम अनिवार्य छ|',
            'applicantDetail.phone.required' => 'फोन न. अनिवार्य छ|',
            'applicantDetail.father_name.required' => 'वाबुको नाम अनिवार्य छ|',
            'applicantDetail.citizenship_issue_district_id.required' => 'जारी जिल्ला अनिवार्य छ|',
            'applicantDetail.citizenship_no.required' => 'नागरिकता न. अनिवार्य छ|',
            'applicantDetail.citizenship_issue_date.required' => 'जारी मिति अनिवार्य छ|',
            'applicantDetail.signature.required' => 'निवेदकको सहि अनिवार्य छ|',
            'criteriaDetails.required' => 'मापदण्ड विवरण अनिवार्य छ|',
            'criteriaDetails.*.according_to_criteria.required' => 'मापदण्ड अनुसार अनिवार्य छ|',
            'criteriaDetails.*.according_to_map.required' => 'नक्सा अनुसार अनिवार्य छ|',
            'criteriaDetails.*.compliance.required' => 'अनुपालन अनिवार्य छ|',
            'buildingDetails.required' => 'भवन सम्बन्धि विवरण अनिवार्य छ|',
            'buildingDetails.*.description.required' => 'विवरण अनिवार्य छ|',
            'applyMap.consultant_signature.required' => 'इंन्जिनियरको सहि अनिवार्य छ|',
            'applyMap.consultant_signature.image' => 'सहिको फोटो हुनुपर्छ |',
            'applyMap.consultant_name.required' => 'नाम अनिवार्य छ|',
            'applyMap.consultant_mobile_no.required' => ' मोबाइल नं. अनिवार्य छ|',
            'applyMap.consultant_nec_no.required' => ' एन. ई. सी. नं अनिवार्य छ|',
        ];
    }
}
