<form wire:submit.prevent="submitFormData" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="row pb-2">
                <div class="col-md-6">
                    <label for="subject" class="form-label">विषय</label>
                    <input
                        type="text"
                        wire:model="form.subject"
                        class="form-control"
                        id="subject"
                        placeholder="नाता"
                    />
                    @error('form.subject')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="date" class="form-label">मिति</label>
                    <input
                        type="date"
                        wire:model="form.date"
                        class="form-control"
                        id="date"
                        placeholder="मिति"
                    />
                    @error('form.date')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="date" class="form-label">Date</label>
                    <input
                        type="date"
                        wire:model="form.date"
                        class="form-control"
                        id="date"
                        placeholder="Date"
                    />
                    @error('form.date')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-auto">
                    <label for="complaint_detail" class="form-label">उजुरी विवरण</label>
                    <textarea id="complaint_detail"
                              wire:model="form.complaint_detail"
                              class="form-control @error('form.complaint_detail') is-invalid @enderror"
                              cols="100"
                               placeholder="विवरण"></textarea>
                    @error('form.complaint_detail')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <fieldset>
                <legend>
                    <h4 class="text-info">वादीको विवरण</h4>
                </legend>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label for="complainant_province_id" class="form-label">प्रदेश *</label>
                        <select wire:model="form.complainant_province_id" class="form-control"
                                id="complainant_province_id">
                            <option value=""> प्रदेश छान्नुहोस्</option>
                            @foreach($provinces as $province)
                                <option
                                    value="{{$province->id}}">{{$province->province}}</option>
                            @endforeach
                        </select>
                        @error('form.complainant_province_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="complainant_district_id" class="form-label">जिल्ला *</label>
                        <select wire:model="form.complainant_district_id" class="form-control"
                                id="complainant_district_id">
                            <option value="">जिल्ला छान्नुहोस्</option>
                            @foreach($provinces as $province)
                                <option
                                    value="{{$province->id}}">{{$province->province}}</option>
                            @endforeach
                        </select>
                        @error('form.complainant_district_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="complainant_local_body_id" class="form-label">पालिका *</label>
                        <select wire:model="form.complainant_local_body_id" class="form-control"
                                id="complainant_local_body_id">
                            <option value="">पालिका छान्नुहोस्</option>
                            @foreach($provinces as $province)
                                <option
                                    value="{{$province->id}}">{{$province->province}}</option>
                            @endforeach
                        </select>
                        @error('form.complainant_local_body_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="complainant_ward_no" class="form-label">वार्ड न:*</label>
                        <select wire:model="form.complainant_ward_no" class="form-control" id="complainant_ward_no">
                            <option value="">वार्ड न: छान्नुहोस्</option>
                            @foreach($provinces as $province)
                                <option
                                    value="{{$province->id}}">{{$province->province}}</option>
                            @endforeach
                        </select>
                        @error('form.complainant_ward_no')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="complainant_tole" class="form-label">टोल</label>
                        <input
                            type="text"
                            wire:model="form.complainant_tole"
                            class="form-control"
                            id="complainant_tole"
                            placeholder="टोल"
                        />
                        @error('form.complainant_tole')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="complainant_guardian_name" class="form-label">अभिभावक को नाम</label>
                        <input
                            type="text"
                            wire:model="form.complainant_guardian_name"
                            class="form-control"
                            id="complainant_guardian_name"
                            placeholder="अभिभावक को नाम"
                        />
                        @error('form.complainant_guardian_name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="complainant_relationship" class="form-label">नाता</label>
                        <input
                            type="text"
                            wire:model="form.complainant_relationship"
                            class="form-control"
                            id="complainant_relationship"
                            placeholder="नाता"
                        />
                        @error('form.complainant_relationship')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="complainant_age" class="form-label">उमेर</label>
                        <input
                            type="text"
                            wire:model="form.complainant_age"
                            class="form-control"
                            id="complainant_age"
                            placeholder="उमेर"
                        />
                        @error('form.complainant_age')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="complainant_name" class="form-label">वादी को नाम</label>
                        <input
                            type="text"
                            wire:model="form.complainant_name"
                            class="form-control"
                            id="complainant_name"
                            placeholder="वादी को नाम"
                        />
                        @error('form.complainant_name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>
                    <h4 class="text-info">प्रतिवादी विवरण</h4>
                </legend>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label for="defendant_province_id" class="form-label">प्रदेश *</label>
                        <select wire:model="form.defendant_province_id" class="form-control"
                                id="defendant_province_id">
                            <option value=""> प्रदेश छान्नुहोस्</option>
                            @foreach($provinces as $province)
                                <option
                                    value="{{$province->id}}">{{$province->province}}</option>
                            @endforeach
                        </select>
                        @error('form.defendant_province_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="defendant_district_id" class="form-label">जिल्ला *</label>
                        <select wire:model="form.defendant_district_id" class="form-control"
                                id="defendant_district_id">
                            <option value="">जिल्ला छान्नुहोस्</option>
                            @foreach($provinces as $province)
                                <option
                                    value="{{$province->id}}">{{$province->province}}</option>
                            @endforeach
                        </select>
                        @error('form.defendant_district_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="defendant_local_body_id" class="form-label">पालिका *</label>
                        <select wire:model="form.defendant_local_body_id" class="form-control"
                                id="defendant_local_body_id">
                            <option value="">पालिका छान्नुहोस्</option>
                            @foreach($provinces as $province)
                                <option
                                    value="{{$province->id}}">{{$province->province}}</option>
                            @endforeach
                        </select>
                        @error('form.defendant_local_body_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="defendant_ward_no" class="form-label">वार्ड न:*</label>
                        <select wire:model="form.defendant_ward_no" class="form-control" id="defendant_ward_no">
                            <option value="">वार्ड न: छान्नुहोस्</option>
                            @foreach($provinces as $province)
                                <option
                                    value="{{$province->id}}">{{$province->province}}</option>
                            @endforeach
                        </select>
                        @error('form.defendant_ward_no')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="defendant_tole" class="form-label">टोल</label>
                        <input
                            type="text"
                            wire:model="form.defendant_tole"
                            class="form-control"
                            id="defendant_tole"
                            placeholder="टोल"
                        />
                        @error('form.defendant_tole')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="defendant_guardian_name" class="form-label">अभिभावक को नाम</label>
                        <input
                            type="text"
                            wire:model="form.defendant_guardian_name"
                            class="form-control"
                            id="defendant_guardian_name"
                            placeholder="अभिभावक को नाम"
                        />
                        @error('form.defendant_guardian_name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="defendant_relationship" class="form-label">नाता</label>
                        <input
                            type="text"
                            wire:model="form.defendant_relationship"
                            class="form-control"
                            id="defendant_relationship"
                            placeholder="नाता"
                        />
                        @error('form.defendant_relationship')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="defendant_age" class="form-label">उमेर</label>
                        <input
                            type="text"
                            wire:model="form.defendant_age"
                            class="form-control"
                            id="defendant_age"
                            placeholder="उमेर"
                        />
                        @error('form.defendant_age')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="defendant_name" class="form-label">प्रतिवादी को नाम</label>
                        <input
                            type="text"
                            wire:model="form.defendant_name"
                            class="form-control"
                            id="defendant_name"
                            placeholder="प्रतिवादी को नाम"
                        />
                        @error('form.defendant_name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>
                    <h4 class="text-info">उजुरीकर्ताको विवरण</h4>
                </legend>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label for="applicant_name" class="form-label">उजुरीकर्ता को नाम</label>
                        <input
                            type="text"
                            wire:model="form.applicant_name"
                            class="form-control"
                            id="applicant_name"
                            placeholder="उजुरीकर्ता को नाम"
                        />
                        @error('form.applicant_name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="applicant_phone" class="form-label">फोन न:</label>
                        <input
                            type="text"
                            wire:model="form.applicant_phone"
                            class="form-control"
                            id="applicant_phone"
                            placeholder="नाता"
                        />
                        @error('form.applicant_phone')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="applicant_address" class="form-label">ठेगाना</label>
                        <input
                            type="text"
                            wire:model="form.applicant_address"
                            class="form-control"
                            id="applicant_address"
                            placeholder="ठेगाना"
                        />
                        @error('form.applicant_address')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="applicant_signature" class="form-label">उजुरिकर्ताको सहि</label>
                        <input
                            type="file"
                            wire:model="form.applicant_signature"
                            class="form-control"
                            id="defendant_name"
                            placeholder="प्रतिवादी को नाम"
                        />
                        @error('form.applicant_signature')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">
        Save
    </button>
</form>
