<form wire:submit.prevent="submitFormData">
    <div class="row mb-2">
        <div class="col-md-12">
            <fieldset class="mb-2">
                <legend>
                    <h4 class="text-info">निवेदक को विवरण</h4>
                </legend>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label for="applicant_name" class="form-label"> नाम <span
                                class="text-danger">*</span></label>
                        <input
                            type="text"
                            wire:model="form.applicant_name"
                            class="form-control"
                            id="applicant_name"
                            placeholder="निवेदक को नाम"
                        />
                        @error('form.applicant_name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="applicant_phone" class="form-label"> फोन न:<span
                                class="text-danger">*</span></label>
                        <input
                            type="text"
                            wire:model="form.applicant_phone"
                            class="form-control"
                            id="applicant_name"
                            placeholder="फोन न"
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
                        <label for="applicant_signature_file" class="form-label">सहि<span
                                class="text-danger">*</span></label>
                        <input
                            type="file"
                            wire:model="form.applicant_signature_file"
                            class="form-control"
                            id="applicant_signature_file"
                            placeholder="सहि"
                        />
                        @error('form.applicant_signature_file')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="col-md-12 mb-2">
            <fieldset class="mb-2">
                <legend>
                    <h4 class="text-info">वादीको विवरण</h4>
                </legend>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label for="complainant_name" class="form-label">वादी को नाम <span class="text-danger">*</span></label>
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
                    <div class="col-md-4 mb-2">
                        <label for="complainant_age" class="form-label">उमेर <span class="text-danger">*</span></label>
                        <input
                            type="number"
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
                        <label for="complainant_guardian_name" class="form-label">अभिभावक को नाम <span
                                class="text-danger">*</span></label>
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
                        <label for="complainant_relationship" class="form-label">नाता <span class="text-danger">*</span></label>
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
                </div>
                <fieldset class="mb-2">
                    <legend>
                        <h5 class="text-info">ठेगाना</h5>
                    </legend>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="complainant_province_id" class="form-label">प्रदेश <span
                                    class="text-danger">*</span></label>
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
                            <label for="complainant_district_id" class="form-label">जिल्ला <span
                                    class="text-danger">*</span></label>
                            <select wire:model="form.complainant_district_id" class="form-control"
                                    id="complainant_district_id">
                                <option value="">जिल्ला छान्नुहोस्</option>
                                @foreach($complainantDistricts as $district)
                                    <option
                                        value="{{$district->id}}">{{$district->district}}</option>
                                @endforeach
                            </select>
                            @error('form.complainant_district_id')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="complainant_local_body_id" class="form-label">पालिका <span
                                    class="text-danger">*</span></label>
                            <select wire:model="form.complainant_local_body_id" class="form-control"
                                    id="complainant_local_body_id">
                                <option value="">पालिका छान्नुहोस्</option>
                                @foreach($complainantLocalBodies as $localBody)
                                    <option
                                        value="{{$localBody->id}}">{{$localBody->local_body}}</option>
                                @endforeach
                            </select>
                            @error('form.complainant_local_body_id')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="complainant_ward_no" class="form-label">वार्ड न:<span
                                    class="text-danger">*</span></label>
                            <select wire:model="form.complainant_ward_no" class="form-control" id="complainant_ward_no">
                                <option value="">वार्ड न: छान्नुहोस्</option>
                                @foreach($complainantWards as $ward)
                                    <option
                                        value="{{$ward}}">{{$ward}}</option>
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
                    </div>
                </fieldset>
            </fieldset>

            <fieldset class="mb-2">
                <legend>
                    <h4 class="text-info">प्रतिवादी विवरण</h4>
                </legend>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label for="defendant_name" class="form-label">प्रतिवादी को नाम<span
                                class="text-danger">*</span></label>
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
                    <div class="col-md-4 mb-2">
                        <label for="defendant_age" class="form-label">उमेर<span class="text-danger">*</span></label>
                        <input
                            type="number"
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
                        <label for="defendant_guardian_name" class="form-label">अभिभावक को नाम<span
                                class="text-danger">*</span></label>
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
                        <label for="defendant_relationship" class="form-label">नाता<span
                                class="text-danger">*</span></label>
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

                </div>
                <fieldset class="mb-2">
                    <legend>
                        <h5 class="text-info">ठेगाना</h5>
                    </legend>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="defendant_province_id" class="form-label">प्रदेश <span
                                    class="text-danger">*</span></label>
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
                            <label for="defendant_district_id" class="form-label">जिल्ला <span
                                    class="text-danger">*</span></label>
                            <select wire:model="form.defendant_district_id" class="form-control"
                                    id="defendant_district_id">
                                <option value="">जिल्ला छान्नुहोस्</option>
                                @foreach($defendantDistricts as $district)
                                    <option
                                        value="{{$district->id}}">{{$district->district}}</option>
                                @endforeach
                            </select>
                            @error('form.defendant_district_id')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="defendant_local_body_id" class="form-label">पालिका <span
                                    class="text-danger">*</span></label>
                            <select wire:model="form.defendant_local_body_id" class="form-control"
                                    id="defendant_local_body_id">
                                <option value="">पालिका छान्नुहोस्</option>
                                @foreach($defendantLocalBodies as $localBody)
                                    <option
                                        value="{{$localBody->id}}">{{$localBody->local_body}}</option>
                                @endforeach
                            </select>
                            @error('form.defendant_local_body_id')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="defendant_ward_no" class="form-label">वार्ड न:<span
                                    class="text-danger">*</span></label>
                            <select wire:model="form.defendant_ward_no" class="form-control" id="defendant_ward_no">
                                <option value="">वार्ड न: छान्नुहोस्</option>
                                @foreach($defendantWards as $ward)
                                    <option
                                        value="{{$ward}}">{{$ward}}</option>
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
                    </div>
                </fieldset>
            </fieldset>
        </div>
        <div class="col-md-12">
            <fieldset class="mb-2">
                <legend>
                    <h4 class="text-info">उजुरी विवरण</h4>
                </legend>
                <div class="row pb-2">
                    <div class="col-md-6 mb-2">
                        <label for="lawsuit_nature_id" class="form-label">मुद्दा प्रकृति<span
                                class="text-danger">*</span></label>
                        <select
                            wire:model="form.lawsuit_nature_id"
                            class="form-select"
                            id="lawsuit_nature_id">
                            <option value="">--छान्नुहोस्--</option>
                            @foreach($lawsuitNatures as $lawsuitNature)
                                <option
                                    value="{{$lawsuitNature->id}}" {{$lawsuitNature->id==old('lawsuit_nature_id') ? 'selected' : ''}}>
                                    {{$lawsuitNature->title}} ({{$lawsuitNature->code}})
                                </option>
                            @endforeach
                        </select>
                        @error('form.lawsuit_nature_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="subject" class="form-label">विषय<span class="text-danger">*</span></label>
                        <input
                            type="text"
                            wire:model="form.subject"
                            class="form-control"
                            id="subject"
                            placeholder="उजुरी विषय"
                        />
                        @error('form.subject')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="submission_no" class="form-label">सबमिशन नम्बर<span
                                class="text-danger">*</span></label>
                        <input
                            type="text"
                            wire:model="form.submission_no"
                            class="form-control"
                            id="submission_no"
                            placeholder="सबमिशन नम्बर"
                        />
                        @error('form.submission_no')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="date" class="form-label">मिति<span class="text-danger">*</span></label>
                        <input
                            type="text"
                            wire:model="form.date"
                            class="form-control"
                            id="date"
                            placeholder="मिति"
                        />
                        @error('form.date')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="complaint_detail" class="form-label">उजुरी विवरण <span
                                class="text-danger">*</span></label>
                        <textarea id="complaint_detail"
                                  wire:model="form.complaint_detail"
                                  class="form-control @error('form.complaint_detail') is-invalid @enderror"
                                  cols="100"
                                  placeholder="विवरण"></textarea>
                        @error('form.complaint_detail')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="complaint_detail" class="form-label">सम्बन्धित सदस्यहरू <span
                                class="text-danger">*</span></label>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead>
                                <tr>
                                    <th>क्र.स.</th>
                                    <th>नाम</th>
                                    <th>फोन</th>
                                    <th>इमेल</th>
                                    <th>पद</th>
                                    <th>ठेगाना</th>
                                    <th>
                                        <button type="button" wire:click="addRelatedMembers"
                                                class="btn btn-xs btn-outline-primary" title="नयाँ सदस्य थप्नुहोस्">
                                            <i class="fa fa-plus-circle"></i>
                                        </button>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($form['relatedMembers'] as $key=>$member)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <input
                                                type="text"
                                                wire:model="form.relatedMembers.{{$key}}.name"
                                                class="form-control form-control-sm"
                                                placeholder="नाम"
                                            />
                                            @error("form.relatedMembers.$key.name")
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input
                                                type="text"
                                                wire:model="form.relatedMembers.{{$key}}.phone"
                                                class="form-control form-control-sm"
                                                placeholder="फोन"
                                            />
                                            @error("form.relatedMembers.$key.phone")
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input
                                                type="text"
                                                wire:model="form.relatedMembers.{{$key}}.email"
                                                class="form-control form-control-sm"
                                                placeholder="इमेल"
                                            />
                                            @error("form.relatedMembers.$key.email")
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input
                                                type="text"
                                                wire:model="form.relatedMembers.{{$key}}.designation"
                                                class="form-control form-control-sm"
                                                placeholder="पद"
                                            />
                                            @error("form.relatedMembers.$key.designation")
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input
                                                type="text"
                                                wire:model="form.relatedMembers.{{$key}}.address"
                                                class="form-control form-control-sm"
                                                placeholder="ठेगाना"
                                            />
                                            @error("form.relatedMembers.$key.address")
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <button type="button" wire:click="removeRelatedMember({{$key}})"
                                                    class="btn btn-xs btn-outline-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="7">
                                            विवरण थप्न प्लस बटन क्लिक गर्नुहोस्
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            @error('form.relatedMembers')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">
                पेश गर्नुहोस्
            </button>
        </div>
    </div>
</form>

@once
    @push('scripts')
        <script src="{{asset('assets/backend/js/nepali.datepicker.v3.7.min.js')}}"></script>
    @endpush
@endonce
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#date").nepaliDatePicker({
                ndpYear: true,
                ndpMonth: true,
                onChange: function () {
                    let inputFieldDate = $("#date").val();
                    let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                    let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                    let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                    $("#en_date").val(formattedDate);

                    Livewire.emit('dateChanged', inputFieldDate, formattedDate);
                }
            });

            let todayBsDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate(), "YYYY-MM-DD")
            let todayAdDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentAdDate(), "YYYY-MM-DD")
            Livewire.emit('dateChanged', todayBsDate, todayAdDate);
        });
    </script>
@endpush
