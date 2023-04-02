<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>

    <link href="{{ asset('assets/installer/css/style.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    @stack('styles')
</head>
<body>
<div class="master">
    <div class="box">
        <div class="header">
            <img src="{{ asset('/logo/knap.png') }}" height="40px" alt="">
            <h1 class="header__title">@yield('title')</h1>
        </div>
        <ul class="step">
            <li class="step__divider"></li>
            <li @class(["step__item",'active'=> Route::is('LaravelInstaller::final')])>
                <i class="step__icon database"></i>
            </li>
            <li class="step__divider"></li>
            <li @class(["step__item",'active' =>Route::is('LaravelInstaller::permissions')])>
                <i class="step__icon permissions"></i>
            </li>
            <li class="step__divider"></li>
            <li @class(["step__item",'active'=> Route::is('LaravelInstaller::requirements')])>
                <i class="step__icon requirements"></i>
            </li>
            <li class="step__divider"></li>
            <li @class(["step__item",'active' => Route::is('LaravelInstaller::environment')])>
                <i class="step__icon update"></i>
            </li>
            <li class="step__divider"></li>
            <li @class(["step__item",'active'=>  Route::is('LaravelInstaller::welcome')])>
                <i class="step__icon welcome"></i>
            </li>
            <li class="step__divider"></li>
        </ul>
        <div class="main">
            @yield('section')
        </div>
    </div>
</div>
</body>
@stack('scripts')
</html>
