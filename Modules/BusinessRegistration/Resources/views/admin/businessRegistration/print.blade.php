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

        .col-md-12 {
            float: left;
            width: 100%;
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
<div style="background-image: url({{asset('assets/backend/background.jpg')}}); padding: 0; background-repeat: no-repeat;background-size: 100%;height: 1400px;">
    <div class="row" style="padding-top: 110px;">
        <div class="col-md-3">
            <img src="{{$officeSetting->logo_url}}" alt="logo" height="60" style="padding-left: 110px;">
        </div>
        <div class="col-md-6">
            @foreach($officeHeaders as $officeHeader)
                <p style="text-align: center;line-height: 0.7;font-weight: {{$officeHeader->font}}rem;color: {{$officeHeader->font_color}}">{{$officeHeader->title}}</p>
            @endforeach
        </div>
        <div class="col-md-3">
            <img src="{{$businessDetail->partners->first()?->photo ??''}}" alt="{{$businessDetail->partners->first()?->name??''}}" height="60" >
        </div>
    </div>
    <div class="row" style="margin-bottom: 100px;">
        <div class="col-md-12">
            <h2 style="text-align: center;">व्यवसाय दर्ता प्रमाण-पत्र</h2><br>
        </div>
    </div>
    <div class="row" style="padding: 0px 110px 0px 110px" >
        <p>
            करदाता नं : {{$businessDetail->taxpayer_number}} <br>
            दर्ता मिति : {{$businessDetail->registration_date_ne}} <br>
            प्रमाणपत्र नं : {{$businessDetail-> registration_no}}
        </p>
        <p>
            जिल्ला <span>{{$businessDetail->partners->first()?->district->district ??''}}</span> गा.बि.स./नगरपालिका <span>{{$businessDetail->partners->first()?->localBody->local_body ??''}}</span> वडा <br>
            नं. <span>{{$businessDetail->partners->first()?->ward_no ??''}}</span> बस्ने श्री <span>{{$businessDetail->partners->first()?->name ??''}}</span> लाई स्थानीय स्वायत् शासन एन <br>
            2055 को दफा 138 बमोजिम निम्न विवरण अनुसारको व्यवसाय दर्ता गरी यो प्रमाण-पत्र जारी गरिएको छ |
        </p>
        <p>
            व्यवसायको नाम : <span>{{$businessDetail->name}}</span> <br>
            व्यवसाय रहने स्थान : {{$businessDetail->localBody->local_body??''}} वडा नं. <span>{{$businessDetail->ward_no}}</span> बाटोको नाम <span>{{$businessDetail->way}}</span> <br>
            घर नं. .......... टोल <span>{{$businessDetail->tole}}</span> <br>
            व्यवसाय रहने घर | जगाधानी नाम : <span>{{$businessDetail->house_owner_name}}</span> <br>
            व्यवसायको प्रकृति : <span>{{$businessDetail->businessNature->title??''}}</span> विवरण <br>
            परिचयपाटीको साइज : <span>{{$businessDetail->area}}</span> <br>
            पुजीगत लगानी (रु मा) : <span>{{$businessDetail->investment}}</span>
        </p>
    </div>
    <div class="row" style="padding: 0px 110px 0px 110px" >
        <div class="col-md-6">
            ............... <br>
            करवालाको हस्ताक्षर
        </div>
        <div class="col-md-6">
            ............. <br>
            स्वीकृत गर्नेको हस्ताक्षर
        </div>
        <hr style="margin-top: 5px;">
    </div>
</div>
</body>
</html>
