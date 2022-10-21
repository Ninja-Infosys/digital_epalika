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
                        <h3> {{\Modules\EMap\Enums\NoticeTypeEnum::REGARDING_SUPERSTRUCTURE_PERMIT->label()}}</h3>
                        <div class="d-flex justify-content-between">
                            <x-application-component
                                :application-type="\Modules\EMap\Enums\NoticeTypeEnum::REGARDING_SUPERSTRUCTURE_PERMIT"
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

                                <div class="top-line d-flex justify-content-end mt-2">
                                    <p class="">मिति: <span class="underline-dotted custom-width">
                            </span></p>
                                </div>
                                <h3 class="text-center mt-3"><b>टिप्पणी र आदेश</b></h3>
                                <p class="text-center my-3"><b>बिषय: सुपरस्ट्रक्चर इजाजत सम्बन्धमा
                                        ।</b></p>
                                <p>श्रीमान,</p>
                                <p class="mb-3">
                                    जग्गा धनी श्री<span
                                        class="underline-dotted custom-width">{{$mapApply->landOwner->name??''}}</span>
                                    को नाममा दर्ता रहेको यस {{config('applicationDetail.office_type')}} वडा नं. <span
                                        class="underline-dotted custom-width">{{$mapApply->landDetail->ward_no??''}}</span>
                                    टोल<span
                                        class="underline-dotted custom-width">{{$mapApply->landDetail->tole??''}}</span>
                                    मा अवस्थित साविक <span class="underline-dotted custom-width">{{$mapApply->landDetail->former_ward_no ??''}}</span>कित्ता नं. <span
                                        class="underline-dotted custom-width">{{$mapApply->landDetail->plot_no??''}}</span> क्षेत्रफल <span
                                        class="underline-dotted custom-width">{{$mapApply->landDetail->unit_value??''}}  {{$mapApply->landDetail->unit->title??''}}</span>
                                    मा भवन निर्माण गर्ने घरधनी श्री <span class="underline-dotted custom-width">{{$mapApply->houseOwner->name??''}}</span>
                                    दर्ता नं.
                                    <span class="underline-dotted custom-width">{{$mapApply->registration_no}}</span> ले भवन निर्माण गर्न मिति<span
                                        class="underline-dotted custom-width"></span> मा प्लिन्थ ईजाजत लिनु भएको हुँदा
                                    सोहि सिलसिलामा यस {{config('applicationDetail.office_type')}} कार्यालयका प्रबिधिक श्री<span
                                        class="underline-dotted custom-width"></span> ले स्थलगत निरिक्षण गरी पेश गर्नु
                                    भएको प्रतिवेदन अनुसार स्वीकृत भवन योजना मापदण्ड र नेपाल राष्ट्रिय
                                    भवन संहिता २०६० को पालना भएको प्रतिवेदन प्राप्त हुन आएकोले सुपरस्ट्रक्चर ईजाजत दिनको
                                    लागि मनासिब देखि पेश गरेको छु |
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
