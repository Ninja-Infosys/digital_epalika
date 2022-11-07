<form method="post">
    <div class="row">
        <div class="col-md-12 mb-2">
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
                        <label for="complainant_name" class="form-label">उजुरीकर्ता को नाम</label>
                        <input
                            type="text"
                            wire:model="form.complainant_name"
                            class="form-control"
                            id="complainant_name"
                            placeholder="उजुरीकर्ता को नाम"
                        />
                        @error('form.complainant_name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="photo" class="form-label">फोटो </label>
                        <input type="file"
                               name="photo"
                               class="form-control @error('photo') is-invalid @enderror"
                               id="photo"
                               alt="hello"/>
                        @error('photo')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">
        Save
    </button>
</form>
