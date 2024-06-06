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
            @if (!is_null(auth()->user()->ward_no))
                <form action="{{ route('emap.admin.buildingDocumentation.sentToAdmin', $buildingDocumentation) }}"
                    method="post" style="display: inline">
                    @csrf
                    @method('put')

                    <button data-bs-type="edit" type="submit" title="प्रिन्ट गर्नुहोस"
                        class="btn btn-xs btn-outline-warning">
                        <i class="fa fa-print"></i>पालिकामा पठाउनुहोस
                    </button>
                </form>
            @endif
            @if ($buildingDocumentation->sent_admin == 'recommendation_sent' || $buildingDocumentation->sent_admin == 'land_confirmation_show' || !is_null(auth()->user()->ward_no))
                <div class="card-body">
                    <p class="text-danger">नोट: आवेदन अनिवार्य प्रिन्ट गरि कार्यालयमा हाजिर हुनुहोला</p>
                    <x-print-button target-element="printData" title="{{ $buildingDocumentation->name }}" />
                    <div Id="printData">
                        <div class="text-center fw-bolder">
                            <div><span style="font-size:14px"><strong>अनुसूची ४</strong></span><br />
                                <span style="font-size:14px"><strong>निर्देशिकाको दफा ५ संग
                                        सम्वन्धिता</strong></span><br />
                                <span style="font-size:14px"><strong>सिफारिस पत्रको ढाँचा</strong></span>
                            </div>
                        </div>

                        <div class="subject text-justify-center lh-lg px-5 ">
                            <h5><strong> {{ $officeSetting->localBody->local_body ?? '' }}</strong></h5>
                            <h5><strong>........ वडा कार्यालय</strong></h5>

                        </div>
                        <div class="d-flex text-justify-center lh-lg px-5">
                            <p>प.स.:</p>
                            <p style="margin-left: 500px;">मिति :....................</p>
                        </div>
                        <p class="text-justify-center lh-lg px-5"> चालनी नं. :</p>
                        <div class="text-justify-center lh-lg px-5">
                            <p>श्री {{ $officeSetting->localBody->local_body ?? '' }}को कार्यालय</p>
                            <p>{{ $officeSetting->site_address }} ।</p>
                        </div>
                        <p class="text-justify-center text-center lh-lg px-5"> <strong>बिषय : घर जग्गा अभिलेखिकरणको
                                सिफारिस
                                पठाइएको बारे ।</strong></p>
                        <p class="text-justify-center  lh-lg px-5">
                            प्रस्तुत बिषयमा {{ $officeSetting->localBody->local_body ?? '' }} वडा नं.
                            {{ get_nepali_number($buildingDocumentation->land_ward_no) }} साविक जिल्ला
                            {{ $buildingDocumentation->former_district }}
                            {{ $buildingDocumentation->former_local_body }} वडा नं
                            {{ get_nepali_number($buildingDocumentation->former_ward_no) }} कित्ता नं.
                            {{ get_nepali_number($buildingDocumentation->plot_no) }} मा
                            {{ get_nepali_number($buildingDocumentation->land_area) }} क्षेत्रफलमा घर
                            निर्माण गरेको घरधनि श्री. {{ $buildingDocumentation->house_owner_name }} ले यस कार्यालयमा
                            घर अभिलेखिकरणका लागी सिफारिस गरिपाउँ भनि दिएको निवेदन माथि जाँचबुझ
                            गर्दा निजले पेश गरेको घरको अभिलेखिकरण गर्न तोकिएको मापदण्ड हरु सबै पुरा भएको देखिएकाले घर
                            अभिलेखिकरण गरिदिनुहुन सिफारिस साथ अनुरोध छ
                        </p>
                        <p class="text-justify-center  lh-lg px-5">
                            ...................<br>
                            वडा अध्यक्ष
                        </p>
                        <p class="text-justify-center lh-lg px-5"> <strong>(नगरपालिकामा सिफारिस गर्दा तपसिल बमोजिमका
                                कागजात
                                संलग्न हुनपर्नेछ)</strong></p>

                        <div class="subject text-justify-center lh-lg px-5">
                            <ol>
                                <li>
                                    सम्बन्धीत वडा कार्यालयको सिफारिस पत्र (१ प्रति)
                                </li>
                                <li>
                                    नगरपालिकामा सूचिकृत भएको कन्सल्टेन्सीबाट तयार भई सहिछाप भएको घरको नक्सा (२ प्रति)
                                </li>

                                <li>नेपाली नागरिकताको प्रमाण पत्रको प्रतिलिपी (१ प्रति)</li>

                                <li>चालु आ.व को मालपोत कर तिरेको प्रमाण (१ प्रति)</li>
                                <li>पासपोर्ड साइजको फोटो (४ प्रति)</li>

                                <li>जग्गा धनी दर्ता प्रमाण पूर्जाको प्रतिलिपी (१ प्रति)</li>
                                <li>घर बनेको जग्गाको ब्लु प्रिन्ट, फाईल वा ट्रेस नक्साको सक्कल प्रतिलिपी (१ प्रति)</li>
                                <li>चार किल्ला प्रमाणित सिफारिसको प्रतिलिपी (१ प्रति)</li>
                                <li>निर्मित घर टहरा तथा पक्की भवनको चौतर्फी फोटो (१/१ प्रति)</li>

                            </ol>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <script src="{{ asset('assets/backend/print/print.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</body>

</html>
