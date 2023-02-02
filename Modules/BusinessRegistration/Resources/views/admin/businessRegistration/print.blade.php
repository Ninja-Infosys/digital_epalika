<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @font-face {
            font-family: 'Kalimati';
            font-style: normal;
            src: url({{asset('assets/fonts/Kalimati.otf')}});
        }

        * {
            font-family: Kalimati;
            font-weight: 300;
        }

        .row {

        }

        .col-md-6 {
            float: left;
            width: 50%;
        }

        .col-md-3 {
            float: left;
            width: 25%;
        }

        p {
            font-size: 20px;
            line-height: 1.5;
        }
        span{
            color: #0a53be;
        }
        .middle-part-line-height {
            line-height: 2;
        }
    </style>
</head>
<body style="margin: 0;padding: 0;">
<div style="background-image: url({{asset('assets/backend/background.jpg')}}); padding: 0; background-repeat: no-repeat;background-size: 100%;height: 1380px;">
    <div class="row" style="padding-top: 110px;">
        <div class="col-md-3">
            <img src="{{$officeSetting->logo_url}}" alt="logo" height="60" style="padding-left: 110px;">
        </div>
        <div class="col-md-6">
            @foreach($officeHeaders as $officeHeader)
                <p style="text-align: center;line-height: 0.7;font-weight: {{$officeHeader->font}};color: {{$officeHeader->font_color}}">{{$officeHeader->title}}</p>
            @endforeach

        </div>
        <div class="col-md-3">
            <img src="{{$businessDetail->partners->first()?->photo ??''}}" alt="{{$businessDetail->partners->first()?->name??''}}" height="60" >
        </div>
    </div>
    <div class="row" style="padding: 110px">
        <div class="col-md-6">
            <p>फाईल नं.:- </p>
            <p>प्रा. फ. दर्ता :- </p>
        </div>
        <div class="col-md-6">
            <p>फाईल नं.:- </p>
            <p>प्रा. फ. दर्ता :- </p>
        </div>
    </div>
    <div class="row" style="padding: 0px 110px 0px 110px" >
        <p>श्री <span>सगरमाथा कन्स्ट्रक्सन</span> नामको <span>{{$businessDetail->name}}</span> उद्योग सम्वत <span>2067</span>
            साल <span>5</span> महिना <span>22</span> गते रोज <span>3</span> मा प्राइभेट फर्म दर्ता नियमावली 2076 को
            अनुसूची-४, बमोजिम यो प्रमाण-पत्र दिइएको छ |</p>
        <p class="middle-part-line-height">प्रोपाइटरको नाम :- <span>{{$businessDetail->partners->first()?->name??''}}</span> <br>
        ठेगाना :- <span>{{$businessDetail->partners->first()?->localBody->local_body??''}}-{{$businessDetail->partners->first()?->ward_no??''}}, {{$businessDetail->partners->first()?->district->district??''}}, {{$businessDetail->partners->first()?->province->province??''}}</span><br>
        नागरिकता नं. :- <span>{{$businessDetail->partners->first()?->citizenship_no??''}}</span><br>
        जारि जिल्ला :- <span>{{$businessDetail->partners->first()?->issueDistrict->district??''}}</span><br>
        उद्योग रहने ठेगाना :- <span>{{$businessDetail->tole??''}}, {{$businessDetail->localBody->local_body??''}}-{{$businessDetail->ward_no??''}}, {{$businessDetail->district->district??''}}, {{$businessDetail->province->province??''}}</span><br>
        कित्ता नं. :- <span></span><br>
        कुल पूँजी रु. :- <span></span><br>
        स्थिर पूँजी रु. :- <span>{{$businessDetail->fixed_capital??''}}</span><br>
        चालु पूँजी रु. :- <span>{{$businessDetail->working_capital??''}}</span><br>
        उदेश्य :- <span>{{$businessDetail->purpose??''}}</span><br>
        बार्षिक उत्पादन क्षमता रु. :- <span></span><br>
        बिधुत शक्ति (किलोवाट) :- <span></span><br>
        मूल्यमा रु. :- <span></span><br>
        उत्पादन वा कारोबार शुरु हुने मिति :- <span></span><br>
        दर्ता मिति :- <span></span></p>
    </div>
    <div class="row" style="padding: 0px 110px 0px 110px">
        <p style="font-size: 13px;">नोट : यो उद्योग औद्योगिक व्यवसाय एन 2076 को दफा 17 को उपदफा 2 को खण्ड........ साना उद्योग अन्तर्गत दर्ता गरिएको छ |</p>
        <hr>
        <p style="font-size: 18px;">प्रमाणपत्र बैधानिकता लागी QR-कोड स्कयान गर्नुहोला अथवा तलको लिंकमा जानुहोस </p>

        <div style="display: flex;justify-content: end;">
            {!! QrCode::size(60)->generate($businessDetail->name_en); !!}
        </div>
    </div>
</div>

</body>
</html>
