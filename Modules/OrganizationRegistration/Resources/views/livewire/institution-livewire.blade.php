<div>
    <div class="row">
        <div class="col-md-4 mb-2">
            <label for="officer_designation" class="form-label">पद </label>
            <select
                name="officer_designation"
                wire:model="officer_designation"
                class="form-select @error('officer_designation') is-invalid @enderror"
                id="officer_designation">
                <option value="">पद छान्नुहोस्</option>
                    <option value="">
                        अधक्ष्य
                    </option>
            </select>
            @error('designation')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="officer_name" class="form-label">नाम:*  </label>
            <input type="text"
                   name="officer_name"
                   wire:model="officer_name"
                   class="form-control @error('officer_designation') is-invalid @enderror"
                   id="officer_name">
            @error('officer_name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="officer_citizenship_no" class="form-label">ना‌.प्र.प.नं.*  </label>
            <input type="text"
                   name="officer_citizenship_no"
                   wire:model="officer_citizenship_no"
                   class="form-control @error('officer_designation') is-invalid @enderror"
                   id="officer_citizenship_no">
            @error('officer_citizenship_no')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <x-date-input-component
                nameNe="officer_citizenship_issue_date" labelNe="ना‌. जारी मिति: *"
                nameEn="officer_citizenship_issue_date_en"
                labelEn="Citizenship Issue Date:"
            />

        </div>
        <div class="col-md-4 mb-2">
            <label for="officer_citizenship_issue_district" class="form-label">ना. जारी जिल्ला</label>
            <input type="text"
                   name="officer_citizenship_issue_district"
                   wire:model="officer_citizenship_issue_district"
                   class="form-control @error('officer_designation') is-invalid @enderror"
                   id="officer_citizenship_issue_district">
            @error('officer_citizenship_issue_district')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="officer_citizenship_issue_current_address" class="form-label">हालको ठेगाना*</label>
            <input type="text"
                   name="officer_citizenship_issue_current_address"
                   wire:model="officer_citizenship_issue_current_address"
                   class="form-control @error('officer_designation') is-invalid @enderror"
                   id="officer_citizenship_issue_current_address">
            @error('officer_citizenship_issue_current_address')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="officer_contact_detail" class="form-label">सम्पर्क विवरण*</label>
            <input type="number"
                   name="officer_contact_detail"
                   wire:model="officer_contact_detail"
                   class="form-control @error('officer_designation') is-invalid @enderror"
                   id="officer_contact_detail">
            @error('officer_contact_detail')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="officer_photo" class="form-label">फोटो :</label>
            <input type="file"
                   name="officer_photo"
                   wire:model="officer_photo"
                   class="form-control @error('officer_designation') is-invalid @enderror"
                   id="officer_photo">
            @error('officer_photo')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="officer_citizenship_front" class="form-label">नागरिकता (अगाडि) :</label>
            <input type="file"
                   name="officer_citizenship_front"
                   wire:model="officer_citizenship_front"
                   class="form-control @error('officer_designation') is-invalid @enderror"
                   id="officer_citizenship_front">
            @error('officer_citizenship_front')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-2">
            <label for="officer_citizenship_behind" class="form-label">नागरिकता (पछाडी) :</label>
            <input type="file"
                   name="officer_citizenship_behind"
                   wire:model="officer_citizenship_behind"
                   class="form-control @error('officer_designation') is-invalid @enderror"
                   id="officer_citizenship_behind">
            @error('officer_citizenship_behind')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
</div>
