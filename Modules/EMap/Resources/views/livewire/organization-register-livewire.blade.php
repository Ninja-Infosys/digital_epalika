<div id="progressbarwizard" class="overflow-hidden p-2">
    <ul class="nav nav-pills nav-justified form-wizard-header mb-1">
        <li class="nav-item" data-bs-target="#accountForm">
            <a href="#first" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                <i class="fa fa-user-circle me-1"></i>
                <span class="d-none d-sm-inline">व्यक्तिगत विवरण</span>
            </a>
        </li>
        <li class="nav-item" data-bs-target="#profileForm">
            <a href="#second" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                <i class="fa fa-check-circle me-1"></i>
                <span class="d-none d-sm-inline">प्रमाणीकरण</span>
            </a>
        </li>
        <li class="nav-item" data-bs-target="#otherForm">
            <a href="#third" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                <i class="fa fa-map-marker me-1"></i>
                <span class="d-none d-sm-inline">ठेगाना</span>
            </a>
        </li>
        <li class="nav-item" data-bs-target="#orgDetail">
            <a href="#fourth" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                <i class="fa fa-building me-1"></i>
                <span class="d-none d-sm-inline">संगठन विवरण</span>
            </a>
        </li>
        <li class="nav-item" data-bs-target="#docs">
            <a href="#fifth" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                <i class="fa fa-file-alt me-1"></i>
                <span class="d-none d-sm-inline">कागजातहरू</span>
            </a>
        </li>
        <li class="nav-item" data-bs-target="#auth">
            <a href="#sixth" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                <i class="fa fa-lock me-1"></i>
                <span class="d-none d-sm-inline">प्रयोगकर्ता</span>
            </a>
        </li>
        <li class="nav-item" data-bs-target="#detail">
            <a href="#seventh" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                <i class="fa fa-clipboard-list me-1"></i>
                <span class="d-none d-sm-inline">पूर्ण विवरण</span>
            </a>
        </li>
    </ul>
    <form>
        <div class="tab-content mb-0 b-0 pt-0">
            <div id="bar" class="progress mb-3" style="height: 7px;">
                <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
            </div>
            <div class="tab-pane" id="first">
                <div id="accountForm" class="form-horizontal">
                    <div class="col-md-3 mb-2">
                        <label class="form-label">परामर्शदाता प्रकार <span class="text-danger">*</span></label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>--- परामर्शदाता छान्नुहोस् ---</option>
                            <option value="1">संगठन</option>
                            <option value="2">व्यक्ति</option>
                        </select>
                    </div>
                    <fieldset>
                        <legend class="title">ब्यतिगत बिबरण</legend>
                        <div class="row">
                            <div class="col-md-3 mb-1">
                                <label for="userDetail.name_ne" class="form-label">पुरा नाम <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text"
                                           class="form-control @error('userDetail.name_ne') is-invalid @enderror"
                                           value="{{old('userDetail.name_ne')}}" placeholder="नेपालीमा नाम"
                                           id="userDetail.name_ne"
                                           wire:model="userDetail.name_ne">
                                    @error('userDetail.name_ne')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <input type="text"
                                           class="form-control @error('userDetail.name_en') is-invalid @enderror"
                                           placeholder="In English"
                                           value="{{old('userDetail.name_en')}}"
                                           id="userDetail.name_en"
                                           wire:model="userDetail.name_en">
                                    @error('userDetail.name_en')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="userDetail.email" class="form-label">इमेल
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                            <span class="input-group-text" id="userDetail.email">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                    <input type="email"
                                           class="form-control @error('userDetail.email') is-invalid @enderror"
                                           name="userDetail.email"
                                           value="{{old('userDetail.email')}}"
                                           id="userDetail.email"
                                           wire:model="userDetail.email"
                                           placeholder="इमेल">
                                </div>
                                @error('userDetail.email')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="userDetail.phone" class="form-label">सम्पर्क नम्बर
                                    <span class="text-danger">*</span>
                                </label>

                                <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                    <input type="text" class="form-control
                                            @error('userDetail.phone') is-invalid @enderror"
                                           name="userDetail.phone"
                                           id="userDetail.phone"
                                           wire:model="userDetail.phone"
                                           placeholder="सम्पर्क नम्बर">
                                </div>
                                @error('userDetail.phone')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="userDetail.gender" class="form-label">लिङ्ग
                                    <span class="text-danger">*</span></label>
                                <select
                                    class="form-select @error('userDetail.gender') is-invalid @enderror"
                                    wire:model="userDetail.gender"
                                    id="userDetail.gender">
                                    <option value="">--- लिङ्ग छान्नुहोस् ---</option>
                                    <option value="Male">पूरुष</option>
                                    <option value="Female">महिला</option>
                                    <option value="Other">अन्य</option>
                                </select>
                                @error('userDetail.gender')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="userDetail.marital_status" class="form-label">वैवाहिक स्थिति
                                    <span class="text-danger">*</span>
                                </label>
                                <select
                                    class="form-select @error('userDetail.marital_status') is-invalid @enderror"
                                    wire:model="userDetail.marital_status"
                                    id="userDetail.marital_status">
                                    <option value="">--- वैवाहिक स्थिति ---</option>
                                    <option value="Married">Married</option>
                                    <option value="UnMarried">UnMarried</option>
                                </select>
                                @error('userDetail.marital_status')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="userDetail.father_name" class="form-label">बुवाको नाम
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    name="userDetail.father_name"
                                    class="form-control @error('userDetail.father_name') is-invalid @enderror"
                                    wire:model="userDetail.father_name"
                                    type="text"
                                    id="userDetail.father_name"
                                    placeholder="बुवाको नाम"
                                />
                                @error('userDetail.father_name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="userDetail.grandfather_name" class="form-label">हजुर बुवाको नाम
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    name="userDetail.grandfather_name"
                                    class="form-control @error('userDetail.grandfather_name') is-invalid @enderror"
                                    wire:model="userDetail.grandfather_name"
                                    type="text"
                                    id="userDetail.grandfather_name"
                                    placeholder=" हजुर बुवाको नाम"
                                />
                                @error('userDetail.grandfather_name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="tab-pane fade" id="second">
                <div id="profileForm" class="form-horizontal">
                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <label for="userDetail.pan_no" class="form-label">पाना नं. <span
                                    class="text-danger">*</span></label>
                            <input
                                name="userDetail.pan_no"
                                class="form-control @error('userDetail.pan_no') is-invalid @enderror"
                                wire:model="userDetail.pan_no"
                                type="text"
                                id="userDetail.pan_no"
                                placeholder="पाना नं."
                            />
                            @error('userDetail.pan_no')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="userDetail.nec_no" class="form-label">NEC <span
                                    class="text-danger">*</span></label>
                            <input
                                name="userDetail.nec_no"
                                class="form-control @error('userDetail.nec_no') is-invalid @enderror"
                                type="text"
                                id="userDetail.nec_no"
                                placeholder="NEC"
                                wire:model="userDetail.nec_no"
                            />
                            @error('userDetail.nec_no')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="userDetail.nec_certificate" class="form-label">Upload NEC Certificate <span
                                    class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="userDetail.nec_certificate"
                                   wire:model="userDetail.nec_certificate"/>
                            @error('userDetail.nec_certificate')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <fieldset>
                        <legend class="title">नागरिकता बिबरण</legend>
                        <div class="row">
                            <div class="col-md-4 mb-1">
                                <label for="userDetail.citizenship_no" class="form-label">नागरिता नं. <span
                                        class="text-danger">*</span></label>
                                <input
                                    name="userDetail.citizenship_no"
                                    class="form-control @error('userDetail.citizenship_no') is-invalid @enderror"
                                    type="text"
                                    id="userDetail.citizenship_no"
                                    placeholder="नागरिता नं."
                                    wire:model="userDetail.citizenship_no"
                                />
                                @error('userDetail.citizenship_no')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="userDetail.citizenship_issued_district" class="form-label"> जारी जिल्ला
                                    <span class="text-danger">*</span></label>
                                <select
                                    class="form-select @error('userDetail.citizenship_issued_district') is-invalid @enderror"
                                    id="userDetail.citizenship_issued_district"
                                    wire:model="userDetail.citizenship_issued_district">
                                    <option value="">---जारि जिल्ला ----</option>
                                    @foreach($districts as $district)
                                        <option value="{{$district->id ?? ''}}">{{$district->district ??''}}</option>
                                    @endforeach
                                </select>

                                @error('userDetail.citizenship_issued_district')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="userDetail.citizenship_issued_date" class="form-label">जारी मिति <span
                                        class="text-danger">*</span></label>
                                <input
                                    name="userDetail.citizenship_issued_date"
                                    class="form-control @error('userDetail.citizenship_issued_date') is-invalid @enderror"
                                    type="text"
                                    id="userDetail.citizenship_issued_district"
                                    placeholder="जारी मिति"
                                    wire:model="userDetail.citizenship_issued_date"
                                />
                                @error('userDetail.citizenship_issued_date')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-1">
                                <label for="userDetail.citizenship_front" class="form-label">नागरिकता अपलोड गर्नुहोस्
                                    (आगाडी) <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="userDetail.citizenship_front"
                                       wire:model="userDetail.citizenship_front"/>
                                @error('userDetail.citizenship_front')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-1">
                                <label for="userDetail.citizenship_back" class="form-label">नागरिकता अपलोड गर्नुहोस्
                                    (पछाडि) <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="userDetail.citizenship_back"
                                       wire:model="userDetail.citizenship_back"/>
                                @error('userDetail.citizenship_back')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        @if ($userDetail['nec_certificate'])
                                            NEC Certificate
                                            <div class="card" style="width: 8rem">
                                                <img src="{{ $userDetail['nec_certificate']->temporaryUrl() }}"
                                                     height="150"
                                                     alt="">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        @if ($userDetail['citizenship_front'])
                                            नागरिकता अपलोड गर्नुहोस् (आगाडी)
                                            <div class="card" style="width: 8rem">
                                                <img src="{{ $userDetail['citizenship_front']->temporaryUrl() }}"
                                                     height="150"
                                                     alt="">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        @if ($userDetail['citizenship_back'])
                                            नागरिकता अपलोड गर्नुहोस् (आगाडी)
                                            <div class="card" style="width: 8rem">
                                                <img src="{{ $userDetail['citizenship_back']->temporaryUrl() }}"
                                                     height="150"
                                                     alt="">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="tab-pane fade" id="third">
                <div id="otherForm" class="form-horizontal">
                    <div class="address">
                        <fieldset>
                            <legend class="title">स्थाहि ठेगाना</legend>
                            <div class="row">
                                <div class="col-md-2 mb-1">
                                    <label for="userDetail.permanent_province_id" class="form-label">प्रदेश</label>
                                    <select
                                        class="form-select @error('userDetail.permanent_province_id') is-invalid @enderror"
                                        id="userDetail.permanent_province_id"
                                        wire:model="userDetail.permanent_province_id">
                                        <option selected>---प्रदेश छान्नुहोस् ----</option>
                                        @foreach($provinces as $province)
                                            <option
                                                value="{{$province->id ??''}}">{{$province->province ??''}}</option>
                                        @endforeach
                                    </select>
                                    @error('userDetail.permanent_province_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2 mb-1">
                                    <label for="userDetail.permanent_district_id" class="form-label">जिल्ला</label>
                                    <select
                                        class="form-select @error('userDetail.permanent_district_id') is-invalid @enderror"
                                        id="userDetail.permanent_district_id"
                                        wire:model="userDetail.permanent_district_id">
                                        <option value="">---जिल्ला छान्नुहोस् ----</option>
                                        @foreach($permanentDistricts as $permanentDistrict)
                                            <option
                                                value="{{$permanentDistrict->id}}">{{$permanentDistrict->district}}</option>
                                        @endforeach
                                    </select>
                                    @error('userDetail.permanent_district_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2 mb-1">
                                    <label for="userDetail.permanent_local_body_id" class="form-label">पालिका</label>
                                    <select
                                        class="form-select @error('userDetail.permanent_local_body_id') is-invalid @enderror"
                                        id="userDetail.permanent_local_body_id"
                                        wire:model="userDetail.permanent_local_body_id">
                                        <option value="">---पालिका छान्नुहोस् ----</option>
                                        @foreach($permanentLocalBodies as $permanentLocalBody)
                                            <option
                                                value="{{$permanentLocalBody->id}}">{{$permanentLocalBody->local_body}}</option>
                                        @endforeach
                                    </select>
                                    @error('userDetail.permanent_local_body_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2 mb-1">
                                    <label for="userDetail.permanent_ward" class="form-label">वार्ड न:</label>
                                    <select class="form-select @error('userDetail.permanent_ward') is-invalid @enderror"
                                            id="userDetail.permanent_ward" wire:model="userDetail.permanent_ward">
                                        <option value="">---वडा छान्नुहोस् ----</option>
                                        @foreach($permanentWards as $permanentWard)
                                            <option value="{{$permanentWard}}">{{$permanentWard}}</option>
                                        @endforeach
                                    </select>
                                    @error('userDetail.permanent_ward')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label for="userDetail.permanent_tole" class="form-label">गाउ/टोल</label>
                                    <input
                                        name="userDetail.permanent_tole"
                                        class="form-control @error('userDetail.permanent_tole') is-invalid @enderror"
                                        type="text"
                                        id="userDetail.permanent_tole"
                                        placeholder="गाउ/टोल"
                                        wire:model="userDetail.permanent_tole"
                                    />
                                    @error('userDetail.permanent_tole')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="my-2">
                        <div class="form-check mb-2 form-check-primary">
                            <input class="form-check-input" type="checkbox" value="" id="addresscheck" checked="">
                            <label class="form-check-label fw-bold" for="addresscheck">के स्थायी र अस्थायी ठेगाना एउटै
                                हो?</label>
                        </div>
                    </div>
                    <div class="address">
                        <fieldset>
                            <legend class="title">अस्थाहि ठेगाना</legend>
                            <div class="row">
                                <div class="col-md-2 mb-1">
                                    <label for="userDetail.temporary_province_id" class="form-label">प्रदेश</label>
                                    <select
                                        class="form-select @error('userDetail.temporary_province_id') is-invalid @enderror"
                                        id="userDetail.temporary_province_id"
                                        wire:model="userDetail.temporary_province_id">
                                        <option value="">---प्रदेश छान्नुहोस् ----</option>
                                        @foreach($provinces as $province)
                                            <option value="{{$province->id??''}}">{{$province->province ??''}}</option>
                                        @endforeach
                                    </select>
                                    @error('userDetail.temporary_province_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2 mb-1">
                                    <label for="userDetail.temporary_district_id" class="form-label">जिल्ला</label>
                                    <select
                                        class="form-select @error('userDetail.temporary_district_id') is-invalid @enderror"
                                        id="userDetail.temporary_district_id"
                                        wire:model="userDetail.temporary_district_id">
                                        <option value="">---जिल्ला छान्नुहोस् ----</option>
                                        @foreach($temporaryDistricts as $temporaryDistrict)
                                            <option
                                                value="{{$temporaryDistrict->id}}">{{$temporaryDistrict->district}}</option>
                                        @endforeach
                                    </select>
                                    @error('userDetail.temporary_district_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2 mb-1">
                                    <label for="userDetail.temporary_local_body_id" class="form-label">पालिका</label>
                                    <select
                                        class="form-select @error('userDetail.temporary_local_body_id') is-invalid @enderror"
                                        id="userDetail.temporary_local_body_id"
                                        wire:model="userDetail.temporary_local_body_id">
                                        <option value="">---पालिका छान्नुहोस् ----</option>
                                        @foreach($temporaryLocalBodies as $temporaryLocalBody)
                                            <option
                                                value="{{$temporaryLocalBody->id}}">{{$temporaryLocalBody->local_body}}</option>
                                        @endforeach
                                    </select>
                                    @error('userDetail.temporary_local_body_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2 mb-1">
                                    <label for="userDetail.temporary_ward" class="form-label">वार्ड न:</label>
                                    <select class="form-select @error('userDetail.temporary_ward') is-invalid @enderror"
                                            id="userDetail.temporary_ward" wire:model="userDetail.temporary_ward">
                                        <option value="">---वडा छान्नुहोस् ----</option>
                                        @foreach($temporaryWards as $temporaryWard)
                                            <option value="{{$temporaryWard}}">{{$temporaryWard}}</option>
                                        @endforeach
                                    </select>
                                    @error('userDetail.temporary_ward')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label for="userDetail.temporary_tole" class="form-label">गाउ/टोल</label>
                                    <input
                                        name="userDetail.temporary_tole"
                                        class="form-control @error('userDetail.temporary_tole') is-invalid @enderror"
                                        type="text"
                                        id="userDetail.temporary_tole"
                                        placeholder="गाउ/टोल"
                                        wire:model="userDetail.temporary_tole"
                                    />
                                    @error('userDetail.temporary_tole')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="fourth">
                <div id="orgDetail" class="form-horizontal">
                        <fieldset>
                            <legend class="title">संगठन विवरण</legend>
                            <div class="row">
                                <div class="col-md-4 mb-1">
                                    <label for="organizationDetail.org_name_ne" class="form-label">संगठनको नाम <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input name="organizationDetail.org_name_ne"
                                               class="form-control @error('organizationDetail.org_name_ne') is-invalid @enderror"
                                               type="text"
                                               id="organizationDetail.org_name_ne"
                                               placeholder="नेपालीमा"
                                               wire:model="organizationDetail.org_name_ne">
                                        @error('organizationDetail.org_name_ne')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        <input name="organizationDetail.org_name_en"
                                               class="form-control @error('organizationDetail.org_name_en') is-invalid @enderror"
                                               type="text"
                                               id="organizationDetail.org_name_en"
                                               placeholder="In English"
                                               wire:model="organizationDetail.org_name_en">
                                        @error('organizationDetail.org_name_en')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3 mb-1">
                                    <label  for="organizationDetail.org_email" class="form-label">इमेल
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                            <span class="input-group-text" id="userDetail.email">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                        <input name="organizationDetail.org_email"
                                               class="form-control @error('organizationDetail.org_email') is-invalid @enderror"
                                               type="text"
                                               id="organizationDetail.org_email"
                                               placeholder="इमेल"
                                               wire:model="organizationDetail.org_email">
                                    </div>
                                    @error('organizationDetail.org_email')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-1">
                                    <label  for="organizationDetail.org_contact" class="form-label">सम्पर्क नम्बर
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                            <span class="input-group-text" id="userDetail.email">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                        <input name="organizationDetail.org_contact"
                                               class="form-control @error('organizationDetail.org_contact') is-invalid @enderror"
                                               type="text"
                                               id="organizationDetail.org_contact"
                                               placeholder="सम्पर्क नम्बर"
                                               wire:model="organizationDetail.org_contact">
                                    </div>
                                    @error('organizationDetail.org_contact')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2 mb-1">
                                    <label for="organizationDetail.org_pan_no" class="form-label">पाना नं.</label>
                                    <input
                                        name="organizationDetail.org_pan_no"
                                        class="form-control @error('organizationDetail.org_pan_no') is-invalid @enderror"
                                        type="text"
                                        id="organizationDetail.org_pan_no"
                                        placeholder="पाना नं."
                                        wire:model="organizationDetail.org_pan_no"
                                    />
                                    @error('organizationDetail.org_pan_no')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-1">
                                    <label for="organizationDetail.org_registration_no" class="form-label">कम्पनी दर्ता
                                        न:</label>
                                    <input
                                        name="org_registration_no"
                                        class="form-control @error('organizationDetail.org_registration_no') is-invalid @enderror"
                                        type="text"
                                        id="organizationDetail.org_registration_no"
                                        placeholder="कम्पनी दर्ता न:"
                                        wire:model="organizationDetail.org_registration_no"
                                    />
                                    @error('organizationDetail.org_registration_no')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend class="title">स्थाहि ठेगाना</legend>
                            <div class="row">
                                <div class="col-md-2 mb-1">
                                    <label for="organizationDetail.province_id" class="form-label">प्रदेश</label>
                                    <select
                                        class="form-select @error('organizationDetail.province_id') is-invalid @enderror"
                                        id="organizationDetail.province_id" wire:model="organizationDetail.province_id">
                                        <option selected>---प्रदेश छान्नुहोस् ----</option>
                                        @foreach($provinces as $province)
                                            <option value="{{$province->id??''}}">{{$province->province ??''}}</option>
                                        @endforeach
                                    </select>
                                    @error('organizationDetail.province_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2 mb-1">
                                    <label for="organizationDetail.district_id" class="form-label">जिल्ला</label>
                                    <select
                                        class="form-select @error('organizationDetail.district_id') is-invalid @enderror"
                                        id="organizationDetail.district_id" wire:model="organizationDetail.district_id">
                                        <option value="">---जिल्ला छान्नुहोस् ----</option>
                                        @foreach($organizationDistricts as $organizationDistrict)
                                            <option
                                                value="{{$organizationDistrict->id}}">{{$organizationDistrict->district}}</option>
                                        @endforeach
                                    </select>
                                    @error('organizationDetail.district_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2 mb-1">
                                    <label for="organizationDetail.local_body_id" class="form-label">पालिका</label>
                                    <select
                                        class="form-select @error('organizationDetail.local_body_id') is-invalid @enderror"
                                        id="organizationDetail.local_body_id"
                                        wire:model="organizationDetail.local_body_id">
                                        <option value="">---पालिका छान्नुहोस् ----</option>
                                        @foreach($organizationLocalBodies as $organizationLocalBody)
                                            <option
                                                value="{{$organizationLocalBody->id}}">{{$organizationLocalBody->local_body}}</option>
                                        @endforeach
                                    </select>
                                    @error('organizationDetail.local_body_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2 mb-1">
                                    <label for="organizationDetail.ward" class="form-label">वार्ड न:</label>
                                    <select class="form-select @error('organizationDetail.ward') is-invalid @enderror"
                                            id="organizationDetail.ward" wire:model="organizationDetail.ward">
                                        <option value="">---वडा छान्नुहोस् ----</option>
                                        @foreach($organizationWards as $organizationWard)
                                            <option value="{{$organizationWard}}">{{$organizationWard}}</option>
                                        @endforeach
                                    </select>
                                    @error('organizationDetail.ward')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label for="organizationDetail.tole" class="form-label">गाउ/टोल</label>
                                    <input
                                        name="organizationDetail.tole"
                                        class="form-control @error('organizationDetail.tole') is-invalid @enderror"
                                        type="text"
                                        id="organizationDetail.tole"
                                        placeholder="गाउ/टोल"
                                        wire:model="organizationDetail.tole"
                                    />
                                    @error('organizationDetail.tole')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                </div>
            </div>
            <div class="tab-pane fade" id="fifth">
                <div id="docs" class="form-horizontal">
                    <div class="company-document">
                        <div class="row">
                            <div class="col-md-3 mb-1">
                                <label for="organizationDetail.logo" class="form-label">कम्पनी लोगो</label>
                                <input type="file" class="form-control" id="organizationDetail.logo"
                                       wire:model="organizationDetail.logo"/>
                                @error('organizationDetail.logo')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="organizationDetail.org_registration_document" class="form-label">कम्पनी
                                    प्रमाणपत्र</label>
                                <input type="file" class="form-control"
                                       id="organizationDetail.org_registration_document"
                                       wire:model="organizationDetail.org_registration_document"/>
                                @error('organizationDetail.org_registration_document')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="organizationDetail.org_pan_document" class="form-label">प्यान
                                    प्रमाणपत्र:</label>
                                <input type="file" class="form-control" id="organizationDetail.org_pan_document"
                                       wire:model="organizationDetail.org_pan_document"/>
                                @error('organizationDetail.org_pan_document')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="taxClearance.document" class="form-label">कर चुक्ता:</label>
                                <input type="file" class="form-control" id="taxClearance.document"
                                       wire:model="taxClearance.document"/>
                                @error('taxClearance.document')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-1">
                                <label for="taxClearance.year" class="form-label">आ.व</label>
                                <input
                                    name="taxClearance.year"
                                    class="form-control @error('taxClearance.year') is-invalid @enderror"
                                    type="text"
                                    id="taxClearance.year"
                                    placeholder="आ.व"
                                    wire:model="taxClearance.year"
                                />
                                @error('taxClearance.year')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        @if ($organizationDetail['logo'])
                                            कम्पनी लोगो
                                            <div class="card" style="width: 8rem">
                                                <img src="{{ $organizationDetail['logo']->temporaryUrl() }}"
                                                     height="150"
                                                     alt="">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        @if ($organizationDetail['org_registration_document'])
                                            कम्पनी प्रमाणपत्र
                                            <div class="card" style="width: 8rem">
                                                <img
                                                    src="{{ $organizationDetail['org_registration_document']->temporaryUrl() }}"
                                                    height="150"
                                                    alt="">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        @if ($organizationDetail['org_pan_document'])
                                            प्यान प्रमाणपत्र
                                            <div class="card" style="width: 8rem">
                                                <img src="{{ $organizationDetail['org_pan_document']->temporaryUrl() }}"
                                                     height="150"
                                                     alt="">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        @if ($taxClearance['document'])
                                            कर चुक्ता
                                            <div class="card" style="width: 8rem">
                                                <img src="{{ $taxClearance['document']->temporaryUrl() }}" height="150"
                                                     alt="">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="sixth">
                <div id="auth" class="form-horizontal">
                    <div class="alert alert-info" role="alert">
                        निम्न प्रयोगकर्ताको इमेल, सम्पर्क नम्बर, र प्रयोगकर्ताको नाम, प्रणालीमा लग-इन गर्न प्रयोग हुनेछ !!!
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-1">
                            <label for="user.name" class="form-label">प्रयोगकर्ताको नाम <span class="text-danger">*</span></label>
                            <div class="input-group">
                                            <span class="input-group-text" id="user.name">
                                                <i class="fa fa-user"></i>
                                            </span>
                                <input name="user.name"
                                       class="form-control @error('user.name') is-invalid @enderror"
                                       type="text"
                                       id="user.name"
                                       placeholder="प्रयोगकर्ताको नाम"
                                       wire:model="user.name">
                            </div>
                            @error('user.name')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-1">
                            <label for="user.email" class="form-label">इमेल <span class="text-danger">*</span></label>
                            <div class="input-group">
                                            <span class="input-group-text" id="user.email">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                <input name="user.email"
                                       class="form-control @error('user.email') is-invalid @enderror"
                                       type="email"
                                       id="user.email"
                                       placeholder="इमेल"
                                       wire:model="user.email">
                            </div>
                            @error('user.email')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-3 mb-1">
                            <label for="user.phone" class="form-label">सम्पर्क नं. <span class="text-danger">*</span></label>
                            <div class="input-group">
                                            <span class="input-group-text" id="user.email">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                <input name="user.phone"
                                       class="form-control @error('user.phone') is-invalid @enderror"
                                       type="text"
                                       id="user.phone"
                                       placeholder="सम्पर्क नं"
                                       wire:model="user.phone">
                            </div>
                            @error('user.phone')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                </div>
            </div>
            </div>
            <div class="tab-pane fade" id="seventh">
                <div id="detail" class="form-horizontal">
                    fsadgf gasdjf gasdh
                </div>
            </div>
                <ul class="list-inline wizard mb-0">
                    <li class="previous list-inline-item">
                        <a href="javascript: void(0);" class="btn btn-info">
                            <i class="fa fa-arrow-circle-left"></i> अघिल्लो</a>
                    </li>
                    <li class="next list-inline-item float-end">
                        <a href="javascript: void(0);" class="btn btn-success">
                            <i class="fa fa-arrow-circle-right"></i> अर्को</a>
                    </li>
                </ul>
            </div>
    </form>
</div>
