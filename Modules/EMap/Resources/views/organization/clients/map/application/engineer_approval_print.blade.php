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
    <div class=" ">

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="font-black">
                    <p>
                        {{config('applicationDetail.to_office.to')}}<br>
                        {{config('applicationDetail.to_office.address')}}<br>
                        {{config('applicationDetail.to_office.office')}}<br>
                        {{config('applicationDetail.to_office.office_address')}}
                    </p>
                    <p class="text-center"><b>बिषय: भवन संहिता अनुसार भवन डिजाईन गरिएको सम्बन्धमा मन्जुरी पत्र ।</b></p>
                    <p>
                        यस {{config('applicationDetail.ofice_type')}} वडा नं ...... टोल ....... मा अवस्थित
                        कित्ता नं ........ क्षेत्रफल ........ मा भवन निर्माण गर्ने घर धनी श्री ........
                        द्वारा निर्माण गर्न प्रस्ताव गरिएको भवनको स्ट्रक्चरल डिजाईन र नक्सा मैले/हामीले गरेको हो/हो ।
                        मैले/हामीले स्ट्रक्चरल प्राविधिकले पालना गर्नुपर्ने कुराहरुलाई पालना गरी डिजाईन गरेको छु/छौ।
                        यसमा नेपाल राष्ट्रिय भवन निर्माण संहिता तथा अन्य ऐन नियमद्वारा प्रतिपादित समस्त नियमहरु पालना गर्दै आवश्यक भूकम्प
                        सुरक्षात्मक डिजाईन तथा प्रविधि अपनाएको छु/छौ। यस दरखास्त फाराममा उल्लेखित स्ट्रक्चरल विवरणहरु नक्सा र डिजाईन बमोजिम उल्लेख छन् ।
                        नेपाल राष्ट्रिय भवन निर्माण संहिता तथा अन्य ऐन नियम विपरित डिजाईन गरिएको वा उल्लेख गरिएको ठहरे नियमानुसार बुझाउँला ।
                    </p>

                    <p>डिजाईन गर्ने डिजाईनरको नाम : .......................................................</p>
                    <p>योग्यता एवं पद : ..................................................................</p>
                    <p>कन्सल्टेन्सी फर्म भए सो को नाम र छाप : ...............................................</p>
                    <p>उ.म.न.पा. मा दर्ता भएको व्यवसाय प्रमाण पत्रको नं : ......................................</p>
                    <p>नेपाल इञ्जिनियरिङ परिसद दर्ता नं : .....................................................</p>
                    <p>ठेगाना : ........................................................................</p>
                    <p>फोन नं. : ......................................................................</p>
                    <p>सहि : ..........................................................................</p>
                    <p>मिति : ..........................................................................</p>
                </div>
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

