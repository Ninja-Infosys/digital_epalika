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
                            <a href="{{route('admin.officeSetting.index')}}">कार्यालय सेटिङ</a>
                        </li>
                        <li class="breadcrumb-item active">एस.एम.एस सेटिंग सम्पादन गर्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">एस.एम.एस सेटिंग</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">समय एस.एम.एस सेटिंग</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.sms.set-samaya-sms-config')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="samaya_api_key" class="form-label">API Key *</label>
                                <input
                                    type="text"
                                    name="samaya_api_key"
                                    value="{{old('samaya_api_key', config('sms.samaya.api_key'))}}"
                                    class="form-control @error('samaya_api_key') is-invalid @enderror"
                                    id="samaya_api_key"
                                    placeholder="नाम"
                                />
                                @error('samaya_api_key')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="samaya_sender_id" class="form-label">Sender Id *</label>
                                <input
                                    type="text"
                                    name="samaya_sender_id"
                                    value="{{old('samaya_sender_id',config('sms.samaya.sms_id'))}}"
                                    class="form-control @error('samaya_sender_id') is-invalid @enderror"
                                    id="samaya_sender_id"
                                    placeholder="ठेगाना"
                                />
                                @error('samaya_sender_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="samaya_is_active" class="form-label">Active *</label>
                                <input
                                    type="checkbox"
                                    name="samaya_is_active"
                                    value="1"
                                    class="@error('samaya_is_active') is-invalid @enderror"
                                    id="samaya_is_active"
                                    placeholder="ठेगाना"
                                    {{(bool) old('samaya_is_active',config('sms.samaya.is_active')) ? 'checked':'' }}
                                />
                                @error('samaya_is_active')
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">आकास एस.एम.एस सेटिंग</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.sms.set-aakash-sms-config')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="aakash_api_key" class="form-label">API Key *</label>
                                <input
                                    type="text"
                                    name="aakash_api_key"
                                    value="{{old('aakash_api_key', config('sms.aakash.api_key'))}}"
                                    class="form-control @error('aakash_api_key') is-invalid @enderror"
                                    id="aakash_api_key"
                                    placeholder="नाम"
                                />
                                @error('aakash_api_key')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="aakash_is_active" class="form-label">Active *</label>
                                <input
                                    type="checkbox"
                                    name="aakash_is_active"
                                    value="1"
                                    class="@error('aakash_is_active') is-invalid @enderror"
                                    id="aakash_is_active"
                                    placeholder="ठेगाना"
                                    {{(bool) old('aakash_is_active',config('sms.aakash.is_active')) ? 'checked':'' }}
                                />
                                @error('aakash_is_active')
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
