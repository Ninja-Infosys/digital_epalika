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
                                    <label for="bill_no" class="form-label">बिल नं</label>
                                    <input
                                        type="text"
                                        name="bill_no"
                                        value="{{old('bill_no',$businessDetail->bill_no??'')}}"
                                        placeholder="बिल नं"
                                        class="form-control @error('bill_no') is-invalid @enderror"
                                        id="bill_no"
                                    />
                                    @error('bill_no')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <x-date-input-component
                                        name-ne="bill_date_bs" label-ne="बिल मिति"
                                        name-en="bill_date_ad" label-en="बिल मिति"
                                    />
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="file" class="form-label"> फाईल </label>
                                    <input
                                        type="file"
                                        name="file"
                                        class="form-control @error('file') is-invalid @enderror"
                                        id="file"
                                    />
                                    @error('file')
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

