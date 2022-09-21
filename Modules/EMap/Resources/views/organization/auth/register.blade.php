<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Register | {{config('app.name')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta
        content="B-Palika System"
        name="description"
    />
    <meta content="Coderthemes" name="author"/>
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
    @livewireStyles
</head>

<body class="auth-page" style="background-image: url({{asset('images/mountain_photo.jpeg')}})">
<div class="mt-5 mb-5">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4 system_info">
                            <div class="logo">
                                <img src="{{asset('images/np.png')}}" height="100" alt="Logo">
                            </div>
                            <div class="title">
                                <h4>
                                    <b>{{$officeSetting->localBody->local_body??''}}</b> <br>
                                    <span class="text-light">
                                        {{$officeSetting->district->district??''}} <br>
                                        {{$officeSetting->province->province??''}}, नेपाल
                                    </span>
                                </h4>
                                <p>
                                    डिजिटल पालिका ब्यबस्थापन प्रणालि
                                    <br>
                                    (Digital Palika Management System)
                                </p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="text-center">Register</h2>
                                    <livewire:emap::organization-register-livewire/>
                                </div>
                                <div class="row technical-support">
                                    <p>
                                        <b>प्राविधिक सहायता कक्ष:</b>
                                        <br>
                                        सम्पर्क नम्बर: 081-520361/9858042433
                                        <br>
                                        इमेल: ninjainfosys@gmail.com
                                    </p>
                                </div>
                            </div>
                        </div>
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
@livewireScripts
</body>
</html>
