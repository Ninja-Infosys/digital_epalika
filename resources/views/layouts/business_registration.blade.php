<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="{{asset('assets/backend/emap/admin/css/bootstrap1.min.css')}}"/>
    <title>व्यवसाय दर्ता</title>
    <style>
        .font-black p {
            color: black;
        }

        .underline-dotted {
            border-bottom: dotted 3px !important;
            padding: 0 15px;
        }

        .custom-width {
            padding: 0 50px !important;
        }


        table, td, th {
            border: 1px solid;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
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


        @media print {
            .break-page {
                page-break-after: always !important;
            }
        }
    </style>
</head>
<body>
</body>

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
</html>


