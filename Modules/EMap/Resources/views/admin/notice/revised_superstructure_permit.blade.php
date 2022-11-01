@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
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
                        <h3> {{\Modules\EMap\Enums\NoticeTypeEnum::REVISED_SUPERSTRUCTURE_PERMIT->label()}}</h3>
                        <div class="d-flex justify-content-between">
                            <x-application-component
                                :application-type="\Modules\EMap\Enums\NoticeTypeEnum::REVISED_SUPERSTRUCTURE_PERMIT"
                                url="{{route('emap.admin.map.map-apply.notice.upload.notice',$mapApply)}}"/>

                            <button id="printButton" class="btn btn-sm btn-success" printElementId='printData'
                                    requestRoute="{{route('print.office-letter-print')}}">
                                <i class="fa fa-print"></i> Print
                            </button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card mb_30">
                        <div class="card-body p-3">
                            <div class="font-black" id="printData">
                                <div class="top-line d-flex justify-content-between mt-3">
                                    <p>पत्र सं.<span class="underline-dotted custom-width">
                            </span></p>
                                    <p>मिति: <span class="underline-dotted custom-width">
                            </span></p>
                                </div>
                                <p>चलानी नं:<span class="underline-dotted custom-width"></span></p>
                                <p class="text-center my-3">
                                    <b>बिषय: {{\Modules\EMap\Enums\NoticeTypeEnum::REVISED_SUPERSTRUCTURE_PERMIT->label()}}
                                        ।</b></p>
                                <p>श्री<span class="underline-dotted custom-width"></span><span
                                        class="underline-dotted custom-width"></span><br>
                                    <span class="underline-dotted custom-width"></span><span
                                        class="underline-dotted custom-width"></span></p>
                                <p class="my-3">
                                    उपर्युक्त सम्बन्धमा तपाईले यस कार्यालयबाट मिति<span
                                        class="underline-dotted custom-width"></span> मा वडा नं.<span
                                        class="underline-dotted">{{$mapApply->landDetail->ward_no??''}}</span>साविक
                                    <span
                                        class="underline-dotted">{{$mapApply->landDetail->former_ward_no}}</span>
                                    कि.नं.<span
                                        class="underline-dotted">{{$mapApply->landDetail->plot_no??''}}</span>
                                    क्षेत्रफल<span
                                        class="underline-dotted">{{$mapApply->landDetail->unit_value??''}}  {{$mapApply->landDetail->unit->title??''}}</span>जग्गामा
                                    घर निर्माणको लागि प्लिन्थ/सुपरस्ट्रक्चरल स्वीकृति लिनु भएकोमा सो घर निर्माण गर्दा
                                    संशोधन गरी घरमा थपकोठा/तल थप/प्लिन्थ
                                    घटी/बढी/डिजाईन परिवर्तन/निर्माण परिवर्तन गरेकोमा संशोधित नक्सा पेश गरेकोमा उक्त
                                    नक्सा तत्कालिन नक्सा पासको मापदण्ड/आधारभूत निर्माण मापदण्ड, २०७२ अनुसार को निर्माण
                                    अनुसार
                                    हालको नक्सा प्रमाणित गरी नक्सा संशोधन प्रमाणपत्र दिईएको छ ।
                                </p>
                                <p>पुनश्रच : मापदण्डको हकमा मिति <span class="underline-dotted custom-width"></span> मा
                                    दिईएको इजाजत पत्रमा उल्लेख भए अनुसार लागू हुनेछ । </p>

                                <div class="d-flex justify-content-around mt-4">
                                    <p class="text-center"><span class="underline-dotted custom-width"></span><br>
                                        निरीक्षण गरी पेश गर्ने</p>
                                    <p class="text-center"><span class="underline-dotted custom-width"></span><br>सिफारिस
                                        गर्ने </p>
                                    <p class="text-center"><span class="underline-dotted custom-width"></span><br>
                                        स्वीकृत गर्ने</p>
                                </div>
                            </div>
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
