<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{asset('assets/backend/emap/admin/css/bootstrap1.min.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css"
          integrity="sha512-3PN6gfRNZEX4YFyz+sIyTF6pGlQiryJu9NlGhu9LrLMQ7eDjNgudQoFDK3WSNAayeIKc6B8WXXpo4a7HqxjKwg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>{{$businessDetail->name}}को व्यवसाय दर्ता आवेदन</title>

    <style>
        span {
            color: #0a53be;
            border-bottom: 2px dotted blue;
        }

        p {
            line-height: 1.8;
        }
        .subject{
            text-align: center;
        }
        @font-face {
            font-family: 'Kalimati';
            font-style: normal;
            src: url({{asset('assets/fonts/Kalimati.otf')}});
        }

        * {
            font-family: Kalimati;
            font-weight: 300;
        }
    </style>
</head>
<body class="container">
<section class="row justify-content-center my-4">
    <div class="card col-md-8">
        <div class="card-body">
            <p class="text-danger">नोट: आवेदन अनिवार्य प्रिन्ट गरि कार्यालयमा हाजिर हुनुहोला</p>
            <button class="btn btn-info" onclick="printJS({
            printable: 'printData',
            type: 'html',
            css:'{{asset('assets/backend/css/businessRegistrationPrint.css')}}',
            targetStyles: ['*'],
            documentTitle: '{{$businessDetail->name}}को व्यवसाय दर्ता आवेदन'
            })">
                <i class="fa fa-print"></i> Print
            </button>
            <div id="printData">
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
                </style>
                <div class="col-md-6">
                    <p>
                        श्रीमान प्रमुख प्रशासकीय अधिकृत ज्यु, <br>
                        {{$officeSetting->localBody->local_body??''}} <br>
                        नगर कार्यपालिकाको कार्यालय <br>
                        {{$officeSetting->district->district??''}}
                    </p>
                </div>
                <p class="subject">बिषय : व्यवसाय दर्ता / नवीकरण सम्बन्धमा </p>
                <div class="col-md-12 middle-part">
                    <p>
                        मैले/हामीले निमन् स्थानमा व्यवसाय दर्ता/नविकरण गर्न लागेकोले आवश्यक कागजात सहित दरखास्त गर्न
                        आएका छु/र्छौं नियमानुसार लागने कर बुझाउनुको साथै नगरपालिकाबाट समय-समयमा दिइने आदेश/निर्देशन समेत
                        पालन गर्न
                        मन्जुर छु/र्छौं । साथै मैले/हामीले पेश गरेको कागजात तथा बिवरणहरु ठिक साँचो रहेको र फरक परे कानून
                        बमोजिम
                        कार्वाही भएमा मञ्जुर छु/र्छौं ।
                    </p>
                </div>

                <div class="col-md-12">
                    <p> १. व्यवसायीको नाम,थर : <span>{{$businessDetail->partners->first()?->name??''}}</span> <br>
                        २. स्थायी ठेगाना : <span>{{$businessDetail->partners->first()?->district->district??''}}</span>
                        जिल्ला
                        <span>{{$businessDetail->partners->first()?->localBody->local_body??''}}</span> गा . पा. / न.
                        पा.
                        वडा नं <span>{{$businessDetail->partners->first()?->ward_no??''}}</span>
                        <span>{{$businessDetail->partners->first()?->way??''}}</span> मार्ग घर नं.
                        <span>{{$businessDetail->partners->first()?->house_no??''}}</span>
                        <br>
                        ३. बाबुको नाम, थर : <span>{{$businessDetail->partners->first()?->father_name??''}}</span><br>
                        ४. व्यवसाय रहने स्थानको ठेगाना : <span>{{$businessDetail->district->district??''}}</span> जिल्ला
                        <span>{{$businessDetail->localBody->local_body??''}}</span> गा . पा. / न. पा.
                        वडा नं <span>{{$businessDetail->ward_no??''}}</span> <span>{{$businessDetail->way??''}}</span>
                        मार्ग
                        <br>
                        ५. सम्पर्क फोन नं : <span>{{$businessDetail->partners->first()?->phone??''}}</span> ईमेल :
                        <span>{{$businessDetail->partners->first()?->email??''}}</span>
                        <br>
                        ६. भाडामा भएको भए व्यवसाय रहने घर र जग्गा धनीको नाम, थर :
                        <span>{{$businessDetail->house_owner_name}}</span> <br>
                        ७. ठेगाना : <span>{{$businessDetail->house_owner_address}}</span> <br>
                        ८. व्यवसायको विवरण/प्रकृति : <span>{{$businessDetail->businessNature->title??''}}</span> <br>
                        ९. पुजीगत लगानी रु : <span>{{$businessDetail->investment}}</span> <br>
                        १०. परिचय पाटीको साइज : <span>{{$businessDetail->length}}</span> *
                        <span>{{$businessDetail->width}}</span> Sq.ft <br>
                        ११. अन्यत्र दर्ता भएको भए, दर्ता नं. :
                        <span>{{$businessDetail->registeredBusinesses->first()?->registration_no??''}}</span> <br>
                        १२. संलगन गर्नुपर्ने कागजातहरु
                    </p>
                </div>

                <div class="col-md-12">
                    <ul>
                        <li>आफनै घर जग्गा भए जग्गा धनि प्रमाणपत्रको प्रतिलिपि</li>
                        <li>भाडामा बास्ने भए भाडा रकम र भुक्तानी तरिका समेत खुलेको वहान सम्झौतापत्र</li>
                        <li> नागरिकता (आगाडी)</li>
                        <li> नागरिकता (पछाडी)</li>
                        <li> वार्ड सिफारिस</li>
                        <li>बिदेशी नागरिकको हकमा नेपालस्थित राजदुतावासबाट व्यवासायीको नाममा जारी कागजात</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('assets/backend/print/print.min.js')}}"></script>
</body>
</html>
