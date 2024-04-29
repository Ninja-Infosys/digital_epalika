<form wire:submit.prevent="save">
    @csrf
    <div class="row">

        <div class="col-md-6 mb-2">
            <label for="name" class="form-label"> नाम *</label>
            <input
                type="text"
                name="name"
                wire:model='form.name'
                class="form-control @error('form.name') is-invalid @enderror"
                id="name"
                placeholder="नाम"
            />
            @error('form.name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-2">
            <label for="email" class="form-label"> इमेल *</label>
            <input
                type="email"
                name="email"
                wire:model='form.email'
                class="form-control @error('form.email') is-invalid @enderror"
                id="email"
                placeholder=" इमेल"
            />
            @error('form.email')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-2">
            <label for="phone" class="form-label"> फोन *</label>
            <input
                type="text"
                name="phone"
                wire:model='form.phone'
                class="form-control @error('form.phone') is-invalid @enderror"
                id="phone"
                placeholder=" फोन"
            />
            @error('form.phone')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-2">
            <label for="form.gender" class="form-label">लिङ्ग
                <span class="text-danger">*</span>
            </label>
            <select
                class="form-select @error('form.gender') is-invalid @enderror"
                id="form.gender"
                wire:model="form.gender">
                <option value="">---छान्नुहोस् ----</option>
                @foreach (\App\Enums\Gender::cases() as $case)
                    <option value="{{ $case->value ?? '' }}">{{ $case->label() ?? '' }}</option>
                @endforeach
            </select>
            @error("form.gender")
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-2">
            <label for="province_id" class="form-label">प्रदेश *</label>
            <select
                name="province_id"
                wire:model='form.province_id'
                class="form-control @error('form.province_id') is-invalid @enderror"
                id="province_id"
            >
                <option value="">प्रदेश छान्नुहोस्</option>
                @foreach(get_provinces() as $province)
                    <option value="{{ $province?->id ?? '' }}">{{ $province?->province ?? '' }}</option>
                @endforeach
            </select>
            @error('form.province_id')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-2">
            <label for="district_id" class="form-label">जिल्ला *</label>
            <select
                name="district_id"
                wire:model='form.district_id'
                class="form-control @error('form.district_id') is-invalid @enderror"
                id="district_id"
            >
                <option value="">जिल्ला छान्नुहोस्</option>
                @foreach($districts as $district)
                    <option value="{{ $district->id ?? ''}}">{{ $district->district ?? '' }}</option>
                @endforeach
            </select>
            @error('form.district_id')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-2">
            <label for="local_body_id" class="form-label">स्थानीय तह *</label>
            <select
                name="local_body_id"
                wire:model='form.local_body_id'
                class="form-control @error('form.local_body_id') is-invalid @enderror"
                id="local_body_id"
            >
                <option value="">स्थानीय तह छान्नुहोस्</option>
                @foreach($localBodies as $localBody)
                    <option value="{{ $localBody->id ?? '' }}">{{ $localBody->local_body ?? '' }}</option>
                @endforeach
            </select>
            @error('form.local_body_id')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-2">
            <label for="ward_no" class="form-label">वार्ड नं *</label>
            <select
                name="ward_no"
                wire:model='form.ward_no'
                class="form-control @error('form.ward_no') is-invalid @enderror"
                id="ward_no"
            >
                <option value="">वार्ड नं छान्नुहोस्</option>
                @foreach($wards as $ward)
                    <option value="{{ $ward }}">{{ get_nepali_number($ward) }}</option>
                @endforeach
            </select>
            @error('form.ward_no')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-2">
            <label for="tole" class="form-label">टोल/गाउँ *</label>
            <input
                type="text"
                name="tole"
                wire:model='form.tole'
                class="form-control @error('form.tole') is-invalid @enderror"
                id="tole"
                placeholder="टोल/गाउँ"
            />
            @error('form.tole')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-2">
            <label for="temporary_province_id" class="form-label">अस्थायी प्रदेश *</label>
            <select
                name="temporary_province_id"
                wire:model='form.temporary_province_id'
                class="form-control @error('form.temporary_province_id') is-invalid @enderror"
                id="temporary_province_id"
            >
                <option value="">प्रदेश छान्नुहोस्</option>
                @foreach(get_provinces() as $province)

                    <option value="{{ $province?->id ?? '' }}">{{ $province?->province ?? '' }}</option>
                @endforeach
            </select>
            @error('form.temporary_province_id')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-2">
            <label for="temporary_district_id" class="form-label">अस्थायी जिल्ला *</label>
            <select
                name="temporary_district_id"
                wire:model='form.temporary_district_id'
                class="form-control @error('form.temporary_district_id') is-invalid @enderror"
                id="temporary_district_id"
            >
                <option value="">जिल्ला छान्नुहोस्</option>
                @foreach($districts as $district)
                    <option value="{{ $district->id ?? ''}}">{{ $district->district ?? '' }}</option>
                @endforeach
            </select>
            @error('form.temporary_district_id')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-2">
            <label for="temporary_local_body_id" class="form-label">अस्थायी स्थानीय तह *</label>
            <select
                name="temporary_local_body_id"
                wire:model='form.temporary_local_body_id'
                class="form-control @error('form.temporary_local_body_id') is-invalid @enderror"
                id="temporary_local_body_id"
            >
                <option value="">स्थानीय तह छान्नुहोस्</option>
                @foreach($localBodies as $localBody)
                    <option value="{{ $localBody->id ?? '' }}">{{ $localBody->local_body ?? '' }}</option>
                @endforeach
            </select>
            @error('form.temporary_local_body_id')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-2">
            <label for="temporary_ward" class="form-label">अस्थायी वार्ड नं *</label>
            <select
                name="temporary_ward"
                wire:model='form.temporary_ward'
                class="form-control @error('form.temporary_ward') is-invalid @enderror"
                id="temporary_ward"
            >
                <option value="">वार्ड नं छान्नुहोस्</option>
                @foreach($wards as $ward)
                    <option value="{{ $ward }}">{{ get_nepali_number($ward) }}</option>
                @endforeach
            </select>
            @error('form.temporary_ward')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-2">
            <label for="temporary_tole" class="form-label">अस्थायी टोल/गाउँ *</label>
            <input
                type="text"
                name="temporary_tole"
                wire:model='form.temporary_tole'
                class="form-control @error('form.temporary_tole') is-invalid @enderror"
                id="temporary_tole"
                placeholder="अस्थायी टोल/गाउँ"
            />
            @error('form.temporary_tole')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-2">
            <label for="is_minor" class="form-label">के तपाईं नाबालक हुनुहुन्छ? *</label>
            <select
                name="is_minor"
                wire:model='form.is_minor'
                class="form-control @error('form.is_minor') is-invalid @enderror"
                id="is_minor"
            >
                <option value="1">हो</option>
                <option value="0">होइन</option>
            </select>
            @error('form.is_minor')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        @if($form['is_minor'] == 1)
            <div class="col-md-6 mb-2">
                <label for="birth_registration_no" class="form-label">जन्म दर्ता नं *</label>
                <input
                    type="text"
                    name="birth_registration_no"
                    wire:model='form.birth_registration_no'
                    class="form-control @error('form.birth_registration_no') is-invalid @enderror"
                    id="birth_registration_no"
                    placeholder="जन्म दर्ता नं"
                />
                @error('form.birth_registration_no')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        @else

            <div class="col-md-6 mb-2">
                <label for="citizenship_no" class="form-label">नागरिकता प्रमाण पत्र नं *</label>
                <input
                    type="text"
                    name="citizenship_no"
                    wire:model='form.citizenship_no'
                    class="form-control @error('form.citizenship_no') is-invalid @enderror"
                    id="citizenship_no"
                    placeholder="नागरिकता प्रमाण पत्र नं"
                />
                @error('form.citizenship_no')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-2">
                <label for="citizenship_issued_district" class="form-label">नागरिकता प्रमाण पत्र जारी गरिएको जिल्ला
                    *</label>
                <select
                    type="text"
                    name="citizenship_issued_district"
                    wire:model='form.citizenship_issued_district'
                    class="form-control @error('form.citizenship_issued_district') is-invalid @enderror"
                    id="citizenship_issued_district"
                    placeholder="नागरिकता प्रमाण पत्र जारी गरिएको जिल्ला"
                >
                    <option value="">जिल्ला छान्नुहोस्</option>
                    @foreach(get_districts() as $citizenshipDistrict)
                        <option
                            value="{{ $citizenshipDistrict->id ?? ''}}">{{ $citizenshipDistrict?->district ?? '' }}</option>
                    @endforeach


                </select>
                @error('form.citizenship_issued_district')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-2">
                <label for="citizenship_issued_date" class="form-label">नागरिकता प्रमाण पत्र जारी मिति *</label>
                <input
                    type="date"
                    name="citizenship_issued_date"
                    wire:model='form.citizenship_issued_date'
                    class="form-control @error('form.citizenship_issued_date') is-invalid @enderror"
                    id="citizenship_issued_date"
                />
                @error('form.citizenship_issued_date')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-2">
                <label for="citizenship_front" class="form-label">नागरिकता प्रमाण पत्रको आगाडीको फोटो *</label>
                <input
                    type="file"
                    name="citizenship_front"
                    wire:model='form.citizenship_front'
                    class="form-control @error('form.citizenship_front') is-invalid @enderror"
                    id="citizenship_front"
                />
                <div wire:loading wire:target="form.citizenship_front">Uploading...</div>
                @error('form.citizenship_front')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>


            <div class="col-md-6 mb-2">
                <label for="citizenship_back" class="form-label">नागरिकता प्रमाण पत्रको पछाडीको फोटो *</label>
                <input
                    type="file"
                    name="citizenship_back"
                    wire:model='form.citizenship_back'
                    class="form-control @error('form.citizenship_back') is-invalid @enderror"
                    id="citizenship_back"
                />
                <div wire:loading wire:target="form.citizenship_back">Uploading...</div>
                @error('form.citizenship_back')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        @endif


    </div>

    <button type="submit" class="btn btn-primary">
        Save
    </button>
</form>

