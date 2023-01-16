<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>{{config('app.name','Digital E-Palika')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta
        content="A complete solution for a digital palika."
        name="description"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta content="Ninja Infosys" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/np.png')}}"/>
    <link href="{{asset('assets/backend/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/print/print.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">
    <!-- App css -->
    <link
        href="{{asset('assets/backend/css/app.min.css')}}"
        rel="stylesheet"
        type="text/css"
        id="app-style"
    />

    <link
        href="{{asset('assets/backend/css/bootstrap.min.css')}}"
        rel="stylesheet"
        type="text/css"/>

    <!-- icons -->
    <link href="{{asset('assets/backend/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="{{asset('assets/backend/css/sweetalert2.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/css/nepali.datepicker.v3.7.min.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mukta&display=swap" rel="stylesheet">
    @stack('style')
    @livewireStyles
</head>

<!-- body start -->
<body>
<!-- Begin page -->
<div id="wrapper">

    @include('admin.layouts.header')

    @include('admin.layouts.side_nav')

    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container -->
        </div>
        <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid text-center">
                <script>
                    const date = new Date.getFullYear();
                    document.write(date);
                </script>
                &copy; Design & Developed by <a href="https://ninjainfosys.com">NINJA INFOSYS</a>
            </div>
        </footer>
        @include('inc.floating-menu')
        <!-- end Footer -->
    </div>
</div>
<!-- END wrapper -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="{{asset('assets/backend/js/vendor.min.js')}}"></script>
<!-- App js-->
<script src="{{asset('assets/backend/libs/select2/js/select2.min.js')}}"></script>
<script src="{{asset('assets/backend/libs/chart.js/Chart.bundle.min.js')}}"></script>

<script src="{{asset('assets/backend/print/print.min.js')}}"></script>
<script src="{{asset('assets/backend/js/sweetalert2.min.js')}}"></script>


<script src="{{asset('assets/backend/js/pages/form-advanced.init.js')}}"></script>
@include('sweetalert::alert')

@stack('scripts')
<script src="{{asset('assets/backend/js/app.min.js')}}"></script>
@livewireScripts

<script src="{{asset('assets/backend/js/sweetAlertInit.min.js')}}">

</script>
</body>
</html>
