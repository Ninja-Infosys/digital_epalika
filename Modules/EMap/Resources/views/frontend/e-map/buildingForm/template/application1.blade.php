<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/backend/css/icons.min.css') }}">
    <title>{{ $buildingDocument->name }}को फर्म दर्ता आवेदन</title>

</head>

<body class="container bg-white">
<section class="row justify-content-center my-4 ">
    <div class="card col-md-8 border">
        <div class="card-body">
            <p class="text-danger">नोट: आवेदन अनिवार्य प्रिन्ट गरि कार्यालयमा हाजिर हुनुहोला</p>
            <x-print-button target-element="printData" title="{{ $buildingDocument->name }}"/>
            <div id="printData">

                <div style="margin: 0 4rem;text-align:center"><span
                        style="font-size:14px"><strong>अनुसुची १</strong></span><br/>
                    <span style="font-size:14px"><strong>निर्देशिकाको दफा ५ (ग) संग सम्बन्धित<br>निवेदनको ढाँचा</strong></span>
                </div>


                <div class="header">
                    <p>श्री अध्यक्ष ज्यू :</p>
                    <p>....नं वडा कार्यालय</p>
                    <p>बागाचौर नगरपालिका,सल्यान ।</p>

                    <p class="fw-bold fs-5 text-center my-3">
                        बिषय : घर नक्सा अभिलेखिकरणका लागि सिफारिस पाँउ
                    </p>
                </div>
                <div class="subject">
                    <p>महोदय,</p>
                    <p>
                        उपरोक्त सम्वन्धमा यस कार्यालयमा निवेदन गर्नको कारण यो छ कि मेरो नाममा
                        दर्ता भएको साविक जिल्ला सल्यान
                        <span class="dashed-bottom"> {{$buildingDocument->former_local_body}} </span> गा.वि.स <span
                            class="dashed-bottom"> {{$buildingDocument->former_ward_no}} </span> नं. वडा हाल बागचौर
                        नगरपालिका वडा नं <span
                            class="dashed-bottom"> {{get_nepali_number($buildingDocument->land_ward_no)}} </span> को
                        कित्ता नं <span class="dashed-bottom"> {{get_nepali_number($buildingDocument->plot_no)}} </span>मा
                        <span class="dashed-bottom"> {{get_nepali_number($buildingDocument->land_area)}} </span>क्षेत्रफल
                        जग्गामा तल्ला मैले <span
                            class="dashed-bottom"> {{get_nepali_number($buildingDocument->house_built_date)}} </span>
                        सालमा
                        <span class="dashed-bottom"> {{get_nepali_number($buildingDocument->room)}} </span>कोठा <span
                            class="dashed-bottom"> {{get_nepali_number($buildingDocument->storey)}} </span> तल्ला <span
                            class="dashed-bottom"> {{get_nepali_number($buildingDocument->area)}} </span>क्षेत्रफलको घर
                        निर्माण गरेको
                        र @foreach ($buildingDocument->neighbours as $neighbour)
                            {{$neighbour->direction->label()}}मा {{$neighbour->neighbour_name}}
                        @endforeachको जग्गाको साध सिमानालाइ समेत असर नपुर्याइ निर्माण
                        गरेको र सो घरको नक्सापास नगरेकोले बागचौर नगरपालिकाले निर्माण गरेको
                        मापदण्ड राम्रोसंग बुझि सहमत भइ लाग्ने दस्तुर समेत तिर्न तयार भई घर
                        अभिलेखिकरणका लागी सिफारिस गरिदिन हुन यो निवेदन सादर पेश गरेको छु। मैले
                        माथि उल्लेखित गरेको विवरण झुष्ठा ठहरे कानुन बमोजिम सहने छु/बुझाउने छु।
                        मैले माथि उल्लेखित गरेको विवरण झुष्ठा ठहरे कानुन बमोजिम सहने छु/बुझाउने
                        छु्
                    </p>

                    <div class="d-flex gap-5">
                        <p>निवेदक हस्ताक्षर</p>

                    </div>
                    <div class="d-flex gap-5">
                        <p>दायाँ</p>
                        <p>बाँया</p>
                    </div>
                    <table cellspacing="0" style="border-collapse:collapse; border:none; width:100%">
                        <tbody>
                        <tr>
                            <td style="width:50%">
                                <div class="d-flex">
                                    <div
                                        class="border border-primary"
                                        style="height: 100px; width: 90px"
                                    ></div>
                                    <div
                                        class="border border-primary"
                                        style="height: 100px; width: 90px"
                                    ></div>
                                </div>
                            </td>
                            <td style="width:50%">
                                <p>नाम : <span class="dashed-bottom"> {{$buildingDocument->applicant_name}} </span><br>
                                    ठेगाना : <span class="dashed-bottom"> {{$buildingDocument->province->province ?? ''}},{{$buildingDocument->district->district ?? ''}},{{$buildingDocument->localBody->local_body ?? ''}}-{{ get_nepali_number($buildingDocument->ward_no ?? '') }} </span><br>
                                    टोल : <span class="dashed-bottom"> {{$buildingDocument->tole}} </span><br>
                                    सम्पर्क नं : <span class="dashed-bottom"> {{$buildingDocument->phone}} </span></p>

                            </td>


                        </tr>

                        </tbody>
                    </table>
                    <p class="mt-2 ">निवेदन साथ निम्न कागजात प्रमाण पेश गरेको छु ।</p>
                    <p> क. नेपाली नागरिकताको प्रमाण पत्रको प्रतिलिपी</p>
                    <p>ख. जग्गाधनि प्रमाण पत्रको प्रतिलिपी</p>
                    <p>ग. चालु आ.व को घर जग्गा कर तिरेको रसिदको प्रतिलिपि</p>
                    <p>घ. घरको नक्सा</p>
                    <p>ङ. वडामा बुझाउनु पर्ने अन्य करहरु बुझाएको प्रमाण</p>
                    <p>च. जग्गाको नक्सा</p>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{ asset('assets/backend/print/print.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</body>

</html>
