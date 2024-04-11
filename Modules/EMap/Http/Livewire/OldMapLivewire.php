<?php

namespace Modules\EMap\Http\Livewire;

use App\Models\Address\District;
use App\Models\Address\Province;
use App\Models\Settings\FiscalYear;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\EMap\Entities\HouseOwner;
use Modules\EMap\Entities\OldMap;

class OldMapLivewire extends Component
{
    use WithFileUploads;

    public $allDistricts = [];
    public $fiscalYears = [];
    // public $provinces = [];

    public $oldMapUpdate;
    public array $oldMap = [
        'application_type' => null,
        'fiscal_year_id' => null,
        'registration_fee' => null,
        'registration_no' => null,
        'registration_date' => null,
        'construction_type' => null,
        'usage' => null,
        'building_category' => null,
        'oldMapDocuments' => []

    ];


    public array $houseOwner = [
        'name' => null,
        'phone' => null,
        'father_name' => null,
        'grandfather_name' => null,
        'citizenship_issue_district_id' => null,
        // 'province_id' => null,
        // 'district_id' => null,
        // 'local_body_id' => null,
        'ward_no' => null,
        // 'tole' => null,
        'citizenship_no' => null,
        'local' => null,
        'address' => null,
        'citizenship_issue_date' => null,
    ];


    public function mount($oldMapUpdate = null): void
    {
        $this->fiscalYears = FiscalYear::all();
        // $this->provinces = Province::all();
        $this->allDistricts = District::all();

        if (!empty($oldMapUpdate)) {
            $this->oldMap[] = $oldMapUpdate;
            foreach ($this->oldMap as $key => $data) {
                $this->oldMap[$key] = $oldMapUpdate[$key];
            }
            if (!empty($houseOwner = $oldMapUpdate->houseOwner->first())) {
                $this->houseOwner['name'] = $houseOwner->name ?? null;
                $this->houseOwner['phone'] = $houseOwner->phone ?? null;
                $this->houseOwner['father_name'] = $houseOwner->father_name ?? null;
                $this->houseOwner['grandfather_name'] = $houseOwner->grandfather_name ?? null;
                $this->houseOwner['citizenship_issue_district_id'] = $houseOwner->citizenship_issue_district_id ?? null;
                // $this->houseOwner['province_id'] = $houseOwner->province_id ?? null;
                // $this->houseOwner['district_id'] = $houseOwner->district_id ?? null;
                // $this->houseOwner['local_body_id'] = $houseOwner->local_body_id ?? null;
                $this->houseOwner['ward_no'] = $houseOwner->ward_no ?? null;
                // $this->houseOwner['tole'] = $houseOwner->tole ?? null;
                $this->houseOwner['citizenship_no'] = $houseOwner->citizenship_no ?? null;
                $this->houseOwner['address'] = $houseOwner->address ?? null;
                $this->houseOwner['local_body'] = $houseOwner->local_body ?? null;
                $this->houseOwner['citizenship_issue_date'] = $houseOwner->citizenship_issue_date ?? null;
            }
        }

    }

    protected $listeners = ['dateChanged'];
    public function dateChanged($nepaliDate, $englishDate)
    {
        $this->oldMap['date'] = $nepaliDate;
        $this->oldMap['en_date'] = $englishDate;
    }

    protected array $oldMapValidation = [
        'oldMap.application_type' => ['required'],
        'oldMap.fiscal_year_id' => ['required'],
        'oldMap.registration_fee' => ['required'],
        'oldMap.registration_no' => ['required'],
        'oldMap.registration_date' => ['required'],
        'oldMap.construction_type' => ['required'],
        'oldMap.usage' => ['required'],
        'oldMap.building_category' => ['required'],
        'oldMap.oldMapDocuments' => ['array'],
        'oldMap.oldMapDocuments.*.document_name' => ['required', 'string', 'max:255'],
        'oldMap.oldMapDocuments.*.document' => ['required', 'mimes:jpg,jpeg,png,pdf']
    ];


    protected array $houseOwnerValidations = [
        'houseOwner.name' => ['required', 'string', 'max:255'],
        'houseOwner.phone' => ['required'],
        'houseOwner.father_name' => ['required', 'string', 'max:255'],
        'houseOwner.grandfather_name' => ['required', 'string', 'max:255'],
        'houseOwner.citizenship_issue_district_id' => ['nullable', 'exists:districts,id'],
        // 'houseOwner.province_id' => ['nullable', 'exists:provinces,id'],
        // 'houseOwner.district_id' => ['nullable', 'exists:districts,id'],
        // 'houseOwner.local_body_id' => ['nullable', 'exists:local_bodies,id'],
        'houseOwner.ward_no' => ['required', 'integer'],
        // 'houseOwner.tole' => ['nullable', 'string', 'max:255'],
        'houseOwner.citizenship_no' => ['required'],
        'houseOwner.local_body' => ['required'],
        'houseOwner.address' => ['required'],
        'houseOwner.citizenship_issue_date' => ['required'],
    ];


    public function rules(): array
    {
        return array_merge(
            $this->oldMapValidation,
            $this->houseOwnerValidations,
        );
    }

    public function addOldMapDocuments()
    {
        $this->oldMap['oldMapDocuments'][] = [];
    }

    public function removeOldMapDocuments($index)
    {
        unset($this->oldMap['oldMapDocuments'][$index]);
        $this->oldMap['oldMapDocuments'] = array_values($this->oldMap['oldMapDocuments']);
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function saveFormData()
    {
        $this->validate();
        if (empty($this->oldMapUpdate)) {
            DB::transaction(function () {
                $oldMap = OldMap::create($this->oldMap);
                if ($houseOwner = HouseOwner::where('citizenship_no', $this->houseOwner['citizenship_no'])->where('phone', $this->houseOwner['phone'])->first()) {
                    $houseOwner->oldMaps()->attach([$oldMap->id]);
                } else {
                    $houseOwner = HouseOwner::create($this->houseOwner);
                    $houseOwner->oldMaps()->attach([$oldMap->id]);
                }  foreach ($this->oldMap['oldMapDocuments'] as $oldMapDocument) {
                    $oldMap->oldMapDocuments()->create([
                        'document_name' => $oldMapDocument['document_name'],
                        'document' => $oldMapDocument['document']
                    ]);
                }

            });
            $this->dispatchBrowserEvent('alert_message', [
                'type' => 'success',
                'title' => 'तपाईंको फारम सफलतापूर्वक पेश भएको छ ।',
            ]);
        } else {
            $this->oldMapUpdate->update($this->oldMap);
            $this->oldMapUpdate->houseOwner?->first()?->update([
                'name' => $this->houseOwner['name'],
                'phone' => $this->houseOwner['phone'],
                'father_name' => $this->houseOwner['father_name'],
                'grandfather_name' => $this->houseOwner['grandfather_name'],
                'citizenship_issue_district_id' => $this->houseOwner['citizenship_issue_district_id'],
                'citizenship_no' => $this->houseOwner['citizenship_no'],
                'citizenship_issue_date' => $this->houseOwner['citizenship_issue_date'],
                // 'province_id' => $this->houseOwner['province_id'],
                // 'district_id' => $this->houseOwner['district_id'],
                // 'local_body_id' => $this->houseOwner['local_body_id'],
                'ward_no' => $this->houseOwner['ward_no'],
                'local_body' => $this->houseOwner['local_body'],
                'address' => $this->houseOwner['address'],
                // 'tole' => $this->houseOwner['tole'],
            ]);
            foreach ($this->oldMap['oldMapDocuments'] as $oldMapDocument) {
                $this->oldMapUpdate->oldMapDocuments()->update([
                    'document_name' => $oldMapDocument['document_name'],
                    'document' => $oldMapDocument['document']
                ]);
            }
            $this->dispatchBrowserEvent('toast_message', [
                'type' => 'success',
                'title' => 'तपाईंको फारम सफलतापूर्वक  सम्पादन गरिएको छ ।',
            ]);
        }

        return redirect(route('emap.admin.oldMap.index'));
    }

    public function messages(): array
    {
        return [
            'oldMap.application_type.required' => 'अनिवार्य छ',
            'oldMap.fiscal_year_id.required' => 'आर्थिक वर्ष अनिवार्य छ',
            'oldMap.construction_type.required' => 'निर्माण कार्यको किसिम अनिवार्य छ ',
            'oldMap.usage.required' => 'प्रयोजन अनिवार्य छ ',
            'oldMap.registration_date.required' => 'दर्ता मिति अनिवार्य छ',
            'oldMap.registration_no.required' => 'दर्ता नं अनिवार्य छ',
            'oldMap.registration_fee.required' => 'दर्ता शुल्क अनिवार्य छ',
            'oldMap.building_category.required' => 'भवन वर्गीकरण अनिवार्य छ',
            'houseOwner.name.required' => 'घर धनीको नाम अनिवार्य छ',
            'houseOwner.father_name.required' => 'बुवाको नाम अनिवार्य छ',
            'houseOwner.citizenship_issue_district_id.required' => 'जारि जिल्ला अनिवार्य छ',
            'houseOwner.citizenship_no.required' => ' नागरिकत नम्बर अनिवार्य छ',
            'houseOwner.citizenship_issue_date.required' => 'मिति अनिवार्य छ',
            'houseOwner.phone.required' => 'फोन अनिवार्य छ',
            'houseOwner.grandfather_name.required' => 'हजुर बुवाको नाम अनिवार्य छ',
            // 'houseOwner.province_id.required' => 'प्रदेश अनिवार्य छ',
            // 'houseOwner.district_id.required' => 'जिल्ला अनिवार्य छ',
            // 'houseOwner.local_body_id.required' => 'पालिका अनिवार्य छ',
            'houseOwner.ward_no.required' => 'वडा अनिवार्य छ',
            'houseOwner.local_body.required' => 'वडा अनिवार्य छ',
            'houseOwner.address.required' => 'वडा अनिवार्य छ',
            // 'houseOwner.tole.required' => 'टोल अनिवार्य छ',

        ];
    }


    public function render()
    {
        return view('emap::livewire.old-map-livewire');
    }
}
