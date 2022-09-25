{{--topbar--}}
<div class="top-bar">
    <div class="container">
        <select class="langChanger">
            <option value="ne">नेपाली</option>
            <option value="en">English</option>
        </select>
    </div>
</div>
{{--middle header--}}
<div class="background" style="background-image: url('{{$officeSetting->background_image_url}}')">
    <div class="container d-flex justify-content-around">
        <div class="col-md-2 col-sm-2 col-xs-2">
            <a href="{{route('welcome')}}" class="main-logo">
                <img alt="nepal-government-logo" class="logo"
                     src="{{$officeSetting->logo_url}}"/>
            </a>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-8">
            <div class="row mt-3">
                <x-header-component/>
            </div>
        </div>

        <div class="col-md-2 col-sm-2 col-xs-2 d-flex justify-content-around">
           {{-- @if(empty($officeSetting->logo1_url))
                <a href="{{route('welcome')}}" class="main-logo">
                    <img alt="nepal-flag" class="logo-nep float-start d-none d-lg-block"
                         src="{{$officeSetting->logo1_url}}"/>
                </a>
            @endif--}}

            <a href="{{route('welcome')}}" class="main-logo">
                <img alt="nepal-flag" class="logo-nep float-start d-none d-lg-block"
                     src="{{$officeSetting->logo2_url}}"/>
            </a>
        </div>
    </div>
</div>
@push('styles')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/header.css')}}">
@endpush
