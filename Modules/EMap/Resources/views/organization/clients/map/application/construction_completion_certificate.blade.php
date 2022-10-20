@extends('emap::organization.layouts.master')
@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div>
                @error('file')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3 class="mb-0">{{\Modules\EMap\Enums\NoticeTypeEnum::CONSTRUCTION_COMPLETION_CERTIFICATE_APPLICATION->label()}}</h3>
                        <div class="d-flex justify-content-between">
                            <x-application-component
                                :application-type="Modules\EMap\Enums\NoticeTypeEnum::CONSTRUCTION_COMPLETION_CERTIFICATE_APPLICATION"
                                url="{{route('organization.admin.clients.application.constructionCompletionCertificate',[$client,$mapApply])}}"></x-application-component>

                            <button id="printButton" title="Print Application" class="btn btn-sm btn-success mx-2"
                                    printElementId='printData'
                                    requestRoute="{{route('print.office-letter-print')}}">
                                <i class="fa fa-print"></i>
                            </button>
                            <a href="{{route('organization.admin.clients.client.show', $client)}}"
                               class="btn btn-primary btn-sm" title="{{$client->name ?? ''}}को विवरण हेर्नुहोस">
                                <i class="fa fa-eye"></i>
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
                        <h5 class="text-center">
                            <b>
                                {{\Modules\EMap\Enums\NoticeTypeEnum::CONSTRUCTION_COMPLETION_CERTIFICATE_APPLICATION->label()}}
                            </b>
                        </h5>
                        <div class="top-line d-flex justify-content-between mt-4">
                            <p>
                                {{config('applicationDetail.to_office.to')}}<br>
                                {{config('applicationDetail.to_office.office_name')}} कार्यालय<br>
                                {{config('applicationDetail.to_office.office_address')}}
                            </p>
                            <p class="">मिति: <span class="underline-dotted custom-width"></span></p>
                        </div>
                        <p class="text-center text-decoration-underline my-3">
                            <b>बिषय: निर्माण कार्य सम्पन्न प्रमाण-पत्र पाउँ
                                ।</b>
                        </p>
                        <p>महोदय,</p>
                        <p class="my-3">
                            उपर्युक्त सम्बन्धमा {{config('applicationDetail.to_office.office_name')}}को च.नं.<span
                                class="underline-dotted custom-width"></span> मिति <span
                                class="underline-dotted custom-width"></span> गते घरको सुपरस्ट्रक्चर निर्माण गर्न
                            मैले/हामीले <span class="underline-dotted custom-width"></span><span
                                class="underline-dotted custom-width"></span>
                            को क्षेत्रफल <span
                                class="underline-dotted custom-width">{{$mapApply->landDetail->unit_value??''}}  {{$mapApply->landDetail->unit->title??''}}</span>
                            भित्र {{config('applicationDetail.office_short_name')}}बाट स्वीकृत नक्सा तथा मापदण्ड र नेपाल
                            राष्ट्रिय भवन निर्माण संहिता २०६० अनुसार निर्माण कार्य सम्पन्न गरेको छु/छौ | अत : निर्माण
                            कार्यमा संलग्न प्रबिधिकको प्रतिवेदन संलग्न
                            राखी {{config('applicationDetail.office_short_name')}} बाट जे बुझ्नु पर्ने बुझि निर्माण
                            कार्य सम्पन्नको प्रमाण-पत्र पाउँ भनी यो निवेदन पेश गरेको छु/छौ |
                        </p>
                        <div class="d-flex justify-content-end mt-4 px-5">
                            <p>निवेदकको नाम :-<span
                                    class="underline-dotted custom-width">{{$mapApply->applicantDetail->name??''}}</span><br>
                                ठेगाना :-<span
                                    class="underline-dotted custom-width">{{$mapApply->applicantDetail->address??''}}</span><br>
                                दरखास्त :-<span class="underline-dotted custom-width"></span><br>
                                मोबाइल नं. :-<span
                                    class="underline-dotted custom-width">{{$mapApply->applicantDetail->phone??''}}</span>
                            </p>

                        </div>
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
                border-bottom: dotted 2px !important;
                padding: 0 20px;
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
