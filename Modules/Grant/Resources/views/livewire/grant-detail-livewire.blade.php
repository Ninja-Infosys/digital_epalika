<form wire:submit.prevent="submitFormData">
    <fieldset>
        <legend>
            <h4>विवरण</h4>
        </legend>
        <div class="row">
            <div class="col-md-3 mb-2">
                <label for="fiscal_year_id">आर्थिक वर्ष *</label>
                <select
                    id="fiscal_year_id"
                    wire:model="form.fiscal_year_id"
                    class="form-select @error('form.fiscal_year_id') is-invalid @enderror">
                    <option value="">---आर्थिक वर्ष---</option>
                    @foreach($fiscalYears as $fiscalYear)
                        <option value="{{$fiscalYear->id}}">
                            {{$fiscalYear->title}}
                        </option>
                    @endforeach
                </select>
                @error('form.fiscal_year_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-3 mb-2">
                <label for="grant_program_id">कार्यक्रमको नाम *</label>
                <select
                    id="grant_program_id"
                    wire:model="form.grant_program_id"
                    class="form-select @error('form.grant_program_id') is-invalid @enderror">
                    <option value="">---कार्यक्रमको नाम---</option>
                    @foreach($grantPrograms as $grantProgram)
                    <option value="{{$grantProgram->id}}">
                        {{$grantProgram->program_name}}
                    </option>
                    @endforeach
                </select>
                @error('form.grant_program_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-3 mb-2">
                <label for="grant_recipient_name">अनुदानग्राहीको नाम *</label>
                <input type="text"
                       wire:model="form.grant_recipient_name"
                       class="form-control @error('form.grant_recipient_name') is-invalid @enderror"
                       id="grant_recipient_name"
                       placeholder="अनुदानग्राहीको नाम">
                @error('form.grant_recipient_name')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-3 mb-2">
                <label for="grant_recipient_code_no">अनुदानग्राहीको कोड नं *</label>
                <input type="text"
                       wire:model="form.grant_recipient_code_no"
                       class="form-control @error('form.grant_recipient_code_no') is-invalid @enderror"
                       id="grant_recipient_code_no"
                       placeholder="अनुदानग्राहीको कोड नं">
                @error('form.grant_recipient_code_no')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
    </fieldset>

    <fieldset class="mt-2">
        <legend>
            <h4>ठेगाना</h4>
        </legend>
        <div class="row">
            <div class="col-md-4 mb-2">
                <label for="province_id">प्रदेश *</label>
                <select id="province_id"
                        wire:model="form.province_id"
                        class="form-select @error('form.province_id') is-invalid @enderror">
                    <option value="">---प्रदेश छानुहोस्---</option>
                    @foreach($provinces as $province)
                    <option value="{{$province->id}}">
                        {{$province->province}}
                    </option>
                    @endforeach
                </select>
                @error('form.province_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-2">
                <label for="district_id">जिल्ला *</label>
                <select id="district_id"
                        wire:model="form.district_id"
                        class="form-select @error('form.district_id') is-invalid @enderror">
                    <option value="">---जिल्ला छानुहोस्---</option>
                    @foreach($districts as $district)
                    <option value="{{$district->id}}">
                        {{$district->district}}
                    </option>
                    @endforeach
                </select>
                @error('form.district_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-2">
                <label for="local_body_id">पालिका *</label>
                <select id="local_body_id"
                        wire:model="form.local_body_id"
                        class="form-select @error('form.local_body_id') is-invalid @enderror">
                    <option value="">---पालिका छानुहोस्---</option>
                    @foreach($localBodies as $localBody)
                    <option value="{{$localBody->id}}">
                        {{$localBody->local_body}}
                    </option>
                    @endforeach
                </select>
                @error('form.local_body_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="ward_no">वडा नं. *</label>
                <select id="ward_no"
                        wire:model="form.ward_no"
                        class="form-select @error('form.ward_no') is-invalid @enderror">
                    <option value="">---वडा नं छानुहोस्---</option>
                    @foreach($wards as $ward)
                    <option value="{{$ward}}">
                        {{$ward}}
                    </option>
                    @endforeach
                </select>
                @error('form.ward_no')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="tole">
                    टोल
                </label>
                <input type="text"
                       wire:model="form.tole"
                       class="form-control @error('form.tole') is-invalid @enderror"
                       id="tole"
                       placeholder="टोल">
                @error('form.tole')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
    </fieldset>

    <fieldset class="mt-2">
        <legend>
            <h4>अनुदान विवरण</h4>
        </legend>
        <div class="row">
            <div class="col-md-4 mb-2">
                <label for="grant_recipient_type">अनुदानग्राहीको प्रकार *</label>
                <select id="grant_recipient_type"
                        wire:model="form.grant_recipient_type"
                        class="form-select @error('form.grant_recipient_type') is-invalid @enderror">
                    <option value="">---अनुदानग्राहीको प्रकार छानुहोस्---</option>
                    @foreach(\Modules\Grant\Enums\GrantRecipientTypeEnum::cases() as $grantRecipientType)
                    <option value="{{$grantRecipientType->value}}">
                        {{$grantRecipientType->label()}}
                    </option>
                    @endforeach
                </select>
                @error('form.grant_recipient_type')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-2">
                <label for="grant_type_id">प्राप्त अनुदानको प्रकार *</label>
                <select id="grant_type_id"
                        wire:model="form.grant_type_id"
                        class="form-select @error('form.grant_type_id') is-invalid @enderror">
                    <option value="">----प्राप्त अनुदानको प्रकार छानुहोस्----</option>
                    @foreach($grantTypes as $grantType)
                    <option value="{{$grantType->id}}">
                        {{$grantType->title}}
                    </option>
                    @endforeach
                </select>
                @error('form.grant_type_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-2">
                <label for="grant_activity_id">अनुदानका कृयाकलाप *</label>
                <select id="grant_activity_id"
                        wire:model="form.grant_activity_id"
                        class="form-select @error('form.grant_activity_id') is-invalid @enderror">
                    <option value="">----अनुदानका कृयाकलाप छानुहोस्----</option>
                    @foreach($grantActivities as $grantActivity)
                    <option value="{{$grantActivity->id}}">
                        {{$grantActivity->title}}
                    </option>
                    @endforeach
                </select>
                @error('form.grant_activity_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-2">
                <label for="total_cost">जम्मा लागत रु. *</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">रु</span>
                    </div>
                    <input type="number"
                           id="total_cost"
                           wire:model="form.total_cost"
                           class="form-control @error('form.total_cost') is-invalid @enderror"
                           placeholder="जम्मा लागत">
                </div>
                @error('form.total_cost')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-2">
                <label for="grant_amount">अनुदान रकम *</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">रु</span>
                    </div>
                    <input type="number"
                           wire:model="form.grant_amount"
                           id="grant_amount"
                           class="form-control @error('form.grant_amount') is-invalid @enderror"
                           placeholder="अनुदान रकम">
                </div>
                @error('form.grant_amount')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-2">
                <label for="investment_amount">अनुदानग्राहीको लगानी *</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">रु</span>
                    </div>
                    <input type="number"
                           wire:model="form.investment_amount"
                           id="investment_amount"
                           class="form-control @error('form.investment_amount') is-invalid @enderror"
                           placeholder="अनुदानग्राहीको लगानी">
                </div>
                @error('form.investment_amount')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-2">
                <label for="beneficial_area">
                    लाभ पुग्ने क्षेत्रफल *
                </label>
                <input type="text"
                       wire:model="form.beneficial_area"
                       class="form-control @error('form.beneficial_area') is-invalid @enderror"
                       id="beneficial_area"
                       placeholder="लाभ पुग्ने क्षेत्रफल">
                @error('form.beneficial_area')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-2">
                <label for="contact_person_name">
                    सम्पर्क ब्यक्तिको नाम *
                </label>
                <input type="text"
                       wire:model="form.contact_person_name"
                       class="form-control @error('form.contact_person_name') is-invalid @enderror"
                       id="contact_person_name"
                       placeholder="सम्पर्क ब्यक्तिको नाम">
                @error('form.contact_person_name')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-2">
                <label for="phone">
                    सम्पर्क नम्बर *
                </label>
                <input type="text"
                       wire:model="form.phone"
                       class="form-control @error('form.phone') is-invalid @enderror"
                       id="phone"
                       placeholder="सम्पर्क नम्बर">
                @error('form.phone')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
    </fieldset>

    <fieldset class="mt-2">
        <legend><h4>पहिले अनुदान प्राप्त गरे नगरेको</h4></legend>
        <div class="row">
            <div class="col-md-4 mb-2">
                <label for="is_continuity">आयोजना नयाँ वा पहिलेको अनुदानको निरन्तरता हो ?</label>
                <select id="is_continuity"
                        wire:model="form.is_continuity"
                        class="form-select @error('form.is_continuity') is-invalid @enderror">
                    <option value="1">निरन्तर</option>
                    <option value="0">नयाँ</option>
                </select>
                @error('form.is_continuity')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            @if($form['is_continuity']==1)
            <div class="col-md-4 mb-2">
                <label for="prev_fiscal_year_id">
                    पहिले पाएको आ. व. *
                </label>
                <select id="prev_fiscal_year_id"
                        wire:model="form.prev_fiscal_year_id"
                        class="form-select @error('form.prev_fiscal_year_id') is-invalid @enderror">
                    <option value="">----पहिले पाएको आ. व.----</option>
                    @foreach($fiscalYears as $fiscalYear)
                    <option value="{{$fiscalYear->id}}">
                        {{$fiscalYear->title}}
                    </option>
                    @endforeach
                </select>
                @error('form.prev_fiscal_year_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-2">
                <label for="prev_cost_amount">
                    लागत रकम *
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">रु</span>
                    </div>
                    <input type="number"
                           wire:model="form.prev_cost_amount"
                           id="prev_cost_amount"
                           class="form-control @error('form.prev_cost_amount') is-invalid @enderror"
                           placeholder="लागत रकम">
                </div>
                @error('form.prev_cost_amount')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-6 mb-2">
                <label for="beneficial_places">लाभ पुग्ने स्थानहरु *</label>
                <textarea id="beneficial_places"
                          wire:model="form.beneficial_places"
                          class="form-control @error('form.beneficial_places') is-invalid @enderror"
                          cols="30" rows="3"
                          placeholder="लाभ पुग्ने स्थानहरु"></textarea>
                @error('form.beneficial_places')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <div class="form-group">
                    <label for="remarks">कैफियत</label>
                    <textarea id="remarks"
                              wire:model="form.remarks"
                              class="form-control @error('form.remarks') is-invalid @enderror"
                              cols="30" rows="3" placeholder="कैफियत"></textarea>
                    @error('form.remarks')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>
    </fieldset>
    <div class="d-flex justify-content-end mt-2">
        <button class="btn btn-primary" type="submit">
            Save
        </button>
    </div>
</form>
