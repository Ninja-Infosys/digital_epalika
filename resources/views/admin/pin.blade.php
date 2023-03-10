{{--@extends('admin.layouts.master')--}}
{{--@section('content')--}}
{{--    @if(empty(auth()->user()->pin))--}}
{{--        <div class="modal fade"--}}
{{--             id="set-pin"--}}
{{--             data-bs-backdrop="static"--}}
{{--             data-bs-keyboard="false"--}}
{{--             tabindex="-1"--}}
{{--             aria-labelledby="set-pin-label"--}}
{{--             aria-hidden="true">--}}
{{--            <div class="modal-dialog">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h3 class="modal-title text-black text-center" id="set-pin-label">कृपया प्रमाणीकरण--}}
{{--                            कोड {{auth()->user()->pin==null ?'सेट':'प्रविष्ट'}} गर्नुहोस्</h3>--}}
{{--                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <form data="{{route('admin.pin.store')}}" method="POST" id="pinData">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="pin">कोड </label>--}}
{{--                                <input type="password" class="form-control" placeholder="कोड" name="pin" id="pin">--}}
{{--                                <p class="text-danger" id="error_message"></p>--}}
{{--                            </div>--}}
{{--                            <div class="modal-footer">--}}
{{--                                <button type="submit" id="submitBtn" class="btn btn-primary ">पेश गर्नुहोस</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--@endsection--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>कृपया सञ्चालन गर्न पिन सेट गर्नुहोस् | {{config('app.name')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta
        content="A complete solution for digital palika."
        name="description"
    />
    <meta content="NINJA INFOSYS" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/np.png')}}"/>
    <!-- Bootstrap css -->
    <link
        href="{{asset('assets/backend/css/bootstrap.min.css')}}"
        rel="stylesheet"
        type="text/css"
    />
    <!-- App css -->
    <link
        href="{{asset('assets/backend/css/app.min.css')}}"
        rel="stylesheet"
        type="text/css"
        id="app-style"
    />
</head>

<body class="authentication-bg authentication-bg-pattern" style="background-image: url({{asset('images/mountain_photo.jpg')}})">
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="text-center mb-4 bg-main p-2">
                            <div class="auth-logo">
                                <a href="{{route('login')}}" class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <img src="{{asset('assets/backend/images/logo.png')}}" alt="" height="42">
                                            </span>
                                </a>
                                <a href="{{route('login')}}" class="logo logo-light text-center">
                                            <span class="logo-lg">
                                                <img src="{{asset('assets/backend/images/logo.png')}}" alt="" height="42">
                                            </span>
                                </a>
                            </div>
                        </div>

                        <div class="text-center w-75 m-auto">
                            <img src="{{auth()->user()->profile_photo_url ?? ''}}" height="88" alt="user-image" class="rounded-circle shadow">
                            <h4 class="text-dark-50 text-center mt-3">कृपया सञ्चालन गर्न पिन सेट गर्नुहोस् ।</h4>
                        </div>


                        <form action="{{route('admin.pin.store')}}" method="post" autocomplete="off">
                            @csrf
                            <div class="mb-3 mt-3">
                                <label for="pin" class="form-label">पिन सेट गर्नुहोस् <span class="text-danger">*</span></label>
                                <input class="form-control" type="password" required="" id="pin" name="pin"
                                       placeholder="पिन सेट गर्नुहोस्" autocomplete="off">
                                @error('pin')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="text-center d-grid">
                                <button class="btn btn-primary" type="submit">पेश गर्नुहोस्</button>
                            </div>
                        </form>
                    </div> <!-- end card-body -->
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<footer class="footer footer-alt bg-soft-main">
    2022 -
    <script>
        document.write(new Date().getFullYear());
    </script>
    &copy; Design & Developed by <a href="#" class="text-white text-decoration-underline">NINJA INFOSYS</a>
</footer>
</body>
</html>
