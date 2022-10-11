@extends('emap::organization.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3 class="mb-0">नक्सा बनाउने प्राविधिकद्वारा मन्जुरी पत्र</h3>
                        <a href="{{route('organization.admin.clients.client.show', $client)}}"
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
                        <p>{{config('applicationDetail.to_office.address')}}</p>
                        <p>{{config('applicationDetail.to_office.office')}}</p>
                        <p>{{config('applicationDetail.to_office.office_address')}}</p>
                        <p class="text-center"><b>बिषय: मापदण्ड अनुसार भवन डिजाईन गरिएको सम्बन्धमा मन्जुरी पत्र ।</b></p>

                        <p>महोदय,</p>
                        <p>
                            यस {{config('applicationDetail.office_type')}} वडा नं .......... टोल ............ मा अवस्थित
                            कित्ता नं .......... क्षेत्रफल ...........मा भवन निर्माण गर्ने घर धनी श्री............
                            द्वारा निर्माण गर्न प्रस्ताव गरिएको भवनको आर्किटेक्ट डिजाईन र नक्सा
                            मैले/हामीले गरेको हो/ हौं । मैले / हामीले नक्सा बनाउन प्राविधिकले पालना गर्नुपर्ने कुराहरु र {{config('applicationDetail.office_type')}}को
                            मापदण्ड बमोजिम नक्सा बनाएको छु/छौं । यस दरखास्त फाराममा उल्लेखित प्राविधिक
                            विवरणहरु डिजाईन र नक्सा बमोजिम उल्लेख छन् । मापदण्ड विपरित डिजाईन गरिएको वा उल्लेख गरिएको
                            ठहरे नियमानुसार सहुँला बुझाउँला ।
                        </p>

                        <p>डिजाइन गर्ने डिजाईनरको नाम  :</p>
                        <p>योग्यता एवं पद  :</p>
                        <p>कन्सल्टीङ्ग फर्म भए सो को नाम र छाप   :</p>
                        <p>उ.म.न.पा. मा दर्ता भएको व्यवसाय प्रमाण पत्रको नं. :</p>
                        <p>नेपाल ईन्जिनियरीङ्ग परिषद दर्ता नं.:</p>
                        <p>ठेगाना :</p>
                        <p>सम्पर्क नं. :</p>
                        <p>सही  :</p>
                        <p>मिति :</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{route('organization.admin.clients.application.technician-approval-print',[$client,$mapApply])}}" target="_blank">Print</a>
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

