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
    <title>{{ $buildingDocumentation->name }}को फर्म दर्ता आवेदन</title>

</head>

<body class="container bg-white">
    <section class="row justify-content-center my-4 ">
        <div class="card col-md-8 border">
            <div class="card-body">
                <p class="text-danger">नोट: आवेदन अनिवार्य प्रिन्ट गरि कार्यालयमा हाजिर हुनुहोला</p>
                <x-print-button target-element="printData" title="{{ $buildingDocumentation->name }}" />
                <div id="printData">
                    <div class="text-center fw-bolder">
                        <div><span style="font-size:14px"><strong>अनुसूची-३</strong></span><br />
                            <span style="font-size:14px"><strong>निर्देशिकाको दफा ५ (घ) संग
                                    सम्वन्धित</strong></span><br />
                            <span style="font-size:14px"><strong>सरजमिन मुचुल्काको ढाँचा</strong></span>
                        </div>
                    </div>

                    <div class="subject mt-4">
                        <p>
                            {{ $buildingDocumentation?->localBody?->local_body }}
                            वडा नं {{ get_nepali_number($buildingDocumentation->ward_no) ?? '' }} वस्ने श्री
                            {{ $buildingDocumentation->house_owner_name }} ले यस कार्यालयमा पेश गरेको
                            निवेदन
                            माथि स्थलगत चेकजाँच गर्दा निजले साविक जिल्ला {{ $buildingDocumentation->former_district }}
                            {{ $buildingDocumentation->former_local_body }} वडा नं
                            {{ get_nepali_number($buildingDocumentation->former_ward_no) }} हाल
                            {{ $officeSetting->localBody->local_body ?? '' }}
                            वडा नं. {{ get_nepali_number($buildingDocumentation->land_ward_no) }} को कित्ता नं .
                            {{ get_nepali_number($buildingDocumentation->plot_no) }} मा
                            {{ get_nepali_number($buildingDocumentation->land_area) }} क्षेत्रफल जग्गामा
                            {{ get_nepali_number($buildingDocumentation->house_built_year) }} सालमा
                            {{ get_nepali_number($buildingDocumentation->room) }} कोठाको
                            {{ get_nepali_number($buildingDocumentation->storey) }} तल्लाको
                            {{ get_nepali_number($buildingDocumentation->area) }} क्षेत्रफलको घर/भवन निर्माण गरेको ठिक
                            साँचो हो
                            र यो घरको नक्सापास गरिदिएमा हामीलाइ कुनै किसिमको दावी विरोध छैन । पछि
                            होइन/छैन भनि कहि कतै उजुरी समेत गर्ने छैन । साथै कार्यालयबाट खटिआएका
                            डोरले सोधनी गर्दा चित्त बुझ्यो । निजले सडक अधिकार क्षेत्र
                            {{ get_nepali_number($buildingDocumentation->road_jurisdiction) }}मि समेत छाडी घर निर्माण
                            गरेको देखिन्छ /
                            पाइएको छ ।
                        </p>
                        <p>संधियारहरु</p>

                        @foreach ($buildingDocumentation->neighbours as $neighbour)
                            <p><strong>{{ $neighbour->direction->label() }}तर्फ :-</strong></p>
                            <p>१. {{ $officeSetting->localBody->local_body ?? '' }} वडा नं.
                                {{ get_nepali_number($neighbour->ward_no) }} बस्ने श्री
                                {{ $neighbour->neighbour_name }} </p>
                        @endforeach

                        <p class="mt-2">वडा अध्यक्ष श्री .................
                            {{ $officeSetting->localBody->local_body ?? '' }}
                            .........नं. वडा </p>
                        <p>काम तामेल गर्ने कर्मचारी :</p>

                        <p>ईति सम्वत </p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('assets/backend/print/print.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</body>

</html>
