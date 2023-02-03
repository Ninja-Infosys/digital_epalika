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
                            <a href="{{route('admin.businessRegistration.setting.businessRegistrationTemplate.index',$templateTypeEnum)}}">
                                {{$templateTypeEnum->label()}} </a>
                        </li>
                        <li class="breadcrumb-item active"> {{$templateTypeEnum->label()}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{$templateTypeEnum->label()}}</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">   {{$templateTypeEnum->label()}}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.businessRegistration.store.custom',[$businessDetail,$templateTypeEnum])}}"
                          method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <fieldset class="border p-2 mb-2">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="taxpayer_number" class="form-label">करदाता नम्बर </label>
                                    <input
                                        type="number"
                                        name="taxpayer_number"
                                        step="0.01"
                                        placeholder="करदाता नम्बर "
                                        value="{{old('taxpayer_number',$businessDetail->taxpayer_number??'')}}"
                                        class="form-control @error('taxpayer_number') is-invalid @enderror"
                                        id="taxpayer_number"
                                    />
                                    @error('taxpayer_number')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="application_fee" class="form-label">निवेदन दस्तुर </label>
                                    <input
                                        type="number"
                                        name="application_fee"
                                        step="0.01"
                                        placeholder="निवेदन दस्तुर "
                                        value="{{old('application_fee',$businessDetail->application_fee??'')}}"
                                        class="form-control @error('application_fee') is-invalid @enderror"
                                        id="application_fee"
                                    />
                                    @error('application_fee')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="registration_fee" class="form-label">दर्ता दस्तुर </label>
                                    <input
                                        type="number"
                                        step="0.01"
                                        name="registration_fee"
                                        value="{{old('registration_fee',$businessDetail->registration_fee??'')}}"
                                        placeholder="दर्ता दस्तुर "
                                        class="form-control @error('registration_fee') is-invalid @enderror"
                                        id="registration_fee"
                                    />
                                    @error('registration_fee')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="business_tax" class="form-label">व्यवसाय कर </label>
                                    <input
                                        type="number"
                                        step="0.01"
                                        name="business_tax"
                                        value="{{old('business_tax',$businessDetail->business_tax??'')}}"
                                        placeholder="व्यवसाय कर "
                                        class="form-control @error('business_tax') is-invalid @enderror"
                                        id="business_tax"
                                    />
                                    @error('business_tax')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="introduction_board_fees" class="form-label"> परिचय पाटी दस्तुर </label>
                                    <input
                                        type="number"
                                        step="0.01"
                                        name="introduction_board_fees"
                                        value="{{old('introduction_board_fees',$businessDetail->introduction_board_fees??'') }}"
                                        placeholder=" परिचय पाटी दस्तुर "
                                        class="form-control @error('introduction_board_fees') is-invalid @enderror"
                                        id="introduction_board_fees"
                                    />
                                    @error('introduction_board_fees')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">

                                    <label for="fine" class="form-label"> जरिवाना </label>
                                    <input
                                        type="number"
                                        step="0.01"
                                        name="fine"
                                        value="{{ old('fine',$businessDetail->fine??'')}}"
                                        placeholder=" जरिवाना "
                                        class="form-control @error('fine') is-invalid @enderror"
                                        id="fine"
                                    />
                                    @error('fine')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
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

