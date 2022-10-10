<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Print Admit Card</title>
    <link rel="icon" href="images/favicon.ico" sizes="16x16">
    <link rel="stylesheet" href="http://localhost/palika/assets/css/bootstrap.min.css" id="bscss">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Karma:wght@500&amp;family=Martel&amp;display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous">
    <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
        .v-dialog--fullscreen::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body>
<div data-app="true" class="application theme--light" id="app">
    <div tabindex="-1" class="v-dialog__content v-dialog__content--active" style="z-index: 202;">
        <div class="v-dialog v-dialog--active v-dialog--fullscreen">
            <div style="background: white none repeat scroll 0% 0%;">
                <button onclick="window.print();" type="button" class="button v-btn theme--light">
                    <div class="v-btn__content">
                        <i aria-hidden="true" class="v-icon material-icons theme--light">Print</i>
                    </div>
                </button>
                <div data-v-1fe31d9a="" id="print-container-11">
                    <meta charset="UTF-8">
                    <title>Title</title>
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
                          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
                          crossorigin="anonymous">
                    <style>


                        @media print {
                            * {
                                font-family: Kalimati !important;
                            }

                            .button * {
                                visibility: hidden;
                            }

                            #section-to-print,
                            #section-to-print * {
                                visibility: visible;
                            }

                            #section-to-print {
                                position: absolute;
                                left: 0;
                                top: 0;
                                margin-top: -30px;
                            }
                        }

                        .tavle {
                            width: 550px !important;
                        }

                        .center-container {
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        }

                        .my-table {
                            table-layout: fixed;
                            margin-bottom: 5px;
                            margin-top: -8px;
                        }

                        .my-table th {
                            font-size: 9px;
                            text-align: center;
                        }

                        .symbol-no {
                            width: 140px;
                            height: 20px;
                            border: black solid 1px;
                        }

                        .pp-photo {
                            height: 90px;
                            width: 75px;
                        }

                        .page-break {
                            page-break-after: always;
                        }

                        hr {
                            border: 1px dashed black;
                            margin-bottom: 15px;
                            margin-top: 5px;
                        }

                        /*table {*/
                        /*border: 1px solid black !important;*/
                        /*}*/
                        .table > tbody > tr > td,
                        .table > tbody > tr > th,
                        .table > tfoot > tr > td,
                        .table > tfoot > tr > th,
                        .table > thead > tr > td,
                        .table > thead > tr > th {
                            padding: 3px;
                            border: 1px solid black !important;
                        }

                        .sign-p {
                            font-size: 8px !important;
                        }

                        .note-p {
                            font-size: 7px !important;
                            font-style: italic;
                        }

                        .sign-box {
                            border: black solid 1px;
                            height: 62px;
                            width: 80%;
                            justify-content: center;
                            text-align: center;
                            margin-left: 10%;
                            margin-right: 10%;
                        }

                        .sign-box-container {
                            width: 33.33%;
                            float: left;
                            text-align: center;
                        }

                        .sign-box-container .dot-p {
                            margin-top: 30px;
                        }

                        .admit-card-item {
                            zoom: 0.9;
                            margin-top: 5px;
                        }

                        @media print {

                            p {
                                line-height: 1.1 !important;
                            }

                            /* .small-p {
                            font-size: 10px;
                            } */
                            h1,
                            h2,
                            h3,
                            h4,
                            h5,
                            h6 {
                                margin: 3px;
                                color: red;
                            }

                            .table > tbody > tr > td,
                            .table > tbody > tr > th,
                            .table > tfoot > tr > td,
                            .table > tfoot > tr > th,
                            .table > thead > tr > td,
                            .table > thead > tr > th {
                                padding: 3px;
                                border: 1px solid black !important;
                            }

                            th,
                            td {
                                font-size: 10px;
                            }

                            .sign-box p {
                                margin-top: 20%;
                            }

                        }


                        .admission-form {
                            min-height: 500px;
                            margin: 0px 5px;
                            padding: 7px;
                            color: #000;
                        }

                        .admission-address {
                            text-align: center;
                        }

                        .student-picture {
                            border: 1px solid lightgray;
                            height: 120px;
                            width: 120px;
                            float: right;
                            text-align: center;
                            line-height: 30px;
                        }

                        .form-field {
                            margin-bottom: 10px;
                        }

                        .field-title {
                            float: left;
                            margin-right: 8px;
                            font-size: 15px;
                        }

                        .field-value {
                            overflow: hidden;
                            border-bottom: 1px dotted #708596;
                            min-height: 25px;
                            font-size: 15px;

                        }

                        .margin-top {
                            margin-top: 20px;
                        }

                        .admission-form-title {
                            margin-bottom: 5px;
                            margin-top: 10px;
                            background-color: #e4e4e4;
                            padding-left: 10px;
                            font-size: 15px;
                        }

                        .form-control {
                            max-width: 100% !important;
                            border: .5px solid #2A3F54;
                            border-radius: 5px;
                        }

                        table, thead, th {
                            font-size: 14px;

                        }
                    </style>
                    <div class="container" id="section-to-print" style="margin-top: 35px;">
                        <div class="admit-card-item">
                            <div class="registration-form">
                                <div class="row">
                                    <div class="col-sm-2" style="width: 25%; float: left;">
                                        <div class="row">
                                            <img src="{{$officeSetting->logo_url}}" class="float-right"
                                                 width="90px" height="83px">
                                        </div>
                                    </div>
                                    <div class="col-sm-7-1"
                                         style="text-align: center; width: 50%; float: left; font-family: 'Karma', serif;">

                                        <x-header-component/>
                                        <h4 style="font-size: 20px;font-family:Kalimati; ">व्यवसाय दर्ता/नवीकरण निवेदन
                                            फाराम</h4>
                                    </div>
                                    <div class="col-sm-1-1" style="width: 25%; float: right;">
                                        <!-- <img src="" class="pull-left" width="83px" height="70px" alt="qrcode" /> -->

                                        <div class="pull-left" style="width: 100px;">
                                            {!! QrCode::size(70)->generate($proprietorDetail->businessDetail->submission_no??''); !!}
                                        </div>
                                        <div class="pp-photo pull-right">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 small-p" style="width: 60%; float: left;">
                                        <p style="text-align: justify-all;">
                                            {{config('applicationDetail.to_office.to')}}
                                            <br>
                                            {{config('applicationDetail.to_office.office_name')}}
                                            , {{config('applicationDetail.to_office.office')}}
                                            <br>
                                            {{config('applicationDetail.to_office.office_address')}}
                                        </p>
                                    </div>
                                    <div class="col-md-3 small-p" style="width: 40%; float: left;">
                                        <table class="table my-table">
                                            <thead>
                                            <tr>
                                                <th>सम्बिसन नम्बर</th>
                                                <th colspan="2">
                                                    {{$proprietorDetail->businessDetail->submission_no??''}}
                                                </th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="width: 100%">
                                        <p style="text-align: center;font-weight: bold;">
                                            विषय:- व्यवसाय दर्ता/सम्बन्धमा ।
                                            <br>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 small-p">
                                        <p style="text-align: justify-all;justify-content: center;">
                                            मैले/हामीले निम्न स्थानमा सञ्चालन गर्न लागेको व्यवसाय दर्ता गर्न/सञ्चालन
                                            गरेको व्यबसाय नवीकरण गर्न आवश्यक कागजात सहित दरखास्त गर्न आएका छु/छौं ।
                                            नियमानुसार लाग्ने कर बु ́ाउनुको
                                            साथै {{config('applicationDetail.office_type')}}बाट समय–समयमा दिइने
                                            आदेश/निर्देशन समेत पालन गर्न मञ्जुर छु/छौं । साथै मैले/हामीले पेश गरेको
                                            कागजात तथा विवरणहरु ठीक साँचो रहेको र फरक परे कानून बमोजिम कार्वाही भएमा
                                            मञ्जुर छु/छौं ।
                                            <br>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 small-p">
                                        <p>व्यवसायीको नाम, थर:-<b> {{$proprietorDetail->name}}</b></p>
                                    </div>
                                    <div class="col-md-3 small-p" style="width: 45%; float: left;">
                                        <p>व्यबसायीको स्थायी
                                            ठेगाना:-<b> {{$proprietorDetail->district->district??''}}</b> जिल्ला</p>
                                    </div>
                                    <div class="col-md-3 small-p" style="width: 25%; float: left;">
                                        <p><b>{{$proprietorDetail->localBody->local_body??''}}</b></p>
                                    </div>
                                    <div class="col-md-2 small-p" style="width: 15%; float: left;">
                                        <p> वडा नं.<b>{{$proprietorDetail->ward_no}}</b></p>
                                    </div>
                                    <div class="col-md-2 small-p" style="width: 15%; float: left;">
                                        <p>मार्ग <b>{{$proprietorDetail->way}}</b></p>
                                    </div>
                                    <div class="col-md-2 small-p" style="width: 10%; float: left;">
                                        <p>टोल <b> {{$proprietorDetail->tole}}</b></p>
                                    </div>

                                    @if($proprietorDetail->threeGenerationDetails->count() >0)
                                        <div class="col-md-12 small-p" style="width: 100%; float: left;">
                                            <p>तिन पुस्ते बिवरण
                                                :<b></b></p>
                                        </div>
                                        <div class="col-md-12 small-p">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>नाता</th>
                                                    <th> नाम, थर</th>
                                                    <th>नाम, थर( अंग्रेजीमा)</th>
                                                    <th>नागरिकता न</th>
                                                    <th>सम्पर्क न</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($proprietorDetail->threeGenerationDetails as $detail)
                                                    <tr>
                                                        <td>{{$detail->relation}}</td>
                                                        <td>{{$detail->name}}</td>
                                                        <td>{{$detail->name_en}}</td>
                                                        <td>{{$detail->citizenship_no}}</td>
                                                        <td>{{$detail->mobile_no}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                                <div class="row">

                                    <div class="col-md-12 small-p" style="width: 35%; float: left;">
                                        <p>व्यवसाय रहने स्थानको
                                            ठेगाना:- {{$proprietorDetail->businessDetail->province->province??''}},

                                            {{$proprietorDetail->businessDetail->district->district??''}}
                                            {{$proprietorDetail->businessDetail->locaBody->local_body??''}}

                                        </p>
                                    </div>
                                    <div class="col-md-2 small-p" style="width: 25%; float: left;">
                                        <p>वडा नं.:<b>{{$proprietorDetail->businessDetail->ward_no??''}}</b></p>
                                    </div>
                                    <div class="col-md-2 small-p" style="width: 20%; float: left;">
                                        <p>मार्ग: <b>{{$proprietorDetail->businessDetail->way??''}}</b></p>
                                    </div>
                                    <div class="col-md-2 small-p" style="width: 20%; float: left;">
                                        <p>घर नं.:<b>{{$proprietorDetail->house_no}}</b></p>
                                    </div>
                                    <div class="col-md-6 small-p" style="width: 33%; float: left;">
                                        <p>मोबाइल:<b>{{$proprietorDetail->phone}}</b></p>
                                    </div>
                                    <div class="col-md-6 small-p" style="width: 33%; float: left;">
                                        <p>इमेल:<b>{{$proprietorDetail->email}}</b></p>
                                    </div>

                                    @if($proprietorDetail->businessDetail->is_rent==1)
                                        <div class="col-md-6 small-p" style="width: 100%; float: left;">
                                            <p>भाडामा भएको भए व्यवसाय रहने:
                                            </p>
                                        </div>
                                        <div class="col-md-4 small-p" style="width: 100%;float: left">
                                            <p> घर जग्गा धनीको नाम, थर:
                                                <b>{{$proprietorDetail->businessDetail->house_owner_name??''}}</b></p>
                                        </div>
                                        <div class="col-md-4 small-p" style="width: 33%; float: left;">
                                            <p>घर जग्गा धनीको
                                                ठेगाना:<b>{{$proprietorDetail->businessDetail->house_owner_address??''}}</b>
                                            </p>
                                        </div>
                                        <div class="col-md-2 small-p" style="width: 33%; float: left;">
                                            <p>घर जग्गा धनीको
                                                मोबाइल.:<b>{{$proprietorDetail->businessDetail->house_owner_phone??''}}</b>
                                            </p>
                                        </div>
                                        <div class="col-md-2 small-p" style="width: 33%; float: left;">
                                            <p> घर जग्गा धनीको मासिक भाडा
                                                रु.:<b>{{$proprietorDetail->businessDetail->house_owner_monthly_rent??''}}</b>
                                            </p>
                                        </div>
                                    @endif

                                </div>
                                <div class="row">
                                    <div class="col-md-12 small-p" style="width: 100%; float: left;">
                                        <p>व्यवसायको विवरण/प्रकृति:
                                            <b> {{$proprietorDetail->businessDetail->business_nature->label() ??''}}</b>
                                        </p>
                                    </div>
                                    @if($proprietorDetail->businessDetail->business_nature==='partnership')
                                        <div class="col-md-12 small-p">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>साझेदार सँगको नाता</th>
                                                    <th> साझेदार को नाम थर</th>
                                                    <th>नागरिकता न</th>
                                                    <th>सम्पर्क न</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($proprietorDetail->businessDetail->partnerDetails as $partner)
                                                    <tr>
                                                        <td>{{$partner->relation}}</td>
                                                        <td>{{$partner->name}}</td>
                                                        <td>{{$partner->citizenship_no}}</td>
                                                        <td>{{$partner->mobile_no}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                    <div class="col-md-12 small-p" style="width: 100%; float: left;">
                                        <p>पूँजी लगानी रु. :
                                            <b>{{$proprietorDetail->businessDetail->amount_cost??''}}</b></p>
                                    </div>
                                    <div class="col-md-12 small-p" style="width: 100%; float: left;">
                                        <p>फर्म-कम्पनीको नाम
                                            :<b>{{$proprietorDetail->businessDetail->business_detail_name ??''}}
                                                [{{$proprietorDetail->businessDetail->business_detail_name_en ??''}}
                                                ]</b></p>
                                    </div>
                                    <div class="col-md-12 small-p" style="width: 100%; float: left;">
                                        <p>परिचय पाटीको साइज: (लम्बाई ...{{$proprietorDetail->introboard->length??''}}
                                            ... चौडाई ...{{$proprietorDetail->introboard->width??''}}... वर्गफिट
                                            ..{{$proprietorDetail->introboard->square??''}}...)</p>
                                    </div>
                                    @if($proprietorDetail->businessDetail->is_registered==1)
                                        <div class="col-md-2 small-p" style="width: 50%; float: left;">
                                            <p>अन्यत्र दर्ता भएको भए, दर्ता नं.:<b></b></p>
                                        </div>
                                        <div class="col-md-12 small-p">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>दर्ता नम्बर</th>
                                                    <th>व्यवसायको नाम</th>
                                                    <th> दर्ता मिति</th>
                                                    <th>सक्रिय</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($proprietorDetail->businessDetail->registeredBusinesses as $register)
                                                    <tr>
                                                        <td>{{$register->registration_no}}</td>
                                                        <td>{{$register->business_name}}</td>
                                                        <td>{{$register->registration_date}}</td>
                                                        <td>{{$register->active}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif

                                    <div class="col-md-2 small-p" style="width: 100%; float: left;">
                                        <p>संलग्न कागजातहरु:-</p>
                                        <div>

                                            क)व्यवसायीको पासपोर्ट साइजको फोटो*
                                            <i class="{{ !empty($proprietorDetail->businessRegisteredFile->photo) ? 'fa fa-check':''}}"
                                               aria-hidden="true"></i>

                                            <br>
                                            ख) नागरिकता प्रमाणपत्रको प्रतिलिपि-१ <i
                                                class="{{ !empty($proprietorDetail->businessRegisteredFile->citizen_ship) ? 'fa fa-check':''}}"
                                                aria-hidden="true"></i>
                                            <br>

                                            ग) फर्म कम्पनी भएमा दर्ता, इजाजत प्रमाणपत्र <i
                                                class="{{ !empty($proprietorDetail->businessRegisteredFile->company_registration_url) ? 'fa fa-check':''}}"
                                                aria-hidden="true"></i>
                                            <br>
                                            घ) आन्तरिक राजस्व कार्यालयमा आघिल्लो आ.व सम्मको करतिरेको करदाता प्रमाणपत्रको
                                            प्रतिलिपि
                                            <i class="{{ !empty($proprietorDetail->businessRegisteredFile->tax_pay_file) ? 'fa fa-check':''}}"
                                               aria-hidden="true"></i>
                                            <br>

                                            ङ) हस्ताक्षर<i
                                                class="{{ !empty($proprietorDetail->businessRegisteredFile->signature) ? 'fa fa-check':''}}"
                                                aria-hidden="true"></i>
                                            <br>
                                            ङ)
                                            औठाको छाप<i
                                                class="{{ !empty($proprietorDetail->businessRegisteredFile->thumb) ? 'fa fa-check':''}}"
                                                aria-hidden="true"></i>
                                            <br>

                                        </div>
                                    </div>
                                    <div class="col-md-12 small-p">
                                        <p>माथि उल्लेखित सम्पूर्ण व्यहोरा ठिक साँचो हो भनी सहि छाप गर्ने ।</p>
                                    </div>
                                    <div class="col-md-6 small-p" style="width: 50%; float: left;">
                                        <p>निवेदकको दस्तखत:-............................................</p>
                                    </div>
                                    <div class="col-md-6 small-p" style="width: 50%; float: left;">
                                        <p>मिति:- {{$proprietorDetail->created_at->toDateString()}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="display: flex;justify-content: space-between;">
                                <div class="sign-box-container">
                                    <p class="dot-p">
                                        ..................
                                    </p>
                                    <p class="sign-p">
                                        रुजु गर्ने
                                    </p>
                                </div>

                                <div class="sign-box-container">
                                    <p class="dot-p">
                                        ..................
                                    </p>
                                    <p class="sign-p">
                                        प्रमाणित गर्ने
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    function printDiv() {
        var printContents = document.getElementById('section-to-print').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

<script>'undefined' === typeof _trfq || (window._trfq = []);
    'undefined' === typeof _trfd && (window._trfd = []), _trfd.push({'tccl.baseHost': 'secureserver.net'}), _trfd.push({'ap': 'cpsh'}, {'server': 'a2plcpnl0162'}) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.</script>
<script src="https://img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js"></script>
</body>
</html>
