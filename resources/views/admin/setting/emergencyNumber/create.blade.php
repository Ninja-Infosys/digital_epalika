@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                               <img class="icon me-1" src="http://127.0.0.1:8000/assets/backend/images/home.svg" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.setting.dashboard')}}">सेटिङ</a>
                        </li>
                        <li class="breadcrumb-item active">आपतकालिन सम्पर्क थप गर्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">आपतकालिन सम्पर्क थप</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नयाँ आपतकालिन सम्पर्क थप्नुहोस्</h4>
                        <a href="{{route('admin.generalSetting.emergencyNumber.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> आपतकालिन सम्पर्क सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.generalSetting.emergencyNumber.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="type" class="form-label">प्रकार आबश्यक छ *</label>
                                <input id="title" type="text" name="type" placeholder="प्रकार आबश्यक छ "
                                       class="form-control @error('type') is-invalid @enderror"
                                       value="{{old('type')}}">
                                @error('type')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-2">
                                <label for="title" class="form-label">शिर्षक आबस्यक छ *</label>
                                <input id="title" type="text" name="title" placeholder="शिर्षक आबस्यक छ"
                                       class="form-control @error('title') is-invalid @enderror"
                                       value="{{old('title')}}">
                                @error('title')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-2">
                                <label for="contact_no" class="form-label">सम्पर्क नं. आबश्यक छ *</label>
                                <input id="title" type="text" name="contact_no" placeholder="सम्पर्क नं. आबश्यक छ"
                                       class="form-control @error('contact_no') is-invalid @enderror"
                                       value="{{old('contact_no')}}">
                                @error('contact_no')
                                <div class="text-danger">{{$message}}</div>
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
