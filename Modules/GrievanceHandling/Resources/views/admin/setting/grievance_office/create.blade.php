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
                            <a href="{{route('admin.grievanceHandling.setting.grievanceOffice.index')}}">शाखा/कार्यालय</a>
                        </li>
                        <li class="breadcrumb-item active">नयाँ शाखा/कार्यालय थप्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">शाखा/कार्यालय </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">शाखा/कार्यालय थप्नुहोस्</h4>
                        <a href="{{route('admin.grievanceHandling.setting.grievanceOffice.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> शाखा/कार्यालय सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.grievanceHandling.setting.grievanceOffice.store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong>शाखा/कार्यालय </strong>
                            </legend>
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

