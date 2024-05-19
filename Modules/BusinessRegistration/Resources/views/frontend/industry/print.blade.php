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
    <title>{{ $industry->name }}को उधोग दर्ता आवेदन</title>

</head>

<body class="container bg-white">
<section class="row justify-content-center my-4 ">
    <div class="card col-md-8 border">
        <div class="card-body">
            <p class="text-danger">नोट: आवेदन अनिवार्य प्रिन्ट गरि कार्यालयमा हाजिर हुनुहोला</p>
            <x-print-button target-element="printData" title="{{ $industry->name }}"/>
            <div id="printData">
                <div class="flex-container" style="display:flex">
                    <div class="item-auto"
                         style="flex:1 1 auto; margin: 0 4rem 0 0;text-align:center">
                        <img alt="" src="{{asset('assets/backend/images/np.png')}}"
                             style="float:left; height:80px; width:110px"/></div>

                    <div class="item-auto"
                         style="flex:1 1 auto; margin: 0 4rem;text-align:center">
                        <strong><span style="font-size:16px" class="text-danger">चिङ्गाड गाउँपालिका</span><br/>
                            <span style="font-size:20px" class="text-danger">गाउँ कार्यपालिकाको कार्यालय</span></strong><br/>
                        <span class="fw-bold text-danger mb-0" style="font-size:24px; width:80px">उधोग शाखा</span><br>
                        <span style="font-size:16px" class="text-danger fw-bold">अवलचिङ्ग, सुर्खेत</span>
                    </div>
                    <div class="item-auto"
                         style="flex:1 1 auto; margin: 0 4rem;text-align:center">
                    </div>
                </div>
                <div class="row sub-title">
                    <div class="col-sm sub-title1">
                        <p class="text-danger fw-bold lh-1">पत्र संख्या : ................</p>
                        <p class="mt-1 text-danger fw-bold lh-1">चलानी नम्बर : ...............</p>
                    </div>
                    <div class="col-sm sub-title2 text-end ml-auto">
                        <p class="text-danger fw-bold lh-1"
                           style="text-align: end;">मिती :
                            ......................</p>
                    </div>
                </div>
                <p class="text-center mb-0">विषय :- फर्म रजिष्ट्रेशन गरिएको</p>
                <p>श्री ...............................................</p>
                <p class="mb-0">तपाईले स्थिर पूँजी रु. {{$industry->fixed_capital}} र चालु पूँजी रु.
                    {{$industry->working_capital}} समेत कूल
                    पूँजी रु. {{$industry->investment}}
                    लगानी गरि अन्दाजी वार्षिक रु. ............................... बराबरको
                    ..............................................................................................
                    उत्पादन गर्ने उदेश्यले कामदार ................................... जवान राखी,
                    {{ $industry->province->province ?? '' }} प्रदेश {{ $industry->district->district ?? '' }} जिल्ला
                    {{ $industry->localBody->local_body ?? '' }}गा.पा/न.पा. वडा नं. {{ $industry->ward_no ?? '' }} मा
                    उधोग स्थापना गर्ने गरी ............................................................... नामको
                    प्राइभेट/साझेदारी/प्रा.लि. फर्म रजिष्ट्रेशन पाउँ भनि दिएको निवेदन उपर कारबाही हुँदा मिति
                    ..................... को निर्णयाअनुसार निम्नलिखित शर्तहरु पालना गर्नुपर्ने
                    गरी रजिष्ट्रेशन गरिदिने भनी निर्णय भएको हुँदा तपाई समेतको नाममा रजिष्ट्रेशन भएको फ.नं.
                    .................................... को सक्कल प्रमाण-पत्र यसै साथ संलग्न गरी प्त्हैएको व्यहोरा
                    जानकारी गराइएको छ ।
                </p>
                <p class="text-decoration-underline mb-0">उद्योगले पालना गर्नुपर्ने शर्तहरुः
                </p>
                <p>
                    १. उद्योग सञ्चालन गर्न आवश्यक पर्ने सम्पूर्ण कच्चा पदार्थ उद्योगले स्वयं व्यवस्था गर्नुपर्नेछ ।<br>
                    २. उद्योगको साइनबोर्ड र फर्मको प्याडमा रजिष्ट्रेशन नम्बर अनिवार्य रुपमा उल्लेख गर्नुपर्नेछ ।<br>
                    ३. नाबालकलाई उद्योगको काममा संलग्न गराउन पाइने छैन ।<br>
                    ४. छर छिमेक कसैलाई पीर मर्का बाधा नपर्ने गरी उद्योग सञ्चालन गर्नुपर्नेछ ।<br>
                    ५. रात्री सिफ्ट सञ्चालन गर्नुपर्ने भएमा पूर्व स्वीकृती लिएर मात्र सञ्चालन गर्न सकिनेछ ।<br>
                    ६. उद्योगलाई आवश्यक पर्ने जनशक्ति नेपाली नागरिकबाटै पूर्ति गर्नुपर्नेछ। विदेशी जनशक्ति विना उद्योग
                    सञ्चालन हुन नसक्ने भएमा श्रम विभाग समेतको पूर्व स्वीकृती लिएर मात्र काममा लगाउन सकिनेछ ।<br>
                    ७. उद्योग विस्तार,विविधीकरण वा स्तर परिवर्तन गर्दा पूर्व स्वीकृती प्राप्त गर्नुपर्नेछ ।<br>
                    ८. उद्योग सञ्चालन गर्दा वातावरण प्रदूषण हुन नदिने गरी आवश्यक व्यवस्था गर्नुपर्नेछ ।<br>
                    ९. तोकिएको शर्तहरू पालना नभएकोमा वा प्रदत्त सुविधा तथा सहुलियतहरु दुरुपयोग भएको पाइएमा प्रदेश
                    औद्योगिक व्यवसाय ऐन, २०७८ अनुसार कार्यबाही गरिनेछ ।<br>
                    १०. उद्योगले व्यावसायिक उत्पादन वा कारोबारो प्रारम्भ गरेपछि तोकिए बमोजिमको विवरण प्रत्येक आर्थिक
                    वर्ष समाप्त भएको मितिले ६ महिनाभित्र उद्योग दर्ता गर्ने निकायसमक्ष पेश गर्नुपर्नेछ ।<br>
                    ११. उद्योग सञ्चालन गर्दा उद्योगमा भइरहेको काम कारबाहीलाई मूल सडकबाट नदेखिने गरी व्यवस्था मिलाउनु
                    पर्नेछ ।<br>
                    १२. यस ऐन बमोजिम दर्ता भएको उद्योग सम्बन्धित उद्योगीले कुनै कारणले बन्द गरेमा वा व्यावसायिक उत्पादन
                    वा कारोबारो स्थगन गरेमा त्यसरी बन्द वा स्थगन गरेको मितिले ३५ दिनभित्र त्यसको जानकारी उद्योग दर्ता
                    गर्ने निकायलाई तोकिए बमोजिमको ढाँचामा दिनु पर्नेछ ।<br>
                    १३.उद्योग दर्ता प्रमाणपत्रमा उल्लेखित उद्देश्य विपरित कार्य गर्न पाइने छैन ।<br>
                    १४. यसै नामबाट यस अघि अर्को उद्योग दर्ता भइसकेको देखिएमा यस उद्योगको नाम परिवर्तन गर्नुपर्नेछ ।<br>
                    १५. माथि उल्लेखित भए अनुसारका शर्तहरू पालना नगरेमा वा प्रगति विवरण प्राप्त नभएमा उद्योगले पाउने
                    सुविधा तथा सहुलियतहरू उपलब्ध गराइने छैन ।<br>
                    १६. उपभोक्ता संरक्षण ऐन २०७५ अनुसार कार्य गर्नुपर्नेछ ।<br>
                    १७. अन्य कुनै निकायले अनुमति लिई उद्योग सञ्चालन गर्नुपर्ने भएमा अनुमति प्राप्त भइसकेपछि मात्र उद्योग
                    सञ्चालन गर्नुपर्नेछ ।<br>
                    १८. विशेष शर्त :
                    क. उद्योगबाट उत्पादित फोहोरमैला उचित व्यवस्था गर्नुपर्नेछ ।<br>
                    ख.
                    <span class="text-decoration-underline">बोधार्थ:</span><br>
                    श्री आन्तरिक राजस्व कार्यालय, सुर्खेत ।<br>
                    श्री .......................
                </p>
            </div>
        </div>
    </div>
</section>
<script src="{{ asset('assets/backend/print/print.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</body>

</html>
