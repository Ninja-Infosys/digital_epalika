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
            border-bottom:  dotted 3px !important;
            padding: 0 15px;
        }

        .custom-width{
            padding: 0 50px !important;
        }
    </style>
</head>

<body>


<section>
    <div class="mt-5">

        <div class="row justify-content-center">
            <div class="col-lg-12">
                @yield('content')
            </div>
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

