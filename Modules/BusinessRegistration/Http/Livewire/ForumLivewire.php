<?php

namespace Modules\BusinessRegistration\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\BusinessRegistration\Entities\Forum;
use Modules\BusinessRegistration\Entities\Partner;

class ForumLivewire extends Component
{
    use WithFileUploads;

    public int $currentStep = 1;
    public float $progressPercentage = 0;

    public $provinces = [];

    public $districts = [];

    public $localBodies = [];

    public $wards = [];
    public $partners = [];
    public Forum $forum;
    public array $form = [
        'name' => null,
        'name_en' => null,
        'phone' => null,
        'owner_name' => null,
        'email' => null,
        'address' => null,
        'address_en' => null,
        'investment' => null,
        'purpose' => null,
        'establish_date' => null,
        'product' => null,
        'east' => null,
        'west' => null,
        'north' => null,
        'type' => null,
        'south' => null,
        'plot_no' => null,
        'area' => null,
        'province_id' => null,
        'district_id' => null,
        'local_body_id' => null,
        'ward_no' => null,
        'way' => null,
        'tole' => null,
        'other' => null,
        //third step
        'application_date' => null,
        'application_date_en' => null,
        //second step
        'partners' => [],
        'files' => [],

    ];
    public function mount($forum = null)
    {
        $this->provinces = get_provinces();
        if (!empty($forum)) {
            $this->forum = $forum;

            $this->assignForumData();
        } else {
            $this->partnerArrayIncrement();
            $this->form['province_id'] = officeSetting()->province_id;
            $this->form['district_id'] = officeSetting()->district_id;
            $this->form['local_body_id'] = officeSetting()->local_body_id;
        }
    }
    private function assignForumData()
    {
        foreach (Arr::except($this->form, ['photo', 'partners','files']) as $key => $data) {
            $this->form[$key] = $this->forum[$key];
        }

        foreach ($this->forum->partners as $partner) {
            $this->form['partners'][] = [
                'citizenship_no' => $partner->citizenship_no ?? null,
                'issue_date' => $partner->issue_date ?? null,
                'id' => $partner->id ?? null,
                'name_en' => $partner->name_en ?? null,
                'name' => $partner->name ?? null,
                'phone' => $partner->phone ?? null,
                'email' => $partner->email ?? null,
                'house_no' => $partner->house_no ?? null,
                'account_no' => $partner->account_no ?? null,
                'education_qualification' => $partner->education_qualification ?? null,
                'occupation' => $partner->occupation ?? null,
                'national_card_no' => $partner->national_card_no ?? null,
                'gender' => $partner->gender?->value ?? null,
                'father_name' => $partner->father_name ?? null,
                'grandfather_name' => $partner->grandfather_name ?? null,
                'position' => $partner->position ?? null,
                'province_id' => $partner->province_id ?? null,
                'district_id' => $partner->district_id ?? null,
                'issue_district_id' => $partner->issue_district_id ?? null,
                'local_body_id' => $partner->local_body_id ?? null,
                'ward_no' => $partner->ward_no ?? null,
                'way' => $partner->way ?? null,
                'tole' => $partner->tole ?? null,
            ];
        }
    }
    protected array $secondStepValidations = [
        'form.partners' => ['required', 'array'],
        'form.partners.*.name' => ['required'],
        'form.partners.*.name_en' => ['required'],
        'form.partners.*.citizenship_no' => ['required'],
        'form.partners.*.issue_date' => ['required'],
        'form.partners.*.phone' => ['required'],
        'form.partners.*.email' => ['nullable'],
        'form.partners.*.house_no' => ['nullable'],
        'form.partners.*.account_no' => ['nullable'],
        'form.partners.*.national_card_no' => ['nullable'],
        'form.partners.*.gender' => ['required'],
        'form.partners.*.father_name' => ['required'],
        'form.partners.*.grandfather_name' => ['required'],
        'form.partners.*.position' => ['required', 'integer'],
        'form.partners.*.province_id' => ['required', 'exists:provinces,id'],
        'form.partners.*.district_id' => ['required', 'exists:districts,id'],
        'form.partners.*.issue_district_id' => ['required', 'exists:districts,id'],
        'form.partners.*.local_body_id' => ['required', 'exists:local_bodies,id'],
        'form.partners.*.ward_no' => ['required', 'integer'],
        'form.partners.*.way' => ['nullable', 'string'],
        'form.partners.*.tole' => ['required', 'string'],
    ];
    protected function firstStepValidation(): array
    {
        return [
            'form.name' => ['required'],
            'form.owner_name' => ['required'],
            'form.name_en' => ['required'],
            'form.phone' => ['required'],
            'form.email' => ['required'],
            'form.address' => ['required'],
            'form.address_en' => ['required'],
            'form.investment' => ['nullable'],
            'form.east' => ['required'],
            'form.west' => ['required'],
            'form.north' => ['required'],
            'form.south' => ['required'],
            'form.area' => ['required'],
            'form.type' => ['required'],
            'form.plot_no' => ['required'],
            'form.establish_date' => ['nullable'],
            'form.product' => ['nullable'],
            'form.purpose' => ['required'],
            'form.province_id' => ['required', 'exists:provinces,id'],
            'form.district_id' => ['required', 'exists:districts,id'],
            'form.local_body_id' => ['required', 'exists:local_bodies,id'],
            'form.ward_no' => ['required', 'integer'],
            'form.way' => ['nullable', 'string'],
            'form.tole' => ['required', 'string'],
            'form.other' => ['required', 'string'],
        ];
    }
    protected function secondStepValidations(): array
    {
        return !empty($this->forum)
            ? array_merge($this->secondStepValidations, [
                'form.partners.*.photo' => ['required'],
                'form.partners.*.citizenship_front' => ['required'],
                'form.partners.*.citizenship_back' => ['required'],
            ])
            : array_merge($this->secondStepValidations, [
                'form.partners.*.photo' => ['nullable'],
                'form.partners.*.citizenship_front' => ['nullable'],
                'form.partners.*.citizenship_back' => ['nullable'],
            ]);
    }
    protected function thirdStepValidations(): array
    {
        return [
            'form.application_date' => ['required'],
            'form.other_document' => ['nullable', 'array'],
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



    private function saveForumData($forum): void
    {
        foreach ($this->form['partners'] as $partner) {
            $partners = new Partner($partner);
            $forum->partners()->save($partners);
        }

        foreach ($this->form['files'] ?? [] as $file) {
            $forum->files()->create([
                'file_name' => $file['file_name'],
                'extension' => $file['file']->getClientOriginalExtension(),
                'file' => $file['file']->store('file/', 'public')
            ]);
        }
    }
    public function partnerArrayIncrement(): void
    {
        $this->form['partners'][] = [
            'province_id' => officeSetting()->province_id,
            'district_id' => officeSetting()->district_id,
            'local_body_id' => officeSetting()->local_body_id,
        ];
    }

    public function partnerArrayDecrement($index): void
    {
        if (!empty($this->form['partners'][$index]['id'])) {
            Partner::find($this->form['partners'][$index]['id'])->delete();
        }
        unset($this->form['partners'][$index]);
        $this->form['partners'] = array_values($this->form['partners']);
    }
    public function fileArrayIncrement(): void
    {
        $this->form['files'][] = [];
    }

    public function fileArrayDecrement($index): void
    {
        if (!empty($this->form['files'][$index]['id'])) {
            Partner::find($this->form['files'][$index]['id'])->delete();
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

        return view('businessregistration::livewire.forum-livewire');
    }

    private function calculateProgressPercentage(): void
    {
        $this->reset('progressPercentage');
        $this->progressPercentage = $this->currentStep / 3 * 100;
    }
    public function messages(): array
    {
        return [
            'form.name.required' => ['नाम आवश्यक छ'],
            'form.name_en.required' => ['नाम अंग्रेजीमा आवश्यक छ'],
            'form.phone.required' => ['फोन आबश्यक छ'],
            'form.email.required' => ['इमेल आबश्यक छ'],
            'form.address.required' => ['ठेगाना आबश्यक छ '],
            'form.address_en.required' => ['ठेगाना अंग्रेजीमा आबश्यक छ '],
            'form.owner_name.required' => ['प्रोप्राईटरको नाम आबश्यक छ '],
            'form.east.required' => ['पुर्ब आबश्यक छ '],
            'form.investment.required' => ['कूल पूँजी आबश्यक छ '],
            'form.west.required' => ['पश्चिम आबश्यक छ '],
            'form.south.required' => ['उत्तर आबश्यक छ '],
            'form.plot_no.required' => ['जग्गाको कित्ता नं आबश्यक छ '],
            'form.north.required' => ['दक्षिण आबश्यक छ'],
            'form.type.required' => ['फर्मको प्रकार आबश्यक छ'],
            'form.establish_date.required' => ['फर्म संचालन मिति आबश्यक छ'],
            'form.area.required' => ['जग्गाको क्षेत्रफल  आबश्यक छ '],
            'form.product.required' => ['उत्पादन गर्ने वस्तु आबश्यक छ '],
            'form.purpose.required' => ['उधेश्य आबश्यक छ '],
            'form.province_id.required' => ['प्रदेश आबश्यक छ '],
            'form.district_id.required' => ['जिल्ला आबश्यक छ '],
            'form.local_body_id.required' => ['स्थानीय निकाय  आबश्यक छ '],
            'form.ward_no.required' => ['वार्ड न. आबस्यक छ'],
            'form.way.required' => ['मार्ग आबश्यक छ '],
            'form.tole.required' => ['टोल आबश्यक छ '],
            'form.other.required' => ['अन्य आबश्यक छ '],
            'form.partners.required' => ['पार्टनर आबश्यक छ'],
            'form.partners.*.name.required' => ['नाम आबश्यक छ'],
            'form.partners.*.name_en.required' => ['नाम अंग्रेजीमा आबश्यक छ'],
            'form.partners.*.citizenship_no.required' => ['नागरिकता नं आबश्यक छ'],
            'form.partners.*.issue_date.required' => ['जारि मिति आबश्यक छ'],
            'form.partners.*.phone.required' => ['फोन आबश्यक छ'],
            'form.partners.*.email.required' => ['इमेल आबश्यक छ'],
            'form.partners.*.house_no.required' => ['घर नं आबश्यक छ'],
            'form.partners.*.account_no.required' => ['खाता नं आबश्यक छ'],
            'form.partners.*.national_card_no.required' => ['राष्ट्रियता परिचयपत्र नं आबश्यक छ'],
            'form.partners.*.gender.required' => ['लिङ्ग आबश्यक छ'],
            'form.partners.*.occupation.required' => ['पेशा आबश्यक छ'],
            'form.partners.*.father_name.required' => ['बुवाको नाम आबश्यक छ'],
            'form.partners.*.grandfather_name.required' => ['बजेको नाम आबश्यक छ'],
            'form.partners.*.photo.required' => ['फोटो आबश्यक छ'],
            'form.partners.*.citizenship_front.required' => ['नागरिकता (अगाडि) आबश्यक छ'],
            'form.partners.*.citizenship_back.required' => ['नागरिकता (पछाडी) आबश्यक छ'],
            'form.partners.*.position.required' => ['मर्यादाक्रम आबश्यक छ'],
            'form.partners.*.province_id.required' => ['प्रदेश आबश्यक छ'],
            'form.partners.*.district_id.required' => ['जिल्ला आबश्यक छ'],
            'form.partners.*.issue_district_id.required' => ['नागरिकता जारी जिल्ला आबश्यक छ'],
            'form.partners.*.local_body_id.required' => ['पालिका आबश्यक छ'],
            'form.partners.*.ward_no.required' => ['वार्ड नं आबश्यक छ'],
            'form.partners.*.way.required' => ['मार्ग आबश्यक छ'],
            'form.partners.*.tole.required' => ['टोल आबश्यक छ'],
            'form.application_date.required' => ['आवेदन मिति बि सं आबश्यक छ'],
            'form.other_document' => ['अन्य कागजात आबश्यक छ'],
        ];
    }
}
