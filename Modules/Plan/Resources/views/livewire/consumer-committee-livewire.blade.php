<form wire:submit.prevent="submitFormData">
    <h4 class="header-title border-bottom mb-2">उपभोक्त्ता समितिको विवरण</h4>
    <div class="row">
        <div class="col-md-4 mb-2">
            <label for="name" class="form-label">उपभोक्त्ता समितिको नाम *</label>
            <input
                type="text"
                wire:model="form.name"
                class="form-control @error('form.name') is-invalid @enderror"
                id="name"
                placeholder="उपभोक्त्ता समितिको नाम"
            />
            @error('form.name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="address" class="form-label">ठेगाना *</label>
            <input
                type="text"
                wire:model="form.address"
                class="form-control @error('form.address') is-invalid @enderror"
                id="address"
                placeholder="ठेगाना"
            />
            @error('form.address')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="phone" class="form-label">सम्पर्क नं. *</label>
            <input
                type="text"
                wire:model="form.phone"
                class="form-control @error('form.phone') is-invalid @enderror"
                id="phone"
                placeholder="सम्पर्क नं."
            />
            @error('form.phone')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="formation_date" class="form-label">गठन भएको मिति *</label>
            <input
                type="text"
                wire:model="form.formation_date"
                class="form-control @error('form.formation_date') is-invalid @enderror"
                id="formation_date"
                placeholder="गठन भएको मिति"
            />
            @error('form.formation_date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="committee_registration_date" class="form-label">समिती दर्ता मिति</label>
            <input
                type="text"
                wire:model="form.committee_registration_date"
                class="form-control @error('form.committee_registration_date') is-invalid @enderror"
                id="committee_registration_date"
                placeholder="समिती दर्ता मिति"
            />
            @error('form.committee_registration_date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="meeting_date" class="form-label">बैठक बसेको मिति</label>
            <input
                type="text"
                wire:model="form.meeting_date"
                class="form-control @error('form.meeting_date') is-invalid @enderror"
                id="meeting_date"
                placeholder="बैठक बसेको मिति"
            />
            @error('form.meeting_date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="registration_no" class="form-label">समिती दर्ता नं. *</label>
            <input
                type="text"
                wire:model="form.registration_no"
                class="form-control @error('form.registration_no') is-invalid @enderror"
                id="registration_no"
                placeholder="समिती दर्ता नं."
            />
            @error('form.registration_no')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="beneficiary_no" class="form-label">गठन गर्दा उपस्थित लाभान्वितको संख्या</label>
            <input
                type="number"
                wire:model="form.beneficiary_no"
                class="form-control @error('form.beneficiary_no') is-invalid @enderror"
                id="beneficiary_no"
                placeholder="गठन गर्दा उपस्थित लाभान्वितको संख्या"
            />
            @error('form.beneficiary_no')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-2">
            <label for="member_number" class="form-label">
                सदस्य संख्या
            </label>
            <div class="input-group input-group-merge">
                <input
                    type="number"
                    wire:model="form.member_number"
                    class="form-control @error('form.member_number') is-invalid @enderror"
                    id="member_number"
                    placeholder="सदस्य संख्या"
                />
                <button
                    wire:click="setConsumerCommitteeMembers"
                    class="btn input-group-text btn-success waves-effect waves-light"
                    type="button">
                    <i class="fa fa-users"></i>
                </button>
                @error('form.member_number')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-3 mb-2">
            <label for="experience_in_project" class="form-label">आयोजना संचालन सम्बन्धी अनुभव</label>
            <input
                type="text"
                wire:model="form.experience_in_project"
                class="form-control @error('form.experience_in_project') is-invalid @enderror"
                id="experience_in_project"
                placeholder="आयोजना संचालन सम्बन्धी अनुभव"
            />
            @error('form.experience_in_project')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <h4 class="header-title border-bottom mb-2">उपभोक्ता समिति सदस्य विवरण</h4>
    <div class="table-responsive">
        <table class="table table-sm table-bordered">
            <thead>
            <tr>
                <th>पद</th>
                <th>नाम थर</th>
                <th>सम्पर्क नं.</th>
                <th>ना.प्र.नं.</th>
                <th>लिङ्ग</th>
                <th>ठेगाना</th>
                <th>बुवा/पतिको नाम</th>
                <th>बाजेको नाम</th>
                <th>
                    #
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($form['consumerCommitteeOfficials'] as $key=>$consumerCommitteeOfficial)
                <tr>
                    <td width="120">
                        <select
                            wire:model="form.consumerCommitteeOfficials.{{$key}}.post"
                            class="form-select form-select-sm">
                            <option value="">छान्नुहोस्</option>
                            @foreach(\Modules\Plan\Enums\ConsumerCommitteePostEnum::cases() as $post)
                                <option
                                    value="{{$post->value}}">
                                    {{$post->label()}}
                                </option>
                            @endforeach
                        </select>
                        @error("form.consumerCommitteeOfficials.$key.post")
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </td>
                    <td>
                        <input
                            type="text"
                            wire:model="form.consumerCommitteeOfficials.{{$key}}.name"
                            class="form-control form-control-sm"
                            placeholder="नाम थर"
                        />
                        @error("form.consumerCommitteeOfficials.$key.name")
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </td>
                    <td>
                        <input
                            type="text"
                            wire:model="form.consumerCommitteeOfficials.{{$key}}.phone"
                            class="form-control form-control-sm"
                            placeholder="सम्पर्क नं."
                        />
                        @error("form.consumerCommitteeOfficials.$key.phone")
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </td>
                    <td width="90">
                        <input
                            type="text"
                            wire:model="form.consumerCommitteeOfficials.{{$key}}.citizenship_no"
                            class="form-control form-control-sm"
                            placeholder="ना.प्र.नं."
                        />
                        @error("form.consumerCommitteeOfficials.$key.citizenship_no")
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </td>
                    <td width="95">
                        <select
                            wire:model="form.consumerCommitteeOfficials.{{$key}}.gender"
                            class="form-select form-select-sm">
                            <option value="">छान्नुहोस्</option>
                            @foreach(\App\Enums\Gender::cases() as $gender)
                                <option
                                    value="{{$gender->value}}">
                                    {{$gender->label()}}
                                </option>
                            @endforeach
                        </select>
                        @error("form.consumerCommitteeOfficials.$key.gender")
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </td>
                    <td>
                        <input
                            type="text"
                            wire:model="form.consumerCommitteeOfficials.{{$key}}.address"
                            class="form-control form-control-sm"
                            placeholder="ठेगाना"
                        />
                        @error("form.consumerCommitteeOfficials.$key.address")
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </td>
                    <td>
                        <input
                            type="text"
                            wire:model="form.consumerCommitteeOfficials.{{$key}}.father_name"
                            class="form-control form-control-sm"
                            placeholder="बुवा/पतिको नाम"
                        />
                        @error("form.consumerCommitteeOfficials.$key.father_name")
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </td>
                    <td>
                        <input
                            type="text"
                            wire:model="form.consumerCommitteeOfficials.{{$key}}.grandfather_name"
                            class="form-control form-control-sm"
                            placeholder="बाजेको नाम"
                        />
                        @error("form.consumerCommitteeOfficials.$key.grandfather_name")
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </td>
                    <td>
                        <button type="button" wire:click="removeConsumerCommitteeOfficials({{$key}})"
                                class="btn btn-xs btn-outline-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center text-success" colspan="9">
                        विवरण थप्न प्लस बटन क्लिक गर्नुहोस्
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <button type="submit" class="btn btn-primary">
        Save
    </button>
</form>

@once
    @push('scripts')
        <script src="{{asset('assets/backend/js/nepali.datepicker.v3.7.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#formation_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let inputFieldDate = $("#formation_date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        //$("#en_from_date").val(formattedDate);

                        Livewire.emit('formationDateChanged', inputFieldDate, formattedDate);
                    }
                });

                $("#committee_registration_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let inputFieldDate = $("#committee_registration_date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        //$("#en_to_date").val(formattedDate);

                        Livewire.emit('committeeRegistrationDateChanged', inputFieldDate, formattedDate);
                    }
                });

                $("#meeting_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let inputFieldDate = $("#meeting_date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        //$("#en_to_date").val(formattedDate);

                        Livewire.emit('meetingDateChanged', inputFieldDate, formattedDate);
                    }
                });
            });
        </script>
    @endpush
@endonce
