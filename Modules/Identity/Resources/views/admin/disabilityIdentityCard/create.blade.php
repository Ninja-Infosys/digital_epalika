@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('identity.admin.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">अपाङ्गता परिचय पत्र</li>
                    </ol>
                </div>
                <h4 class="page-title"> अपाङ्गता परिचय पत्र</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नयाँ अपाङ्गता परिचय पत्र थप्नुहोस्</h4>
                        <div>
                            <a href="{{route('identity.admin.disabilityIdentityCard.index')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-list"></i> अपाङ्गता परिचय पत्र सुची
                            </a>
                        </div>


                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('identity.admin.disabilityIdentityCard.store')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="card mt-3">
                            <fieldset>
                                <legend>अपाङ्गता भएको व्यक्तिको विवरण</legend>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="photo" class="form-label">फोटो</label>
                                        <input
                                            name="photo"
                                            accept="image/*"
                                            class="form-control @error('photo') is-invalid @enderror"
                                            type="file"
                                            id="photo"
                                        />
                                        @error('photo')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="name" class="form-label">पुरा नाम नेपालीमा</label>
                                        <input
                                            name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            type="text"
                                            id="name"
                                            placeholder="पुरा नाम नेपालीमा"
                                            value="{{old('name')}}"
                                            required
                                        />
                                        @error('name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="name_en" class="form-label">पुरा नाम (English)</label>
                                        <input
                                            name="name_en"
                                            class="form-control @error('name_en') is-invalid @enderror"
                                            type="text"
                                            id="name_en"
                                            value="{{old('name_en')}}"
                                            placeholder="पुरा नाम (English)"
                                            required
                                        />
                                        @error('name_en')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="gender" class="form-label">लिङ्ग</label>
                                        <select
                                            class="form-select @error('gender') is-invalid @enderror"
                                            name="gender" id="gender" required>
                                            <option value="">---लिङ्ग छान्नुहोस् ---</option>
                                            @foreach(\App\Enums\Gender::cases() as $gender)
                                                <option
                                                    value="{{$gender->value}}"
                                                    {{old('gender') == $gender->value ? "selected" : ""}}>{{$gender->label()}}</option>
                                            @endforeach
                                        </select>
                                        @error('gender')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <x-date-input-component
                                            nameNe="dob" labelNe="जन्म मिति (बि.स.) *"
                                            nameEn="dob_ad" labelEn="जन्म मिति (ई.स.)"
                                            :showEnglishDate="true"
                                            disable-after="{{$todayDateInBS}}"
                                            disable-after-Ad="{{today()->toDateString()}}"
                                        />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="disability_type_id" class="form-label">अपांगता</label>
                                        <select
                                            class="form-select @error('disability_type_id') is-invalid @enderror"
                                            name="disability_type_id"
                                            id="disability_type_id" required>
                                            <option value="">---अपांगता छान्नुहोस् ---</option>
                                            @foreach($disabilityTypes as $disabilityType)
                                                <option
                                                    value="{{$disabilityType->id}}"
                                                    {{old('disability_type_id') == $disabilityType->id ? "selected": ""}}>{{$disabilityType->title}}</option>
                                            @endforeach
                                        </select>
                                        @error('disability_type_id')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="father_name" class="form-label">बाबुको नाम</label>
                                        <input
                                            name="father_name"
                                            class="form-control @error('father_name') is-invalid @enderror"
                                            type="text"
                                            id="father_name"
                                            placeholder="बाबुको नाम"
                                            value="{{old('father_name')}}" required
                                        />
                                        @error('father_name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="father_name_en" class="form-label">बाबुको नाम (English)</label>
                                        <input
                                            name="father_name_en"
                                            class="form-control @error('father_name_en') is-invalid @enderror"
                                            type="text"
                                            id="father_name_en"
                                            placeholder="बाबुको नाम (English)"
                                            value="{{old('father_name_en')}}" required
                                        />
                                        @error('father_name_en')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="mother_name" class="form-label">आमाको नाम</label>
                                        <input
                                            name="mother_name"
                                            class="form-control @error('mother_name') is-invalid @enderror"
                                            type="text"
                                            id="mother_name"
                                            placeholder="आमाको नाम"
                                            value="{{old('mother_name')}}" required
                                        />
                                        @error('mother_name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="mother_name_en" class="form-label">आमाको नाम (English)</label>
                                        <input
                                            name="mother_name_en"
                                            class="form-control @error('mother_name_en') is-invalid @enderror"
                                            type="text"
                                            id="mother_name_en"
                                            placeholder="आमाको नाम (English)"
                                            value="{{old('mother_name_en')}}" required
                                        />
                                        @error('mother_name_en')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="mt-3">
                                <legend> ठेगाना</legend>
                                @livewire('address',['address' =>
                                [
                                    'province_id' => old('province_id', $officeSetting->province_id),
                                    'district_id' => old('district_id', $officeSetting->district_id),
                                    'local_body_id' => old('local_body_id', $officeSetting->local_body_id),
                                    'ward_no' => old('ward_no', $officeSetting->ward_no),
                                ]])
                                <div class="col-md-12 mb-3">
                                    <label for="tole" class="form-label">टोल</label>
                                    <input
                                        name="tole"
                                        class="form-control  @error('tole') is-invalid @enderror"
                                        type="text"
                                        id="tole"
                                        placeholder="टोल"
                                        value="{{old('tole')}}" required
                                    />
                                    @error('tole')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </fieldset>
                            <fieldset class="mt-3">
                                <legend>कागजात विवरण</legend>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="citizenship_no" class="form-label">नागरिकता नं.</label>
                                        <input
                                            class="form-control   @error('citizenship_no') is-invalid @enderror"
                                            type="text"
                                            id="citizenship_no"
                                            name="citizenship_no"
                                            value="{{old('citizenship_no', request()->get('citizenship_no'))}}"
                                            placeholder="नागरिकता नं."
                                            required
                                            {{ request()->has('birth_registration_no') || request()->has('citizenship_no') ? "readonly" : ""}}
                                        />
                                        @error('citizenship_no')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="birth_registration_no" class="form-label">जन्म दर्ता
                                            नं.</label>
                                        <input
                                            class="form-control   @error('birth_registration_no') is-invalid @enderror"
                                            type="text"
                                            id="birth_registration_no"
                                            name="birth_registration_no"
                                            value="{{old('birth_registration_no', request()->get('birth_registration_no'))}}"
                                            placeholder="जन्म दर्ता नं."
                                            required
                                            {{ request()->has('birth_registration_no') || request()->has('citizenship_no')  ? "readonly" : ""}}
                                        />
                                        @error('birth_registration_no')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="mt-3">
                                <legend>परिवारको सदस्य वा संरक्षकको</legend>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="guardian_name" class="form-label">संरक्षकको नाम</label>
                                        <input
                                            name="guardian_name"
                                            class="form-control  @error('guardian_name') is-invalid @enderror"
                                            type="text"
                                            id="guardian_name"
                                            placeholder="संरक्षकको नाम"
                                            value="{{old('guardian_name')}}"
                                            required
                                        />
                                        @error('guardian_name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="guardian_name_en" class="form-label">संरक्षकको नाम
                                            (English)</label>
                                        <input
                                            name="guardian_name_en"
                                            class="form-control  @error('guardian_name_en') is-invalid @enderror"
                                            type="text"
                                            id="guardian_name_en"
                                            placeholder="संरक्षकको नाम (English)"
                                            value="{{old('guardian_name_en')}}"
                                            required
                                        />
                                        @error('guardian_name_en')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="relationship_id" class="form-label">नाता</label>
                                        <select
                                            class="form-select @error('relationship_id') is-invalid @enderror"
                                            name="relationship_id" id="relationship_id" required>
                                            <option value="">---नाता छान्नुहोस् ---</option>
                                            @foreach($relations as $relation)
                                                <option
                                                    value="{{$relation->id}}"
                                                    {{old("relationship_id"==$relation->id) ? "selected": ""}}>{{$relation->title}}</option>
                                            @endforeach
                                        </select>
                                        @error('relationship_id')
                                        <div class="invalid-feedback ">{{$message}} </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">टेलिफोन वा मोबाईल नं.</label>
                                        <input
                                            name="phone"
                                            class="form-control  @error('phone') is-invalid @enderror"
                                            type="text"
                                            id="phone"
                                            placeholder="टेलिफोन वा मोबाईल नं."
                                            value="{{old('phone')}}"
                                            required
                                        />
                                        @error('phone')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                            <div class="d-flex justify-content-end mt-2">

                                <button type="submit" class="btn btn-primary">
                                    पेश गर्नुहोस
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('style')
        <style>
            legend {
                background-color: gray;
                color: white;
                padding: 5px 10px;
                border-radius: 5px;
            }

            fieldset {
                border-radius: 5px;
            }
        </style>
    @endpush
@endsection


