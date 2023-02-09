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
                            <a href="{{route('admin.organizationRegistration.business.businessRenew.index',$business)}}">व्यवसायको नवीकरण</a>
                        </li>
                        <li class="breadcrumb-item active">व्यवसायको नवीकरण सम्पादन गर्नुहोस</li>
                    </ol>
                </div>
                <h4 class="page-title">व्यवसायको नवीकरण सम्पादन गर्नुहोस</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">व्यवसायको नवीकरण सम्पादन गर्नुहोस</h4>
                        <a href="{{route('admin.organizationRegistration.business.businessRenew.index',$business)}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> व्यवसायको नवीकरण सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.organizationRegistration.business.businessRenew.update',[$business,$businessRenew])}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row mb-1">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fiscal_year_id">आर्थिक बर्ष<sup
                                            class="text-danger">*required</sup></label>
                                    <select class="form-control" required="" name="fiscal_year_id"
                                            id="fiscal_year_id">
                                        <option value="">आर्थिक बर्ष</option>
                                        @foreach($fiscalYears as $fiscalYear)
                                            <option value="{{$fiscalYear->id}}"
                                                    @selected($fiscalYear->id===old('fiscal_year_id',$businessRenew->fiscal_year_id))
{{--                                                    {{$fiscalYear->id===old('fiscal_year_id',$businessRenew->fiscal_year_id)? 'selected':''}}--}}
                                                >{{$fiscalYear->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('fiscal_year_id')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <x-date-input-component
                                    nameNe="business_renew_date" labelNe="नवीकरण गरिएको मिति:  *"
                                    nameEn="business_renew_date_en" labelEn="Business Start Date:"
                                    :getTodayDate="false"
                                    :editDateNe="$businessRenew->business_renew_date"
                                    :editDateEn="$businessRenew->business_renew_date_en"
                                ></x-date-input-component>

                            </div>
                            <div class="col-md-4">
                                <x-date-input-component
                                    nameNe="date_to_be_maintained" labelNe="नवीकरण कायम रहने मिति:  *"
                                    nameEn="date_to_be_maintained_en" labelEn="Business Start Date:"
                                    :getTodayDate="false"
                                    :editDateNe="$businessRenew->date_to_be_maintained"
                                    :editDateEn="$businessRenew->date_to_be_maintained_en"
                                ></x-date-input-component>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="renew_amount">नबिकरण रकम: </label>
                                    <input type="number" class="form-control" name="renew_amount"
                                           id="renew_amount" value="{{old('renew_amount',$businessRenew->renew_amount)}}"
                                           placeholder="नबिकरण रकम">
                                </div>
                                @error('renew_amount')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="penalty_amount">नबिकरण जरिवाना रकम: </label>
                                    <input type="number" class="form-control" name="penalty_amount"
                                           id="penalty_amount" value="{{old('penalty_amount',$businessRenew->penalty_amount)}}"
                                           placeholder="नबिकरण जरिवाना रकम">
                                </div>
                                @error('penalty_amount')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="payment_receipt">नवीकरण दस्तुर रसिद न: </label>
                                    <input type="number" class="form-control" name="payment_receipt"
                                           id="payment_receipt" value="{{old('payment_receipt',$businessRenew->payment_receipt)}}"
                                           placeholder="नवीकरण दस्तुर रसिद न">
                                </div>
                                @error('payment_receipt')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <x-date-input-component
                                    nameNe="payment_receipt_date" labelNe="नवीकरण दस्तुर रसिद मिति:  *"
                                    nameEn="payment_receipt_date_en" labelEn="Business payment receipt Date:"
                                    :getTodayDate="false"
                                    :editDateNe="$businessRenew->payment_receipt_date"
                                    :editDateEn="$businessRenew->payment_receipt_date_en"
                                ></x-date-input-component>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

