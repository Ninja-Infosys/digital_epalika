@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('emap.admin.dashboard')}}">
                                <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">

                                {{$formDataType ->model?->title}}

                        </li>
                        <li class="breadcrumb-item active">{{$formDataType ->model?->title}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{$formDataType ->model?->title}}</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
{{--                    <div class="d-flex justify-content-between">--}}
{{--                        <h4 class="header-title">टेम्प्लेट विवरण सम्पादन गर्नुहोस्</h4>--}}
{{--                        <a href="{{route('emap.admin.eMapTemplate.index')}}"--}}
{{--                           class="btn btn-sm btn-outline-primary">--}}
{{--                            <i class="fa fa-list"></i> टेम्प्लेट सूची--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>
                <div class="card-body">
                    <form action="{{route('emap.admin.storeFileTemplate',[$mapApply,$form,$formDataType])}}"
                          method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="data" class="form-label">डाटा *</label>
                                <textarea name="data"
                                          id="data"
                                          cols="30" rows="10"
                                          class="form-control ckEditor @error('data') is-invalid @enderror">{{old('data',$data)}}</textarea>
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
    @push('scripts')
        <script src="{{asset('assets/backend/ckeditor/ckeditor.js')}}"></script>
        <script src="{{asset('assets/backend/ckeditor/editor.js')}}"></script>
    @endpush
@endsection

