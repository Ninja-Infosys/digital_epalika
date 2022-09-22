
<form wire:submit="save">
    @csrf
    @switch($level)
        @case(2)
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="userDetail.pan_no" class="form-label">प्यान न:</label>
                    <input
                        name="userDetail.pan_no"
                        class="form-control @error('userDetail.pan_no') is-invalid @enderror"
                        wire:model="userDetail.pan_no"
                        type="text"
                        id="userDetail.pan_no"
                        placeholder="प्यान न:"
                    />
                    @error('userDetail.pan_no')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="userDetail.nec_no" class="form-label">NEC</label>
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
                <div class="col-md-4 mb-3">
                    <label for="userDetail.nec_certificate" class="form-label">Upload NEC Certificate</label>
                    <input type="file" class="form-control" id="userDetail.nec_certificate"
                           wire:model="userDetail.nec_certificate"/>
                    @error('userDetail.nec_certificate')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>      
            </div>
            <div class="row">
                <h4 class="title">नागरिकता बिबरण</h4>
                <div class="col-md-4 mb-3">
                    <label for="userDetail.citizenship_no" class="form-label">नागरिता न:</label>
                    <input
                        name="userDetail.citizenship_no"
                        class="form-control @error('userDetail.citizenship_no') is-invalid @enderror"
                        type="text"
                        id="userDetail.citizenship_no"
                        placeholder="नागरिता न:"
                        wire:model="userDetail.citizenship_no"
                    />
                    @error('userDetail.citizenship_no')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="userDetail.citizenship_issued_district" class="form-label"> जारी जिल्ला</label>
                    <select class="form-select @error('userDetail.citizenship_issued_district') is-invalid @enderror"
                            id="userDetail.citizenship_issued_district"
                            wire:model="userDetail.citizenship_issued_district">
                        <option value="">---जारि जिल्ला ----</option>
                        @foreach($districts as $district)
                            <option value="{{$district['id'] ?? ''}}">{{$district['district']??''}}</option>
                        @endforeach
                    </select>

                    @error('userDetail.citizenship_issued_district')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="userDetail.citizenship_issued_date" class="form-label">जारी मिति</label>
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
                <div class="col-md-6 mb-3">
                    <label for="userDetail.citizenship_front" class="form-label">नागरिकता अपलोड गर्नुहोस्
                        (आगाडी)</label>
                    <input type="file" class="form-control" id="userDetail.citizenship_front"
                           wire:model="userDetail.citizenship_front"/>
                    @error('userDetail.citizenship_front')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="userDetail.citizenship_back" class="form-label">नागरिकता अपलोड गर्नुहोस् (पछाडि)</label>
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
                                    <img src="{{ $userDetail['nec_certificate']->temporaryUrl() }}" height="150"
                                     alt="">
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            @if ($userDetail['citizenship_front'])
                                नागरिकता अपलोड गर्नुहोस् (आगाडी)
                                <div class="card" style="width: 8rem">
                                    <img src="{{ $userDetail['citizenship_front']->temporaryUrl() }}" height="150"
                                     alt="">
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            @if ($userDetail['citizenship_back'])
                                नागरिकता अपलोड गर्नुहोस् (आगाडी)
                                <div class="card" style="width: 8rem">
                                    <img src="{{ $userDetail['citizenship_back']->temporaryUrl() }}" height="100"
                                     alt="">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around mt-2">
                <button type="button" class="btn btn-warning text-white" wire:click.prevent="decrementLevel">Back</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="incrementLevel">Next</button>
            </div>
            @break

        @case(3)
            {{--    next step--}}
            <div class="address">
                <h4 class="title">स्थाहि ठेगाना</h4>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="userDetail.permanent_province_id" class="form-label">प्रदेश</label>
                        <select class="form-select @error('userDetail.permanent_province_id') is-invalid @enderror"
                                id="userDetail.permanent_province_id" wire:model="userDetail.permanent_province_id">
                            <option selected>---प्रदेश छान्नुहोस् ----</option>
                            @foreach($provinces as $province)
                                <option value="{{$province['id']??''}}">{{$province['province'] ??''}}</option>
                            @endforeach
                        </select>
                        @error('userDetail.permanent_province_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="userDetail.permanent_district_id" class="form-label">जिल्ला</label>
                        <select class="form-select @error('userDetail.permanent_district_id') is-invalid @enderror"
                                id="userDetail.permanent_district_id" wire:model="userDetail.permanent_district_id">
                            <option value="">---जिल्ला छान्नुहोस् ----</option>
                            @foreach($permanentDistricts as $permanentDistrict)
                                <option value="{{$permanentDistrict->id}}">{{$permanentDistrict->district}}</option>
                            @endforeach
                        </select>
                        @error('userDetail.permanent_district_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="userDetail.permanent_local_body_id" class="form-label">पालिका</label>
                        <select class="form-select @error('userDetail.permanent_local_body_id') is-invalid @enderror"
                                id="userDetail.permanent_local_body_id" wire:model="userDetail.permanent_local_body_id">
                            <option value="">---पालिका छान्नुहोस् ----</option>
                            @foreach($permanentLocalBodies as $permanentLocalBody)
                                <option value="{{$permanentLocalBody->id}}">{{$permanentLocalBody->local_body}}</option>
                            @endforeach
                        </select>
                        @error('userDetail.permanent_local_body_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
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
                    <div class="col-md-4 mb-3">
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
            </div>

            <div class="address">
                <h4 class="title">अस्थाहि ठेगाना</h4>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="userDetail.temporary_province_id" class="form-label">प्रदेश</label>
                        <select class="form-select @error('userDetail.temporary_province_id') is-invalid @enderror"
                                id="userDetail.temporary_province_id" wire:model="userDetail.temporary_province_id">
                            <option value="">---प्रदेश छान्नुहोस् ----</option>
                            @foreach($provinces as $province)
                                <option value="{{$province['id']??''}}">{{$province['province'] ??''}}</option>
                            @endforeach
                        </select>
                        @error('userDetail.temporary_province_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="userDetail.temporary_district_id" class="form-label">जिल्ला</label>
                        <select class="form-select @error('userDetail.temporary_district_id') is-invalid @enderror"
                                id="userDetail.temporary_district_id" wire:model="userDetail.temporary_district_id">
                            <option value="">---जिल्ला छान्नुहोस् ----</option>
                            @foreach($temporaryDistricts as $temporaryDistrict)
                                <option value="{{$temporaryDistrict->id}}">{{$temporaryDistrict->district}}</option>
                            @endforeach
                        </select>
                        @error('userDetail.temporary_district_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="userDetail.temporary_local_body_id" class="form-label">पालिका</label>
                        <select class="form-select @error('userDetail.temporary_local_body_id') is-invalid @enderror"
                                id="userDetail.temporary_local_body_id" wire:model="userDetail.temporary_local_body_id">
                            <option value="">---पालिका छान्नुहोस् ----</option>
                            @foreach($temporaryLocalBodies as $temporaryLocalBody)
                                <option value="{{$temporaryLocalBody->id}}">{{$temporaryLocalBody->local_body}}</option>
                            @endforeach
                        </select>
                        @error('userDetail.temporary_local_body_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
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
                    <div class="col-md-4 mb-3">
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
            </div>
            <div class="d-flex justify-content-around mt-2">
                <button type="button" class="btn btn-warning text-white" wire:click.prevent="decrementLevel">Back</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="incrementLevel">Next</button>
            </div>
            @break

        @case(4)
            {{-- organiztion detail --}}

            <div class="org">
                <h5 class="title">संगठन विवरण</h5>
            </div>
            <div class="row mt-3">
                <div class="col-md-4 mb-3">
                    <label for="organizationDetail.org_name_ne" class="form-label">संगठनको नाम *</label>
                    <input
                        name="organizationDetail.org_name_ne"
                        class="form-control @error('organizationDetail.org_name_ne') is-invalid @enderror"
                        type="text"
                        id="organizationDetail.org_name_ne"
                        placeholder="संगठनको नाम नेपालीमा"
                        wire:model="organizationDetail.org_name_ne"
                    />
                    @error('organizationDetail.org_name_ne')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="organizationDetail.org_name_en" class="form-label">Organization Name *</label>
                    <input
                        name="organizationDetail.org_name_en"
                        class="form-control @error('organizationDetail.org_name_en') is-invalid @enderror"
                        type="text"
                        id="organizationDetail.org_name_en"
                        placeholder="In English"
                        wire:model="organizationDetail.org_name_en"
                    />
                    @error('organizationDetail.org_name_en')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="organizationDetail.org_email" class="form-label">इमेल</label>
                    <input
                        name="organizationDetail.org_email"
                        class="form-control @error('organizationDetail.org_email') is-invalid @enderror"
                        type="text"
                        id="organizationDetail.org_email"
                        placeholder="इमेल"
                        wire:model="organizationDetail.org_email"
                    />
                    @error('organizationDetail.org_email')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="organizationDetail.org_phone" class="form-label">सम्पर्क नम्बर</label>
                    <input
                        name="organizationDetail.org_phone"
                        class="form-control @error('organizationDetail.org_phone') is-invalid @enderror"
                        type="text"
                        id="organizationDetail.org_phone"
                        placeholder="सम्पर्क नम्बर"
                        wire:model="organizationDetail.org_phone"
                    />
                    @error('organizationDetail.org_phone')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="organizationDetail.org_pan" class="form-label">प्यान न:</label>
                    <input
                        name="organizationDetail.org_pan"
                        class="form-control @error('organizationDetail.org_pan') is-invalid @enderror"
                        type="text"
                        id="organizationDetail.org_pan"
                        placeholder="प्यान न:"
                        wire:model="organizationDetail.org_pan"
                    />
                    @error('organizationDetail.org_pan')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="organizationDetail.company_reg_no" class="form-label">कम्पनी दर्ता न:</label>
                    <input
                        name="company_reg_no"
                        class="form-control @error('organizationDetail.company_reg_no') is-invalid @enderror"
                        type="text"
                        id="organizationDetail.company_reg_no"
                        placeholder="कम्पनी दर्ता न:"
                        wire:model="organizationDetail.company_reg_no"
                    />
                    @error('organizationDetail.company_reg_no')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="address">
                <h4 class="title">स्थाहि ठेगाना</h4>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="organizationDetail.province_id" class="form-label">प्रदेश</label>
                        <select class="form-select @error('organizationDetail.province_id') is-invalid @enderror"
                                id="organizationDetail.province_id" wire:model="organizationDetail.province_id">
                            <option selected>---प्रदेश छान्नुहोस् ----</option>
                            @foreach($provinces as $province)
                                <option value="{{$province['id']??''}}">{{$province['province'] ??''}}</option>
                            @endforeach
                        </select>
                        @error('organizationDetail.province_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="organizationDetail.district_id" class="form-label">जिल्ला</label>
                        <select class="form-select @error('organizationDetail.district_id') is-invalid @enderror"
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
                    <div class="col-md-4 mb-3">
                        <label for="organizationDetail.local_body_id" class="form-label">पालिका</label>
                        <select class="form-select @error('organizationDetail.local_body_id') is-invalid @enderror"
                                id="organizationDetail.local_body_id" wire:model="organizationDetail.local_body_id">
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
                    <div class="col-md-4 mb-3">
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
                    <div class="col-md-4 mb-3">
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
            </div>
            <div class="d-flex justify-content-around mt-2">
                <button type="button" class="btn btn-warning text-white" wire:click.prevent="decrementLevel">Back</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="incrementLevel">Next</button>
            </div>
            @break
            @case(5)
            <div class="company-document">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="organizationDetail.company_logo" class="form-label">कम्पनी लोगो</label>
                        <input type="file" class="form-control" id="organizationDetail.company_logo"
                               wire:model="organizationDetail.company_logo"/>
                        @error('organizationDetail.company_logo')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="च organizationDetail.company_certificate" class="form-label">कम्पनी प्रमाणपत्र</label>
                        <input type="file" class="form-control" id="organizationDetail.company_certificate"
                            wire:model="organizationDetail.company_certificate"/>
                        @error('organizationDetail.company_certificate')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="organizationDetail.pan_certificate" class="form-label">प्यान प्रमाणपत्र:</label>
                        <input type="file" class="form-control" id="organizationDetail.pan_certificate"
                        wire:model="organizationDetail.pan_certificate"/>
                        @error('organizationDetail.pan_certificate')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="taxClearance.document" class="form-label">कर चुक्ता:</label>
                        <input type="file" class="form-control" id="taxClearance.document"
                        wire:model="taxClearance.document"/>
                        @error('taxClearance.document')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div> 
                    <div class="col-md-4 mb-3">
                        <label for="taxClearance.year" class="form-label">आ.व</label>
                        <input
                                name="taxClearance.year"
                                 class="form-control @error('taxClearance.year') is-invalid @enderror"
                                 type="text"
                                id="taxClearance.year"
                                 placeholder="आ.व"
                              />
                           @error('taxClearance.year')
                            <div class="invalid-feedback">{{$message}}</div>
                           @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                @if ($organizationDetail['company_logo'])
                                कम्पनी लोगो
                                <div class="card" style="width: 8rem">
                                    <img src="{{ $organizationDetail['company_logo']->temporaryUrl() }}"  height="150"
                                         alt="">
                                </div>
                                @endif
                            </div>
                            <div class="col-md-3">
                                @if ($organizationDetail['company_certificate'])
                                कम्पनी प्रमाणपत्र
                                <div class="card" style="width: 8rem">
                                    <img src="{{ $organizationDetail['company_certificate']->temporaryUrl() }}" height="150"
                                    alt="">
                                </div>                                 
                                @endif
                            </div>
                            <div class="col-md-3">
                                @if ($organizationDetail['pan_certificate'])
                                प्यान प्रमाणपत्र
                                <div class="card" style="width: 8rem">
                                    <img src="{{ $organizationDetail['pan_certificate']->temporaryUrl() }}" height="150"
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
    
                    <div class="col-md-4 mb-3">
                        <label for="user_name" class="form-label">प्रयोगकार्तको नाम</label>
                           <input
                                name="user_name"
                                 class="form-control @error('user_name') is-invalid @enderror"
                                 type="text"
                                id="user_name"
                                 placeholder="प्रयोगकार्तको नाम"
                              />
                           @error('user_name')
                            <div class="invalid-feedback">{{$message}}</div>
                           @enderror
                         </div>
                         <div class="col-md-4 mb-3">
                            <label for="user_email" class="form-label">इमेल</label>
                               <input
                                    name="user_email"
                                     class="form-control @error('user_email') is-invalid @enderror"
                                     type="text"
                                    id="user_email"
                                     placeholder="इमेल"
                                  />
                               @error('user_email')
                                <div class="invalid-feedback">{{$message}}</div>
                               @enderror
                             </div>
                             <div class="col-md-4 mb-3">
                                <label for="user_phone" class="form-label">सम्पर्क न:</label>
                                   <input
                                        name="user_phone"
                                         class="form-control @error('user_phone') is-invalid @enderror"
                                         type="text"
                                        id="user_phone"
                                         placeholder="सम्पर्क न:"
                                      />
                                   @error('user_phone')
                                    <div class="invalid-feedback">{{$message}}</div>
                                   @enderror
                                 </div>
                </div>
            </div>
          
       
            <button type="button" class="btn btn-warning text-white" wire:click.prevent="decrementLevel">Back</button>
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-danger" wire:click.prevent="resetForm">Cancel</button>
            @break
           

        @default
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="userDetail.name_ne" class="form-label">नेपालीमा नाम</label>
                    <input
                        name="userDetail.name_ne"
                        class="form-control @error('userDetail.name_ne') is-invalid @enderror"
                        type="text"
                        value="{{old('userDetail.name_ne')}}"
                        id="userDetail.name_ne"
                        wire:model="userDetail.name_ne"
                        placeholder="नेपालीमा"
                    />
                    @error('userDetail.name_ne')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="userDetail.name_en" class="form-label">Name in English</label>
                    <input
                        name="userDetail.name_en"
                        class="form-control @error('userDetail.name_en') is-invalid @enderror"
                        type="text"
                        value="{{old('userDetail.name_en')}}"
                        id="userDetail.name_en"
                        wire:model="userDetail.name_en"
                        placeholder="English"
                    />
                    @error('userDetail.name_en')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="userDetail.email" class="form-label">इमेल</label>
                    <input
                        name="userDetail.email"
                        class="form-control @error('userDetail.email') is-invalid @enderror"
                        type="email"
                        value="{{old('userDetail.email')}}"
                        id="userDetail.email"
                        wire:model="userDetail.email"
                        placeholder="इमेल"
                    />
                    @error('userDetail.email')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="userDetail.phone" class="form-label">सम्पर्क नम्बर</label>
                    <input
                        name="userDetail.phone"
                        class="form-control @error('userDetail.phone') is-invalid @enderror"
                        type="text"
                        id="userDetail.phone"
                        wire:model="userDetail.phone"
                        placeholder="सम्पर्क नम्बर"
                    />
                    @error('userDetail.phone')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="userDetail.gender" class="form-label">लिङ्ग</label>
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
                <div class="col-md-6 mb-3">
                    <label for="userDetail.marital_status" class="form-label">वैवाहिक स्थिति </label>
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
                <div class="col-md-6 mb-3">
                    <label for="userDetail.father_name" class="form-label">बुवाको नाम</label>
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
                <div class="col-md-6 mb-3">
                    <label for="userDetail.grandfather_name" class="form-label">हजुर बुवाको नाम</label>
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
            <div class="d-flex pull-right justify-content-around mt-2">
                <button type="button" class="btn btn-primary" wire:click="incrementLevel">Next</button>
            </div>
    @endswitch
</form>



