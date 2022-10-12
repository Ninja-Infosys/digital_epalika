<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

<head>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>{{config('app.name')}}</title>

    <link rel="stylesheet" href="{{asset('assets/backend/emap/admin/css/bootstrap1.min.css')}}"/>

    <style>
        @font-face {
            font-family: 'Kalimati';
            font-style: normal;
            src: url({{asset('assets/fonts/Kalimati.otf')}});
        }

        * {
            font-family: Kalimati;
            font-weight: 600;
        }

        .underline-dotted {
            border-bottom: dotted 3px !important;
            padding: 0 15px;
        }

        .custom-width {
            padding: 0 50px !important;
        }
    </style>
</head>

<body>


<section>
    <div class="row">
        <div class="col-md-2 col-sm-2 col-xs-2">
            <a href="https://digital-palika.ninjainfosys.com.np" class="main-logo">
                <img alt="nepal-government-logo" class="m-2" height="120" width="140"
                     src="https://digital-palika.ninjainfosys.com.np/storage/office_setting/logo/ikdPdTCOt3UIrx1ZuFq91a7HBcplBNBlislMFnRj.png">
            </a>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-8">
            <div class="row mt-3">
                <div class="text-center">
                    <span style="color: #b90000; font-size: 1.6rem; font-weight: bold;">खजुरा गाउँपालिका</span> <br>
                    <span style="color: #bb0000; font-size: 1.2rem; font-weight: normal;">गाउँकार्यपालिकाको कार्यालय, खजुरा, बाँके</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            @yield('content')
        </div>
    </div>

</section>
<script>
    window.onload = (event) => {
        window.print()
        window.close()
    };
</script>
</body>

</html>

