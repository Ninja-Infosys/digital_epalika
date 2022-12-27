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
                            <a href="{{route('admin.grant.grantDetail.index')}}">अनुदान जारी</a>
                        </li>
                        <li class="breadcrumb-item active">अनुदान जारी सम्पादन गर्नुहोस</li>
                    </ol>
                </div>
                <h4 class="page-title">अनुदान जारी सम्पादन गर्नुहोस</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">अनुदान जारी सम्पादन गर्नुहोस</h4>
                        <a href="{{route('admin.grant.grantDetail.index')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> अनुदान जारी सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.grant.grantDetail.update',$grantDetail)}}" method="post">
                        @csrf
                        @method('put')
                        <fieldset>
                            <legend><h4 class="text-info">अनुदान जारी </h4></legend>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="grant_program_id" class="form-label">कार्यक्रम/क्रियाकलाप * </label>
                                    <select name="grant_program_id" id="grant_program_id"
                                            class="form-control @error('grant_program_id') is-invalid @enderror">
                                        <option value="">कार्यक्रम/क्रियाकलाप छान्नुहोस्</option>
                                        @foreach($grantPrograms as $grantProgram)
                                            <option
                                                {{$grantProgram->id==old('grant_program_id', $grantDetail->grant_program_id) ? 'selected' : ''}}
                                                value="{{$grantProgram->id}}">{{$grantProgram->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('grant_program_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="grant_type_id" class="form-label">अनुदान प्रकार</label>
                                    <select name="grant_type_id" id="grant_type_id"
                                            class="form-control @error('grant_type_id') is-invalid @enderror">
                                        <option value="">अनुदान प्रकार छान्नुहोस्</option>
                                        @foreach($grantTypes as $grantType)
                                            <option
                                                {{$grantType->id==old('grant_type_id', $grantDetail->grant_type_id) ? 'selected' :''}}
                                                value="{{$grantType->id}}">{{$grantType->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('grant_type_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="investment" class="form-label">अनुदानग्राहीको लगानी *</label>
                                    <input
                                        type="number"
                                        name="investment"
                                        value="{{old('investment', $grantDetail->investment)}}"
                                        class="form-control @error('investment') is-invalid @enderror"
                                        id="investment"
                                        placeholder="अनुदानग्राहीको लगानी"
                                    />
                                    @error('investment')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="is_new" class="form-label">नयाँ वा पहिलेको अनुदानको निरन्तरता हो ?
                                        *</label>
                                    <select name="is_new" id="is_new"
                                            class="form-control @error('is_new') is-invalid @enderror">
                                        <option value="">नयाँ वा निरन्तरता छान्नुहोस्</option>
                                        @foreach(\Modules\Grant\Enums\NewOrContinueEnum::cases() as $type)
                                            <option
                                                {{$type->value==old('is_new', $grantDetail->is_new->value) ? 'selected' : ''}}
                                                value="{{$type->value}}">{{$type->label()}}</option>
                                        @endforeach
                                    </select>
                                    @error('is_new')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="remarks" class="form-label">कैफियत</label>
                                    <input
                                        type="text"
                                        name="remarks"
                                        value="{{old('remarks', $grantDetail->remarks)}}"
                                        class="form-control @error('remarks') is-invalid @enderror"
                                        id="remarks"
                                        placeholder="कैफियत"
                                    />
                                    @error('remarks')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="my-3">
                            <legend><h4 class="text-info">अनुदान स्थलको विवरण *</h4></legend>
                            <p>नोट: कृपया क्रमशः प्रदेश, जिल्ला, गा.पा./न.पा., वार्ड नं., गाउँ र टोल छनौट गर्नुहोस्
                                ।</p>
                            <div class="row">
                                <input type="hidden" name="local_body_id" id="local_body_id"
                                       value="{{$officeSetting->localBody}}">
                                <div class="col-md-6 mb-2">
                                    <label for="ward_no" class="form-label">वडा नं.</label>
                                    <select
                                        name="ward_no"
                                        class="form-select @error('ward_no') is-invalid @enderror"
                                        id="ward_no">
                                        <option value="">वडा नं. छान्नुहोस्</option>
                                        @foreach($officeSetting->localBody->ward_no as $ward)
                                            <option
                                                {{$ward==old('ward_no', $officeSetting->ward_no) ? 'selected' : ''}}
                                                value="{{$ward}}">
                                                {{$ward}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('ward_no')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="village" class="form-label">गाउँ</label>
                                    <input
                                        type="text"
                                        name="village"
                                        id="village"
                                        class="form-control @error('village') is-invalid @enderror"
                                        value="{{old('village',$grantDetail->village)}}"
                                        placeholder="गाउँ"
                                    >
                                    @error('village')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="tole" class="form-label">टोल</label>
                                    <input
                                        type="text"
                                        name="tole"
                                        id="tole"
                                        class="form-control @error('tole') is-invalid @enderror"
                                        value="{{old('tole',$grantDetail->tole)}}"
                                        placeholder="टोल"
                                    >
                                    @error('tole')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="unit_no" class="form-label">किता नं.</label>
                                    <input
                                        type="text"
                                        name="unit_no"
                                        id="unit_no"
                                        class="form-control @error('unit_no') is-invalid @enderror"
                                        value="{{old('unit_no',$grantDetail->Unit_no)}}"
                                        placeholder="किता नं."
                                    >
                                    @error('unit_no')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="phone" class="form-label">सम्पर्क नम्बर *</label>
                                    <input
                                        type="text"
                                        name="phone"
                                        id="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{old('phone',$grantDetail->phone)}}"
                                        placeholder="सम्पर्क नम्बर "
                                    >
                                    @error('phone')
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
