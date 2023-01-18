<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$seniorCitizenDetail->name??''}} </title>

    <style>

        body{
            visibility: hidden;
        }
        .col-md-3 {
            float: left;
            width: 25%;
        }
        .col-md-4 {
            float: left;
            width: 33.33%;
        }

        h4 {
            color: black;
        }

        p {
            line-height: 0.5;
            font-size: 7px
        }

        p > span {
            border-bottom: 1px dotted;
        }

        .header {
            visibility: visible;
            padding: 15px;
            background-color: yellow;
            border: 1px solid black;
            border-radius: 8px;
        }
        .header > .office_header{
            display: flex; justify-content:space-between;
        }

        .identity{
            display: flex; justify-content:space-between;
        }

        .identity > h2{
            font-size: 8px;
        }
        .heading {
            background-color: black;
            text-align: center;
            width: 70%;
            color: white;
            border-radius: 5px;
            margin-left: 70px;
            height: 10px;
        }
        .middle-part{
            display: flex;justify-content: space-between;margin-bottom: 0;
        }

        .footer-part{
            font-size: 10px;
        }

        .footer-part > div >span{
            border-bottom: 1px dotted;
            font-size: 8px !important;
        }

        #signature_image{
            z-index: 5;
            margin-left: -60px;
            transform: rotate(-10deg);
        }
        .signature{
            z-index: 5;
            margin-top: -10px;
            transform: rotate(-10deg);
        }
        @media print {
            .break-page {
                page-break-after: always !important;
            }

        }
        @page {
            size: landscape;
            margin: 0;
        }
    </style>
</head>
<body>
<div>
    <div class="header" style="height: 204.48px;width: 324.48px;">
        <div class="office_header">
            <div>
                <img src="{{$officeSetting->logo_url}}" alt="" height="30">
            </div>
            <div>
                @foreach($officeHeaders as $header)
                    <p style="font-size: {{$header->card_font}}rem;font-weight:{{$header->font}};color:{{$header->font_color}};line-height: 0.2;text-align: center;">{{$header->title}}</p>
                @endforeach
            </div>
            <div>
                <img src="{{$seniorCitizenDetail->photo}}" alt="" height="40">
                <img src="" alt="" height="20" id="signature_image" />
            </div>

        </div>
        <div class="identity">
            <h2 class="heading">
                जेष्ठ नागरिक परिचय पत्र
            </h2>
        </div>
        <p>आईडी कार्ड नं:</p>
        <p>व्यक्तिको पुरा नाम: </p>
        <div>
            <p>नागरिकता नं : <span></span></p>
            <p>रोग :
                <span></span>
                <span></span>
                <span> </span>
            </p>
            <p>ठेगाना  :<span> </span></p>
            <p>पति,पत्नीको नाम  : <span> </span>
            </p>
            <div class="footer-part">
                <div class="col-md-4" >
                    <span>

                    </span><br>
                    <p>नाम</p></div>
                <div class="col-md-4" >
                    <span>
                        <img src=""
                             alt="" height="20" class="signature">
                    </span><br>
                    <p>हस्ताक्षर</p></div>
                <div class="col-md-4" >
                    <span>

                    </span><br>
                    <p>पद</p></div>
            </div>

        </div>
    </div>
    <div class="break-page"></div>
    <div class="header" style="height: 204.48px;width: 324.48px; margin-top: 5px;">
        <div class="office_header">
            <div>
                <img src="{{$officeSetting->logo_url}}" alt="" height="30">
            </div>
            <div>
                @foreach($officeHeaders as $header)
                    <p style="font-size: {{$header->card_font}}rem;font-weight:{{$header->font}};color:{{$header->font_color}};line-height: 0.2;text-align: center;">{{$header->title_en}}</p>
                @endforeach
            </div>
            <div>
                {!! QrCode::size(30)->generate($seniorCitizenDetail->name_en??''); !!}
            </div>
        </div>
        <div class="identity">
            <h2 class="heading">
                Senior Citizen ID Card
            </h2>
        </div>
        <p>ID Card No: </p>
        <p>Full Name : </p>
        <p>Citizenship No: <span></span></p>
        <p style="margin-bottom: 0;">Disease :
            <span></span>
        </p>
        <p style="margin-bottom: 0;">Address :
            <span></span>
        </p>
        <p style="margin-bottom: 0;">Husband/Wife Name :
            <span></span>
        </p>
        <div>
            <div class="middle-part">
                <div style="display:flex;justify-content: space-between;margin-bottom: 0;">
                    <div>
{{--                        @foreach($disabilityIdentityCard->fingerPrints->where('finger','left') as $fingerPrint)--}}
{{--                            <img src="{{$fingerPrint->finger_image}}" alt="" height="20"><br>--}}
{{--                            <p style="margin-top: 0;">बाँया </p>--}}
{{--                        @endforeach--}}
                    </div>
                    <div>
{{--                        @foreach($disabilityIdentityCard->fingerPrints->where('finger','right') as $fingerPrint)--}}
{{--                            <img src="{{$fingerPrint->finger_image}}" alt="" height="20"><br>--}}
{{--                            <p style="margin-top: 0;">दाँया </p>--}}
{{--                        @endforeach--}}
                    </div>
                </div>
            </div>


            <div class="footer-part">
                <div class="col-md-4" >
                    <span>

                    </span><br>
                    <p>Name</p>
                </div>
                <div class="col-md-4" >
                     <span >
                        <img src=""
                             alt="" height="20" class="signature">

                    </span><br>
                    <p>Signature</p>
                </div>
                <div class="col-md-4" >
                     <span >

                    </span><br>
                    <p>Designation</p></div>

            </div>

        </div>
    </div>
</div>

</body>
</html>
