<form>
    <fieldset>
        <legend>
            <h4 class="text-info">सिफारिस फाराम</h4>
        </legend>
        <div class="row">
            <div class="col-md-4 mb-2">
                <label for="mobile_user_id" class="form-label">व्यक्तिगत विवरण</label>
                <div class="d-flex justify-content-between gap-1">
                    <select id="mobile_user_id" name="mobile_user_id" class="form-select personalDetail"
                            wire:model="form.mobile_user_id">
                        <option value="">-- छान्नुहोस् --</option>
                        @foreach($mobileUsers as $mobileUser)
                            <option
                                value="{{$mobileUser->id}}">{{$mobileUser->tax_payer_id}} {{$mobileUser->name}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-sm btn-outline-primary" type="button" id="button-personalDetail"
                            title="व्यक्तिगत विवरण थप" data-bs-toggle="modal" data-bs-target="#personalDetail-modal">
                        <i class="fa fa-plus"></i></button>
                </div>
                @error('form.mobile_user_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-2">
                <label for="form.sipharis_category_id" class="form-label">सिफारिस श्रेणी</label>
                <div class="d-flex justify-content-between gap-1">
                    <select id="form.sipharis_category_id" wire:model="form.sipharis_category_id"
                            name="form.sipharis_category_id"
                            class="form-select personalDetail" required>

                        <option value="">-- छान्नुहोस् --</option>
                        @foreach($recommendationCategories as $recommendationCategory)
                            <option
                                value="{{$recommendationCategory->id}}">{{$recommendationCategory->title}}</option>
                        @endforeach
                    </select>

                </div>
                @error('form.sipharis_category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 mb-2">
                <label for="form.sipharis_sub_category_id" class="form-label">सिफारिस उप-श्रेणी <span
                        class="text-danger">*</span></label>
                <div class="d-flex justify-content-between gap-1">
                    <select id="form.sipharis_sub_category_id" wire:model="form.sipharis_sub_category_id"
                            name="form.sipharis_sub_category_id"
                            class="form-select @error('form.sipharis_sub_category_id') is-invalid @enderror personalDetail"
                            required>
                        <option value="">-- छान्नुहोस् --</option>
                        @foreach($recommendationSubCategories as $recommendationSubCategory)
                            <option
                                value="{{$recommendationSubCategory->id}}">{{$recommendationSubCategory->title}}</option>
                        @endforeach

                    </select>

                </div>
                @error('form.sipharis_sub_category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-2">
                <label for="form.sipharis_form_type_id" class="form-label">सिफारिस * </label>
                <div class="d-flex justify-content-between gap-1">
                    <select id="form.sipharis_form_type_id" wire:model="form.sipharis_form_type_id"
                            name="form.sipharis_form_type_id"
                            class="form-select @error('form.sipharis_form_type_id') is-invalid @enderror personalDetail"
                            required>
                        <option value="">-- छान्नुहोस् --</option>
                        @foreach($recommendations as $recommendation)
                            <option
                                value="{{$recommendation->id}}">{{$recommendation->title}}</option>
                        @endforeach
                    </select>

                </div>
                @error('form.sipharis_form_type_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </fieldset>

    <fieldset class="bg-light">
        <legend>सिफारिस फारम</legend>
        <div class="row">
            @foreach($recommendationFormFields ?? [] as $key=>$field)
                <div class="main">

                    <div class="row border-bottom mb-2">
                        <input type="hidden" name="fields[{{$key}}][sipharish_form_field_id]"
                               class="form-control" value="{{$field->id}}" id="sipharish_form_field_id"/>
                        <input type="hidden" name="fields[{{$key}}][type]"
                               class="form-control" value="{{$field->type->value}}" id="type"/>

                        <div class="col-md-12 mb-2">
                            <label for="title" class="form-label">{{$field->field_name}}</label>
                            @if($field->type != \App\Enums\FormFieldEnum::TABLE)
                                <input type="{{$field->type?->resolveType() ?? 'text'}}"
                                       name="fields[{{$key}}][value]" class="form-control"
                                       id="title"
                                       placeholder="शिर्षक" required/>
                                <input type="hidden"
                                       name="fields[{{$key}}][type]" class="form-control"
                                       value="{{$field->type?->value}}"
                                       id="type"
                                       placeholder="शिर्षक" required/>
                            @else
                                <input type="hidden"
                                       name="fields[{{$key}}][value]" class="form-control"
                                       value="{{json_encode($data[$field->slug] ?? [])}}"
                                       id="title"
                                       placeholder="शिर्षक" required/>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        @foreach($field->SipharishFormFields as $sipharishFormField)
                                            <th>{{$sipharishFormField->field_name}}</th>
                                        @endforeach
                                        <th>
                                            <button type="button"
                                                    wire:click.prevent="addRowInTable('{{$field->slug}}')"
                                                    class="btn btn-sm btn-outline-primary">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data[$field->slug] ?? [] as $index=>$tableData)

                                        <tr>
                                            @foreach($field->SipharishFormFields as $sipharishFormField)
                                                <td>
                                                    <input
                                                        type="{{$sipharishFormField->type?->resolveType() ?? 'text'}}"
                                                        class="form-control"
                                                        wire:model="data.{{$field->slug}}.{{$index}}.{{$sipharishFormField->slug}}.data"
                                                        id="title"
                                                        required
                                                        wire:change="setType('{{$field->slug}}',{{$index}},'{{$sipharishFormField->slug}}','{{$sipharishFormField->type?->value}}')"/>
                                                    @if(empty($data[$field->slug][$index][$sipharishFormField->slug]['value']))
                                                        <span class="text-danger">Data Not Stored</span>
                                                    @endif
                                                </td>
                                            @endforeach
                                            <th>
                                                <button type="button"
                                                        wire:click.prevent="removeRowInTable('{{$field->slug}}',{{$index}})"
                                                        class="btn btn-sm btn-outline-danger">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </th>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </fieldset>
</form>
