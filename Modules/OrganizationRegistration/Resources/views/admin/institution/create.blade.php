@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.organizationRegistration.institution.index')}}">संस्थाहरू</a>
                        </li>
                        <li class="breadcrumb-item active">संस्था थप्नुहोस</li>
                    </ol>
                </div>
                <h4 class="page-title">संस्था थप्नुहोस</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">संस्था थप्नुहोस</h4>
                        <a href="{{route('admin.organizationRegistration.institution.index')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> संस्थाको सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.organizationRegistration.institution.store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong>सबै दर्ता भएका संस्थाहरु</strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <x-date-input-component
                                        nameNe="officer_citizenship_issue_date" labelNe="ना.जारी मिति:  *"
                                        nameEn="officer_citizenship_issue_date_en" labelEn="Citizenship Issued Date:"
                                    />

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">संस्थाको नाम *</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               required="" name="name" id="name"
                                               value="{{old('name')}}" placeholder="संस्थाको नाम">
                                        @error('name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                                    @livewire('address',['address' => [
                                    'province_id' => $officeSetting->province_id ?? null,
                                    'district_id' => $officeSetting->district_id ?? null,
                                    'local_body_id' => $officeSetting->local_body_id ?? null,
                                    'ward_no' => $officeSetting->ward_no ?? null,
                                    ]])
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="institution_address">संस्थाको ठेगाना</label>
                                        <input type="text" class="form-control" name="institution_address"
                                               id="institution_address"
                                               value="{{old('institution_address')}}" placeholder="संस्थाको ठेगाना">
                                        @error('institution_address')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="contact_no">संस्थाको सम्पर्क नं. <sup
                                                class="text-danger">*required</sup> </label>
                                        <input type="number" class="form-control" name="contact_no" id="contact_no"
                                               value="{{old('contact_no')}}" placeholder="संस्थाको सम्पर्क नं.">
                                        @error('contact_no')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="email">संस्थाको इमेल
                                        </label>
                                        <input type="email" class="form-control" name="email" id="email"
                                               value="{{old('email')}}" placeholder="संस्थाको इमेल">
                                        @error('email')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="dao_registration_no">जिल्ला प्रशासन कार्यालय दर्ता नं. </label>
                                        <input type="number" class="form-control" name="dao_registration_no"
                                               id="dao_registration_no"
                                               value="{{old('dao_registration_no')}}"
                                               placeholder="जिल्ला प्रशासन कार्यालय दर्ता नं.">
                                        @error('dao_registration_no')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <x-date-input-component
                                        nameNe="dao_registration_date" labelNe="जिल्ला प्रशासन कार्यालय दर्ता मिति:  *"
                                        nameEn="dao_registration_date_en"
                                        labelEn="District Administration Office Registration Date:"
                                    />

                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="swc_registration_no">समाज कल्याण परिषद् दर्ता नं. </label>
                                        <input type="number" class="form-control" name="swc_registration_no"
                                               id="swc_registration_no"
                                               value="{{old('swc_registration_no')}}"
                                               placeholder="समाज कल्याण परिषद् दर्ता नं.">
                                        @error('swc_registration_no')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <x-date-input-component
                                        nameNe="swc_registration_date" labelNe="समाज कल्याण परिषद् दर्ता मिति:  *"
                                        nameEn="swc_registration_date_en"
                                        labelEn="Social Welfare Council Registration Committee:"
                                    ></x-date-input-component>

                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="pan_vat">आन्तरिक राजस्व कार्यालय PAN/VAT नं. </label>
                                        <input type="text" class="form-control" name="pan_vat"
                                               id="pan_vat"
                                               value="{{old('pan_vat')}}"
                                               placeholder="आन्तरिक राजस्व कार्यालय PAN/VAT नं. ">
                                        @error('pan_vat')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label for="objective">संस्थाको मुख्य उद्देश्य<sup
                                                class="text-danger">*required</sup> </label>
                                        <textarea class="form-control" name="objective"
                                                  id="objective" cols="10" rows="2"></textarea>
                                        @error('objective')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label for="area">संस्थाको कार्य क्षेत्र <sup
                                                class="text-danger">*required</sup></label>
                                        <textarea class="form-control" name="area"
                                                  id="area" cols="10" rows="2"></textarea>
                                        @error('area')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </fieldset>
                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong>संस्थाको कागजातहरू</strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="minute">माइनुट (Minute) अपलोड गर्नुहोस<sup
                                                class="text-danger">*required</sup></label>
                                        <input type="file" class="form-control" name="minute"
                                               id="minute"
                                               >
                                        @error('minute')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="application">निवेदन अपलोड गर्नुहोस<sup
                                                class="text-danger">*required</sup></label>
                                        <input type="file" class="form-control" name="application"
                                               id="application"
                                               >
                                        @error('application')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="Legislation">विधान अपलोड गर्नुहोस<sup
                                                class="text-danger">*required</sup></label>
                                        <input type="file" class="form-control" name="Legislation"
                                               id="Legislation"
                                        >
                                        @error('Legislation')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="Ward_recommendation">वार्डको सिफारिस<sup
                                                class="text-danger">*required</sup></label>
                                        <input type="file" class="form-control" name="Ward_recommendation"
                                               id="Ward_recommendation"
                                        >
                                        @error('Ward_recommendation')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="stamp">संस्थाको छाप <sup
                                                class="text-danger">*required</sup></label>
                                        <input type="file" class="form-control" name="stamp"
                                               id="stamp"
                                        >
                                        @error('stamp')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="row">
                            <fieldset class="border p-2 mb-2">
                                <legend class="font-16 text-info">
                                    <strong>संस्थाको संचालक पदाधिकारीको विवरण</strong>
                                </legend>
                                @livewire('organizationregistration::institution-livewire')
                            </fieldset>
                        </div>

                        <fieldset class="border p-2 mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="proposed_person">प्रस्तावित गर्ने <sup
                                                class="text-danger">*required</sup></label>
                                        <input type="text" class="form-control" name="proposed_person"
                                               id="proposed_person"
                                               value="{{old('proposed_person')}}" placeholder="प्रस्तावित गर्ने ">
                                        @error('proposed_person')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="supervisor_person">निरीक्षक गर्ने <sup
                                                class="text-danger">*required</sup></label>
                                        <input type="text" class="form-control" name="supervisor_person"
                                               id="supervisor_person"
                                               value="{{old('supervisor_person')}}" placeholder="निरीक्षक गर्ने ">
                                        @error('supervisor_person')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="approval_person">प्रमाणित गर्ने <sup
                                                class="text-danger">*required</sup></label>
                                        <input type="text" class="form-control" name="approval_person"
                                               id="approval_person"
                                               value="{{old('approval_person')}}" placeholder="प्रमाणित गर्ने ">
                                        @error('approval_person')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="proposed_person_designation">प्रस्तावित गर्नेको पद <sup class="text-danger">*required</sup></label>
                                        <input type="text" class="form-control" name="proposed_person_designation"
                                               id="proposed_person_designation"
                                               value="{{old('proposed_person_designation')}}" placeholder="प्रस्तावित गर्नेको पद">
                                        @error('proposed_person_designation')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="supervisor_person_designation">निरीक्षण गर्नेको पद <sup class="text-danger">*required</sup></label>
                                        <input type="text" class="form-control" name="supervisor_person_designation"
                                               id="supervisor_person_designation"
                                               value="{{old('supervisor_person_designation')}}" placeholder="प्रमाणित गर्नेको पद  ">
                                        @error('supervisor_person_designation')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="approval_person_designation">प्रमाणित गर्नेको पद <sup class="text-danger">*required</sup></label>
                                        <input type="text" class="form-control" name="approval_person_designation"
                                               id="approval_person_designation"
                                               value="{{old('approval_person_designation')}}" placeholder="प्रमाणित गर्नेको पद ">
                                        @error('approval_person_designation')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

