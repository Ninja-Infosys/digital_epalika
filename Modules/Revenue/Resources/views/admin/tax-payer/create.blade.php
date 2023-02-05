@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.revenue.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">करदाता</li>
                    </ol>
                </div>
                <h4 class="page-title">करदाता</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नयाँ करदाता थप्नुहोस्</h4>
                        <a href="{{route('admin.revenue.taxPayer.index')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> करदाता सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.revenue.taxPayer.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="tax_payer_type_id" class="form-label">करदाताको प्रकार</label>
                                <select
                                    name="tax_payer_type_id"
                                    class="form-select @error('tax_payer_type_id') is-invalid @enderror"
                                    id="tax_payer_type_id" data-toggle="select2" data-width="100%">
                                    <option value="">--- छान्नुहोस् ---</option>
                                    @foreach($taxPayerTypes as $taxPayerType)
                                        <option
                                            value="{{$taxPayerType->id}}"
                                            {{old('tax_payer_type_id') == $taxPayerType->id ? 'selected' : ''}}
                                        >
                                            {{$taxPayerType->title}}
                                        </option>

                                    @endforeach
                                </select>
                                @error('tax_payer_type_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="name" class="form-label">करदाताको नाम *</label>
                                <div class="input-group">
                                    <input
                                        type="text"
                                        name="name"
                                        value="{{old('name')}}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        id="name"
                                        placeholder="नेपाली"
                                    />
                                    <input
                                        type="text"
                                        name="name_en"
                                        value="{{old('name_en')}}"
                                        class="form-control @error('name_en') is-invalid @enderror"
                                        id="name_en"
                                        placeholder="English"
                                    />
                                </div>
                                <div class="d-flex">
                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    @error('name_en')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="phone" class="form-label">फोन *</label>
                                <input
                                    type="text"
                                    name="phone"
                                    value="{{old('phone')}}"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    id="phone"
                                    placeholder="फोन"
                                />
                                @error('phone')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="email" class="form-label">इमेल *</label>
                                <input
                                    type="email"
                                    name="email"
                                    value="{{old('email')}}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                    placeholder="इमेल"
                                />
                                @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="gender" class="form-label">लिंग</label>
                                <select
                                    name="gender"
                                    class="form-select @error('gender') is-invalid @enderror"
                                    id="gender" data-toggle="select2" data-width="100%">
                                    <option value="">--- छान्नुहोस् ---</option>
                                    @foreach(\App\Enums\Gender::cases() as $gender)
                                        <option
                                            value="{{$gender->value}}"
                                            {{old('gender') == $gender->value ? 'selected' : ''}}
                                        >
                                            {{$gender->label()}}
                                        </option>

                                    @endforeach
                                </select>
                                @error('gender')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="father_name" class="form-label">बुवाको नाम *</label>
                                <input
                                    type="text"
                                    name="father_name"
                                    value="{{old('father_name')}}"
                                    class="form-control @error('father_name') is-invalid @enderror"
                                    id="father_name"
                                    placeholder="बुवाको नाम"
                                />
                                @error('father_name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="grandfather_name" class="form-label">हजुरबुवाको नाम *</label>
                                <input
                                    type="text"
                                    name="grandfather_name"
                                    value="{{old('grandfather_name')}}"
                                    class="form-control @error('grandfather_name') is-invalid @enderror"
                                    id="grandfather_name"
                                    placeholder="हजुरबुवाको नाम"
                                />
                                @error('grandfather_name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="citizenship_no" class="form-label">नागरिकता नम्बर *</label>
                                <input
                                    type="text"
                                    name="citizenship_no"
                                    value="{{old('citizenship_no')}}"
                                    class="form-control @error('citizenship_no') is-invalid @enderror"
                                    id="citizenship_no"
                                    placeholder="नागरिकता नम्बर"
                                />
                                @error('citizenship_no')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="issued_district" class="form-label">नागरिकता जारी जिल्ला</label>
                                <select
                                    name="issued_district"
                                    class="form-select @error('issued_district') is-invalid @enderror"
                                    id="issued_district" data-toggle="select2" data-width="100%">
                                    <option value="">--- छान्नुहोस् ---</option>
                                    @foreach(get_districts() as $district)
                                        <option
                                            value="{{$district->district}}"
                                            {{old('issued_district') == $district->district ? 'selected' : ''}}
                                        >
                                            {{$district->district}}
                                        </option>

                                    @endforeach
                                </select>
                                @error('issued_district')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <x-date-input-component
                                    nameNe="issued_date" labelNe="नागरिकता जारी मिति *"
                                    nameEn="issued_date_en" labelEn="Issued Date"
                                />
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="ward" class="form-label">वार्ड *</label>
                                <select
                                    name="ward"
                                    class="form-select @error('ward') is-invalid @enderror"
                                    id="ward" data-toggle="select2" data-width="100%">
                                    <option value="">--- छान्नुहोस् ---</option>

                                    @foreach($officeSetting->local_body_id ? get_local_bodies(localBodyId: $officeSetting->local_body_id)->ward_no : [] as $ward)
                                        <option
                                            value="{{$ward}}"
                                            {{old('ward') == $ward ? 'selected' : ''}}
                                        >
                                            {{$ward}}
                                        </option>

                                    @endforeach
                                </select>
                                @error('ward')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="tole" class="form-label">टोल *</label>
                                <input
                                    type="text"
                                    name="tole"
                                    value="{{old('tole')}}"
                                    class="form-control @error('tole') is-invalid @enderror"
                                    id="tole"
                                    placeholder="टोल"
                                />
                                @error('tole')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="address" class="form-label">ठेगाना *</label>
                                <input
                                    type="text"
                                    name="address"
                                    value="{{old('address')}}"
                                    class="form-control @error('address') is-invalid @enderror"
                                    id="address"
                                    placeholder="ठेगाना"
                                />
                                @error('address')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="remarks" class="form-label">कैफियत *</label>
                                <textarea class="form-control @error('remarks') is_invalid @enderror" name="remarks" id="remarks" cols="30" rows="5">{{old('remarks')}}</textarea>
                                @error('remarks')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
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
