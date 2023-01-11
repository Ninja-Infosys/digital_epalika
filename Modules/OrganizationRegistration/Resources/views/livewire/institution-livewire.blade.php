<form wire:click.prevent="submitFormData">
    <fieldset class="border p-2 mb-2">
        <legend class="font-16 text-info">
            <strong>सबै दर्ता भएका संस्थाहरु</strong>
        </legend>
        <div class="row">
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="registration_date">दर्ता मिति * <sup> <span class="text-danger">BS</span></sup> </label>
                    <input type="text"
                           wire:model="form.registration_date"
                           class="form-control @error('form.registration_date') is-invalid @enderror"
                           required="" name="registration_date" id="registration_date"
                           value="{{old('form.registration_date')}}" placeholder="दर्ता मिति: २०७९-१०-०१">
                    @error('form.registration_date')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="registration_date_en">दर्ता मिति * <sup> <span class="text-danger">Ad</span></sup>
                    </label>
                    <input type="text"
                           wire:model="form.registration_date_en"
                           class="form-control @error('registration_date_en') is-invalid @enderror"
                           required="" name="registration_date_en" id="registration_date_en"
                           value="{{old('form.registration_date_en')}}" placeholder="दर्ता मिति: 2023-01-10">
                    @error('form.registration_date_en')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="name">संस्थाको नाम *</label>
                    <input type="text"
                           wire:model="form.name"
                           class="form-control @error('name') is-invalid @enderror"
                           required="" name="name" id="name"
                           value="{{old('form.name')}}" placeholder="संस्थाको नाम">
                    @error('form.name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="institution_address">संस्थाको ठेगाना</label>
                    <input type="text"
                           wire:model="form.institution_address"
                           class="form-control" name="institution_address"
                           id="institution_address"
                           value="{{old('form.institution_address')}}" placeholder="संस्थाको ठेगाना">
                    @error('form.institution_address')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="province_id" class="form-label">प्रदेश छान्नुहोस्: *</label>
                    <select
                        wire:model="form.province_id"
                        name="province_id"
                        id="province_id"
                        class="form-select @error('form.province_id') is-invalid @enderror"
                    >
                        <option value="">---प्रदेश छान्नुहोस्---</option>
                        @foreach($provinces as $province)
                            <option value="{{$province->id}}">{{$province->province}}</option>
                        @endforeach
                    </select>
                    @error('form.province_id')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="district_id" class="form-label">जिल्ला छान्नुहोस्: *</label>
                    <select
                        wire:model="form.district_id"
                        name="district_id"
                        id="district_id"
                        class="form-select @error('form.district_id') is-invalid @enderror"
                    >
                        <option value="">---जिल्ला छान्नुहोस्---</option>
                        @foreach($districts as $district)
                            <option value="{{$district->id}}">{{$district->district}}</option>
                        @endforeach
                    </select>
                    @error('form.district_id')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="local_body_id" class="form-label">स्थानीय तह छान्नुहोस्: *</label>
                    <select
                        wire:model="form.local_body_id"
                        name="local_body_id"
                        id="local_body_id"
                        class="form-select @error('form.local_body_id') is-invalid @enderror"
                    >
                        <option value="">---स्थानीय तह छान्नुहोस्---</option>
                        @foreach($localBodies as $localBody)
                            <option value="{{$localBody->id}}">{{$localBody->local_body}}</option>
                        @endforeach
                    </select>
                    @error('form.local_body_id')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="ward_no" class="form-label">वार्ड छान्नुहोस्: *</label>
                    <select
                        wire:model="form.ward_no"
                        name="ward_no"
                        id="ward_no"
                        class="form-select @error('form.ward_no') is-invalid @enderror"
                    >
                        <option value="">---वार्ड छान्नुहोस्---</option>
                        @foreach($wards as $key=>$ward_no)
                            <option value="{{$ward_no}}">{{$ward_no}}</option>
                        @endforeach
                    </select>
                    @error('form.ward_no')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="contact_no">संस्थाको सम्पर्क नं.*</label>
                    <input type="number"
                           wire:model="form.contact_no"
                           class="form-control" name="contact_no" id="contact_no"
                           value="{{old('form.contact_no')}}" placeholder="संस्थाको सम्पर्क नं.">
                    @error('form.contact_no')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="email">संस्थाको इमेल
                    </label>
                    <input type="email"
                           wire:model="form.email"
                           class="form-control" name="email" id="email"
                           value="{{old('form.email')}}" placeholder="संस्थाको इमेल">
                    @error('form.email')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="dao_registration_no">जिल्ला प्रशासन कार्यालय दर्ता नं. </label>
                    <input type="number"
                           wire:model="form.dao_registration_no"
                           class="form-control" name="dao_registration_no"
                           id="dao_registration_no"
                           value="{{old('form.dao_registration_no')}}"
                           placeholder="जिल्ला प्रशासन कार्यालय दर्ता नं.">
                    @error('form.dao_registration_no')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <label for="dao_registration_date" class="form-label">जिल्ला प्रशासन कार्यालय दर्ता मिति: * <sup><span
                            class="text-danger">BS</span></sup></label>
                <input type="text"
                       wire:model="form.dao_registration_date"
                       class="form-control @error('form.dao_registration_date') is-invalid @enderror"
                       name="registration_date"
                       id="registration_date"
                       value="{{old('form.registration_date')}}"
                       placeholder="जिल्ला प्रशासन कार्यालय दर्ता मिति: २०७९-१०-०१"
                >
                @error('form.dao_registration_date')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror

            </div>
            <div class="col-md-4 mb-2">
                <label for="dao_registration_date_en" class="form-label">जिल्ला प्रशासन कार्यालय दर्ता मिति: *
                    <sup><span class="text-danger">AD</span></sup></label>
                <input type="text"
                       wire:model="form.dao_registration_date_en"
                       class="form-control @error('form.dao_registration_date_en') is-invalid @enderror"
                       name="registration_date_en"
                       id="registration_date_en"
                       value="{{old('form.registration_date_en')}}"
                       placeholder="जिल्ला प्रशासन कार्यालय दर्ता मिति: 2023-01-10"
                >
                @error('form.dao_registration_date_en')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror

            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="swc_registration_no">समाज कल्याण परिषद् दर्ता नं. </label>
                    <input type="number"
                           wire:model="form.swc_registration_no"
                           class="form-control" name="swc_registration_no"
                           id="swc_registration_no"
                           value="{{old('form.swc_registration_no')}}"
                           placeholder="समाज कल्याण परिषद् दर्ता नं.">
                    @error('form.swc_registration_no')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <label for="swc_registration_date" class="form-label">समाज कल्याण परिषद् दर्ता मिति: <sup><span
                            class="text-danger">BS</span></sup></label>
                <input type="text"
                       wire:model="form.swc_registration_date"
                       name="swc_registration_date"
                       class="form-control @error('form.swc_registration_date') is-invalid @enderror"
                       id="swc_registration_date"
                       value="{{old('form.swc_registration_date')}}"
                       placeholder="समाज कल्याण परिषद् दर्ता मिति: २०७९-१०-०१"
                >
                @error('form.swc_registration_date')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-2">
                <label for="swc_registration_date_en" class="form-label">समाज कल्याण परिषद् दर्ता मिति: <sup><span
                            class="text-danger">AD</span></sup></label>
                <input type="text"
                       wire:model="form.swc_registration_date_en"
                       name="swc_registration_date_en"
                       class="form-control @error('form.swc_registration_date_en') is-invalid @enderror"
                       id="swc_registration_date_en"
                       value="{{old('form.swc_registration_date_en')}}"
                       placeholder="समाज कल्याण परिषद् दर्ता मिति: २०७९-१०-०१"
                >
                @error('form.swc_registration_date_en')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="pan_vat">आन्तरिक राजस्व कार्यालय PAN/VAT नं. </label>
                    <input type="text"
                           wire:model="form.pan_vat"
                           class="form-control @error('form.pan_vat') is-invalid @enderror"
                           name="pan_vat"
                           id="pan_vat"
                           value="{{old('form.pan_vat')}}"
                           placeholder="आन्तरिक राजस्व कार्यालय PAN/VAT नं. ">
                    @error('form.pan_vat')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 mb-2">
                <div class="form-group">
                    <label for="objective">संस्थाको मुख्य उद्देश्य *</label>
                    <textarea class="form-control @error('form.objective') is-invalid @enderror"
                              wire:model="form.objective"
                              name="objective"
                              id="objective" cols="10" rows="2"></textarea>
                    @error('form.objective')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 mb-2">
                <div class="form-group">
                    <label for="area">संस्थाको कार्य क्षेत्र *</label>
                    <textarea class="form-control @error('form.area') is-invalid @enderror"
                              wire:model="form.area"
                              name="area"
                              id="area" cols="10" rows="2"></textarea>
                    @error('form.area')
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
                    <label for="minute">माइनुट (Minute) अपलोड गर्नुहोस *</label>
                    <input type="file"
                           wire:model="form.minute"
                           class="form-control"
                           name="minute"
                           id="minute"
                    >
                    @error('form.minute')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="application">निवेदन अपलोड गर्नुहोस*</label>
                    <input type="file"
                           wire:model="form.application"
                           class="form-control"
                           name="application"
                           id="application"
                    >
                    @error('form.application')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="legislation">विधान अपलोड गर्नुहोस*</label>
                    <input type="file"
                           wire:model="form.legislation"
                           class="form-control"
                           name="legislation"
                           id="legislation"
                    >
                    @error('form.legislation')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="ward_recommendation">वार्डको सिफारिस*</label>
                    <input type="file"
                           wire:model="form.ward_recommendation"
                           class="form-control"
                           name="ward_recommendation"
                           id="ward_recommendation"
                    >
                    @error('form.ward_recommendation')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="stamp">संस्थाको छाप *</label>
                    <input type="file"
                           wire:model="form.stamp"
                           class="form-control"
                           name="stamp"
                           id="stamp"
                    >
                    @error('form.stamp')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>
    </fieldset>


    @foreach($form as $index=>$officer)
        <div class="row">
            <fieldset class="border p-2 mb-2">
                <legend class="font-16 text-info">
                    <strong>साचालक पदाधिकारी</strong>
                </legend>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label for="form.{{$index}}.officer_designation" class="form-label">पद </label>
                        <select
                            name="institutionOfficers[{{$index}}][officer_designation]"
                            wire:model="form.{{$index}}.officer_designation"
                            class="form-select @error('officer_designation') is-invalid @enderror"
                            id="form.{{$index}}.officer_designation">
                            <option value="">पद छान्नुहोस्</option>
                            @foreach(\App\Enums\DesignationTypeEnum::cases() as $type)
                                <option value="{{$type->value}}">
                                    {{$type->label()}}
                                </option>
                            @endforeach
                        </select>
                        @error("form.officer_designation")
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="form.{{$index}}.officer_name" class="form-label">नाम:* </label>
                        <input type="text"
                               name="institutionOfficers[{{$index}}][officer_name]"
                               wire:model="form.{{$index}}.officer_name"
                               class="form-control @error('officer_designation') is-invalid @enderror"
                               id="form.{{$index}}.officer_name">
                        @error('form.{{$index}}.officer_name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="form.{{$index}}.officer_citizenship_no" class="form-label">ना‌.प्र.प.नं.* </label>
                        <input type="text"
                               name="institutionOfficers[{{$index}}][officer_citizenship_no]"
                               wire:model="form.{{$index}}.officer_citizenship_no"
                               class="form-control @error('officer_designation') is-invalid @enderror"
                               id="form.{{$index}}.officer_citizenship_no">
                        @error('form.{{$index}}.officer_citizenship_no')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 md-2">
                        <label for="" class="registration_date">दर्ता मिति: *</label>
                        <input type="text"
                               name="institutionOfficers[{{$index}}][registration_date]"
                               wire:model="form.{{$index}}.registration_date"
                               id="form.{{$index}}.registration_date"
                               class="form-control @error('registration_date')is-invalid @enderror"
                               placeholder="दर्ता मिति"
                        >
                        @error('form.{{$index}}.registration_date')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror

                    </div>
                    <div class="col-md-4 md-2">
                        <label for="" class="registration_date_en">दर्ता मिति: *</label>
                        <input type="text"
                               name="institutionOfficers[{{$index}}][registration_date_en]"
                               wire:model="form.{{$index}}.registration_date_en"
                               id="form.{{$index}}.registration_date_en"
                               class="form-control @error('registration_date')is-invalid @enderror"
                               placeholder="दर्ता मिति"
                        >
                        @error('form.{{$index}}.registration_date_en')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror

                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="form.{{$index}}.officer_citizenship_issue_district" class="form-label">ना. जारी
                            जिल्ला</label>
                        <input type="text"
                               name="institutionOfficers[{{$index}}][officer_citizenship_issue_district]"
                               wire:model="form.{{$index}}.officer_citizenship_issue_district"
                               class="form-control @error('officer_designation') is-invalid @enderror"
                               id="form.{{$index}}.officer_citizenship_issue_district">
                        @error('form.{{$index}}.officer_citizenship_issue_district')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="form.{{$index}}.officer_citizenship_issue_current_address" class="form-label">हालको
                            ठेगाना*</label>
                        <input type="text"
                               name="institutionOfficers[{{$index}}][officer_citizenship_issue_current_address]"
                               wire:model="form.{{$index}}.officer_citizenship_issue_current_address"
                               class="form-control @error('officer_designation') is-invalid @enderror"
                               id="officer_citizenship_issue_current_address">
                        @error('form.{{$index}}.officer_citizenship_issue_current_address')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="form.{{$index}}.officer_contact_detail" class="form-label">सम्पर्क विवरण*</label>
                        <input type="number"
                               name="institutionOfficers[{{$index}}][officer_contact_detail]"
                               wire:model="form.{{$index}}.officer_contact_detail"
                               class="form-control @error('officer_designation') is-invalid @enderror"
                               id="form.{{$index}}.officer_contact_detail">
                        @error('form.{{$index}}.officer_contact_detail')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-11 ">
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="form.{{$index}}.officer_photo" class="form-label">फोटो :</label>
                                <input type="file"
                                       name="institutionOfficers[{{$index}}][officer_photo]"
                                       wire:model="form.{{$index}}.officer_photo"
                                       class="form-control @error('officer_designation') is-invalid @enderror"
                                       id="form.{{$index}}.officer_photo">
                                @error('form.{{$index}}.officer_photo')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="form.{{$index}}.officer_citizenship_front" class="form-label">नागरिकता
                                    (अगाडि)
                                    :</label>
                                <input type="file"
                                       name="institutionOfficers[{{$index}}][officer_citizenship_front]"
                                       wire:model="form.{{$index}}.officer_citizenship_front"
                                       class="form-control @error('officer_designation') is-invalid @enderror"
                                       id="form.{{$index}}.officer_citizenship_front">
                                @error('form.{{$index}}.officer_citizenship_front')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2 ">
                                <div class="">
                                    <label for="form.{{$index}}.officer_citizenship_behind" class="form-label">नागरिकता
                                        (पछाडी)
                                        :</label>
                                    <input type="file"
                                           name="institutionOfficers[{{$index}}][officer_citizenship_behind]"
                                           wire:model="form.{{$index}}.officer_citizenship_behind"
                                           class="form-control @error('officer_designation') is-invalid @enderror"
                                           id="form.{{$index}}.officer_citizenship_behind">
                                    @error('form.{{$index}}.officer_citizenship_behind')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-1">
                        @if($index > 2)
                            <button type="button"
                                    class="mt-3 btn btn-danger btn-sm remove-button"
                                    wire:click.prevent="removeOfficer({{$index}})">X
                            </button>
                        @endif
                    </div>
                </div>
            </fieldset>
        </div>
        <hr>
    @endforeach
    <button type="button" class="btn btn-success btn-sm remove-button" wire:click.prevent="addOfficer()">नँया
        संचालक पदाधिकारी
    </button>

    <fieldset class="border p-2 mb-2">
        <div class="row">
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="proposed_person">प्रस्तावित गर्ने *</label>
                    <input type="text" class="form-control"
                           wire:model="form.proposed_person"
                           name="proposed_person"
                           id="proposed_person"
                           value="{{old('form.proposed_person')}}" placeholder="प्रस्तावित गर्ने ">
                    @error('form.proposed_person')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="supervisor_person">निरीक्षक गर्ने *</label>
                    <input type="text" class="form-control @error('form.supervisor_person') is-invalid @enderror"
                           wire:model="form.supervisor_person"
                           name="supervisor_person"
                           id="supervisor_person"
                           value="{{old('form.supervisor_person')}}" placeholder="निरीक्षक गर्ने ">
                    @error('form.supervisor_person')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="approval_person">प्रमाणित गर्ने *</label>
                    <input type="text" class="form-control @error('form.approval_person') is-invalid @enderror"
                           wire:model="form.approval_person"
                           name="approval_person"
                           id="approval_person"
                           value="{{old('form.approval_person')}}" placeholder="प्रमाणित गर्ने ">
                    @error('form.approval_person')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="proposed_person_designation">प्रस्तावित गर्नेको पद *</label>
                    <input type="text"
                           class="form-control @error('form.proposed_person_designation') is-invalid @enderror"
                           wire:model="form.proposed_person_designation"
                           name="proposed_person_designation"
                           id="proposed_person_designation"
                           value="{{old('form.proposed_person_designation')}}" placeholder="प्रस्तावित गर्नेको पद">
                    @error('form.proposed_person_designation')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="supervisor_person_designation">निरीक्षण गर्नेको पद *</label>
                    <input type="text"
                           class="form-control @error('form.supervisor_person_designation') is-invalid @enderror"
                           wire:model="form.supervisor_person_designation"
                           name="supervisor_person_designation"
                           id="supervisor_person_designation"
                           value="{{old('form.supervisor_person_designation')}}" placeholder="प्रमाणित गर्नेको पद  ">
                    @error('form.supervisor_person_designation')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    <label for="approval_person_designation">प्रमाणित गर्नेको पद *</label>
                    <input type="text"
                           class="form-control @error('form.approval_person_designation') is-invalid @enderror"
                           wire:model="form.approval_person_designation"
                           name="approval_person_designation"
                           id="approval_person_designation"
                           value="{{old('form.approval_person_designation')}}" placeholder="प्रमाणित गर्नेको पद ">
                    @error('form.approval_person_designation')
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
