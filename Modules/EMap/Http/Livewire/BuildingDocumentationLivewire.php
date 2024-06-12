<?php

namespace Modules\EMap\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\EMap\Entities\BuildingDocumentation;
use Modules\EMap\Entities\BuildingStoreyDetail;
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

    public $buildingStoreyDetails = [];

    public BuildingDocumentation $buildingDocumentation;

    public array $form = [
        'house_owner_name' => null,
        'applicant_name' => null,
        'application_date' => null,
        'province_id' => null,
        'district_id' => null,
        'local_body_id' => null,
        'ward_no' => null,
        'tole' => null,
        'former_district' => null,
        'former_local_body' => null,
        'former_ward_no' => null,
        'phone' => null,
        'plot_no' => null,
        'land_area' => null,
        'land_ward_no' => null,
        'house_built_year' => null,
        'room' => null,
        'storey' => null,
        'area' => null,
        'building_category' => null,
        'length' => null,
        'breadth' => null,
        'height' => null,
        'other' => null,
        'road_jurisdiction' => null,
        'land_detail' => null,
        'applicant_former_district' => null,
        'applicant_former_local_body' => null,
        'applicant_former_ward_no' => null,
        'citizenship_no' => null,
        'neighbours' => [],
        'buildingStoreyDetails' => [],

        'files' => [],
    ];

    public array $requiredDocument = [
        'citizenship' => null,
        'landowner_proved' => null,
        'revenue' => null,
        'building_map' => null,
        'land_map' => null,
        'all_round_house_pic' => null,
        'other_document' => [],

        'photo' => null,
    ];

    public function mount($buildingDocumentation = null)
    {

        $this->provinces = get_provinces();

        if (!empty($buildingDocumentation)) {
            $this->buildingDocumentation = $buildingDocumentation;

            $this->assignBuildingDocumentationData();
        } else {

            $this->neighbourArrayIncrement();
            $this->buildingStoreyDetailArrayIncrement();
        }

    }

    private function assignBuildingDocumentationData()
    {
        foreach (Arr::except($this->form, ['neighbours', 'buildingStoreyDetails', 'files']) as $key => $data) {
            $this->form[$key] = $this->buildingDocumentation[$key];
        }

        foreach ($this->buildingDocumentation->neighbours as $neighbour) {
            $this->form['neighbours'][] = [
                'neighbour_name' => $neighbour->neighbour_name ?? null,
                'direction' => $neighbour->direction ?? null,
                'ward_no' => $neighbour->ward_no ?? null,
                'plot_no' => $neighbour->plot_no ?? null,

            ];
        }
        foreach ($this->buildingDocumentation->buildingStoreyDetails as $buildingStoreyDetail) {
            $this->form['buildingStoreyDetails'][] = [
                'storey' => $buildingStoreyDetail->storey ?? null,
                'area_of_former_construction' => $buildingStoreyDetail->area_of_former_construction ?? null,
                'land_area' => $buildingStoreyDetail->land_area ?? null,
                'remarks' => $buildingStoreyDetail->remarks ?? null,

            ];
        }
    }

    protected array $secondStepValidations = [
        'form.neighbours' => ['required', 'array'],
        'form.neighbours.*.neighbour_name' => ['required', 'string'],
        'form.neighbours.*.direction' => ['required'],
        'form.neighbours.*.ward_no' => ['required', 'integer'],
        'form.neighbours.*.plot_no' => ['nullable', 'string'],
        'form.buildingStoreyDetails' => ['required', 'array'],
        'form.buildingStoreyDetails.*.storey' => ['required'],
        'form.buildingStoreyDetails.*.area_of_former_construction' => ['required', 'string'],
        'form.buildingStoreyDetails.*.land_area' => ['required', 'string'],
        'form.buildingStoreyDetails.*.remarks' => ['nullable', 'string'],

    ];

    protected function firstStepValidation(): array
    {
        return [

            'form.house_owner_name' => ['required', 'string'],
            'form.province_id' => ['required', 'integer', 'exists:provinces,id'],
            'form.district_id' => ['required', 'integer', 'exists:districts,id'],
            'form.local_body_id' => ['required', 'integer', 'exists:local_bodies,id'],
            'form.ward_no' => ['required', 'integer'],
            'form.tole' => ['required', 'string'],
            'form.former_district' => ['required', 'string'],
            'form.former_local_body' => ['required', 'string'],
            'form.former_ward_no' => ['required', 'string'],
            'form.applicant_former_district' => ['required', 'string'],
            'form.applicant_former_local_body' => ['required', 'string'],
            'form.applicant_former_ward_no' => ['required', 'string'],
            'form.phone' => ['required', 'string'],
            'form.plot_no' => ['required', 'string'],
            'form.land_area' => ['required', 'string'],
            'form.land_ward_no' => ['required', 'integer'],
            'form.house_built_year' => ['required', 'string'],
            'form.room' => ['required', 'string'],
            'form.storey' => ['required', 'string'],
            'form.area' => ['required', 'string'],
            'form.building_category' => ['required', 'string'],
            'form.length' => ['required', 'string'],
            'form.breadth' => ['required', 'string'],
            'form.citizenship_no' => ['required', 'string'],
            'form.height' => ['required', 'string'],
            'form.other' => ['nullable', 'string'],
            'form.road_jurisdiction' => ['required', 'string'],
            'form.land_detail' => ['required', 'string'],
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
                'form.buildingStoreyDetails.*.remarks' => ['nullable', 'string'],
            ])
            : array_merge($this->secondStepValidations, [
                'form.neighbours.*.neighbour_name' => ['nullable', 'string'],
                'form.neighbours.*.direction' => ['nullable'],
                'form.neighbours.*.ward_no' => ['nullable', 'integer'],
                'form.buildingStoreyDetails.*.storey' => ['nullable'],
                'form.buildingStoreyDetails.*.area_of_former_construction' => ['nullable', 'string'],
                'form.buildingStoreyDetails.*.land_area' => ['nullable', 'string'],
                'form.buildingStoreyDetails.*.remarks' => ['nullable', 'string'],
            ]);
    }

    protected array $thirdStepValidations = [

        'requiredDocument.citizenship' => ['required'],
        'requiredDocument.landowner_proved' => ['required'],
        'requiredDocument.revenue' => ['required'],
        'requiredDocument.building_map' => ['required'],
        'requiredDocument.land_map' => ['required'],
        'requiredDocument.all_round_house_pic' => ['nullable'],
        'requiredDocument.other_document' => ['nullable', 'array'],
        'requiredDocument.photo' => ['required'],
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
                'requiredDocument.other_document' => ['nullable', 'array'],
                'requiredDocument.photo' => ['nullable'],
            ] : [
                'requiredDocument.citizenship' => ['required'],
                'requiredDocument.landowner_proved' => ['required'],
                'requiredDocument.revenue' => ['required'],
                'requiredDocument.building_map' => ['required'],
                'requiredDocument.land_map' => ['nullable'],
                'requiredDocument.all_round_house_pic' => ['nullable'],
                'requiredDocument.other_document' => ['nullable', 'array'],
                'requiredDocument.photo' => ['required'],
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
        foreach ($this->form['neighbours'] as $neighbour) {
            $neighbours = new Neighbour($neighbour);
            $buildingDocumentation->neighbours()->save($neighbours);
        }
        foreach ($this->form['buildingStoreyDetails'] as $buildingStoreyDetail) {
            $buildingStoreyDetails = new BuildingStoreyDetail($buildingStoreyDetail);
            $buildingDocumentation->buildingStoreyDetails()->save($buildingStoreyDetails);
        }
        DB::transaction(function () use ($buildingDocumentation) {
            $buildingDocumentation->requiredDocument()->create($this->requiredDocument);
            // foreach ($this->form['requiredDocument.files'] ?? [] as $file) {
            //     $buildingDocumentation->requiredDocument()->files()->create([
            //         'file_name' => $file['file_name'],
            //         'file' => $file['file']->store('buildingDocument/allRoundPic', 'public'),
            //         'size' => $file->getSize(),
            //         'extension' => $file['file']->getClientOriginalExtension(),
            //     ]);
            // }
            foreach ($this->form['requiredDocument.other_document'] ?? [] as $document) {
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
            'form.storey.required' => ['तला अंग्रेजीमा आबश्यक छ '],
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
}
