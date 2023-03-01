@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.recommendation.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">सिफारिस</li>
                        <li class="breadcrumb-item active">सिफारिस सम्पादन</li>
                    </ol>
                </div>
                <h4 class="page-title">सिफारिस सम्पादन गर्नुहोस</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">सिफारिस सम्पादन गर्नुहोस</h4>
                        <a href="{{ route('admin.recommendation.registrationDetail.index') }}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> सिफारिस सुची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.recommendation.registrationDetail.update', $registrationDetail) }}"
                          method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <fieldset>
                            <legend>
                                <h4 class="text-info">सिफारिस फाराम</h4>
                            </legend>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label for="personal_detail_id" class="form-label">व्यक्तिगत विवरण</label>
                                    <div class="d-flex justify-content-between">
                                        <select id="personal_detail_id" name="personal_detail_id"
                                                class="form-select personalDetail">
                                            <option value="">-- छान्नुहोस् --</option>
                                            @foreach($personalDetails as $personalDetail)
                                                <option
                                                    {{$personalDetail->id==old('personal_detail_id',$registrationDetail->personal_detail_id) ? 'selected' : ''}}
                                                    value="{{$personalDetail->id}}">{{$personalDetail->name}}
                                                    ({{$personalDetail->reg_no}})
                                                </option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-sm btn-outline-primary" type="button"
                                                id="button-personalDetail"
                                                title="उधम थप" data-bs-toggle="modal"
                                                data-bs-target="#personalDetail-modal">
                                            <i class="fa fa-plus"></i></button>
                                    </div>
                                    @error('personal_detail_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label for="recommendation_category_id" class="form-label">सिफारिस *</label>
                                    <select name="recommendation_category_id" data-toggle="select2"
                                            id="recommendation_category_id" class="form-control">
                                        <option value="">--- छान्नुहोस् ---</option>
                                        @foreach($recommendationCategories as $recommendationCategory)
                                            @if(count($recommendationCategory->recommendationCategories)>0)
                                                <optgroup label="{{$recommendationCategory->title}}">
                                                    @foreach($recommendationCategory->recommendationCategories as $subRecommendationCategory)
                                                        <option
                                                            value="{{$subRecommendationCategory->id}}" {{old('recommendation_category_id',$registrationDetail->recommendation_category_id)==$subRecommendationCategory->id ? 'selected':''}}>
                                                            {{$subRecommendationCategory->title}}
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            @else
                                                <option
                                                    value="{{$recommendationCategory->id}}" {{old('recommendation_category_id',$registrationDetail->recommendation_category_id)==$recommendationCategory->id ? 'selected':''}}>
                                                    {{$recommendationCategory->title}}
                                                </option>
                                            @endif
                                        @endforeach

                                    </select>

                                    @error('recommendation_category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2 mb-2">
                                    <x-date-input-component
                                        name-ne="date_ne" label-ne="नेपाली मिति *"
                                        name-en="date_en" label-en="English Date"
                                        :getTodayDate="false"
                                        :editDateNe="$registrationDetail->date_ne"
                                        :editDateEn="$registrationDetail->date_en"
                                    />
                                </div>
                                @if(auth()->user()->role->type === 'Super')
                                    <div class="col-md-2 mb-2">
                                        <label for="ward_no" class="form-label">वडा नं</label>
                                        <select id="ward_no" name="ward_no"
                                                class="form-select" required>
                                            <option value="">-- छान्नुहोस् --</option>
                                            @foreach(officeSetting()->localBody->ward_no as $ward)
                                                <option
                                                    value="{{$ward}}" {{old('ward_no',$registrationDetail->ward_no)==$ward ? 'selected':''}}>{{$ward}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('ward_no')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                @endif
                                @livewire('multiple-file')
                            </div>
                        </fieldset>
                        <div class="row mt-2">
                            <div class="col-md-12 mb-2">
                                <label for="recommendation_data" class="form-label">डाटा *</label>
                                <textarea name="recommendation_data" id="recommendation_data" required cols="30" rows="10"
                                          class="form-control ckEditor @error('recommendation_data') is-invalid @enderror">{{ old('recommendation_data', $registrationDetail->recommendation_data) }}</textarea>
                                @error('recommendation_data')
                                <div class="invalid-feedback">{{ $message }}</div>
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
    @includeIf('recommendation::admin.registration.inc.file')
@endsection
