<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Lock Screen | {{config('app.name')}}</title>
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
    <!-- icons -->
    <link href="{{asset('assets/backend/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
</head>

<body class="authentication-bg authentication-bg-pattern" style="background-image: url({{asset('images/mountain_photo.jpg')}})">
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="card bg-pattern">

                    <div class="card-body p-4">

                        <div class="text-center mb-4">
                            <div class="auth-logo">
                                <a href="index.html" class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <img src="assets/images/logo-dark.png" alt="" height="22">
                                            </span>
                                </a>

                                <a href="index.html" class="logo logo-light text-center">
                                            <span class="logo-lg">
                                                <img src="assets/images/logo-light.png" alt="" height="22">
                                            </span>
                                </a>
                            </div>
                        </div>

                        <div class="text-center w-75 m-auto">
                            <img src="assets/images/users/user-1.jpg" height="88" alt="user-image" class="rounded-circle shadow">
                            <h4 class="text-dark-50 text-center mt-3">Hi ! Geneva </h4>
                        </div>


                        <form action="#">

                            <div class="mb-3 mt-3">
                                <label for="password" class="form-label">प्रयोगकर्ता पासवर्ड <span class="text-danger">*</span></label>
                                <input class="form-control" type="password" required="" id="password"
                                       placeholder="प्रयोगकर्ता पासवर्ड">
                            </div>

                            <div class="text-center d-grid">
                                <button class="btn btn-primary" type="submit">पेश गर्नुहोस्</button>
                            </div>

                        </form>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-white-50">तपाई हैन ? फर्किनु
                            <a href="auth-login.html" class="text-white ms-1"><b>लग - इन</b></a>
                        </p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

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
<script src="{{asset('assets/backend/js/vendor.min.js')}}"></script>
<script src="{{asset('assets/backend/js/app.min.js')}}"></script>
</body>
</html>
