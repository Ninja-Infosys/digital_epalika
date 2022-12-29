<div class="modal fade" id="cooperative-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="staticBackdropLabel">नयाँ सहकारी थप्नुहोस् ।</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend><h4 class="text-info"> सहकारीको विवरण </h4></legend>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name" class="form-label">सहकारी नाम <span class="text-danger">*</span></label>
                                <input
                                    type="text"
                                    name="name"
                                    value="{{old('name')}}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="name"
                                    placeholder="सहकारी नाम"
                                />
                                @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="form-label">सहकारी प्रकार <span class="text-danger">*</span></label>
                                <select name="cooperative_type_id" id="cooperative_type_id"
                                        class="form-control @error('cooperative_type_id') is-invalid @enderror">
                                    <option value="">सहकारी प्रकार छान्नुहोस्</option>
                                        <option
                                            value="">gddfghdf</option>

                                </select>
                                @error('cooperative_type_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="registration_no" class="form-label">दर्ता नं<span class="text-danger">*</span></label>
                                <input
                                    type="text"
                                    name="registration_no"
                                    value="{{old('registration_no')}}"
                                    class="form-control @error('registration_no') is-invalid @enderror"
                                    id="registration_no"
                                    placeholder="दर्ता नं"
                                />
                                @error('registration_no')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <x-date-input-component
                                    nameNe="c_registration_date" labelNe="दर्ता मिति *"
                                    nameEn="en_c_registration_date" labelEn="Registration Date"
                                    :getTodayDate="false"
                                    container="#cooperative-modal"
                                />
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="my-1">
                        <legend><h4 class="text-info"> स्थायी ठेगाना </h4></legend>
                        @livewire('address', [
                        'province_id' =>$officeSetting->province_id,
                        'district_id' => $officeSetting->district_id,
                        'local_body_id' => $officeSetting->local_body_id
                        ])
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">रद्द गर्नुहोस्</button>
                <button type="submit" class="btn btn-primary">पेश गर्नुहोस्</button>
            </div>
        </div>
    </div>
</div>
