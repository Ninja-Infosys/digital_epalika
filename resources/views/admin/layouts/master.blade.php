<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>{{config('app.name','Digital E-Palika')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta content="A complete solution for a digital palika." name="description"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta content="Ninja Infosys" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/np.png')}}"/>
    <link href="{{asset('assets/backend/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/print/print.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">
    <!-- App css -->
    <link href="{{asset('assets/backend/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>
    <link href="{{asset('assets/backend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media='screen,print'/>
    <!-- icons -->
    <link href="{{asset('assets/backend/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/nepali.datepicker.v3.7.min.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Mukta&display=swap" rel="stylesheet">
    @stack('style')
    @livewireStyles
</head>
<body>
<div id="wrapper">
    @include('admin.layouts.header')
    @include('admin.layouts.side_nav')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
            @include('inc.floating-menu')
        </div>
        <footer class="footer">
            <div class="container-fluid text-center">
                {{date('Y')}} &copy; Design & Developed by <a href="https://ninjainfosys.com">NINJA INFOSYS</a>
            </div>
        </footer>
    </div>
</div>
<div class="rightbar-overlay"></div>
<script src="{{asset('assets/backend/js/vendor.min.js')}}"></script>
<script src="{{asset('assets/backend/libs/select2/js/select2.min.js')}}"></script>
<script src="{{asset('assets/backend/libs/chart.js/Chart.bundle.min.js')}}"></script>

<script src="{{asset('assets/backend/print/print.min.js')}}"></script>
<script src="{{asset('assets/backend/js/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/backend/js/pages/form-advanced.init.js')}}"></script>
@include('sweetalert::alert')

@stack('scripts')
@livewireScripts
<script>
    const validationUrl = '{{ route("admin.pin.check-pin") }}';
    const uploadFileUrl = '{{ route('admin.file-upload') }}';
</script>

<script src="{{asset('assets/backend/js/sweetAlertInit.min.js')}}"></script>
<script src="{{asset('assets/backend/js/custom.js')}}"></script>
{{--<script src="{{asset('js/newRelic.min.js')}}"></script>--}}
<script src="{{asset('assets/backend/js/app.min.js')}}"></script>
</body>
</html>
