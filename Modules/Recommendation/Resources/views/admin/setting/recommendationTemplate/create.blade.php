@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.recommendation.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.recommendation.setting.recommendationTemplate.index',$applicationTypeEnum)}}">
                                टेम्प्लेट
                            </a>
                        </li>
                        <li class="breadcrumb-item active">{{$applicationTypeEnum->label()}} टेम्प्लेट थप्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">{{$applicationTypeEnum->label()}} टेम्प्लेट</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">{{$applicationTypeEnum->label()}} टेम्प्लेट थप्नुहोस्</h4>
                        <a href="{{route('admin.recommendation.setting.recommendationTemplate.index',$applicationTypeEnum)}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> {{$applicationTypeEnum->label()}} टेम्प्लेट सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.recommendation.setting.recommendationTemplate.store',$applicationTypeEnum)}}"
                          method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="title" class="form-label">शिर्षक *</label>
                                <input
                                    type="text"
                                    name="title"
                                    value="{{old('title')}}"
                                    class="form-control @error('title') is-invalid @enderror"
                                    id="title"
                                    placeholder="शिर्षक "
                                />
                                @error('title')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="row">

                                    <div class="col-md-12 mt-1">
                                        <h6>फारम फिल्ड</h6>
                                    </div>
                                    <div class="col-md-12">
                                        @foreach($formFields as $formField)
                                            <a style="cursor: pointer" class="badge badge-outline-primary text-primary"
                                               onclick="copyText('{{$formField['value'] ?? ''}}')">
                                                {{$formField['name'] ?? ''}} {{!empty($formField['placeholder']) ? "(".$formField['placeholder'].")" : ''}}
                                            </a>
                                        @endforeach
                                    </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="data" class="form-label">डाटा *</label>
                                <textarea name="data"
                                          id="data"
                                          cols="30" rows="10"
                                          class="form-control ckEditor @error('data') is-invalid @enderror">{{old('data')}}</textarea>
                                @error('data')
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
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/backend/editor/ckEditor/css/editor.css')}}">
        <link rel="stylesheet" href="{{asset('assets/backend/editor/ckEditor/css/neo.css')}}">
    @endpush
    @push('scripts')
        <script src="{{asset('assets/backend/editor/ckEditor/js/ckeditor.js')}}"></script>
        <script src="{{asset('assets/backend/editor/ckEditor/js/editor.js')}}"></script>
    @endpush
@endsection

