{{--topbar--}}
@if(config('app.website_type') === 'website')
    <div class="top-bar ">
        <div class="container">
            <select class="">
                <option value="ne">नेपाली</option>
                <option value="en">English</option>
            </select>
        </div>
    </div>
@endif
{{--middle header--}}
@include('frontend.partials.header_middle')
@push('styles')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/header.css')}}">
@endpush
