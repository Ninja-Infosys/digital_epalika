<?php

namespace Modules\Grant\Http\Livewire;

use App\Models\Address\Province;
use App\Models\Settings\FiscalYear;
use Livewire\Component;
use Modules\Grant\Entities\GrantActivity;
use Modules\Grant\Entities\GrantDetail;
use Modules\Grant\Entities\GrantProgram;
use Modules\Grant\Entities\GrantType;
use Modules\Roaster\Traits\helpers\AddressHelperTrait;

class GrantDetailLivewire extends Component
{
    use AddressHelperTrait;

    public $fiscalYears = [];
    public $grantPrograms = [];
    public $grantTypes = [];
    public $grantActivities = [];
    public $provinces = [];
    public $districts = [];
    public $localBodies = [];
    public $wards=[];

    public array $form = [
        'fiscal_year_id' => null,
        'grant_program_id'=>null,
        'grant_recipient_name'=>null,
        'grant_recipient_code_no'=>null,
        'province_id'=>null,
        'district_id'=>null,
        'local_body_id'=>null,
        'ward_no'=>null,
        'tole'=>null,
        'grant_recipient_type'=>null,
        'grant_type_id'=>null,
        'grant_activity_id'=>null,
        'total_cost'=>null,
        'grant_amount'=>null,
        'investment_amount'=>null,
        'beneficial_area'=>null,
        'contact_person_name'=>null,
        'phone'=>null,
        'is_continuity'=>0,
        'prev_fiscal_year_id'=>null,
        'prev_cost_amount'=>null,
        'beneficial_places'=>null,
        'remarks'=>null
    ];

    public function mount()
    {
        $this->fiscalYears = FiscalYear::all();
        $this->grantTypes=GrantType::all();
        $this->provinces=Province::all();
    }

    protected array $rules=[
        'form.fiscal_year_id'=>['required','exists:fiscal_years,id'],
        'form.grant_program_id'=>['required','exists:grant_programs,id'],
        'form.grant_recipient_name'=>['required'],
        'form.grant_recipient_code_no'=>['required'],
        'form.province_id'=>['required','exists:provinces,id'],
        'form.district_id'=>['required','exists:districts,id'],
        'form.local_body_id'=>['required','exists:local_bodies,id'],
        'form.ward_no'=>['required','integer'],
        'form.tole'=>['nullable'],
        'form.grant_recipient_type'=>['required'],
        'form.grant_type_id'=>['required','exists:grant_types,id'],
        'form.grant_activity_id'=>['required','exists:grant_activities,id'],
        'form.total_cost'=>['required','numeric'],
        'form.grant_amount'=>['required','numeric'],
        'form.investment_amount'=>['required','numeric'],
        'form.beneficial_area'=>['required'],
        'form.contact_person_name'=>['required'],
        'form.phone'=>['required'],
        'form.is_continuity'=>['nullable'],
        'form.prev_fiscal_year_id'=>['required_if:form.is_continuity,1'],
        'form.prev_cost_amount'=>['required_if:form.is_continuity,1'],
        'form.beneficial_places'=>['required'],
        'form.remarks'=>['nullable']
    ];

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function submitFormData()
    {
        GrantDetail::create($this->validate()['form']);

        $this->reset('form','districts','localBodies','wards','grantPrograms','grantActivities');
        $this->dispatchBrowserEvent('alert_message', [
            'type' => "success",
            'title' => "धन्यबाद",
            'text' => "अनुदान विवरण सफलतापूर्वक थपियो",
        ]);
    }

    public function render()
    {
        if (!empty($this->form['fiscal_year_id'])) {
            $this->grantPrograms = GrantProgram::where('fiscal_year_id', $this->form['fiscal_year_id'])->get();
        }

        if(!empty($this->form['grant_recipient_type'])){
            $this->grantActivities=GrantActivity::where('grant_recipient_type',$this->form['grant_recipient_type'])->get();
        }
        $this->getDependentAddressData();

        return view('grant::livewire.grant-detail-livewire');
    }

    public function messages(): array
    {
        return [
            'form.fiscal_year_id.required'=>'आर्थिक वर्ष आवश्यक छ',
            'form.grant_program_id.required'=>'अनुदान कार्यक्रम आवश्यक छ',
            'form.grant_recipient_name.required'=>'अनुदान प्राप्तकर्ता नाम आवश्यक छ',
            'form.grant_recipient_code_no.required'=>'अनुदान प्राप्तकर्ता कोड नम्बर आवश्यक छ',
            'form.province_id.required'=>'प्रदेश आवश्यक छ',
            'form.district_id.required'=>'जिल्ला आवश्यक छ',
            'form.local_body_id.required'=>'स्थानीय निकाय आवश्यक छ',
            'form.ward_no.required'=>'वार्ड नम्बर आवश्यक छ',
            'form.grant_recipient_type.required'=>'अनुदान प्राप्तकर्ताको प्रकार आवश्यक छ',
            'form.grant_type_id.required'=>'अनुदान प्रकार आवश्यक छ',
            'form.grant_activity_id.required'=>'अनुदान गतिविधि आवश्यक छ',
            'form.total_cost.required'=>'कुल लागत आवश्यक छ',
            'form.grant_amount.required'=>'अनुदान रकम आवश्यक छ',
            'form.investment_amount.required'=>'लगानी रकम आवश्यक छ',
            'form.beneficial_area.required'=>'लाभदायक क्षेत्र आवश्यक छ',
            'form.contact_person_name.required'=>'सम्पर्क व्यक्तिको नाम आवश्यक छ',
            'form.phone.required'=>'फोन आवश्यक छ',
            'form.prev_fiscal_year_id.required_if'=>'अघिल्लो आर्थिक वर्ष आवश्यक छ',
            'form.prev_cost_amount.required_if'=>'अघिल्लो लागत रकम आवश्यक छ',
            'form.beneficial_places.required'=>'लाभदायक स्थान आवश्यक छ',
        ];
    }
}
