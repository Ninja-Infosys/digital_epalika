<div>
    @foreach($form as $index=>$officer)
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
                @error("form.{{$index}}.officer_designation")
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
                        <label for="form.{{$index}}.officer_citizenship_front" class="form-label">नागरिकता (अगाडि)
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
                            <label for="form.{{$index}}.officer_citizenship_behind" class="form-label">नागरिकता (पछाडी)
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
        <hr>
    @endforeach
    <button type="button" class="btn btn-success btn-sm remove-button" wire:click.prevent="addOfficer()">नँया
        संचालक पदाधिकारी
    </button>
</div>

