@extends('emap::organization.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3 class="mb-0">भवन निर्माण सहिता अनुसार नक्शा / डिजाईनको लागि दरखास्त फाराम</h3>
                        <div>
                            <button id="printButton" class="btn btn-sm btn-success" printElementId='printData' requestRoute="{{route('print.application-print')}}">
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
                        <p class="text-center"><b>बिषय: भवन निर्माण संहिता अनुसार नक्शा/डिजाइन पेश गरेको बारे ।</b></p>

                        <p>महोदय,</p>
                        <p class="mb-5">
                            यस {{config('applicationDetail.office_type')}} वडा नं <span
                                class="underline-dotted">{{$mapApply->landDetail->ward_no ?? ''}}</span> टोल <span
                                class="underline-dotted">{{$mapApply->landDetail->tole ?? ''}}</span> मा अवस्थित
                            कित्ता नं <span class="underline-dotted">{{$mapApply->landDetail->plot_no ?? ''}}</span>
                            क्षेत्रफल <span
                                class="underline-dotted">{{$mapApply->landDetail->unit_value ?? ''}} {{$mapApply->landDetail->unit->title ?? ''}}</span>
                            मा भवन निर्माण गर्न प्रस्ताव गरिएको
                            संरचना भुकम्प सुरक्षात्मक मनाउन आवश्यक नक्शा, डिजाईन प्राविधिक चेक लिष्ट र अन्य आवश्यक
                            कागजात सहित यो निवेदन पेश गरेको छु । प्राविधिकले तथा निर्माणबाट भूकम्पीय वा साधारण सुरक्षाको
                            कमीले हुन सक्ने सम्पूर्ण जोखिम प्रति म/हामी जिम्मेवार छु/छौं । संलग्न डिजाईन, सुपरिवेक्षक
                            तथा
                            ठेकेदारबाट डिजाईन, सुपरिवेक्षण तथा निर्माण गराउने छु ।
                            यस {{config('applicationDetail.office_type')}}बाट समय-समयमा
                            दिईने निर्देशन पालना गर्नेछु तथा आवश्यक परेको बेला त्यस कार्यालयमा उपस्थित हुनेछ ।
                        </p>

                        <p>घरधनीको नाम : <span class="underline-dotted">{{$mapApply->houseOwner->name ?? ''}}</span></p>
                        <p>ठेगाना : <span class="underline-dotted">{{$mapApply->houseOwner->address ?? ''}}</span></p>
                        <p>फोन नं. : <span class="underline-dotted">{{$mapApply->houseOwner->phone ?? ''}}</span></p>
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
