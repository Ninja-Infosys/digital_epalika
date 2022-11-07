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
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content="Ninja Infosys" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/np.png')}}"/>
    <link href="{{asset('assets/backend/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
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

    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
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
                                            <a href="{{route('emap.admin.mapSetting.index')}}">कार्यालय सेटिङ</a>
                                        </li>
                                        <li class="breadcrumb-item active">नक्सा सेटिङ सम्पादन गर्नुहोस्</li>
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
                                        <h4 class="header-title">नक्सा सेटिङ सम्पादन गर्नुहोस्</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                   @foreach($files as $file)
                                        <img src="{{$file->file_url}}" alt="" height="150">
                                       <p>{{$file->file_name}}</p>

                                   @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- container -->
        </div>
        <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid text-center">
                <script>
                    document.write(new Date().getFullYear());
                </script>
                &copy; Design & Developed by <a href="#">NINJA INFOSYS</a>
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

</body>
</html>
