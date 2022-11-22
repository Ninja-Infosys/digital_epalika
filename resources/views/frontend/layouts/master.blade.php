<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}"/>
    <link href="{{asset('assets/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/print/print.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/fontawesome/all.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/frontend/css/sweetalert2.min.css')}}">

    @stack('styles')

    @livewireStyles
</head>
<body>
@include('frontend.partials.header')
@if(config('app.website_type') === 'website')
@include('frontend.partials.navbar')
@endif
<div class="container-fluid">
    @yield('content')
</div>

@if(config('app.website_type') === 'website')
@include('frontend.partials.website_footer')
@else
@include('frontend.partials.digital_board_footer')
@endif

<script src="{{asset('assets/frontend/js/popper.min.js')}}" ></script>
<script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/fontawesome/all.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/sweetalert2.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assets/backend/print/print.min.js')}}"></script>

@livewireScripts

@stack('scripts')

<script>
    window.addEventListener('alert_message', event => {
        swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
        });
    });
</script>
@include('sweetalert::alert')
</body>
</html>
