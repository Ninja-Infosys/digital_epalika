
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
                        <h3> {{\Modules\EMap\Enums\NoticeTypeEnum::THE_TECHNICIAN_WHO_COMPLETED_THE_FIRST_PHASE_OF_WORK_REPORT->label()}}</h3>
                        <div class="d-flex justify-content-between">
                            <x-application-component
                                :application-type="\Modules\EMap\Enums\NoticeTypeEnum::THE_TECHNICIAN_WHO_COMPLETED_THE_FIRST_PHASE_OF_WORK_REPORT"
                                url="{{route('emap.admin.map.map-apply.notice.upload.report',$mapApply)}}"/>

                            <button id="printButton" class="btn btn-sm btn-success" printElementId='printData'
                                    requestRoute="{{route('print.application-print')}}">
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
                                <h3 class="text-center my-3"><b>प्रथम चरणको कार्य सम्पन्नको नेपालगञ्ज उ.न.पा. प्रविधिकको
                                        प्रतिवेदन</b></h3>
                                @includeIf('emap::admin.map.report.first_phase')
                                <p class="mt-2">माथि उल्लेखित भवन स्थलगत निरीक्षण गर्दा प्रचलित भवन मापदण्ड एवं
                                    राष्ट्रिय भवन संहिता अनुसार ठिक छ |<br>
                                    फरक ठहरे कानुन बमोजिम सहुँला बुझउँला | <br>
                                    हस्ताक्षर:<span class="underline-dotted custom-width"></span><span
                                        class="underline-dotted custom-width"></span></p>

                                <p class="mt-2">प्रतिवेदन पेश गर्ने प्रविधिकको नाम, थर :<span
                                        class="underline-dotted custom-width"></span><span
                                        class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">पद:<span class="underline-dotted custom-width"></span><span
                                        class="underline-dotted custom-width"></span> पेश गरेको मिति:<span
                                        class="underline-dotted custom-width"></span><span
                                        class="underline-dotted custom-width"></span>
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
