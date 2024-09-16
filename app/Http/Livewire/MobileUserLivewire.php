<?php

namespace App\Http\Livewire;

use App\Models\MobileUser;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class MobileUserLivewire extends Component
{
    use WithFileUploads;

    public $districts = [];
    public $temporaryDistricts = [];


    public $localBodies = [];
    public $temporaryLocalBodies = [];

    public $wards = [];
    public $temporaryWards = [];

    public array $form = [
        'name' => null,
        'email' => null,
        'phone' => null,
        'province_id' => null,
        'district_id' => null,
        'local_body_id' => null,
        'ward_no' => null,
        'tole' => null,
        'temporary_province_id' => null,
        'temporary_district_id' => null,
        'temporary_local_body_id' => null,
        'temporary_ward' => null,
        'temporary_tole' => null,
        'citizenship_no' => null,
        'citizenship_issued_district' => null,
        'citizenship_issued_date' => null,
        'citizenship_front' => null,
        'citizenship_back' => null,
        'is_minor' => 0,
        'gender' => null,
        'birth_registration_no' => null,
    ];

    public function mount()
    {

    }

    public function save()
    {
        $this->validate();
        DB::transaction(function () {
            $mobileUser = MobileUser::create([
                'name' => $this->form['name'] ?? '',
                'email' => $this->form['email'] ?? '',
                'phone' => $this->form['phone'] ?? '',
            ]);

            $mobileUser->mobileUserDetail()->create([
                'province_id' => $this->form['province_id'] ?? '',
                'district_id' => $this->form['district_id'] ?? '',
                'local_body_id' => $this->form['local_body_id'] ?? '',
                'ward_no' => $this->form['ward_no'] ?? '',
                'tole' => $this->form['tole'] ?? '',
                'temporary_province_id' => $this->form['temporary_province_id'] ?? '',
                'temporary_district_id' => $this->form['temporary_district_id'] ?? '',
                'temporary_local_body_id' => $this->form['temporary_local_body_id'] ?? '',
                'temporary_ward' => $this->form['temporary_ward'] ?? '',
                'temporary_tole' => $this->form['temporary_tole'] ?? '',
                'citizenship_no' => $this->form['citizenship_no'] ?? '',
                'citizenship_issued_district' => $this->form['citizenship_issued_district'] ?? '',
                'citizenship_issued_date' => $this->form['citizenship_issued_date'] ?? '',
                'citizenship_front' => $this->form['citizenship_front'] ?? '',
                'citizenship_back' => $this->form['citizenship_back'] ?? '',
                'is_minor' => $this->form['is_minor'] ?? '',
                'gender' => $this->form['gender'] ?? '',
                'birth_registration_no' => $this->form['birth_registration_no'] ?? '',
            ]);
            $this->resetForm();
        });

        return redirect(route('admin.mobileUser.index'));
    }

    public function render()
    {
        if (!empty($this->form['province_id'])) {
            $this->districts = get_districts($this->form['province_id']);
        }
        if (!empty($this->form['district_id'])) {
            $this->localBodies = get_local_bodies($this->form['district_id']);
        }
        if (!empty($this->form['local_body_id'])) {
            $this->wards = get_local_bodies(localBodyId: $this->form['local_body_id'])?->ward_no ?? [];
        }
        if (!empty($this->form['temporary_province_id'])) {
            $this->districts = get_districts($this->form['temporary_province_id']);
        }
        if (!empty($this->form['temporary_district_id'])) {
            $this->localBodies = get_local_bodies($this->form['temporary_district_id']);
        }
        if (!empty($this->form['temporary_local_body_id'])) {
            $this->wards = get_local_bodies(localBodyId: $this->form['temporary_local_body_id'])?->ward_no ?? [];
        }
        return view('livewire.mobile-user-livewire');
    }

    protected array $rules = [
        'form.name' => ['required'],
        'form.email' => ['required'],
        'form.phone' => ['required'],
        'form.province_id' => ['required', 'exists:provinces,id'],
        'form.district_id' => ['required', 'exists:districts,id'],
        'form.local_body_id' => ['required', 'exists:local_bodies,id'],
        'form.ward_no' => ['required'],
        'form.tole' => ['required'],
        'form.temporary_province_id' => ['required', 'exists:provinces,id'],
        'form.temporary_district_id' => ['required', 'exists:districts,id'],
        'form.temporary_local_body_id' => ['required', 'exists:local_bodies,id'],
        'form.temporary_ward' => ['required'],
        'form.temporary_tole' => ['required'],
        'form.citizenship_no' => ['required_if:form.is_minor,0'],
        'form.citizenship_issued_district' => ['required_if:form.is_minor,0'],
        'form.citizenship_issued_date' => ['required_if:form.is_minor,0'],
        'form.citizenship_front' => ['required_if:form.is_minor,0'],
        'form.citizenship_back' => ['required_if:form.is_minor,0'],
        'form.is_minor' => ['required'],
        'form.gender' => ['required'],
        'form.birth_registration_no' => ['required_if:form.is_minor,1'],
    ];

    private function resetForm()
    {
        $this->reset(
            'form',
            'districts',
            'temporaryDistricts',
            'localBodies',
            'temporaryLocalBodies',
            'wards',
            'temporaryWards'
        );
    }
}
