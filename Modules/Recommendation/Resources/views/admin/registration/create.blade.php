@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.grant.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">दर्ता</li>
                    </ol>
                </div>
                <h4 class="page-title">नयाँ दर्ता</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नयाँ सिफारिस दर्ता गर्नुहोस</h4>
                        <a href="{{route('admin.recommendation.registrationDetail.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> दर्ता सुची
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{route('admin.recommendation.registrationDetail.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <legend><h4 class="text-info">दर्ता फाराम</h4></legend>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label for="personal_detail_id" class="form-label">व्यक्तिगत विवरण</label>
                                    <select id="personal_detail_id" name="personal_detail_id" class="form-select">
                                        <option value="">-- छान्नुहोस् --</option>
                                        @foreach($personaldetails as $personaldetail)
                                            <option
                                                {{$personaldetail->id==old('personal_detail_id') ? 'selected' : ''}}
                                                value="{{$personaldetail->id}}">{{$personaldetail->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('personal_detail_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="recommendation_category_id" class="form-label">सिफारिस *</label>
                                    <select id="recommendation_category_id" name="recommendation_category_id" class="form-select">
                                        <option value="">-- छान्नुहोस् --</option>
                                        @foreach($recommendationCategories as $recommendationCategory)
                                            <option
                                                {{$recommendationCategory->id==old('recommendation_category_id') ? 'selected' : ''}}
                                                value="{{$recommendationCategory->id}}">{{$recommendationCategory->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('recommendation_category_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <x-date-input-component
                                        get-today-date="{{false}}"
                                        name-ne="date_ne" label-ne="मिति*"
                                    name-en="date_en" label-en="English Date"
                                    />
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="application" class="form-label">डकुमेन्ट </label>
                                    <input
                                    id="application" name="application" type="file" class="form-control">
                                    @error('application')
                                    <p class="text-red-600">{{ $message }}</p>
                                @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="recommendation" class="form-label">सिफारिस *</label>
                                    <input
                                        type="text"
                                        name="recommendation"
                                        value="{{old('recommendation')}}"
                                        class="form-control @error('recommendation') is-invalid @enderror"
                                        id="recommendation"
                                        placeholder="सिफारिस"
                                    />
                                    @error('recommendation')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                        <div class="row mt-2">
                            <div class="col-md-12 mb-2">
                                <label for="recommendation_data" class="form-label">डाटा *</label>
                                <textarea name="recommendation_data"
                                          id="recommendation_data"
                                          cols="30" rows="10"
                                          class="form-control ckEditor @error('recommendation_data') is-invalid @enderror">{{old('recommendation_data')}}</textarea>
                                @error('recommendation_data')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">
                            पेश गर्नुहोस्
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    @push('style')
    <link rel="stylesheet" href="{{asset('assets/backend/editor/ckEditor/css/editor.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/editor/ckEditor/css/neo.css')}}">
@endpush
@push('scripts')
    <script src="{{asset('assets/backend/editor/ckEditor/js/ckeditor.js')}}"></script>
    <script src="{{asset('assets/backend/editor/ckEditor/js/editor.js')}}"></script>
@endpush
@endsection


