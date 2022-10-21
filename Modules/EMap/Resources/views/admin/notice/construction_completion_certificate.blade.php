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
                        <h3> {{\Modules\EMap\Enums\NoticeTypeEnum::REGARDING_CONSTRUCTION_COMPLETION_CERTIFICATE->label()}}</h3>
                        <div class="d-flex justify-content-between">
                            <x-application-component
                                :application-type="\Modules\EMap\Enums\NoticeTypeEnum::REGARDING_CONSTRUCTION_COMPLETION_CERTIFICATE"
                                url="{{route('emap.admin.map.map-apply.notice.upload.order',$mapApply)}}"/>

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
                                <div class="top-line d-flex justify-content-end mt-3">
                                    <p>मिति: <span class="underline-dotted custom-width"></span></p>
                                </div>
                                <h3 class="text-center">
                                    <b>टिप्पणी र आदेश </b>
                                </h3>
                                <p class="text-center my-3"><b>बिषय: निर्माण कार्य सम्पन्न प्रमाण-पत्र सम्बन्धमा ।
                                    </b></p>
                                <p>श्रीमान</p>
                                <p class="my-3">
                                    यस {{config('applicationDetail.office_type')}} वडा नं.<span
                                        class="underline-dotted custom-width">{{$mapApply->landOwner->ward_no??''}}</span> बस्ने श्री/श्रीमती/सुश्री <span
                                        class="underline-dotted custom-width">{{$mapApply->landOwner->name??''}}</span> को
                                    नाममा दर्ता रहेय्को यस {{config('applicationDetail.office_short_name')}} वडा नं.<span
                                        class="underline-dotted custom-width">{{$mapApply->landDetail->ward_no??''}}</span> का साविक <span
                                        class="underline-dotted custom-width">{{$mapApply->landDetail->former_ward_no??''}}</span>
                                    कि.नं.<span class="underline-dotted custom-width">{{$mapApply->landDetail->plot_no??''}}</span> को क्षेत्रफल <span
                                        class="underline-dotted custom-width">{{$mapApply->landDetail->unit_value??''}}  {{$mapApply->landDetail->unit->title??''}}</span>
                                    मा<span class="underline-dotted custom-width">{{$mapApply->construction_type->label()}}</span> को लागि मिति<span
                                        class="underline-dotted custom-width"></span>
                                    मा भवन निर्माण गर्न स्वीकृति पत्र लिई हाल निर्माण कार्य समाप्त गरी निर्माण कार्य
                                    सम्पन्नको प्रमाण-पत्रको लागि निर्माण कार्यको सुपरिवेक्षणमा संलग्न
                                    प्रबिधिक/कन्सलटेन्टले प्रविधिक प्रतिवेदन सहित निवेदन
                                    दिनु भएको हुँदा यस कार्यालयका प्रबिधिकलेस्थलगत निरिक्ष, सुपरिवेक्षण गरी दिएको
                                    प्रतिवेदन अनुसार नक्सा पास हुँदाको मापदण्ड अनुसार भवन निर्माण
                                    भएको देखिएकोले निजलाई निर्माण सम्पन्न प्रमाण-पत्र दिन मनासिब देखि पेश गरेको छु ।
                                </p>
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
