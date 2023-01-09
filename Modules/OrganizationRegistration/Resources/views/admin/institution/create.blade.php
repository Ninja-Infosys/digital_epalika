@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.organizationRegistration.institution.index')}}">संस्थाहरू</a>
                        </li>
                        <li class="breadcrumb-item active">संस्था थप्नुहोस</li>
                    </ol>
                </div>
                <h4 class="page-title">संस्था थप्नुहोस</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">संस्था थप्नुहोस</h4>
                        <a href="{{route('admin.organizationRegistration.institution.index')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> संस्थाको सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.organizationRegistration.institution.store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        {{--                        <div class="row">--}}
                        {{--                            <div class="col-md-4">--}}
                        {{--                                <div class="form-group">--}}
                        {{--                                    <label for="tax_payer_number">करदाता नं.: </label>--}}
                        {{--                                    <input type="text" class="form-control" name="tax_payer_number"--}}
                        {{--                                           id="tax_payer_number" value="{{old('tax_payer_number')}}"--}}
                        {{--                                           placeholder="करदाता नं.">--}}
                        {{--                                </div>--}}
                        {{--                                @error('tax_payer_number')--}}
                        {{--                                <div class="invalid-feedback">{{$message}}</div>--}}
                        {{--                                @enderror--}}
                        {{--                            </div>--}}
                        {{--                            <div class="col-md-4">--}}
                        {{--                                <div class="form-group">--}}
                        {{--                                    <x-date-input-component--}}
                        {{--                                        nameNe="registration_date" labelNe="दर्ता मिति:  *"--}}
                        {{--                                        nameEn="registration_date_en" labelEn="Registration Date:"--}}
                        {{--                                    />--}}

                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong>सबै दर्ता भएका संस्थाहरु</strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-4">
                                    <x-date-input-component
                                        nameNe="registration_date" labelNe="दर्ता मिति:  *"
                                        nameEn="registration_date_en" labelEn="Registration Date:"
                                    />

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">संस्थाको नाम  <sup class="text-danger">*required</sup></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               required="" name="name" id="name"
                                               value="{{old('name')}}" placeholder="संस्थाको नाम">
                                        @error('name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    @livewire('address',['address' => [
                                    'province_id' => $officeSetting->province_id ?? null,
                                    'district_id' => $officeSetting->district_id ?? null,
                                    'local_body_id' => $officeSetting->local_body_id ?? null,
                                    'ward_no' => $officeSetting->ward_no ?? null,
                                    ]])
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="institution_address">संस्थाको ठेगाना</label>
                                        <input type="text" class="form-control" name="institution_address" id="institution_address"
                                               value="{{old('institution_address')}}" placeholder="संस्थाको ठेगाना">
                                        @error('institution_address')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contact_no">संस्थाको सम्पर्क नं. <sup class="text-danger">*required</sup> </label>
                                        <input type="number" class="form-control" name="contact_no" id="contact_no"
                                               value="{{old('contact_no')}}" placeholder="संस्थाको सम्पर्क नं.">
                                        @error('contact_no')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">संस्थाको इमेल <sup class="text-danger">*required</sup> </label>
                                        <input type="email" class="form-control" name="email" id="email"
                                               value="{{old('email')}}" placeholder="संस्थाको इमेल">
                                        @error('email')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">जिल्ला प्रशासन कार्यालय दर्ता नं. </label>
                                        <input type="email" class="form-control" name="email" id="email"
                                               value="{{old('email')}}" placeholder="संस्थाको इमेल">
                                        @error('email')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="dao_registration_no">जिल्ला प्रशासन कार्यालय दर्ता नं. </label>
                                        <input type="number" class="form-control" name="dao_registration_no" id="dao_registration_no"
                                               value="{{old('dao_registration_no')}}" placeholder="जिल्ला प्रशासन कार्यालय दर्ता नं.">
                                        @error('dao_registration_no')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <x-date-input-component
                                            nameNe="dao_registration_date" labelNe="जिल्ला प्रशासन कार्यालय दर्ता मिति:  *"
                                            nameEn="dao_registration_date_en" labelEn="District Administration Office Registration Date:"
                                        />

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dao_registration_no">जसमाज कल्याण परिषद् दर्ता नं. </label>
                                            <input type="text" class="form-control" name="dao_registration_no" id="dao_registration_no"
                                                   value="{{old('dao_registration_no')}}" placeholder="जिल्ला प्रशासन कार्यालय दर्ता नं.">
                                            @error('dao_registration_no')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="object_transaction_id">व्यापार वर्ग <sup class="text-danger">*required</sup></label>
                                            <select class="form-control" required="" name="object_transaction_id"
                                                    id="object_transaction_id">
                                                <option disabled="" {{empty(old('object_transaction_id')) ? 'selected':''}} value="">व्यापार वर्ग चयन गर्नुहोस्</option>
                                                {{--                                            @foreach($objectTransactions as $objectTransaction)--}}
                                                {{--                                                <option value="{{$objectTransaction->id}}"--}}
                                                {{--                                                    {{$objectTransaction->objectTransactions->isNotEmpty() ? 'disabled' : ''}} {{old('object_transaction_id')== $objectTransaction->id ? 'selected' : ''}}>{{$objectTransaction->title}}--}}
                                                {{--                                                </option>--}}
                                                {{--                                                @foreach($objectTransaction->objectTransactions as $object)--}}
                                                {{--                                                    <option value="{{$object->id}}" {{old('object_transaction_id')== $object->id ? 'selected' : ''}}>---{{$object->title}}</option>--}}
                                                {{--                                                @endforeach--}}
                                                {{--                                            @endforeach--}}
                                            </select>
                                            @error('object_transaction_id')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="house_number">व्यवसायको घर नं </label>
                                            <input type="text" class="form-control" name="house_number" id="house_number"
                                                   value="{{old('house_number')}}" placeholder="व्यवसायको घर नं">
                                            @error('house_number')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="capital_investment">कुल पुँजी (रु.) <sup class="text-danger">*required</sup></label>
                                            <input type="number" class="form-control" required="" name="capital_investment"
                                                   id="capital_investment" value="{{old('capital_investment')}}" placeholder="कुल पुँजी (रु.)"
                                                   step="0.01">
                                            @error('capital_investment')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="working_capital">चालु पुँजी (रु.) <sup
                                                    class="text-danger">*required</sup></label>
                                            <input type="number" class="form-control" required="" name="working_capital"
                                                   id="working_capital" value="{{old('working_capital')}}" placeholder="चालु पुँजी (रु.)" step="0.01">
                                            @error('working_capital')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fixed_capital">स्थिर पुँजी (रु.) <sup
                                                    class="text-danger">*required</sup></label>
                                            <input type="number" class="form-control" required="" name="fixed_capital"
                                                   id="fixed_capital" value="{{old('fixed_capital')}}" placeholder="स्थिर पुँजी (रु.)" step="0.01">
                                            @error('fixed_capital')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="board_size">परिचय पार्टी साइज <sup
                                                    class="text-danger">*required</sup></label>
                                            <input type="number" class="form-control" name="board_size"
                                                   id="board_size" value="{{old('board_size')}}" placeholder="परिचय पार्टी साइज">
                                            @error('board_size')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                        </fieldset>
                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong>ठेगाना</strong>
                            </legend>
                            <div class="row">
                                @livewire('address',['address' => [
                                'province_id' => $officeSetting->province_id ?? null,
                                'district_id' => $officeSetting->district_id ?? null,
                                'local_body_id' => $officeSetting->local_body_id ?? null,
                                'ward_no' => $officeSetting->ward_no ?? null,
                                ]])

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="address">व्यवसायको ठेगाना <sup
                                                class="text-danger">*required</sup></label>
                                        <input type="text" class="form-control" required="" name="address" id="address"
                                               value="{{old('address')}}" placeholder="व्यवसायको ठेगाना">
                                        @error('address')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tole">व्यवसायको टोल <sup class="text-danger">*required</sup></label>
                                        <input type="text" class="form-control" required="" name="tole" id="tole"
                                               value="{{old('tole')}}" placeholder="व्यवसायको टोल">
                                        @error('tole')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="street_name">व्यवसायको बाटोको नाम</label>
                                        <input type="text" class="form-control" name="street_name" id="street_name"
                                               value="{{old('street_name')}}" placeholder="व्यवसायको बाटोको नाम">
                                        @error('street_name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong>व्यवसायीको जानकारी</strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="owner_name">व्यवसायीको नाम <sup
                                                class="text-danger">*required</sup></label>
                                        <input type="text" class="form-control" required="" name="owner_name"
                                               id="owner_name" value="{{old('owner_name')}}" placeholder="मालिक नाम">
                                    </div>
                                    @error('owner_name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="citizenship_number">नागरिकता नम्बर<sup
                                                class="text-danger">*required</sup></label>
                                        <input type="text" class="form-control" required="" name="citizenship_number"
                                               id="citizenship_number" value="{{old('citizenship_number')}}" placeholder="नागरिकता नम्बर">
                                    </div>
                                    @error('citizenship_number')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <x-date-input-component
                                            nameNe="citizenship_issue_date" labelNe="नागरिकता जारी मिति:  *"
                                            nameEn="citizenship_issue_date_en" labelEn="Citizenship Issued Date:"
                                        />

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="citizenship_issue_district_id">नागरिकता जारी जिल्ला<sup
                                                class="text-danger">*required</sup></label>
                                        <select class="form-control" required="" name="citizenship_issue_district_id"
                                                id="citizenship_issue_district_id" placeholder="नागरिकता जारी जिल्ला">
                                            <option disabled="" {{empty(old('citizenship_issue_district')) ? 'selected':''}} value="">जिल्ला</option>
                                            {{--                                            @foreach($districts as $district)--}}
                                            {{--                                                <option value="{{$district->id}}" {{old('citizenship_issue_district') == $district->id ? 'selected' : ''}}>{{$district->district}}</option>--}}
                                            {{--                                            @endforeach--}}
                                        </select>
                                    </div>
                                    @error('citizenship_issue_district_id')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="business_rent_owner">व्यवसाय रहने घर /जग्गाधनिको नाम <sup
                                                class="text-danger">*required</sup></label>
                                        <input type="text" class="form-control" required="" name="business_rent_owner"
                                               id="business_rent_owner" value="{{old('business_rent_owner')}}"
                                               placeholder="व्यवसाय रहने घर /जग्गाधनिको नाम ">
                                    </div>
                                    @error('business_rent_owner')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="owner_photo">व्यवसायीको फोटो: <sup
                                                class="text-danger">*required</sup> </label><br>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" required=""
                                                       name="owner_photo" id="owner_photo" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('owner_photo')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                        </fieldset>
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

