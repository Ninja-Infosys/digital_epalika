<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{asset('assets/backend/emap/admin/css/bootstrap1.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/print/print.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css"
          integrity="sha512-3PN6gfRNZEX4YFyz+sIyTF6pGlQiryJu9NlGhu9LrLMQ7eDjNgudQoFDK3WSNAayeIKc6B8WXXpo4a7HqxjKwg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>{{$businessDetail->name}}को व्यवसाय दर्ता आवेदन</title>
</head>
<body class="container">
<section class="row justify-content-center my-4">
    <div class="card col-md-8">
        <div class="card-body">
            <p class="text-danger">नोट: आवेदन अनिवार्य प्रिन्ट गरि कार्यालयमा हाजिर हुनुहोला</p>
            <button class="btn btn-info" onclick="printJS({
            printable: 'printData',
            type: 'html',
            targetStyles: ['{{asset('assets/backend/css/print.css')}}','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css'],
            documentTitle: '{{$businessDetail->name}}को व्यवसाय दर्ता आवेदन'
            })">
                <i class="fa fa-print"></i> Print
            </button>
            <div id="printData">
                <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <img alt="nepal-government-logo" class="m-2" height="120" width="140"
                             src="{{asset('images/np.png')}}">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8 text-center">
                        <div class="col-md-8 text-center">
                            <x-header-component :has-clock="false"/>
                        </div>
                    </div>
                    <div
                        class="col-md-2 col-sm-2 col-xs-2">{!! QrCode::generate($businessDetail->submission_no??''); !!}</div>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="row mt-1">
                        <div class="col-md-4">
                            <span class="fw-bold">सबमिशन नम्बर:</span>
                        </div>
                        <div class="col-md-6">
                            <span>{{$businessDetail->submission_no??''}}</span>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4">
                            <span class="fw-bold">व्यवसायीको नाम, थर:</span>
                        </div>
                        <div class="col-md-6">
                            <span>{{$businessDetail->partners->first()?->name ??''}}</span>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4">
                            <span class="fw-bold">व्यवसायीको सम्पर्क नं.:</span>
                        </div>
                        <div class="col-md-6">
                            <span>{{$businessDetail->partners->first()?->phone ??''}}</span>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-md-4">
                            <span class="fw-bold">व्यवसायीको इमेल ठेगाना:</span>
                        </div>
                        <div class="col-md-6">
                            <span>{{$businessDetail->partners->first()?->email ??''}}</span>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4">
                            <span class="fw-bold">व्यवसायीको ठेगाना:</span>
                        </div>
                        <div class="col-md-6">
                            <span>{{$businessDetail->partners->first()?->localBody->local_body??''}}
                                - {{$businessDetail->partners->first()?->businessDetail->ward_no??''}}
                                , {{$businessDetail->partners->first()?->district->district??''}}
                                , {{$businessDetail->partners->first()?->province->province??''}}, </span>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4">
                            <span class="fw-bold">व्यवसायको विवरण/प्रकृति:</span>
                        </div>
                        <div class="col-md-6">
                            <span>{{$businessDetail->businessNature->title??''}}</span>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4">
                            <span class="fw-bold">व्यवसायको नाम:</span>
                        </div>
                        <div class="col-md-6">
                            <span>{{$businessDetail->name ??''}}</span>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4">
                            <span class="fw-bold">पूँजी लगानी रु.: </span>
                        </div>
                        <div class="col-md-6">
                            <span>{{$businessDetail->investment??''}}</span>
                        </div>
                    </div>
                </div>
                <div class="note mt-2">
                    <span class="fw-bold">कृपया यस आवेदनको साथमा तल उल्लेखित कागजातहरू बोक्नुहोस्। </span><br>
                    <span>१. व्यवसायीको पासपोर्ट साइजको
                                            फोटो  <i
                            class="fa {{!empty($businessDetail->partners->first()?->photo ??'') ? 'fa-check':'fa-times'}}"></i> </span><br>
                    <span>२. नागरिकता अपलोड गर्नुहोस् (आगाडी)  <i
                            class="fa {{!empty($businessDetail->partners->first()?->citizenship_front ??'') ? 'fa-check':'fa-times'}}"></i> </span><br>
                    <span>३. नागरिकता अपलोड गर्नुहोस् (पछाडी)  <i
                            class="fa {{!empty($businessDetail->partners->first()?->citizenship_back ??'') ? 'fa-check':'fa-times'}}"></i> </span><br>
                    <span>४. फार्म कम्पनी भयमा
                                            दर्ता, इजाजत
                                            प्रमाणपत्र  <i
                            class="fa {{!empty($businessDetail->registration_document ??'') ? 'fa-check':'fa-times'}}"></i> </span><br>
                    <span>५.आन्तरिक राजस्व कार्यालयमा
                                            आघिल्लो आ.व
                                            सम्मको करतिरेको करदाता प्रमाणपत्रको प्रतिलिपि  <i
                            class="fa {{!empty($businessDetail->tax_document ??'') ? 'fa-check':'fa-times'}}"></i> </span><br>
                    <span>६. हस्ताक्षर <i
                            class="fa {{!empty($businessDetail->partners->first()?->signature ??'') ? 'fa-check':'fa-times'}}"></i> </span><br>

                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('assets/backend/print/print.min.js')}}"></script>
</body>
</html>
