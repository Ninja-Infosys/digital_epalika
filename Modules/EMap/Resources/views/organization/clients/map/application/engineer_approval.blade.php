@extends('emap::organization.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3 class="mb-0">भवन डिजाईन गर्ने प्राविधिकद्वारा मन्जुरी पत्र</h3>
                        <div>
                            <button id="printButton" class="btn btn-sm btn-success" printElementId='printData'
                                    requestRoute="{{route('print.application-print')}}">
                                <i class="fa fa-print"></i> Print
                            </button>
                            <a href="{{route('organization.admin.clients.client.show', $client)}}"
                               class="btn btn-primary btn-sm">
                                <i class="fa fa-eye"></i> {{$client->name ?? ''}}को विवरण हेर्नुहोस
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-body p-3">
                    <div class="font-black" id="printData">
                        <p>
                            {{config('applicationDetail.to_office.to')}}<br>
                            {{config('applicationDetail.to_office.office_name')}}<br>
                            {{config('applicationDetail.to_office.office')}}<br>
                            {{config('applicationDetail.to_office.office_address')}}
                        </p>
                        <p class="text-center my-3"><b>बिषय: भवन संहिता अनुसार भवन डिजाईन गरिएको सम्बन्धमा मन्जुरी पत्र
                                ।</b></p>
                        <p class="mb-3">
                            यस {{config('applicationDetail.office_type')}} वडा नं <span
                                class="underline-dotted">{{$mapApply->landDetail->ward_no ?? ''}}</span> टोल <span
                                class="underline-dotted">{{$mapApply->landDetail->tole ?? ''}}</span> मा
                            अवस्थित
                            कित्ता नं <span class="underline-dotted">{{$mapApply->landDetail->plot_no ?? ''}}</span>
                            क्षेत्रफल <span
                                class="underline-dotted">{{$mapApply->landDetail->unit_value ?? ''}} {{$mapApply->landDetail->unit->title ?? ''}}</span>
                            मा भवन निर्माण गर्ने घर धनी श्री <span
                                class="underline-dotted">{{$mapApply->houseOwner->name ?? ''}}</span>
                            द्वारा निर्माण गर्न प्रस्ताव गरिएको भवनको स्ट्रक्चरल डिजाईन र नक्सा मैले/हामीले गरेको हो/हो
                            ।
                            मैले/हामीले स्ट्रक्चरल प्राविधिकले पालना गर्नुपर्ने कुराहरुलाई पालना गरी डिजाईन गरेको छु/छौ।
                            यसमा नेपाल राष्ट्रिय भवन निर्माण संहिता तथा अन्य ऐन नियमद्वारा प्रतिपादित समस्त नियमहरु
                            पालना गर्दै आवश्यक भूकम्प
                            सुरक्षात्मक डिजाईन तथा प्रविधि अपनाएको छु/छौ। यस दरखास्त फाराममा उल्लेखित स्ट्रक्चरल
                            विवरणहरु नक्सा र डिजाईन बमोजिम उल्लेख छन् ।
                            नेपाल राष्ट्रिय भवन निर्माण संहिता तथा अन्य ऐन नियम विपरित डिजाईन गरिएको वा उल्लेख गरिएको
                            ठहरे नियमानुसार बुझाउँला ।
                        </p>

                        <p>डिजाईन गर्ने डिजाईनरको नाम : <span class="underline-dotted">{{$designer->name ?? ''}}</span>
                        </p>
                        <p>योग्यता एवं पद : <span
                                class="underline-dotted">{{\Modules\EMap\Enums\PostsEnum::tryFrom($designer->post)->label() ?? ''}}</span>
                        </p>
                        <p>कन्सल्टेन्सी फर्म भए सो को नाम र छाप : <span
                                class="underline-dotted">{{$designer->consulting_firm_name ?? ''}}</span></p>
                        <p>उ.म.न.पा. मा दर्ता भएको व्यवसाय प्रमाण पत्रको नं : <span
                                class="underline-dotted">{{$designer->local_body_registration_no ?? ''}}</span></p>
                        <p>नेपाल इञ्जिनियरिङ परिसद दर्ता नं : <span
                                class="underline-dotted">{{$designer->nec_council_no ?? ''}}</span></p>
                        <p>ठेगाना : <span class="underline-dotted">{{$designer->address ?? ''}}</span></p>
                        <p>सम्पर्क नं. : <span class="underline-dotted">{{$designer->phone ?? ''}}</span></p>
                        <p>सहि : <span class="underline-dotted custom-width"></span></p>
                        <p>मिति : <span class="underline-dotted custom-width"></span></p>
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

            .underline-dotted {
                border-bottom: dotted 3px !important;
                padding: 0 15px;
            }

            .custom-width {
                padding: 0 50px !important;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="{{asset('assets/backend/js/printAjaxScript.js')}}"></script>
    @endpush
@endsection
