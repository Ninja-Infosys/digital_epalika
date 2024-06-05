<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/backend/css/icons.min.css') }}">
    <title>{{ $buildingDocument->name }}को फर्म दर्ता आवेदन</title>

</head>

<body class="container bg-white">
    <section class="row justify-content-center my-4 ">
        <div class="card col-md-8 border">
            <div class="card-body">
                <p class="text-danger">नोट: आवेदन अनिवार्य प्रिन्ट गरि कार्यालयमा हाजिर हुनुहोला</p>
                <x-print-button target-element="printData" title="{{ $buildingDocument->name }}" />
                <div id="printData">

                    <p>
                        उपरोक्त सम्वन्धमा यस कार्यालयमा निवेदन गर्नको कारण यो छ कि मेरो नाममा
                        दर्ता भएको साविक जिल्ला सल्यान
                        <span class="dashed-bottom"> {{ $buildingDocument->former_local_body }} </span> गा.वि.स <span
                            class="dashed-bottom"> {{ $buildingDocument->former_ward_no }} </span> नं. वडा हाल बागचौर
                        नगरपालिका वडा नं <span class="dashed-bottom"> {{ $buildingDocument->land_ward_no }} </span> को
                        कित्ता नं <span class="dashed-bottom"> {{ $buildingDocument->plot_no }} </span>मा
                        <span class="dashed-bottom"> {{ $buildingDocument->land_area }} </span>क्षेत्रफल जग्गामा तल्ला
                        मैले <span class="dashed-bottom"> {{ $buildingDocument->house_built_date }} </span> सालमा
                        <span class="dashed-bottom"> {{ $buildingDocument->room }} </span>कोठा <span
                            class="dashed-bottom"> {{ $buildingDocument->storey }} </span> तल्ला <span
                            class="dashed-bottom"> {{ $buildingDocument->area }} </span>क्षेत्रफलको घर निर्माण गरेको
                        र
                        @foreach ($buildingDocument->neighbours as $neighbour)
                        {{$neighbour->direction->label()}}मा {{$neighbour->neighbour_name}}
                        @endforeach
                        को जग्गाको साध सिमानालाइ समेत असर नपुर्याइ निर्माण
                        गरेको र सो घरको नक्सापास नगरेकोले बागचौर नगरपालिकाले निर्माण गरेको
                        मापदण्ड राम्रोसंग बुझि सहमत भइ लाग्ने दस्तुर समेत तिर्न तयार भई घर
                        अभिलेखिकरणका लागी सिफारिस गरिदिन हुन यो निवेदन सादर पेश गरेको छु। मैले
                        माथि उल्लेखित गरेको विवरण झुष्ठा ठहरे कानुन बमोजिम सहने छु/बुझाउने छु।
                        मैले माथि उल्लेखित गरेको विवरण झुष्ठा ठहरे कानुन बमोजिम सहने छु/बुझाउने
                        छु्
                    </p>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('assets/backend/print/print.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</body>

</html>
