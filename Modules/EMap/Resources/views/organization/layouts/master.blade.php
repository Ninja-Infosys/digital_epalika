<!DOCTYPE html>
{{--<html lang="{{app()->getLocale()}}">--}}

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

<head>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>{{config('app.name')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="icon" href="{{asset('assets/backend/emap/admin/img/logo.png')}}" type="image/png">

    <link rel="stylesheet" href="{{asset('assets/backend/emap/admin/css/bootstrap1.min.css')}}"/>

    <link rel="stylesheet" href="{{asset('assets/backend/emap/admin/vendors/font_awesome/css/all.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/print/print.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/emap/admin/css/style1.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/sweetalert2.min.css')}}">

    <link
        href="{{asset('assets/backend/css/app.min.css')}}"
        rel="stylesheet"
        type="text/css"
        id="app-style"
    />


    @stack('style')
    @livewireStyles
</head>

<body class="crm_body_bg">


@include('emap::organization.layouts.sidebar')


<section class="main_content dashboard_part">

    @include('emap::organization.layouts.navbar')

    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            @yield('content')
        </div>
    </div>

    @include('emap::organization.layouts.footer')
</section>


<script src="{{asset('assets/backend/emap/admin/js/jquery1-3.4.1.min.js')}}"></script>
<script src="{{asset('assets/backend/emap/admin/js/bootstrap1.min.js')}}"></script>
<script src="{{asset('assets/backend/emap/admin/vendors/text_editor/summernote-bs4.js')}}"></script>

<script src="{{asset('assets/backend/js/sweetalert2.min.js')}}"></script>

<script src="{{asset('assets/backend/print/print.min.js')}}"></script>

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


    window.addEventListener('alert_message', event => {
        swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
        });
    });
</script>

@include('sweetalert::alert')

@stack('scripts')
@livewireScripts
</body>

</html>
