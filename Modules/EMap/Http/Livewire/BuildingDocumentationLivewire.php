<?php

namespace Modules\EMap\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\EMap\Entities\BuildingDescription;
use Modules\EMap\Entities\BuildingDocumentation;
use Modules\EMap\Entities\BuildingStoreyDetail;
use Modules\EMap\Entities\ContractorDetail;
use Modules\EMap\Entities\Neighbour;

class BuildingDocumentationLivewire extends Component
{
    use WithFileUploads;

    public int $currentStep = 1;

    public float $progressPercentage = 0;

    public $provinces = [];

    public $districts = [];

    public $localBodies = [];

    public $wards = [];

    public $formerWards = [];

    public $neighbours = [];

    public bool $same_as_land_owner = false;

    public $buildingStoreyDetails = [];
    public $buildingDescriptions = [];

    public BuildingDocumentation $buildingDocumentation;

    public array $form = [
        'submission_no' => null,
        'fiscal_year_id' => null,
        'registration_no' => null,
        'registration_date' => null,
        'former_local_body' => null,
        'former_ward_no' => null,
        'land_ward_no' => null,
        'plot_no' => null,
        'land_tole' => null,
        'land_area' => null,
        'house_built_year' => null,
        'applicant_name' => null,
        'applicant_signature' => null,
        'province_id' => null,
        'district_id' => null,
        'local_body_id' => null,
        'applicant_ward_no' => null,
        'applicant_tole' => null,
        'applicant_phone_no' => null,
        'applicant_age' => null,
        'application_date' => null,
        'building_usage' => null,
        'field_land_area' => null,
        'plinth_area' => null,
        'other_construction_area_new' => null,
        'other_construction_area_old' => null,
        'total_area' => null,
        'current_storey' => null,
        'height' => null,
        'building_category' => null,
        'roof_category' => null,
        'set_back' =>  null,
        'consultant_engineer_signature' =>  null,
        'consultant_engineer_name' =>  null,
        'consultant_engineer_post' =>  null,
        'consultancy_name' =>  null,
        'consultancy_registration_no' =>  null,
        'consultancy_stamp' =>  null,
        'n_e_c_registration_no' =>  null,
        'land_detail' =>  null,
        'room' =>  null,
        'files' => [],
        'neighbours' => [],
        'buildingStoreyDetails' => [],
        'buildingDescriptions' => [],
        'contractorDetails' => [],
    ];


    public array $buildingHouseOwner = [
        'name' => null,
        'phone' => null,
        'father_name' => null,
        'grandfather_name' => null,
        'citizenship_issue_district_id' => null,
        'citizenship_no' => null,
        'citizenship_issue_date' => [],
        'address' => null,
        'local_body' => null,
        'ward_no' => null,
        'photo' => null,
        'province_id' => null,
        'district_id' => null,
        'local_body_id'  => null,
        'tole' => null,
        'signature' => null,
    ];
    public array $buildingLandOwner = [
        'name' => null,
        'phone' => null,
        'father_name' => null,
        'grandfather_name' => null,
        'citizenship_issue_district_id' => null,
        'citizenship_no' => null,
        'citizenship_issue_date' => [],
        'address' => null,
        'local_body' => null,
        'ward_no' => null,
        'document' => [],
        'photo' => null,
        'province_id' => null,
        'district_id' => null,
        'local_body_id'  => null,
        'tole' => null,
        'signature' => null,
    ];

    public array $requiredDocument = [
        'citizenship' => null,
        'landowner_proved' => null,
        'revenue' => null,
        'building_map' => null,
        'land_map' => null,
        'all_round_house_pic' => null,
        'files' => [],
        'photo' => null,
    ];

    public function mount($buildingDocumentation = null)
    {

        $this->provinces = get_provinces();
        $this->districts = get_districts();
        if (!empty($buildingDocumentation)) {
            $this->buildingDocumentation = $buildingDocumentation;

            $this->assignBuildingDocumentationData();
        } else {

            $this->neighbourArrayIncrement();
            $this->buildingStoreyDetailArrayIncrement();
            $this->buildingDescriptionArrayIncrement();
            $this->contractorDetailArrayIncrement();
        }
    }

    private function assignBuildingDocumentationData()
    {
        foreach (Arr::except($this->form, ['neighbours', 'buildingStoreyDetails', ' buildingDescriptions', 'contractorDetails', 'files']) as $key => $data) {
            $this->form[$key] = $this->buildingDocumentation[$key];
        }

        foreach ($this->buildingDocumentation->neighbours as $neighbour) {
            $this->form['neighbours'][] = [
                'id' => $neighbour->id,
                'neighbour_name' => $neighbour->neighbour_name ?? null,
                'direction' => $neighbour->direction ?? null,
                'ward_no' => $neighbour->ward_no ?? null,
                'plot_no' => $neighbour->plot_no ?? null,

            ];
        }
        foreach ($this->buildingDocumentation->buildingStoreyDetails as $buildingStoreyDetail) {
            $this->form['buildingStoreyDetails'][] = [
                'id' => $buildingStoreyDetail->id,
                'storey' => $buildingStoreyDetail->storey ?? null,
                'area_of_former_construction' => $buildingStoreyDetail->area_of_former_construction ?? null,
                'land_area' => $buildingStoreyDetail->land_area ?? null,
                'remarks' => $buildingStoreyDetail->remarks ?? null,

            ];
        }
        foreach ($this->buildingDocumentation->buildingDescriptions as $buildingDescription) {
            $this->form['buildingDescriptions'][] = [
                'id' => $buildingDescription->id,
                'direction' => $buildingDescription->direction ?? null,
                'has_road' => $buildingDescription->has_road ?? null,
                'has_window' => $buildingDescription->has_window ?? null,
                'minimum_distance_to_leave' => $buildingDescription->minimum_distance_to_leave ?? null,
                'leave' => $buildingDescription->leave ?? null,
                'remarks' => $buildingDescription->remarks ?? null,

            ];
        }
        foreach ($this->buildingDocumentation->contractorDetails as $contractorDetail) {
            $this->form['contractorDetails'][] = [
                'id' => $buildingDescription->id,
                'contractor_name' => $contractorDetail->contractor_name ?? null,
                'contractor_signature' => $contractorDetail->contractor_signature ?? null,
                'address' => $contractorDetail->address ?? null,

                'tole' => $contractorDetail->tole ?? null,
                'ward_no' => $contractorDetail->ward_no ?? null,

            ];
        }
    }

    protected array $secondStepValidations = [
        'form.neighbours' => ['required', 'array'],
        'form.neighbours.*.neighbour_name' => ['required', 'string'],
        'form.neighbours.*.direction' => ['required'],
        'form.neighbours.*.ward_no' => ['required', 'integer'],
        'form.neighbours.*.plot_no' => ['required', 'string'],
        'form.buildingStoreyDetails' => ['nullable', 'array'],
        'form.buildingStoreyDetails.*.storey' => ['nullable'],
        'form.buildingStoreyDetails.*.area_of_former_construction' => ['nullable', 'string'],
        'form.buildingStoreyDetails.*.land_area' => ['nullable', 'string'],
        'form.buildingStoreyDetails.*.remarks' => ['nullable', 'string'],
        'form.buildingDescriptions' => ['nullable', 'array'],
        'form.buildingDescriptions.*.direction' => ['nullable', 'string'],
        'form.buildingDescriptions.*.has_road' => ['nullable', 'string'],
        'form.buildingDescriptions.*.has_window' => ['nullable', 'string'],
        'form.buildingDescriptions.*.minimum_distance_to_leave' => ['nullable', 'string'],
        'form.buildingDescriptions.*.leave' => ['nullable', 'string'],
        'form.buildingDescriptions.*.remarks' => ['nullable', 'string'],
        'form.contractorDetails' => ['nullable', 'array'],
        'form.contractorDetails.*.contractor_name' => ['nullable', 'string'],
        'form.contractorDetails.*.contractor_signature' => ['nullable', 'image'],
        'form.contractorDetails.*.address' => ['nullable', 'string'],

        'form.contractorDetails.*.tole' => ['nullable', 'string'],
        'form.contractorDetails.*.ward_no' => ['nullable', 'integer'],

    ];

    protected function firstStepValidation(): array
    {
        return [

            'form.former_local_body' => ['required', 'string'],
            'form.former_ward_no' => ['required', 'integer'],
            'form.land_ward_no' => ['required', 'integer'],
            'form.plot_no' => ['required', 'string'],
            'form.land_tole' => ['required', 'string'],
            'form.land_area' => ['required', 'string'],
            'form.field_land_area' => ['nullable', 'string'],
            'form.house_built_year' => ['required', 'string'],
            'form.applicant_name' => ['required', 'string'],
            'form.applicant_signature' => ['required', 'image'],
            'form.province_id' => ['required', 'integer', 'exists:provinces,id'],
            'form.district_id' => ['required', 'integer', 'exists:districts,id'],
            'form.local_body_id' => ['required', 'integer', 'exists:local_bodies,id'],
            'form.applicant_ward_no' => ['required', 'integer'],
            'form.applicant_tole' => ['required', 'string'],
            'form.applicant_phone_no' => ['required', 'string'],
            'form.applicant_age' => ['required', 'integer'],
            'form.application_date' => ['required', 'string'],
            'form.plinth_area' => ['required', 'string'],
            'form.current_storey' => ['required', 'string'],
            'form.room' => ['required', 'string'],
            'form.building_usage' => ['required', 'string'],
            'form.other_construction_area_new' => ['nullable', 'string'],
            'form.other_construction_area_old' => ['nullable', 'string'],
            'form.total_area' => ['nullable', 'string'],
            'form.height' => ['required', 'string'],
            'form.building_category' => ['required', 'string'],
            'form.roof_category' => ['required', 'string'],
            'form.set_back' => ['nullable', 'string'],
            'form.land_detail' => ['nullable', 'string'],
            'buildingLandOwner.name' => ['required'],
            'buildingLandOwner.phone' => ['nullable'],
            'buildingLandOwner.father_name' => ['nullable'],
            'buildingLandOwner.grandfather_name' => ['nullable'],
            'buildingLandOwner.citizenship_issue_district_id' => ['nullable'],
            'buildingLandOwner.citizenship_issue_date' => ['nullable'],
            'buildingLandOwner.citizenship_no' => ['nullable'],
            'buildingLandOwner.address' => ['nullable'],
            'buildingLandOwner.local_body' => ['nullable'],
            'buildingLandOwner.ward_no' => ['nullable'],
            'buildingLandOwner.document' => ['nullable'],
            'buildingLandOwner.photo' => ['nullable'],
            'buildingLandOwner.province_id' => ['nullable'],
            'buildingLandOwner.district_id' => ['nullable'],
            'buildingLandOwner.local_body_id' => ['nullable'],
            'buildingLandOwner.tole' => ['nullable'],
            'buildingLandOwner.signature' => ['nullable'],
            'buildingHouseOwner.name' => ['nullable'],
            'buildingHouseOwner.phone' => ['nullable'],
            'buildingHouseOwner.father_name' => ['nullable'],
            'buildingHouseOwner.grandfather_name' => ['nullable'],
            'buildingHouseOwner.citizenship_issue_district_id' => ['nullable'],
            'buildingHouseOwner.citizenship_issue_date' => ['nullable'],
            'buildingHouseOwner.citizenship_no' => ['nullable'],
            'buildingHouseOwner.address' => ['nullable'],
            'buildingHouseOwner.local_body' => ['nullable'],
            'buildingHouseOwner.ward_no' => ['nullable'],
            'buildingHouseOwner.document' => ['nullable'],
            'buildingHouseOwner.photo' => ['nullable'],
            'buildingHouseOwner.province_id' => ['nullable'],
            'buildingHouseOwner.district_id' => ['nullable'],
            'buildingHouseOwner.local_body_id' => ['nullable'],
            'buildingHouseOwner.tole' => ['nullable'],
            'buildingHouseOwner.signature' => ['nullable'],


        ];
    }

    protected function secondStepValidations(): array
    {
        return !empty($this->buildingDocumentation)
            ? array_merge($this->secondStepValidations, [
                'form.neighbours.*.neighbour_name' => ['required', 'string'],
                'form.neighbours.*.direction' => ['required'],
                'form.neighbours.*.ward_no' => ['required', 'integer'],
                'form.neighbours.*.plot_no' => ['nullable', 'string'],
                'form.buildingStoreyDetails.*.storey' => ['required'],
                'form.buildingStoreyDetails.*.area_of_former_construction' => ['required', 'string'],
                'form.buildingStoreyDetails.*.land_area' => ['required', 'string'],
                'form.buildingStoreyDetails.*.remarks' => ['required', 'string'],
                'form.buildingDescriptions' => ['required', 'array'],
                'form.buildingDescriptions.*.direction' => ['required', 'string'],
                'form.buildingDescriptions.*.has_road' => ['required', 'string'],
                'form.buildingDescriptions.*.has_window' => ['required', 'string'],
                'form.buildingDescriptions.*.minimum_distance_to_leave' => ['required', 'string'],
                'form.buildingDescriptions.*.leave' => ['required', 'string'],
                'form.buildingDescriptions.*.remarks' => ['required', 'string'],
                'form.contractorDetails' => ['nullable', 'array'],
                'form.contractorDetails.*.contractor_name' => ['nullable', 'string'],
                'form.contractorDetails.*.contractor_signature' => ['nullable', 'image'],
                'form.contractorDetails.*.address' => ['nullable', 'string'],

                'form.contractorDetails.*.tole' => ['nullable', 'string'],
                'form.contractorDetails.*.ward_no' => ['nullable', 'integer'],
            ])
            : array_merge($this->secondStepValidations, [
                'form.neighbours.*.neighbour_name' => ['nullable', 'string'],
                'form.neighbours.*.direction' => ['nullable'],
                'form.neighbours.*.ward_no' => ['nullable', 'integer'],
                'form.buildingStoreyDetails.*.storey' => ['nullable'],
                'form.buildingStoreyDetails.*.area_of_former_construction' => ['nullable', 'string'],
                'form.buildingStoreyDetails.*.land_area' => ['nullable', 'string'],
                'form.buildingStoreyDetails.*.remarks' => ['nullable', 'string'],
                'form.buildingDescriptions' => ['nullable', 'array'],
                'form.buildingDescriptions.*.direction' => ['nullable', 'string'],
                'form.buildingDescriptions.*.has_road' => ['nullable', 'string'],
                'form.buildingDescriptions.*.has_window' => ['nullable', 'string'],
                'form.buildingDescriptions.*.minimum_distance_to_leave' => ['nullable', 'string'],
                'form.buildingDescriptions.*.leave' => ['nullable', 'string'],
                'form.buildingDescriptions.*.remarks' => ['nullable', 'string'],
                'form.contractorDetails' => ['nullable', 'array'],
                'form.contractorDetails.*.contractor_name' => ['nullable', 'string'],
                'form.contractorDetails.*.contractor_signature' => ['nullable', 'image'],
                'form.contractorDetails.*.address' => ['nullable', 'string'],
                'form.contractorDetails.*.tole' => ['nullable', 'string'],
                'form.contractorDetails.*.ward_no' => ['nullable', 'integer'],
            ]);
    }

    protected array $thirdStepValidations = [

        'requiredDocument.citizenship' => ['required'],
        'requiredDocument.landowner_proved' => ['required'],
        'requiredDocument.revenue' => ['required'],
        'requiredDocument.building_map' => ['required'],
        'requiredDocument.land_map' => ['required'],
        'requiredDocument.all_round_house_pic' => ['nullable'],
        'requiredDocument.photo' => ['required'],
        'form.consultant_engineer_signature' => ['nullable', 'image'],
        'form.consultant_engineer_name' => ['nullable', 'string'],
        'form.consultant_engineer_post' => ['nullable', 'string'],
        'form.consultancy_name' => ['nullable', 'string'],
        'form.consultancy_registration_no' => ['nullable', 'string'],
        'form.consultancy_stamp' => ['nullable', 'string'],
        'form.n_e_c_registration_no' => ['nullable', 'string'],
        'form.consultancy_registration_no' => ['nullable', 'string'],
    ];

    protected function thirdStepValidations(): array
    {
        return !empty($this->buildingDocumentation)
            ? [
                'requiredDocument.citizenship' => ['nullable'],
                'requiredDocument.landowner_proved' => ['nullable'],
                'requiredDocument.revenue' => ['nullable'],
                'requiredDocument.building_map' => ['nullable'],
                'requiredDocument.land_map' => ['nullable'],
                'requiredDocument.all_round_house_pic' => ['nullable'],
                'requiredDocument.photo' => ['nullable'],
                'form.consultant_engineer_signature' => ['required', 'image'],
                'form.consultant_engineer_name' => ['required', 'string'],
                'form.consultant_engineer_post' => ['required', 'string'],
                'form.consultancy_name' => ['required', 'string'],
                'form.consultancy_registration_no' => ['required', 'string'],
                'form.consultancy_stamp' => ['required', 'string'],
                'form.n_e_c_registration_no' => ['required', 'string'],
                'form.consultancy_registration_no' => ['required', 'string'],
            ] : [
                'requiredDocument.citizenship' => ['required'],
                'requiredDocument.landowner_proved' => ['required'],
                'requiredDocument.revenue' => ['required'],
                'requiredDocument.building_map' => ['required'],
                'requiredDocument.land_map' => ['nullable'],
                'requiredDocument.all_round_house_pic' => ['nullable'],
                'requiredDocument.photo' => ['required'],
                'form.consultant_engineer_signature' => ['nullable', 'image'],
                'form.consultant_engineer_name' => ['nullable', 'string'],
                'form.consultant_engineer_post' => ['nullable', 'string'],
                'form.consultancy_name' => ['nullable', 'string'],
                'form.consultancy_registration_no' => ['nullable', 'string'],
                'form.consultancy_stamp' => ['nullable', 'string'],
                'form.n_e_c_registration_no' => ['nullable', 'string'],
                'form.consultancy_registration_no' => ['nullable', 'string'],
            ];
    }

    public function rules(): array
    {
        return match ($this->currentStep) {
            2 => $this->secondStepValidations(),
            3 => $this->thirdStepValidations(),
            default => $this->firstStepValidation(),
        };
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function nextStep($step): void
    {
        $this->validate();
        $this->currentStep = $step;
        $this->calculateProgressPercentage();
    }

    public function backStep($step): void
    {
        $this->currentStep = $step;
        $this->calculateProgressPercentage();
    }

    public function submitForm()
    {

        $this->validate();

        if (!empty($this->buildingDocumentation)) {
            DB::transaction(function () {
                $this->buildingDocumentation->update($this->form);
                $this->saveBuildingDocumentData($this->buildingDocumentation);
            });
            $this->dispatchBrowserEvent('alert_message', [
                'type' => 'success',
                'title' => 'तपाइको उधोग सफलता पुर्बक अध्याबधिक भयो',
            ]);

            return redirect(route('emap.admin.buildingDocumentation.index'));
        }


        $buildingDocumentation = DB::transaction(function () {
            $buildingDocumentation = BuildingDocumentation::create($this->form + [
                'submission_no' => time(),
            ]);
            $this->saveBuildingDocumentData($buildingDocumentation);

            return $buildingDocumentation;
        });
        $this->dispatchBrowserEvent('alert_message', [
            'type' => 'success',
            'title' => 'धन्यबाद',
            'text' => 'तपाइको अभिलेखीकरण सफलता पुर्बक दर्ता भयो',
        ]);
        $this->reset('form');

        // dd($buildingDocumentation->requiredDocument->files);
        return redirect()->route('buildingDocumentation.printApplication', $buildingDocumentation->id);
    }

    private function saveBuildingDocumentData($buildingDocumentation): void
    {

        foreach ($this->form['neighbours'] as $neighbourData) {
            Neighbour::updateOrCreate(
                [
                    'building_documentation_id' => $buildingDocumentation->id,
                    'id' => $neighbourData['id'] ?? null
                ],
                $neighbourData
            );
        }
        foreach ($this->form['buildingStoreyDetails'] as $buildingStoreyDetail) {
            BuildingStoreyDetail::updateOrCreate(
                [
                    'building_documentation_id' => $buildingDocumentation->id,
                    'id' => $buildingStoreyDetail['id'] ?? null
                ],
                $buildingStoreyDetail
            );
        }
        foreach ($this->form['buildingDescriptions'] as $buildingDescription) {
            BuildingDescription::updateOrCreate(
                [
                    'building_documentation_id' => $buildingDocumentation->id,
                    'id' => $buildingDescription['id'] ?? null
                ],
                $buildingDescription
            );
        }
        foreach ($this->form['contractorDetails'] as $contractorDetail) {
            ContractorDetail::updateOrCreate(
                [
                    'building_documentation_id' => $buildingDocumentation->id,
                    'id' => $contractorDetail['id'] ?? null
                ],
                $contractorDetail
            );
        }

        $buildingDocumentation->requiredDocument()->create($this->requiredDocument);
        $buildingDocumentation->buildingLandOwner()->create($this->buildingLandOwner);
        $buildingDocumentation->buildingHouseOwner()->create($this->buildingHouseOwner);
        DB::transaction(function () use ($buildingDocumentation) {

            foreach ($this->form['requiredDocument.files'] ?? [] as $document) {
                $buildingDocumentation->requiredDocument()->files()->create([
                    'file_name' => pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME),
                    'extension' => $document->getClientOriginalExtension(),
                    'file' => $document->store('buildingDocument/allRoundPic/', 'public')
                ]);
            }
        });
        foreach ($this->form['files'] ?? [] as $file) {
            $buildingDocumentation->files()->create([
                'file_name' => $file['file_name'],
                'extension' => $file['file']->getClientOriginalExtension(),
                'file' => $file['file']->store('file/', 'public'),
            ]);
        }
    }

    public function neighbourArrayIncrement(): void
    {
        $this->form['neighbours'][] = [];
    }

    public function buildingStoreyDetailArrayIncrement(): void
    {
        $this->form['buildingStoreyDetails'][] = [];
    }
    public function buildingDescriptionArrayIncrement(): void
    {
        $this->form['buildingDescriptions'][] = [];
    }
    public function contractorDetailArrayIncrement(): void
    {
        $this->form['contractorDetails'][] = [];
    }

    public function neighbourArrayDecrement($index): void
    {
        if (!empty($this->form['neighbours'][$index]['id'])) {
            Neighbour::find($this->form['neighbours'][$index]['id'])->delete();
        }
        unset($this->form['neighbours'][$index]);
        $this->form['neighbours'] = array_values($this->form['neighbours']);
    }

    public function buildingStoreyDetailArrayDecrement($index): void
    {
        if (!empty($this->form['buildingStoreyDetails'][$index]['id'])) {
            BuildingStoreyDetail::find($this->form['buildingStoreyDetails'][$index]['id'])->delete();
        }
        unset($this->form['buildingStoreyDetails'][$index]);
        $this->form['buildingStoreyDetails'] = array_values($this->form['buildingStoreyDetails']);
    }
    public function buildingDescriptionArrayDecrement($index): void
    {
        if (!empty($this->form['buildingDescriptions'][$index]['id'])) {
            BuildingDescription::find($this->form['buildingDescriptions'][$index]['id'])->delete();
        }
        unset($this->form['buildingDescriptions'][$index]);
        $this->form['buildingDescriptions'] = array_values($this->form['buildingDescriptions']);
    }
    public function contractorDetailArrayDecrement($index): void
    {
        if (!empty($this->form['contractorDetails'][$index]['id'])) {
            ContractorDetail::find($this->form['contractorDetails'][$index]['id'])->delete();
        }
        unset($this->form['contractorDetails'][$index]);
        $this->form['contractorDetails'] = array_values($this->form['contractorDetails']);
    }

    public function fileArrayIncrement(): void
    {
        $this->form['files'][] = [];
    }

    public function fileArrayDecrement($index): void
    {
        if (!empty($this->form['files'][$index]['id'])) {
            Neighbour::find($this->form['files'][$index]['id'])->delete();
        }
        unset($this->form['files'][$index]);
        $this->form['files'] = array_values($this->form['files']);
    }

    public function render(): Factory|View|Application
    {
        if (!empty($this->buildingLandOwner['province_id'])) {
            $this->districts = get_districts($this->buildingLandOwner['province_id']);
        }
        if (!empty($this->buildingLandOwner['district_id'])) {
            $this->localBodies = get_local_bodies($this->buildingLandOwner['district_id']);
        }
        if (!empty($this->buildingLandOwner['local_body_id'])) {
            $this->wards = get_local_bodies(localBodyId: $this->buildingLandOwner['local_body_id'])->ward_no;
        }
        if (!empty($this->buildingHouseOwner['province_id'])) {
            $this->districts = get_districts($this->buildingHouseOwner['province_id']);
        }
        if (!empty($this->buildingHouseOwner['district_id'])) {
            $this->localBodies = get_local_bodies($this->buildingHouseOwner['district_id']);
        }
        if (!empty($this->buildingHouseOwner['local_body_id'])) {
            $this->wards = get_local_bodies(localBodyId: $this->buildingHouseOwner['local_body_id'])->ward_no;
        }
        if (!empty($this->form['province_id'])) {
            $this->districts = get_districts($this->form['province_id']);
        }
        if (!empty($this->form['district_id'])) {
            $this->localBodies = get_local_bodies($this->form['district_id']);
        }
        if (!empty($this->form['local_body_id'])) {
            $this->wards = get_local_bodies(localBodyId: $this->form['local_body_id'])->ward_no;
        }

        return view('emap::livewire.building-documentation-livewire');
    }

    private function calculateProgressPercentage(): void
    {
        $this->reset('progressPercentage');
        $this->progressPercentage = $this->currentStep / 3 * 100;
    }

    public function messages(): array
    {
        return [
            'form.house_owner_name.required' => ['घरधनीको नाम आवश्यक छ'],
            'form.applicant_name.required' => ['निवेदकको नाम आवश्यक छ'],
            'form.application_date.required' => ['आवेदन मिति बि सं आबश्यक छ'],
            'form.province_id.required' => ['प्रदेश आबश्यक छ '],
            'form.district_id.required' => ['जिल्ला आबश्यक छ '],
            'form.local_body_id.required' => ['स्थानीय निकाय  आबश्यक छ '],
            'form.ward_no.required' => ['वार्ड न. आबस्यक छ'],
            'form.tole.required' => ['टोल आबश्यक छ '],
            'form.former_district.required' => ['साविक जिल्ला आबश्यक छ '],
            'form.former_local_body.required' => ['साविक स्थानीय निकाय  आबश्यक छ '],
            'form.former_ward_no.required' => ['साविक वार्ड न. आबस्यक छ'],
            'form.applicant_former_district.required' => ['निवेदकको साविक जिल्ला आबश्यक छ '],
            'form.applicant_former_local_body.required' => ['निवेदकको साविक स्थानीय निकाय  आबश्यक छ '],
            'form.applicant_former_ward_no.required' => ['निवेदकको साविक वार्ड न. आबस्यक छ'],
            'form.phone.required' => ['फोन आबश्यक छ'],
            'form.citizenship_no.required' => ['ना.प्रा.नं आबश्यक छ'],
            'form.plot_no.required' => ['जग्गाको कित्ता नं आबश्यक छ '],
            'form.land_area.required' => ['जग्गाको क्षेत्रफल आबश्यक छ '],
            'form.land_ward_no.required' => ['जग्गाको क्षेत्रफल आबश्यक छ '],
            'form.house_built_year.required' => ['घर बनेको वर्ष आबश्यक छ'],
            'form.room.required' => ['कोठा आबश्यक छ '],
            'form.current_storey.required' => ['तला अंग्रेजीमा आबश्यक छ '],
            'form.area.required' => ['घरको क्षेत्रफल नाम आबश्यक छ '],
            'form.building_category.required' => ['घरको किसिम आबश्यक छ '],
            'form.length.required' => ['लम्बाई आबश्यक छ '],
            'form.breadth.required' => ['चौडाई आबश्यक छ '],
            'form.height.required' => ['उचाई आबश्यक छ '],
            'form.other.required' => ['अन्य आबश्यक छ'],
            'form.road_jurisdiction.required' => ['सडक अधिकार क्षेत्र आबश्यक छ'],
            'form.land_detail.required' => ['ज.वि आबश्यक छ'],
            'form.neighbours.required' => ['संधीयार आबश्यक छ'],
            'form.neighbours.*.neighbour_name.required' => ['संधीयारको नाम आबश्यक छ'],
            'form.neighbours.*.direction.required' => ['दिशा आबश्यक छ'],
            'form.neighbours.*.ward_no.required' => ['वडा नं आबश्यक छ'],
            'form.buildingStoreyDetails.required' => ['संधीयार आबश्यक छ'],
            'form.buildingStoreyDetails.*.storey.required' => ['तल्ला अनिवार्य छ'],
            'form.buildingStoreyDetails.*.area_of_former_construction.required' => ['साविक क्षेत्रफल अनिवार्य छ'],
            'form.buildingStoreyDetails.*.land_area.required' => ['जग्गा क्षेत्रफल अनिवार्य छ'],
            'form.buildingStoreyDetails.*.remarks.required' => ['कैफियत आबश्यक छ'],
            'requiredDocument.citizenship' => ['नेपाली नागरिकताको प्रमाण पत्रको प्रतिलिपी'],
            'requiredDocument.landowner_proved' => ['जग्गाधनि प्रमाण पत्रको प्रतिलिपी'],
            'requiredDocument.revenue' => ['चालु आ.व को घर जग्गा कर तिरेको रसिदको प्रतिलिपि'],
            'requiredDocument.building_map' => ['घरको नक्सा'],
            'requiredDocument.land_map' => ['जग्गाको नक्सा'],
            'requiredDocument.all_round_house_pic' => ['चारैतिरको फोटो'],
            'requiredDocument.photo' => ['घरधनिको फोटो'],
            'requiredDocument.other_document' => ['अन्य कागजात आबश्यक छ'],


        ];
    }

    public function checkSameAsLandOwner(): void
    {
        $this->same_as_land_owner = !$this->same_as_land_owner;
        if ($this->same_as_land_owner) {
            $this->buildingHouseOwner = [
                'name' => $this->buildingLandOwner['name'] ?? null,
                'phone' => $this->buildingLandOwner['phone'] ?? null,
                'father_name' => $this->buildingLandOwner['father_name'] ?? null,
                'grandfather_name' => $this->buildingLandOwner['grandfather_name'] ?? null,
                'photo' => $this->buildingLandOwner['photo'] ?? null,
                'signature' => $this->buildingLandOwner['signature'] ?? null,
                'citizenship_issue_district_id' => $this->buildingLandOwner['citizenship_issue_district_id'] ?? null,
                'citizenship_no' => $this->buildingLandOwner['citizenship_no'] ?? null,
                'citizenship_issue_date' => $this->buildingLandOwner['citizenship_issue_date'] ?? null,
                'province_id' => $this->buildingLandOwner['province_id'] ?? null,
                'district_id' => $this->buildingLandOwner['district_id'] ?? null,
                'local_body_id' => $this->buildingLandOwner['local_body_id'] ?? null,
                'tole' => $this->buildingLandOwner['tole'] ?? null,
                'ward_no' => $this->buildingLandOwner['ward_no'] ?? null,

            ];
        } else {
            $this->buildingHouseOwner = [
                'name' => null,
                'phone' => null,
                'father_name' => null,
                'grandfather_name' => null,
                'photo' => null,
                'signature' => null,
                'citizenship_issue_district_id' => null,
                'citizenship_no' => null,
                'citizenship_issue_date' => [],
                'province_id' => null,
                'district_id' => null,
                'local_body_id'  => null,
                'tole' => null,
                'address' => null,
                'ward_no' => null,

            ];
        }
    }
}
