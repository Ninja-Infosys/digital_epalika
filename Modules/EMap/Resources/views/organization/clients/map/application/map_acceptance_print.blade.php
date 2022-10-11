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
                    <p class="text-center"><b>बिषय: भवन निर्माण संहिता अनुसार नक्शा/डिजाइन पेश गरेको बारे ।</b></p>

                    <p>महोदय,</p>
                    <p>
                        यस {{config('applicationDetail.office_type')}} वडा नं ... टोल .... मा अवस्थित
                        कित्ता नं ... क्षेत्रफल ... मा भवन निर्माण गर्न प्रस्ताव गरिएको
                        संरचना भुकम्प सुरक्षात्मक मनाउन आवश्यक नक्शा, डिजाईन प्राविधिक चेक लिष्ट र अन्य आवश्यक
                        कागजात सहित यो निवेदन पेश गरेको छु । प्राविधिकले तथा निर्माणबाट भूकम्पीय वा साधारण सुरक्षाको
                        कमीले हुन सक्ने सम्पूर्ण जोखिम प्रति म/हामी जिम्मेवार छु/छौं । संलग्न डिजाईन, सुपरिवेक्षक तथा
                        ठेकेदारबाट डिजाईन, सुपरिवेक्षण तथा निर्माण गराउने छु ।
                        यस {{config('applicationDetail.office_type')}}बाट समय-समयमा
                        दिईने निर्देशन पालना गर्नेछु तथा आवश्यक परेको बेला त्यस कार्यालयमा उपस्थित हुनेछ ।
                    </p>

                    <p>घरधनीको नाम :</p>
                    <p>ठेगाना :</p>
                    <p>फोन नं. :</p>
                    <p>सहि :</p>
                    <p>मिति :</p>
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

