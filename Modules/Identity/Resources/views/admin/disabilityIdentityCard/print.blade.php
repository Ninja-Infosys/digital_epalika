<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$disabilityIdentityCard->name??''}} </title>
    <style>

        .col-md-3{
            float: left;
            width: 25%;
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

        .student-character {
            padding: 15px;
            background-color: {{$disabilityIdentityCard->governmentalDisabilityType->color??''}};
            border: 2px solid black;
            border-style: solid;
            border-radius: 8px;
        }

        .student-character .top-part h2, .student-character .top-part h4 {
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
            color: black;
            margin-top: 8px;
            margin-bottom: 4px;
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


    </style>
</head>
<body>
<div >
    <div class="student-character" style="height: 204.48px;width: 324.48px;">
        <div style="display: flex; justify-content:space-between;">
            <div>
                <img src="{{$officeSetting->logo_url}}" alt="" height="30">
            </div>
            <div>
                @foreach($officeHeaders as $header)
                    <p style="font-size: 10px;line-height: 0.2;text-align: center;">{{$header->title}}</p>
                @endforeach
            </div>
            <div>
                <img src="{{$disabilityIdentityCard->photo_url}}" alt="" height="30">
            </div>
        </div>
        <div style="display: flex; justify-content:space-between;">
            <h2 class="heading" style="font-size: 8px;">अपांगता परिचय पत्र</h2>
        </div>
        <p>परिचय पत्रको प्रकार:</p>
        <p>प. प. नं.:</p>
        <div>
            <p>नाम थर : <span>{{$disabilityIdentityCard->name ??''}}</span></p>
            <p>ठेगाना :
                <span>{{$disabilityIdentityCard->permanentProvince->province??''}}</span>
                <span>{{$disabilityIdentityCard->permanentDistrict->district??''}}</span>
                <span>{{$disabilityIdentityCard->permanentLocalBody->local_body??''}} </span>
            </p>
            <p>लिङ्ग <span> {{$disabilityIdentityCard->gender->label() ??''}}</span></p>
            <p>अपांगता प्रकृतिको आधारमा : <span> {{$disabilityIdentityCard->disabilityType->title??''}}</span>
            </p>
            <p>गम्भीरता :
                <span> {{$disabilityIdentityCard->governmentalDisabilityType->title??''}}</span>
            </p>
            <p>बाबु आमा वा संरक्षकको नाम थर : <span> {{$disabilityIdentityCard->father_name??''}}</span></p>
            <p>परिचय पत्र प्रमाणित गर्ने : <span> </span></p>

            <div>
                <div class="col-md-3" style="font-size: 10px;">
                    <span style="border-bottom: 1px dotted;">
                        {{$disabilityIdentityCard->employeeSignature->name??''}}
                    </span><br>
                    <p>नाम</p></div>
                <div class="col-md-3" style="font-size: 10px;">
                    <span style="border-bottom: 1px dotted;">
                        <img src="{{$disabilityIdentityCard->employeeSignature->red_signature??''}}" alt="{{$disabilityIdentityCard->name??''}}" height="20">
                    </span><br>
                    <p>हस्ताक्षर</p></div>
                <div class="col-md-3" style="font-size: 10px;">
                    <span style="border-bottom: 1px dotted;">
                        {{$disabilityIdentityCard->employeeSignature->designation??''}}
                    </span><br>
                    <p>पद</p></div>
                <div class="col-md-3" style="font-size: 10px;">
                    <span style="border-bottom: 1px dotted;">
                        {{today()->toDateString()}}
                    </span><br>
                    <p>जारि मिति</p></div>
            </div>

        </div>
    </div>
    <div class="student-character" style="height: 204.48px;width: 324.48px; margin-top: 5px;">
        <div style="display: flex; justify-content:space-between;">
            <div>
                <img src="{{$officeSetting->logo_url}}" alt="" height="30">
            </div>
            <div>
                @foreach($officeHeaders as $header)
                    <p style="font-size: 10px;line-height: 0.2;text-align: center;">{{$header->title_en}}</p>
                @endforeach
            </div>
            <div>
                {!! QrCode::size(30)->generate($disabilityIdentityCard->name_en??''); !!}
            </div>
        </div>
        <div style="display: flex; justify-content:space-between;">
            <h2 class="heading" style="font-size: 8px;">Disability Identity Card</h2>
        </div>
        <p>ID Card Type:</p>
        <p>Card No.:</p>
        <div>
            <p>Name of card holder: <span>{{$disabilityIdentityCard->name_en ??''}}</span></p>
            <p>Address :
                <span>{{$disabilityIdentityCard->permanentProvince->province_en??''}}</span>
                <span>{{$disabilityIdentityCard->permanentDistrict->district_en??''}}</span>
                <span>{{$disabilityIdentityCard->permanentLocalBody->local_body_en??''}} </span>
            </p>
            <p>Gender <span> {{$disabilityIdentityCard->gender ??''}}</span></p>
            <p>Disability On the basis of nature : <span> {{$disabilityIdentityCard->disabilityType->title??''}}</span>
            </p>
            <p>On the basis of severity :
                <span> {{$disabilityIdentityCard->governmentalDisabilityType->title_en??''}}</span>
            </p>
            <p>Father/Mother/Guardian : <span> {{$disabilityIdentityCard->father_name_en??''}}</span></p>
            <p>ID Card Approved By : <span> </span></p>

            <div>
                <div class="col-md-3" style="font-size: 10px;">
                    <span style="border-bottom: 1px dotted;">
                        {{$disabilityIdentityCard->employeeSignature->name_en??''}}
                    </span><br>
                    <p>Name</p>
                </div>
                <div class="col-md-3" style="font-size: 10px;">
                     <span style="border-bottom: 1px dotted;">
                        <img src="{{$disabilityIdentityCard->employeeSignature->red_signature??''}}" alt="{{$disabilityIdentityCard->name??''}}" height="20">

                    </span><br>
                    <p>Signature</p>
                </div>
                <div class="col-md-3" style="font-size: 10px;">
                     <span style="border-bottom: 1px dotted;">
                        {{$disabilityIdentityCard->employeeSignature->designation_en??''}}
                    </span><br>
                    <p>Designation</p></div>
                <div class="col-md-3" style="font-size: 10px;">
                    <span style="border-bottom: 1px dotted;">
                        {{today()->toDateString()}}
                    </span><br>
                    <p>Issue Date</p></div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
