<div>
  <fieldset>
    <legend>
      <h4 class="text-info">सिफारिस फाराम</h4>
    </legend>
    <div class="row">

      <div class="col-md-4 mb-2">
        <label for="personal_detail_id" class="form-label">व्यक्तिगत विवरण</label>
        <div class="d-flex justify-content-between gap-1">
          <select id="personal_detail_id" name="personal_detail_id" class="form-select personalDetail">
            <option value="">-- छान्नुहोस् --</option>
            @foreach ($personalDetails as $personalDetail)
            <option {{ $personalDetail->id == old('personal_detail_id') ? 'selected' : '' }} value="{{ $personalDetail->id }}">{{ $personalDetail->name }}
              ({{ $personalDetail->reg_no }})
            </option>
            @endforeach
          </select>
          <button class="btn btn-sm btn-outline-primary" type="button" id="button-personalDetail" title="उधम थप" data-bs-toggle="modal" data-bs-target="#personalDetail-modal">
            <i class="fa fa-plus"></i></button>
        </div>
        @error('personal_detail_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-4 mb-2">
        <label for="personal_detail_id" class="form-label">सिफारिस श्रेणी</label>
        <div class="d-flex justify-content-between gap-1">
          <select id="sipharis_category_id" wire:model="selectedCategory" name="sipharis_category_id" class="form-select personalDetail" required>
            <option value="">-- छान्नुहोस् --</option>
            @foreach ($sipharishCategories as $sipharishCategory)
            <option value="{{ $sipharishCategory->id }}" {{old('sipharis_category_id') == $sipharishCategory->id ? 'selected':'' }}>
              {{ $sipharishCategory->title }}
            </option>
            @endforeach
          </select>

        </div>
        @error('sipharis_category_id')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="col-md-4 mb-2">
        <label for="personal_detail_id" class="form-label">सिफारिस उप-श्रेणी <span class="text-danger">*</span></label>
        <div class="d-flex justify-content-between gap-1">
          <select id="sipharis_sub_category_id" wire:model="selectedSubcategory" name="sipharis_sub_category_id" class="form-select @error('sipharis_sub_category_id') is-invalid @enderror" personalDetail" required>
            <option value="">-- छान्नुहोस् --</option>
            @foreach ($sipharishSubCategories as $sipharishCategory)
            <option value="{{ $sipharishCategory->id }}">
              {{ $sipharishCategory->title }}
            </option>
            @endforeach
          </select>

        </div>
        @error('sipharis_sub_category_id')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>



      <div class="row">
        <div class="col-md-4 mb-2">
          <label for="personal_detail_id" class="form-label">सिफारिस उप-श्रेणी <span class="text-danger">*</span></label>
          <div class="d-flex justify-content-between gap-1">
            <select id="sipharis_form_type_id" wire:model="selectedFormType" name="sipharis_form_type_id" class="form-select @error('sipharis_form_type_id') is-invalid @enderror" personalDetail" required>
              <option value="">-- छान्नुहोस् --</option>
              @foreach ($formTypes as $formType)
              <option value="{{ $formType->id }}">
                {{ $formType->title }}
              </option>
              @endforeach
            </select>

          </div>
          @error('sipharis_form_type_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="col-md-4 mb-2">
          <label for="personal_detail_id" class="form-label">हस्ताक्षर <span class="text-danger">*</span></label>
          <div class="d-flex justify-content-between gap-1">
            <select id="sipharis_signature_id"  name="sipharis_signature_id" class="form-select @error('sipharis_signature_id') is-invalid @enderror" personalDetail" required>
              <option value="">-- छान्नुहोस् --</option>
              @foreach ($sipharisSignatures as $sipharisSignature)
              <option value="{{ $sipharisSignature->id }}">
                {{ $sipharisSignature->full_name }}
              </option>
              @endforeach
            </select>

          </div>
          @error('sipharis_signature_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="col-md-4 mb-2">
          <label for="personal_detail_id" class="form-label">स्थिति <span class="text-danger">*</span></label>
          <div class="d-flex justify-content-between gap-1">
            <select id="personal_detail_id" name="status" class="form-select personalDetail" required>
              <option value="">-- छान्नुहोस् --</option>
              <option value="1" {{old('status')=='1' ?'selected':''}}>Active
              </option>
              <option value="0" {{old('status')=='0' ?'selected':''}}>Inactive
              </option>
            </select>

          </div>
          @error('status')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

      </div>
  </fieldset>

  <div class="row">
    <div class="col-md-12 mb-2">
      <fieldset class="bg-soft-secondary">
        <div id="files">
          @foreach($fields->formFields ?? [] as $key=>$field)
          <div class="main">

            <div class="row border-bottom mb-2">
              <input type="hidden" name="field[{{$key}}][sipharish_form_fields_id]" class="form-control" value="{{$field->id}}" id="sipharish_form_fields_id" />


              <div class="col-md-12 mb-2">
                <label for="title" class="form-label">{{$field->field_name}}</label>
                <input type="text" name="field[{{$key}}][value]" class="form-control" id="title" placeholder="शिर्षक" required />
              </div>
            </div>

          </div>
          @endforeach
        </div>
      </fieldset>
    </div>
  </div>
</div>