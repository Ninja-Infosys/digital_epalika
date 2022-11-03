<?php

namespace Modules\Grant\Http\Livewire;

use App\Models\Settings\FiscalYear;
use Livewire\Component;
use Modules\Grant\Entities\GrantActivity;
use Modules\Grant\Entities\GrantProgram;
use Modules\Grant\Entities\GrantType;

class GrantDetailLivewire extends Component
{
    public $fiscalYears = [];
    public $grantPrograms = [];
    public $grantTypes = [];
    public $grantActivities = [];

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
        $this->validate();
    }

    public function render()
    {
        if (!empty($this->form['fiscal_year_id'])) {
            $this->grantPrograms = GrantProgram::where('fiscal_year_id', $this->form['fiscal_year_id'])->get();
        }

        if(!empty($this->form['grant_recipient_type'])){
            $this->grantActivities=GrantActivity::where('grant_recipient_type',$this->form['grant_recipient_type'])->get();
        }

        return view('grant::livewire.grant-detail-livewire');
    }
}
