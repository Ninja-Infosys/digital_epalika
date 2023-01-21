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
                            <a href="{{route('admin.organizationRegistration.business.index')}}">व्यवसाय/उद्योग/उद्योगहरू</a>
                        </li>
                        <li class="breadcrumb-item active">व्यवसाय/उद्योग/उद्योग सम्पादन गर्नुहोस</li>
                    </ol>
                </div>
                <h4 class="page-title">व्यवसाय/उद्योग सम्पादन गर्नुहोस</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">व्यवसाय/उद्योग सम्पादन गर्नुहोस</h4>
                        <a href="{{route('admin.organizationRegistration.business.index')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> व्यवसाय/उद्योगको सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.organizationRegistration.business.update',$business)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tax_payer_number">करदाता नं.: </label>
                                    <input type="text" class="form-control" name="tax_payer_number"
                                           id="tax_payer_number" value="{{old('tax_payer_number',$business->tax_payer_number)}}"
                                           placeholder="करदाता नं.">
                                </div>
                                @error('tax_payer_number')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <x-date-input-component
                                        nameNe="registration_date" labelNe="दर्ता मिति: *"
                                        nameEn="registration_date_en" labelEn="Registration Date:"
                                        :getTodayDate="false"
                                        :editDateNe="$business->registration_date"
                                        :editDateEn="$business->registration_date_en?->toDateString()"
                                    ></x-date-input-component>

                                </div>
                            </div>
                        </div>
                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong>व्यवसाय/उद्योगको जानकारी</strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">व्यवसाय/उद्योगको नाम <sup class="text-danger">*required</sup></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               required="" name="name" id="name"
                                               value="{{old('name',$business->name)}}" placeholder="व्यवसाय/उद्योगको नाम">
                                        @error('name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <x-date-input-component
                                        nameNe="business_start_date" labelNe="व्यवसाय/उद्योग सुरु मिति:  *"
                                        nameEn="business_start_date_en" labelEn="Business Start Date:"
                                        :getTodayDate="false"
                                        :editDateNe="$business->business_start_date"
                                        :editDateEn="$business->business_start_date_en"
                                    />

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="business_nature_id">व्यापार प्रकृति <sup class="text-danger">*required</sup></label>
                                        <select class="form-control" required="" name="business_nature_id"
                                                id="business_nature_id" placeholder="व्यापार प्रकृति">
                                            <option disabled="" {{empty(old('business_nature_id')) ? 'selected':''}} value="">व्यापार प्रकृति चयन गर्नुहोस्
                                            </option>
                                            @foreach($businessNatures as $businessNature)
                                                <option
                                                    value="{{$businessNature->id}}"{{$businessNature->id == old('business_nature_id',$business->business_nature_id)?'selected':''}}
                                                >{{$businessNature->title}}</option>
                                            @endforeach
                                        </select>
                                        @error('business_nature_id')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="object_transaction_id">व्यापार वर्ग <sup class="text-danger">*required</sup></label>
                                        <select class="form-control" required="" name="object_transaction_id"
                                                id="object_transaction_id" placeholder="व्यापार वर्ग">
                                            <option disabled="" {{empty(old('object_transaction_id')) ? 'selected':''}} value="">व्यापार वर्ग चयन गर्नुहोस्</option>
                                            @foreach($objectTransactions as $objectTransaction)
                                                <option value="{{$objectTransaction->id}}"
                                                    {{$objectTransaction->objectTransactions->isNotEmpty() ? 'disabled' : ''}} {{$objectTransaction->id==old('object_transaction_id',$business->object_transaction_id)?'selected':''}}
                                                >{{$objectTransaction->title}}
                                                </option>
                                                @foreach($objectTransaction->objectTransactions as $object)
                                                    <option value="{{$object->id}}" {{$object->id==old('object_transaction_id',$business->object_transaction_id)?'selected':''}}
                                                    >---{{$object->title}}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                        @error('object_transaction_id')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="house_number">व्यवसाय/उद्योगको घर नं </label>
                                        <input type="text" class="form-control" name="house_number" id="house_number"
                                               value="{{old('house_number',$business->house_number)}}" placeholder="व्यवसाय/उद्योगको घर नं">
                                        @error('house_number')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="capital_investment">कुल पुँजी (रु.) <sup class="text-danger">*required</sup></label>
                                        <input type="number" class="form-control" required="" name="capital_investment"
                                               id="capital_investment" value="{{old('capital_investment',$business->capital_investment)}}" placeholder="कुल पुँजी (रु.)"
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
                                               id="working_capital" value="{{old('working_capital',$business->working_capital)}}" placeholder="चालु पुँजी (रु.)" step="0.01">
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
                                               id="fixed_capital" value="{{old('fixed_capital',$business->fixed_capital)}}" placeholder="स्थिर पुँजी (रु.)" step="0.01">
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
                                               id="board_size" value="{{old('board_size',$business->board_size)}}" placeholder="परिचय पार्टी साइज">
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
                                        <label for="address">व्यवसाय/उद्योगको ठेगाना <sup
                                                class="text-danger">*required</sup></label>
                                        <input type="text" class="form-control" required="" name="address" id="address"
                                               value="{{old('address',$business->address)}}" placeholder="व्यवसाय/उद्योगको ठेगाना">
                                        @error('address')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tole">व्यवसाय/उद्योगको टोल <sup class="text-danger">*required</sup></label>
                                        <input type="text" class="form-control" required="" name="tole" id="tole"
                                               value="{{old('tole',$business->tole)}}" placeholder="व्यवसाय/उद्योगको टोल">
                                        @error('tole')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="street_name">व्यवसाय/उद्योगको बाटोको नाम</label>
                                        <input type="text" class="form-control" name="street_name" id="street_name"
                                               value="{{old('street_name',$business->street_name)}}" placeholder="व्यवसाय/उद्योगको बाटोको नाम">
                                        @error('street_name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong>व्यवसायी/उद्योगीको जानकारी</strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="owner_name">व्यवसायी/उद्योगीको नाम <sup
                                                class="text-danger">*required</sup></label>
                                        <input type="text" class="form-control" required="" name="owner_name"
                                               id="owner_name" value="{{old('owner_name',$business->owner_name)}}" placeholder="व्यवसायी/उद्योगीको नाम">
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
                                               id="citizenship_number" value="{{old('citizenship_number',$business->citizenship_number)}}" placeholder="नागरिकता नम्बर">
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
                                            :getTodayDate="false"
                                            :editDateNe="$business->citizenship_issue_date"
                                            :editDateEn="$business->citizenship_issue_date_en"
                                        />

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="citizenship_issue_district_id">नागरिकता जारी जिल्ला<sup
                                                class="text-danger">*required</sup></label>
                                        <select class="form-control" required="" name="citizenship_issue_district_id"
                                                id="citizenship_issue_district_id">
                                            <option disabled="" {{empty(old('citizenship_issue_district_id',$business->citizenship_issue_district_id)) ? 'selected':''}} value="">जिल्ला</option>
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}"
                                                    {{$district->id===old('citizenship_issue_district_id',$business->citizenship_issue_district_id)?'selected':''}}
                                                >
                                                    {{$district->district}}
                                                </option>
                                            @endforeach
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
                                        <label for="business_rent_owner">व्यवसाय/उद्योग रहने घर /जग्गाधनिको नाम <sup
                                                class="text-danger">*required</sup></label>
                                        <input type="text" class="form-control" required="" name="business_rent_owner"
                                               id="business_rent_owner" value="{{old('business_rent_owner',$business->business_rent_owner)}}"
                                               placeholder="व्यवसाय/उद्योग रहने घर /जग्गाधनिको नाम ">
                                    </div>
                                    @error('business_rent_owner')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="owner_photo">व्यवसायी/उद्योगीको फोटो: <sup
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

