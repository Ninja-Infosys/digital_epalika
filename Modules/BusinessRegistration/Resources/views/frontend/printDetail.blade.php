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
    <title>{{$proprietorDetail->name}}को व्यवसाय दर्ता आवेदन</title>
</head>
<body class="container">
<section class="row justify-content-center my-4">
    <div class="card col-md-8">
        <div class="card-body">
        <p class="text-danger">नोट: आवेदन अनिवार्य प्रिन्ट गरि कार्यालयमा हाजिर हुनुहोला। </p>
            <button class="btn btn-info" onclick="printJS({
            printable: 'printData',
            type: 'html',
            css: '{{asset('assets/backend/css/print.css')}}',
            documentTitle: '{{$proprietorDetail->name}}को व्यवसाय दर्ता आवेदन'
            })">
                <i class="fa fa-print"></i> Print
            </button>
            <div id="printData">
                <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-2">
                            <img alt="nepal-government-logo" class="m-2" height="120" width="140"
                                 src="{{asset('images/np.png')}}">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <div class="row mt-3">
                            <div class="text-center">
                                <div>
                                    <p>
                                        {{config('applicationDetail.to_office.to')}}
                                        <br>
                                        {{config('applicationDetail.to_office.office_name')}}
                                        <br>
                                        {{config('applicationDetail.to_office.office')}}
                                        <br>
                                        {{config('applicationDetail.to_office.office_address')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-md-2 col-sm-2 col-xs-2">{!! QrCode::generate($proprietorDetail->businessDetail->submission_no??''); !!}</div>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="row mt-1">
                        <div class="col-md-4">
                            <span class="fw-bold">सबमिशन नम्बर:</span>
                        </div>
                        <div class="col-md-6">
                            <span>{{$proprietorDetail->businessDetail->submission_no??''}}</span>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4">
                            <span class="fw-bold">व्यवसायीको नाम, थर:</span>
                        </div>
                        <div class="col-md-6">
                            <span>{{$proprietorDetail->name}}</span>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4">
                            <span class="fw-bold">व्यवसायीको सम्पर्क नं.:</span>
                        </div>
                        <div class="col-md-6">
                            <span>{{$proprietorDetail->phone}}</span>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4">
                            <span class="fw-bold">व्यवसायीको इमेल ठेगाना:</span>
                        </div>
                        <div class="col-md-6">
                            <span>{{$proprietorDetail->email}}</span>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4">
                            <span class="fw-bold">व्यवसायीको ठेगाना:</span>
                        </div>
                        <div class="col-md-6">
                            <span>{{$proprietorDetail->localBody->local_body??''}}
                                - {{$proprietorDetail->businessDetail->ward_no??''}}
                                , {{$proprietorDetail->district->district??''}}
                                , {{$proprietorDetail->province->province??''}}, </span>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4">
                            <span class="fw-bold">व्यवसायको विवरण/प्रकृति:</span>
                        </div>
                        <div class="col-md-6">
                            <span>{{$proprietorDetail->businessDetail->business_nature->label() ??''}}</span>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4">
                            <span class="fw-bold">व्यवसायको नाम:</span>
                        </div>
                        <div class="col-md-6">
                            <span>{{$proprietorDetail->businessDetail->business_detail_name ??''}}</span>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4">
                            <span class="fw-bold">पूँजी लगानी रु.: </span>
                        </div>
                        <div class="col-md-6">
                            <span>{{$proprietorDetail->businessDetail->amount_cost??''}}</span>
                        </div>
                    </div>
                </div>
                <div class="note mt-2">
                    <span class="fw-bold">कृपया यस आवेदनको साथमा तल उल्लेखित कागजातहरू बोक्नुहोस्।</span><br>
                    <span>१. आफनै घर जग्गा भए जग्गा धनी प्रमाण पत्रको प्रतिलिपि-१</span><br>
                    <span>२. भाडामा बस्ने भए भाडा रकम र भुत्तानी तरिका समेत खुलेको वहाल
                        सम्झौतापत्र-१</span><br>
                    <span>३. नागरिकको हकमा नेपालस्थित राजदुतावासबाट व्यवसायीको नाममा जारी
                        कागजात-१</span><br>
                    <span>४. करदाताको हालसालैको पासपोर्ट साईजको फोटो २ प्रति, फर्म कम्पनी भएमा
                        दर्ता</span><br>
                    <span>५. इजाजत प्रमाणपत्र</span><br>
                    <span>६. आन्तरिक राजस्व कार्यालयमा अघिल्लो आ.व.सम्मको कर तिरेको करदाता
                        प्रमाणपत्रको प्रतिलिपि</span>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('assets/backend/print/print.min.js')}}"></script>
</body>
</html>
