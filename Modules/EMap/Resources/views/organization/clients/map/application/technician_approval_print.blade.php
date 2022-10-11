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
    <hr>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="font-black">
                <p>
                    {{config('applicationDetail.to_office.to')}}<br>
                    {{config('applicationDetail.to_office.address')}}<br>
                    {{config('applicationDetail.to_office.office')}}<br>
                    {{config('applicationDetail.to_office.office_address')}}
                </p>
                <p class="text-center"><b>बिषय: मापदण्ड अनुसार भवन डिजाईन गरिएको सम्बन्धमा मन्जुरी पत्र ।</b></p>

                <p>महोदय,</p>
                <p>
                    यस {{config('applicationDetail.office_type')}} वडा नं .......... टोल ............ मा अवस्थित
                    कित्ता नं .......... क्षेत्रफल ...........मा भवन निर्माण गर्ने घर धनी श्री............
                    द्वारा निर्माण गर्न प्रस्ताव गरिएको भवनको आर्किटेक्ट डिजाईन र नक्सा
                    मैले/हामीले गरेको हो/ हौं । मैले / हामीले नक्सा बनाउन प्राविधिकले पालना गर्नुपर्ने कुराहरु र {{config('applicationDetail.office_type')}}को
                    मापदण्ड बमोजिम नक्सा बनाएको छु/छौं । यस दरखास्त फाराममा उल्लेखित प्राविधिक
                    विवरणहरु डिजाईन र नक्सा बमोजिम उल्लेख छन् । मापदण्ड विपरित डिजाईन गरिएको वा उल्लेख गरिएको
                    ठहरे नियमानुसार सहुँला बुझाउँला ।
                </p>

                <p>डिजाइन गर्ने डिजाईनरको नाम  :</p>
                <p>योग्यता एवं पद  :</p>
                <p>कन्सल्टीङ्ग फर्म भए सो को नाम र छाप   :</p>
                <p>उ.म.न.पा. मा दर्ता भएको व्यवसाय प्रमाण पत्रको नं. :</p>
                <p>नेपाल ईन्जिनियरीङ्ग परिषद दर्ता नं.:</p>
                <p>ठेगाना :</p>
                <p>सम्पर्क नं. :</p>
                <p>सही  :</p>
                <p>मिति :</p>
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
