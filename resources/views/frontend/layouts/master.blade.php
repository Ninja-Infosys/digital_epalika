<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Digital e-Palika</title>
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/header.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/footer.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="{{asset('assets/frontend/css/sweetalert2.min.css')}}">
    @stack('styles')

    @livewireStyles
</head>
<body>
@include('frontend.partials.header')
@if(config('app.website_type') === 'website')
@include('frontend.partials.navbar')
@endif
<div class="container">
    @yield('content')
</div>

@if(config('app.website_type') === 'website')
@include('frontend.partials.website_footer')
@else
@include('frontend.partials.digital_board_footer')
@endif

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
        integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assets/frontend/js/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery-3.2.1.slim.min.js')}}"></script>

@livewireScripts

@stack('scripts')
<script>
    const videoSource = new Array();
    videoSource[0] = 'https://www.w3schools.com/html/mov_bbb.mp4';
    videoSource[1] = 'https://www.w3schools.com/html/movie.mp4';
    let i = 0; // define i
    const videoCount = videoSource.length;

    function videoPlay(videoNum) {
        document.getElementById("myVideo").setAttribute("src", videoSource[videoNum]);
        document.getElementById("myVideo").load();
        document.getElementById("myVideo").play();
    }
    videoPlay(i);
    document.getElementById('myVideo').addEventListener('ended', (event) => {
        myHandler();
    });
    // document.getElementById('myVideo').addEventListener('ended', myHandler, false) {
    //     videoPlay(0); // play the video
    // }

    function myHandler() {
        i++;
        console.log(i);
        if (i === (videoCount - 1)) {
            i = 0;
            videoPlay(i);
        } else {
            videoPlay(i);
        }
    }
</script>

</body>
</html>
