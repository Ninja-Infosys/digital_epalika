@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                               <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.systemSetting.officeSetting.index')}}">कार्यालय सेटिङ</a>
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
            <div class="card p-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">कार्यालय सेटिङ</h4>
                    </div>
                </div>
                <div class="card-body px-0">
                    <form action="{{route('admin.systemSetting.officeSetting.update',$officeSetting)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="fiscal_year_id" class="form-label">चालु आ.व. </label>
                                <select
                                    name="fiscal_year_id"
                                    class="form-select @error('fiscal_year_id') is-invalid @enderror"
                                    id="fiscal_year_id">
                                    <option value="">आ.व. छान्नुहोस्</option>
                                    @foreach($fiscalYears as $fiscalYear)
                                        <option
                                            value="{{$fiscalYear->id}}" {{$officeSetting->fiscal_year_id == $fiscalYear->id ? 'selected':''}}>
                                            {{$fiscalYear->title}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('fiscal_year_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <fieldset class="mb-2 mb-4">
                            <legend>कार्यालय बिवरण</legend>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label for="name" class="form-label">नाम *</label>
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
                                <div class="col-md-4 mb-2">
                                    <label for="site_address" class="form-label">ठेगाना *</label>
                                    <input
                                        type="text"
                                        name="site_address"
                                        value="{{old('site_address',$officeSetting->site_address)}}"
                                        class="form-control @error('site_address') is-invalid @enderror"
                                        id="site_address"
                                        placeholder="ठेगाना"
                                    />
                                    @error('site_address')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="mb-2 mb-4">
                            <legend>कार्यालय लोगो</legend>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label for="logo" class="form-label">लोगो १ </label>
                                    <input
                                        type="file"
                                        name="logo"
                                        class="form-control @error('logo') is-invalid @enderror"
                                        id="logo"
                                    />
                                    <img class="img-fluid img-thumbnail" src="{{$officeSetting->logo_url}}" height="60" alt="">
                                    @error('logo')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="logo1" class="form-label">लोगो २</label>
                                    <input
                                        type="file"
                                        name="logo1"
                                        class="form-control @error('logo1') is-invalid @enderror"
                                        id="logo1"
                                    />
                                    <img class="img-fluid img-thumbnail" src="{{$officeSetting->logo1_url}}">
                                    @error('logo1')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="logo2" class="form-label">लोगो ३ </label>
                                    <input
                                        type="file"
                                        name="logo2"
                                        class="form-control @error('logo2') is-invalid @enderror"
                                        id="logo1"
                                    />
                                    <img class="img-fluid img-thumbnail" src="{{$officeSetting->logo2_url}}">
                                    @error('logo2')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="background_image" class="form-label">पृष्ठभूमि</label>
                                    <input
                                        type="file"
                                        name="background_image"

                                        class="form-control @error('background_image') is-invalid @enderror"
                                        id="background_image"

                                    />
                                    <img class="img-fluid img-thumbnail" src="{{$officeSetting->background_image_url}}">
                                    @error('background_image')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="mb-2 mb-4">
                            <legend>सम्पर्क जानकारी</legend>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label for="email" class="form-label">इमेल </label>
                                    <input
                                        type="email"
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
                                <div class="col-md-4 mb-2">
                                    <label for="phone" class="form-label">फोन नम्बर </label>
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
                                <div class="col-md-4 mb-2">
                                    <label for="website" class="form-label">ट्विटर लिङ्क </label>
                                    <input
                                        type="url"
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
                                <div class="col-md-4 mb-2">
                                    <label for="google_map" class="form-label">गुगल नक्शा ट्लिङ्क</label>
                                    <input
                                        type="url"
                                        name="google_map"
                                        value="{{old('google_map',$officeSetting->google_map)}}"
                                        class="form-control @error('google_map') is-invalid @enderror"
                                        id="google_map"
                                        placeholder="गुगल नक्शा"
                                    />
                                    @error('google_map')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="facebook_link" class="form-label">फेसबुक लिङ्क </label>
                                    <input
                                        type="url"
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
                            </div>
                        </fieldset>
                        <fieldset class="mb-2 mb-4">
                            <legend>कार्यालय परिचय</legend>
                            <div class="col-md-12 mb-2">
                                <label for="introduction" class="form-label">परिचय </label>
                                <textarea name="introduction" id="introduction" cols="30" placeholder="परिचय"
                                          class="form-control ckEditor @error('introduction') is-invalid @enderror"
                                          rows="5">{{old('introduction',$officeSetting->introduction)}}</textarea>
                                @error('introduction')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </fieldset>
                        <fieldset class="mb-2 mb-4">
                            <legend>ठेगाना सेटअप</legend>
                            @livewire('address',['address'=>array_merge($officeSetting->address,$officeSetting->ward)])
                        </fieldset>
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        @livewire('office-header-livewire')
    <div class="row">
        <div class="col-md-12">
            <div class="card p-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="mb-0 header-title">कार्यालयको नाम</h4>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>शिर्षक</th>
                                <th>फन्ट</th>
                                <th>फन्ट साइज</th>
                                <th>स्थान</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($officeHeaders as $officeheader)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$officeheader->title}}</td>
                                    <td>{{$officeheader->font}}</td>
                                    <td>{{$officeheader->font_size}}(.rem)</td>
                                    <td>{{$officeheader->position}}</td>
                                    <td class="d-flex gap-1">

                                        @can('officeHeader_edit')
                                            <a data-bs-type="edit"
                                               href="{{route('admin.officeHeader.edit',$officeheader)}}"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg>
                                            </a>
                                        @endcan


                                        <form action="{{route('admin.officeHeader.destroy',$officeheader)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            @can('officeHeader_delete')
                                                <button data-bs-type="delete"
                                                        class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg>
                                                </button>
                                            @endcan
                                        </form>

                                    </td>
                                </tr>
                                <tr class="empty">
                                    <td></td>
                                </tr>
                            @empty

                            @endforelse
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
        @push('scripts')
            <script src="{{asset('assets/backend/ckeditor/ckeditor.js')}}"></script>
            <script src="{{asset('assets/backend/ckeditor/editor.js')}}"></script>
        @endpush

@endsection
