<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Digital-Palika</title>
    {{--css link--}}
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/helpdesk/index.css')}}">
    {{--Bootstrap 5 --}}
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/header.css')}}">
    {{--font-awesome--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
</head>
<body>
<div class="background">
    <div class="container d-flex justify-content-around">
        <div class="col-md-2 col-sm-2 col-xs-2">
            <a routerlink="/home" class="main-logo">
                <img alt="nepal-government-logo" class="logo"
                     src="https://molmac.ninjademos.com/storage/office_setting/xP5tV0JD1a3OJBs40rmxWE0u3JR7oUUojJPW1be6.png"/>
            </a>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-8">
            <div class="row mt-3">
                <x-header-component/>
            </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <a routerlink="/home" class="main-logo" href="#/home">
                <img alt="nepal-flag" class="logo-nep float-start d-none d-lg-block"
                     src="https://molmac.ninjademos.com/storage/office_setting/wABUNfkNL6Cc7N6g3DD6gltsh4zRs1F38MwE4vTv.gif"/>
            </a>
        </div>
    </div>
</div>



<div class="container">
    @yield('content')
</div>
{{--Bootatrap 5--}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

{{--fontawesome 6--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
        integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
@stack('styles')
@livewireScripts
</html>
