@extends('emap::organization.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3 class="mb-0">भवन डिजाईन गर्ने प्राविधिकद्वारा मन्जुरी पत्र</h3>
                        <a href="{{route('organization.admin.clients.client.show',$client)}}"
                           class="btn btn-primary btn-sm">
                            <i class="fa fa-eye"></i> {{$client->name ?? ''}}को विवरण हेर्नुहोस
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-body p-3">
                    <div class="font-black">
                        <p>{{config('applicationDetail.to_office.to')}}</p>
                        <p>{{config('applicationDetail.to_office.office_name')}}</p>
                        <p>{{config('applicationDetail.to_office.office')}}</p>
                        <p>{{config('applicationDetail.to_office.office_address')}}</p>
                        <p class="text-center"><b>बिषय: भवन संहिता अनुसार भवन डिजाईन गरिएको सम्बन्धमा मन्जुरी पत्र ।</b></p>
                        <p>
                            यस {{config('applicationDetail.ofice_type')}} वडा नं ...... टोल ....... मा अवस्थित
                            कित्ता नं ........ क्षेत्रफल ........ मा भवन निर्माण गर्ने घर धनी श्री ........
                            द्वारा निर्माण गर्न प्रस्ताव गरिएको भवनको स्ट्रक्चरल डिजाईन र नक्सा मैले/हामीले गरेको हो/हो ।
                            मैले/हामीले स्ट्रक्चरल प्राविधिकले पालना गर्नुपर्ने कुराहरुलाई पालना गरी डिजाईन गरेको छु/छौ।
                            यसमा नेपाल राष्ट्रिय भवन निर्माण संहिता तथा अन्य ऐन नियमद्वारा प्रतिपादित समस्त नियमहरु पालना गर्दै आवश्यक भूकम्प
                            सुरक्षात्मक डिजाईन तथा प्रविधि अपनाएको छु/छौ। यस दरखास्त फाराममा उल्लेखित स्ट्रक्चरल विवरणहरु नक्सा र डिजाईन बमोजिम उल्लेख छन् ।
                            नेपाल राष्ट्रिय भवन निर्माण संहिता तथा अन्य ऐन नियम विपरित डिजाईन गरिएको वा उल्लेख गरिएको ठहरे नियमानुसार बुझाउँला ।
                        </p>

                        <p>डिजाईन गर्ने डिजाईनरको नाम : .......................................................</p>
                        <p>योग्यता एवं पद : ..................................................................</p>
                        <p>कन्सल्टेन्सी फर्म भए सो को नाम र छाप : ...............................................</p>
                        <p>उ.म.न.पा. मा दर्ता भएको व्यवसाय प्रमाण पत्रको नं : ......................................</p>
                        <p>नेपाल इञ्जिनियरिङ परिसद दर्ता नं : .....................................................</p>
                        <p>ठेगाना : ........................................................................</p>
                        <p>फोन नं. : ......................................................................</p>
                        <p>सहि : ..........................................................................</p>
                        <p>मिति : ..........................................................................</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('style')
        <style>
            .font-black p {
                color: black;
            }

            .building-construction-application input[type="text"],
            .building-construction-application input[type="file"],
            .building-construction-application select,
            .building-construction-application input[type="date"] {
                border-bottom: dotted 3px black;
                border-top: none;
                border-right: none;
                border-left: none;
                margin: 0 5px;
                /*width: 60%;*/
            }

            td > input[type="text"],
            td > input[type="file"],
            td > select,
            td > input[type="date"] {
                width: 100%;
            }


        </style>
    @endpush
@endsection
