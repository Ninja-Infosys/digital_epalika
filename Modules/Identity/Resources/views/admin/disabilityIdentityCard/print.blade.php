<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$disabilityIdentityCard->name??''}} </title>
    <style>
        table {
            border-collapse: collapse;
        }

        h4 {
            color: black;
        }
        .student-character {
            padding: 15px;
            background-color: {{$disabilityIdentityCard->governmentalDisabilityType->color??''}};
            border: 2px solid black;
            border-style: solid;
            border-radius: 8px;
        }

        .student-character .top-part {
            text-align: center;
        }

        .student-character .top-part p {
            color: black;
        }

        .student-character .top-part h2, .student-character .top-part h4 {
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
            color: black;
            margin-top: 8px;
            margin-bottom: 4px;
        }

        .student-character .text-part p {
            font-size: 15px;
            font-weight: bold;
            font-family: times;
            color: black;
            line-height: 1.9;
        }



        .student-character .bottom-part p {
            color: black;
            font-family: 'Times New Roman', Times, serif;
            font-size: 17px;
            line-height: 1.6;

        }

        .student-character .bottom-part h4 {
            text-align: center;
            color: black;
            font-family: 'Times New Roman', Times, serif;
        }

        .student-character .bottom-part h4 hr {
            margin-bottom: 10px;
            border-top: 1px solid #3f47c8;
        }

        .heading {
            background-color: black;
            text-align: center;
            width: 70%;
            color: white;
            border-radius: 5px;
            margin-left: 70px;
            height: 35px;
        }


    </style>
</head>
<body>

<div style="height: 1000px;">
    <div class="student-character">
        <div class="top-part">
            <h3>Rong Rural Municipality</h3>
            <h4 style="line-height: 0.01;">kolbang,Ilam</h4>
            <p>1 No. Province (Nepal)</p>
        </div>
        <div style="display: flex; justify-content:space-between;margin-top: 5px;">
            <h2 class="heading">Disability Identity Card</h2>
            <img src="{{$disabilityIdentityCard->photo_url}}" alt="image"
                 style="height:110px;float:right;width:18%;border-radius:5px;">
        </div>
        <h4><b>ID Card Number:</b></h4>
        <h4><b>ID Card Type:</b></h4>
        <div class="text-part">
            <p style="line-height: 0.5;">1) Full Name of Person : <span style="border-bottom:2px dotted">{{$disabilityIdentityCard->name_en ??''}}</span></p>
            <p style="line-height: 0.5;">2)Address :
                Province <span style="border-bottom:2px dotted">{{$disabilityIdentityCard->permanentProvince->province_en??''}}</span>
                District <span style="border-bottom:2px dotted">{{$disabilityIdentityCard->permanentDistrict->district_en??''}}</span>
                <span style="border-bottom:2px dotted">Local
                    {{--                Level{{$disabilityIdentityCard->permanentLocalBody->local_body_en??''}}</p>--}}</span>
            <p style="line-height: 0.5;">3) Date of Birth:<span style="border-bottom:2px dotted"> {{$disabilityIdentityCard->dob_ad ??''}} </span> 4)Citizenship
                Number <span style="border-bottom:2px dotted"> {{$disabilityIdentityCard->citizenship_no??''}} </span></p>
            <p style="line-height: 0.5;">5)Sex: <span style="border-bottom:2px dotted">{{$disabilityIdentityCard->gender??''}}</span> 6)Blood Group <span style="border-bottom:2px dotted">{{$disabilityIdentityCard->blood_group}}</span></p>
            <p style="line-height: 0.5;">7)Types of Disability On the basis of nature............................one the basis of Severity..............</p>
            <p style="line-height: 0.5;">8)Father / Mother or Guardian Name.........................................</p>
            <p style="line-height: 0.5;">9)Signature of ID Card Holder :.........................................</p>
            <p style="line-height: 0.5;">10)Approved By :</p>
        </div>

    </div>
</div>

</body>
</html>
