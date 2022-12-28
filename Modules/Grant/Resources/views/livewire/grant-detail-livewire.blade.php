<form wire:submit.prevent="submitFormData">
    <fieldset>
        <legend><h4 class="text-info">अनुदान जारी </h4></legend>
        <div class="row">
            <div class="col-md-4 mb-2">
                <label for="grant_id" class="form-label">कार्यक्रम/क्रियाकलाप * </label>
                <select wire:model="form.grant_id" id="grant_id"
                        class="form-control @error('form.grant_id') is-invalid @enderror">
                    <option value="">कार्यक्रम/क्रियाकलाप छान्नुहोस्</option>
                    @foreach($grants as $grantData)
                        <option value="{{$grantData->id}}">
                            {{$grantData->grantProgram->name??''}} ({{$grantData->fiscalYear->title??''}})
                        </option>
                    @endforeach
                </select>
                @error('form.grant_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-2">
                <label for="grant_for" class="form-label">अनुदानग्राहीको प्रकार * </label>
                <select wire:model="form.grant_for" id="grant_for"
                        class="form-control @error('form.grant_for') is-invalid @enderror">
                    <option value="">अनुदानग्राहीको प्रकार छान्नुहोस्</option>
                    @foreach($grant->grant_for_data??collect() as $grant_for)
                        <option value="{{$grant_for}}">
                            {{\Modules\Grant\Enums\GranteeEnum::tryFrom($grant_for)->label()}}
                        </option>
                    @endforeach
                </select>
                @error('form.grant_for')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-2">
                <label for="model_id" class="form-label">अनुदानग्राही </label>
                <select wire:model="form.model_id" id="model_id"
                        class="form-control @error('form.model_id') is-invalid @enderror">
                    <option value="">--अनुदानग्राही छान्नुहोस्--</option>
                    @foreach($grantees as $grantee)
                        <option value="{{$grantee->id}}">
                            {{$grantee->name ?? ''}} ({{$grantee->unique_id ?? ''}})
                        </option>
                    @endforeach
                </select>
                @error('form.model_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="col-md-4 mb-2">
                <label for="grant_amount" class="form-label">अनुदान rakam *</label>
                <input
                    type="number"
                    wire:model="form.grant_amount"
                    value="{{old('form.grant_amount')}}"
                    class="form-control @error('form.grant_amount') is-invalid @enderror"
                    id="grant_amount"
                    placeholder="अनुदान rakam"
                />
                @error('form.grant_amount')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="col-md-4 mb-2">
                <label for="personal_investment" class="form-label">अनुदानग्राहीको लगानी *</label>
                <input
                    type="number"
                    wire:model="form.personal_investment"
                    value="{{old('form.personal_investment')}}"
                    class="form-control @error('form.personal_investment') is-invalid @enderror"
                    id="personal_investment"
                    placeholder="अनुदानग्राहीको लगानी"
                />
                @error('form.personal_investment')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-2">
                <label for="is_old" class="form-label">नयाँ वा पहिलेको अनुदानको निरन्तरता हो ?
                    *</label>
                <select wire:model="form.is_old" id="is_old"
                        class="form-control @error('form.is_old') is-invalid @enderror">
                    <option value=""> --छान्नुहोस्--</option>
                    <option value="0"> नयाँ</option>
                    <option value="1"> निरन्तर</option>
                </select>
                @error('form.is_old')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            @if($form['is_old']==1)
                <div class="col-md-4 mb-2">
                    <label for="prev_fiscal_year_id" class="form-label">पहिले पाएको आर्थिक बर्ष * </label>
                    <select wire:model="form.prev_fiscal_year_id" id="prev_fiscal_year_id"
                            class="form-control @error('form.prev_fiscal_year_id') is-invalid @enderror">
                        <option value=""> --छान्नुहोस्--</option>
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
                    <label for="investment_amount" class="form-label"> लगानी *</label>
                    <input
                        type="number"
                        wire:model="form.investment_amount"
                        class="form-control @error('form.investment_amount') is-invalid @enderror"
                        id="investment_amount"
                        placeholder=" लगानी"
                    />
                    @error('form.investment_amount')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            @endif
            <div class="col-md-6 mb-2">
                <label for="remarks" class="form-label">कैफियत</label>
                <textarea
                    wire:model="form.remarks"
                    class="form-control @error('form.remarks') is-invalid @enderror"
                    placeholder="कैफियत"
                    id="remarks" cols="30" rows="3"></textarea>
                @error('form.remarks')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
    </fieldset>

    <fieldset class="my-3">
        <legend><h4 class="text-info">अनुदान स्थलको विवरण *</h4></legend>
        <div class="row">
            <input type="hidden" wire:model="form.local_body_id" id="local_body_id"
                   value="{{$officeSetting->local_body_id}}">
            <div class="col-md-6 mb-2">
                <label for="ward_no" class="form-label">वडा नं.</label>
                <select
                    wire:model="form.ward_no"
                    class="form-select @error('form.ward_no') is-invalid @enderror"
                    id="ward_no">
                    <option value="">--वडा नं. छान्नुहोस्--</option>
                    @foreach($officeSetting->localBody->ward_no as $ward)
                        <option
                            {{old('form.word_no')}}
                            value="{{$ward}}">
                            {{$ward}}
                        </option>
                    @endforeach
                </select>
                @error('form.ward_no')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="village" class="form-label">गाउँ</label>
                <input
                    type="text"
                    wire:model="form.village"
                    id="village"
                    class="form-control @error('form.village') is-invalid @enderror"
                    value="{{old('form.village')}}"
                    placeholder="गाउँ"
                >
                @error('form.village')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="tole" class="form-label">टोल</label>
                <input
                    type="text"
                    wire:model="form.tole"
                    id="tole"
                    class="form-control @error('form.tole') is-invalid @enderror"
                    value="{{old('form.tole')}}"
                    placeholder="टोल"
                >
                @error('form.tole')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="plot_no" class="form-label">किता नं.</label>
                <input
                    type="text"
                    wire:model="form.plot_no"
                    id="plot_no"
                    class="form-control @error('form.plot_no') is-invalid @enderror"
                    value="{{old('form.plot_no')}}"
                    placeholder="किता नं."
                >
                @error('form.plot_no')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="contact_person" class="form-label">सम्पर्क व्यक्ति </label>
                <input
                    type="text"
                    wire:model="form.contact_person"
                    id="contact_person"
                    class="form-control @error('form.contact_person') is-invalid @enderror"
                    value="{{old('form.contact_person')}}"
                    placeholder="सम्पर्क व्यक्ति "
                >
                @error('form.contact_person')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="contact" class="form-label">सम्पर्क नम्बर </label>
                <input
                    type="text"
                    wire:model="form.contact"
                    id="contact"
                    class="form-control @error('form.contact') is-invalid @enderror"
                    value="{{old('form.contact')}}"
                    placeholder="सम्पर्क नम्बर "
                >
                @error('form.contact')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
    </fieldset>
    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">
            पेश गर्नुहोस्
        </button>
    </div>
</form>
