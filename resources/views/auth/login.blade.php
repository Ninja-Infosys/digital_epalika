<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Log In | B-Palika</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta
        content="B-Palika System"
        name="description"
    />
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/backend/images/favicon.ico')}}"/>

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
    <!-- icons -->
    <link href="{{asset('assets/backend/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Head js -->
    {{--    <script src="assets/js/head.js"></script>--}}
</head>

<body class="authentication-bg">
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="text-center w-75 m-auto">
                            <div class="auth-logo">
                                <a href="index.html" class="logo logo-dark text-center">
                      <span class="logo-lg">
                        <img
                            src="{{asset('assets/backend/images/logo-dark.png')}}"
                            alt=""
                            height="22"
                        />
                      </span>

                                </a>

                                <a href="index.html" class="logo logo-light text-center">
                      <span class="logo-lg">
                        <img
                            src="{{asset('assets/backend/images/logo-light.png')}}"
                            alt=""
                            height="22"
                        />
                      </span>
                                </a>
                            </div>
                            <p class="text-muted mb-4 mt-3">
                                Admin Login
                            </p>
                        </div>

                        <form action="{{route('login')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    type="email"
                                    value="{{old('email')}}"
                                    id="email"
                                    placeholder="Email Address"
                                />
                                @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    type="password"
                                    id="password"
                                    placeholder="Password"
                                />
                                @error('password')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input
                                        type="checkbox"
                                        class="form-check-input"
                                        id="checkbox-signin"
                                        checked
                                    />
                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>

                            <div class="text-center d-grid">
                                <button class="btn btn-primary" type="submit">
                                    Log In
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p>
                            <a href="auth-recoverpw.html" class="text-white-50 ms-1"
                            >Forgot your password?</a
                            >
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer footer-alt">
    2015 -
    <script>
        document.write(new Date().getFullYear());
    </script>
    &copy; Design & Developed By <a href="#" class="text-white-50">Ninja Infosys</a>
</footer>

<!-- Vendor js -->
<script src="{{asset('assets/backend/js/vendor.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/backend/js/app.min.js')}}"></script>
</body>
</html>
