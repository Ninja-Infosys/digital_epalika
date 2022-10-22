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
            font-weight: 500;
        }

        .underline-dotted {
            border-bottom: dotted 3px !important;
            padding: 0 15px;
        }

        .custom-width {
            padding: 0 50px !important;
        }

        p {
            color: #000;
            line-height: 1.8;
            text-align: justify;
        }

        .vertical {
            transform: rotate(90deg);
            transform-origin: left top 0;
            margin-left: 30px;
            padding: 0 160px;
            color: #000;
        }

        .letter {
            padding-left: 50px;

        }

        .flex-wrap {
            flex-wrap: wrap !important;
        }

        .d-flex {
            display: flex !important;
        }

        @media print {
            .break-page {
                page-break-after: always !important;
            }
        }
    </style>
</head>

<body>


<section>
    <div class="row">
        <div class="col-md-2 col-sm-2 col-xs-2">
            <a href="https://digital-palika.ninjainfosys.com.np" class="main-logo">
                <img alt="nepal-government-logo" class="m-2" style="height:90px; object-fit: contain;"
                     src="{{asset('images/np.png')}}">
            </a>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-8">
            <div class="row mt-3">
                <div class="text-center">
                    <x-header-component/>
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

