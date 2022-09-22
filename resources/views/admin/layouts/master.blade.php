<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>{{config('app.name','laravel')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta
        content="A fully featured admin theme which can be used to build CRM, CMS, etc."
        name="description"
    />
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/np.png')}}"/>

{{--    <link--}}
{{--        href="{{asset('assets/backend/libs/flatpickr/flatpickr.min.css')}}"--}}
{{--        rel="stylesheet"--}}
{{--        type="text/css"--}}
{{--    />--}}
{{--    <link--}}
{{--        href="{{asset('assets/backend/libs/selectize/css/selectize.bootstrap3.css')}}"--}}
{{--        rel="stylesheet"--}}
{{--        type="text/css"--}}
{{--    />--}}
    <link
        href="{{asset('assets/backend/css/bootstrap.min.css')}}"
        rel="stylesheet"
        type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">
    <!-- App css -->
    <link
        href="{{asset('assets/backend/css/app.min.css')}}"
        rel="stylesheet"
        type="text/css"
        id="app-style"
    />
    <!-- icons -->
    <link href="{{asset('assets/backend/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Head js -->
{{--    <script src="{{asset('assets/backend/js/head.js')}}"></script>--}}

    <link rel="stylesheet" href="{{asset('assets/backend/css/sweetalert2.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/css/nepali.datepicker.v3.7.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/summernote/summernote-bs4.css')}}">


    @livewireStyles
</head>

<!-- body start -->
<body>
<!-- Begin page -->
<div id="wrapper">

    @include('admin.layouts.header')

    @include('admin.layouts.sidebar')

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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        &copy; Design & Developed by <a href="#">Ninja Infosys</a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-sm-block">
                            <a href="javascript:void(0);">About Us</a>
                            <a href="javascript:void(0);">Help</a>
                            <a href="javascript:void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
</div>
<!-- END wrapper -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="{{asset('assets/backend/js/vendor.min.js')}}"></script>

<!-- Plugins js-->
{{--<script src="{{asset('assets/backend/libs/flatpickr/flatpickr.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/backend/libs/apexcharts/apexcharts.min.js')}}"></script>--}}

{{--<script src="{{asset('assets/backend/libs/selectize/js/standalone/selectize.min.js')}}"></script>--}}

<!-- Dashboar 1 init js-->
{{--<script src="{{asset('assets/backend/js/pages/dashboard-1.init.js')}}"></script>--}}

<!-- App js-->
<script src="{{asset('assets/backend/js/app.min.js')}}"></script>

<script src="{{asset('assets/backend/js/sweetalert2.min.js')}}"></script>

<script>
    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
        event.preventDefault();

        swal.fire({

            title: "Are You Sure to Delete ? ",
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: 'red',
            confirmButtonText: "Delete",
            dangerMode: true,

        })
            .then((willDelete) => {
                if (willDelete.isConfirmed) {
                    form.submit();
                }
            });
    });
</script>



<script src="{{asset('assets/backend/summernote/summernote-bs4.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            placeholder: 'Description',
            tabsize: 2,
            height: 200
        });
    });
</script>
@include('sweetalert::alert')

@stack('scripts')

@livewireScripts
</body>
</html>
