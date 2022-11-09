<?php

namespace Modules\EMap\Http\Livewire\Edit;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Modules\EMap\Entities\MapApply;

class LandOwnerEditLivewire extends Component
{
    public MapApply $mapApply;
    public $allDistricts = [];
    public bool $editForm = false;

    public function mount(MapApply $mapApply, $districts)
    {
        $this->mapApply = $mapApply;
        $this->allDistricts = $districts;

        $this->landOwner = [
            'land_owner_type' => $mapApply->landOwner->land_owner_type ?? null,
            'name' => $mapApply->landOwner->name ?? null,
            'phone' => $mapApply->landOwner->phone ?? null,
            'father_name' => $mapApply->landOwner->father_name ?? null,
            'grandfather_name' => $mapApply->landOwner->grandfather_name ?? null,
            'citizenship_issue_district_id' => $mapApply->landOwner->citizenship_issue_district_id ?? null,
            'citizenship_no' => $mapApply->landOwner->citizenship_no ?? null,
            'citizenship_issue_date' => $mapApply->landOwner->citizenship_issue_date ?? null,
            'address' => $mapApply->landOwner->address ?? null,
            'local_body' => $mapApply->landOwner->local_body ?? null,
            'ward_no' => $mapApply->landOwner->ward_no ?? null,
        ];
    }

    public function setEditForm(): void
    {
        $this->editForm = !$this->editForm;
    }

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

    public function rules(): array
    {
        return $this->landOwnerValidations;
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function saveFormData(): void
    {
        if ($this->editForm) {
            $this->validate();
            DB::transaction(function () {

                $this->mapApply->landOwner()->update($this->landOwner);

            });

            $this->reset('editForm');

            $this->dispatchBrowserEvent('alert_message', [
                'type' => "success",
                'title' => "धन्यबाद",
                'text' => "तपाईको फारम सफलतापूर्वक दर्ता भयो",
            ]);
        }
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

    public function render()
    {
        return view('emap::livewire.edit.land-owner-edit-livewire');
    }
}
