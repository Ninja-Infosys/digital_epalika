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
                        <h3 class="mb-0">{{\Modules\EMap\Enums\NoticeTypeEnum::REGARDING_PERMISSION_FOR_CONSTRUCTION_WORK_OF_SUPERSTRUCTURE->label()}}</h3>
                        <div class="d-flex justify-content-between">
                            <x-application-component
                                :application-type="Modules\EMap\Enums\NoticeTypeEnum::REGARDING_PERMISSION_FOR_CONSTRUCTION_WORK_OF_SUPERSTRUCTURE"
                                url="{{route('organization.admin.clients.application.apply-map-application',[$client,$mapApply])}}"></x-application-component>

                            <button id="printButton" title="Print Application" class="btn btn-sm btn-success mx-2"
                                    printElementId='printData'
                                    requestRoute="{{route('print.application-print')}}">
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
                        <h5 class="text-center"><b>सुपरस्ट्रक्चर निर्माणको इजाजतको लागि निबेदन</b></h5>
                        <div class="top-line d-flex justify-content-between mt-4">
                            <p>
                                {{config('applicationDetail.to_office.to')}}<br>
                                {{config('applicationDetail.to_office.office_name')}} कार्यालय<br>
                                {{config('applicationDetail.to_office.office_address')}}
                            </p>
                            <p class="">मिति: <span class="underline-dotted custom-width"></span></p>
                        </div>
                        <p class="text-center my-3"><b>बिषय:- सुपरस्ट्रक्चरको निर्माण कार्यको लागि इजाजत बारे
                                ।</b></p>
                        <p class="mb-3">
                            यस {{config('applicationDetail.office_type')}} मिति<span
                                class="underline-dotted custom-width"></span> को प्लिन्थ
                            लेभलसम्मको निर्माण ईजाजत अनुसार मैले/हामीले साविक वडा नं. <span
                                class="underline-dotted">{{$mapApply->landDetail->former_ward_no??''}}</span>
                            हाल {{config('applicationDetail.office_type')}} वडा नं.<span
                                class="underline-dotted">{{$mapApply->landDetail->ward_no??''}}</span> किता
                            नं. <span
                                class="underline-dotted">{{$mapApply->landDetail->plot_no??''}}</span>
                            क्षेत्रफल<span
                                class="underline-dotted">{{$mapApply->landDetail->unit_value??''}}  {{$mapApply->landDetail->unit->title??''}}</span>
                            भित्र स्वीकृत नक्सा अनुसार नै
                            प्लिन्थ लेभलसम्मको निर्माण कार्य सम्पन्न गरी प्रविधिक सुपरिवेक्षकको प्रतिवेदन सहित
                            सुपरस्ट्रक्चरको निर्माण कार्यको नक्सा पास तथा निर्माण ईजाजत पाउँ भनी यो निवेदन पेश
                            गरेको/गरेका छु/छौ |
                        </p>


                        <h6 class=" text-decoration-underline d-flex justify-content-end px-5 my-3">निवेदक</h6>

                        <div class="d-flex justify-content-end">
                            <p> सही:<span class="underline-dotted custom-width"></span><span
                                    class="underline-dotted custom-width"></span><br>
                                नाम: {{$mapApply->applicantDetail->name??''}}<br>
                                स्थायी ठेगाना: {{$mapApply->applicantDetail->address??''}}<br>
                                मोबिइल नं. : {{$mapApply->applicantDetail->phone??''}}</p>
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
