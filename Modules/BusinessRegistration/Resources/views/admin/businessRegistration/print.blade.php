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
            border-bottom: 2px dotted blue;
        }
        .middle-part-line-height {
            line-height: 1.8;
        }
        .left_image{
            padding-left: 110px;
            margin-top: 40px;
        }
        .right_image{
            margin-top: 40px;
            border: 1px solid black;
        }
    </style>
</head>
<body style="margin: 0;padding: 0;">
<div style="background-image: url({{asset('assets/backend/background.jpg')}}); padding: 0; background-repeat: no-repeat;background-size: 100%;height: 1400px;">
    <div class="row" style="padding-top: 110px;">
        <div class="col-md-3">
            <img src="{{$officeSetting->logo_url}}" alt="logo" height="80" class="left_image">
        </div>
        <div class="col-md-6">
            @foreach($officeHeaders as $officeHeader)
                <p style="text-align: center;line-height: 0.7;font-weight: {{$officeHeader->font}}rem;color: {{$officeHeader->font_color}}">{{$officeHeader->title}}</p>
            @endforeach
        </div>
        <div class="col-md-3">
            <img src="{{$businessDetail->partners->first()?->photo ??''}}" class="right_image" alt="{{$businessDetail->partners->first()?->name??''}}" height="80" >
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
        <p class="middle-part-line-height">
            जिल्ला <span>{{$businessDetail->partners->first()?->district->district ??''}}</span> गा.बि.स./नगरपालिका <span>{{$businessDetail->partners->first()?->localBody->local_body ??''}}</span> वडा
            नं. <span>{{$businessDetail->partners->first()?->ward_no ??''}}</span> बस्ने श्री <span>{{$businessDetail->partners->first()?->name ??''}}</span> लाई निम्न विवरण अनुसारको व्यवसाय दर्ता गरी यो प्रमाण-पत्र जारी गरिएको छ |
        </p>
        <p class="middle-part-line-height">
            व्यवसायको नाम : <span>{{$businessDetail->name}}</span> <br>
            व्यवसाय रहने स्थान : <span>{{$businessDetail->localBody->local_body??''}}</span> वडा नं. <span>{{$businessDetail->ward_no}}</span> बाटोको नाम <span>{{$businessDetail->way}}</span> <br>
            घर नं. .......... टोल <span>{{$businessDetail->tole}}</span> <br>
            व्यवसाय रहने घर/जगाधानी नाम : <span>{{$businessDetail->house_owner_name}}</span> <br>
            व्यवसायको प्रकृति : <span>{{$businessDetail->businessNature->title??''}}</span> <br>
            विवरण : <span>{{$businessDetail->objectTransaction->title??''}}</span> <br>
            उद्देश्य : <span>{{$businessDetail->purpose}}</span> <br>
            परिचयपाटीको साइज : <span>({{$businessDetail->length}} * {{$businessDetail->length}}) Sq.ft</span> <br>
            पुजीगत लगानी (रु मा) : <span>{{$businessDetail->investment}}</span>
        </p>
    </div>
    <div class="row" style="padding: 0px 110px 0px 110px" >
        <div class="col-md-6">
            ..................... <br>
            करवालाको हस्ताक्षर
        </div>
        <div class="col-md-6">
            ..................... <br>
            स्वीकृत गर्नेको हस्ताक्षर
        </div>
        <hr style="margin-top: 5px;">
    </div><div class="row" style="padding: 0px 110px 0px 110px" >
       <ul>
           <li>
               प्रत्येक आर्थिक वर्षको असार मसान्त भित्र नविकरण गराई सक्नु पर्नेछ । अन्यथा यस {{$officeSetting->localBody->local_body??''}}को प्रचलित आर्थिक एन बमोजिम कारवाही हुनेछ ।
           </li>
           <li>
               {{$officeSetting->localBody->local_body??''}}को कर ,शुल्क ,दस्तुर समयमा नबुझाएमा करदातालाई {{$officeSetting->localBody->local_body??''}}का तथा वडा समितिबाट दिएको सेवा, सुबिधा र सिफारिसमा समेत रोक्का गरिनेछ ।
           </li>
            <li>
                यो प्रमाण-पत्र गर्ने स्थानमा सबैले देख्ने गरी राख्नुपर्नेछ ।
            </li>
       </ul>
    </div>
</div>
</body>
</html>
