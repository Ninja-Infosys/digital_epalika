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
                        <li class="breadcrumb-item active">कार्यालय सेटिङ सम्पादन गर्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">कार्यालय सेटिङ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">कार्यालय सेटिङ सम्पादन गर्नुहोस्</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.officeSetting.update',$officeSetting)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong>कार्यालय विवरण </strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="name" class="form-label">नाम  *</label>
                                    <input
                                        type="text"
                                        name="name"
                                        value="{{old('name',$officeSetting->name)}}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        id="name"
                                        placeholder="नाम"
                                    />
                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <img src="{{$officeSetting->logo_url}}" height="60">
                                    <label for="logo" class="form-label">लोगो </label>
                                    <input
                                        type="file"
                                        name="logo"

                                        class="form-control @error('logo') is-invalid @enderror"
                                        id="logo"

                                    />
                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="email" class="form-label">इमेल  </label>
                                    <input
                                        type="text"
                                        name="email"
                                        value="{{old('email',$officeSetting->email)}}"
                                        class="form-control @error('email') is-invalid @enderror"
                                        id="email"
                                        placeholder="इमेल"
                                    />
                                    @error('email')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="phone" class="form-label">फोन नम्बर  </label>
                                    <input
                                        type="text"
                                        name="phone"
                                        value="{{old('phone',$officeSetting->phone)}}"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        id="phone"
                                        placeholder="फोन नम्बर"
                                    />
                                    @error('phone')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="website" class="form-label">वेबसाइट </label>
                                    <input
                                        type="text"
                                        name="website"
                                        value="{{old('website',$officeSetting->website)}}"
                                        class="form-control @error('website') is-invalid @enderror"
                                        id="website"
                                        placeholder="वेबसाइट"
                                    />
                                    @error('website')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="facebook_link" class="form-label">फेसबुक लिङ्क </label>
                                    <input
                                        type="text"
                                        name="facebook_link"
                                        value="{{old('facebook_link',$officeSetting->facebook_link)}}"
                                        class="form-control @error('facebook_link') is-invalid @enderror"
                                        id="facebook_link"
                                        placeholder="फेसबुक लिङ्क"
                                    />
                                    @error('facebook_link')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label for="google_map" class="form-label">गुगल नक्शा </label>
                                    <textarea name="google_map" id="google_map" cols="30" placeholder="गुगल नक्शा" class="form-control @error('google_map') is-invalid @enderror" rows="5">{{old('google_map',$officeSetting->google_map)}}</textarea>
                                    @error('google_map')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong>ठेगाना</strong>
                            </legend>
                            @livewire('address',['address'=>$officeSetting->address])
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
