@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3></h3>
                        <div class="d-flex justify-content-end">
                            <div class="btn-group mb-3">
                                <button class="btn btn btn-info" onclick="printJS({
                                    printable: 'printData',
                                     type: 'html',
                                     documentTitle: 'dsfwafesegv',
                                     showModal: true,
                                     css: '{{asset('assets/backend/css/print.css')}}',
                                     honorMarginPadding: false,
                                     modalMessage: 'तपाईंको कागजात छाप्नको लागि तयार हुँदैछ।',
                                      style: '.col-md-8 { width: 66.66666667%; }',
                                         })"><i class="fa fa-print"></i>&emsp;Print
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12" id="printData">
                    <div class="card mb_30 ">
                        <div class="card-body">
                            <div class="font-black">
                                <h5 class="text-center"><b> अनुसूची-३</b></h5>
                                <div class="text-center">
                                            <span><b>कार्यविधिको दफा<span
                                                        class="underline-dotted"></span>को उपदफा(<span
                                                        class="underline-dotted"></span>)
                                        संग सम्बन्धित</b><br>
                                    <span class="underline-dotted custom-width"></span>
                                        <span class="underline-dotted custom-width"></span> पालिका<br>
                                        <span class="underline-dotted custom-width"></span>(कार्यलय रहेको स्थान <span
                                                    class="underline-dotted custom-width"></span>
                                    (जिल्ला)<br>
                                        <span class="underline-dotted custom-width"></span>प्रदेश, नेपाल</span>
                                </div>
                                <div class="text-end">
                                    <p>मिति : <span class="underline-dotted custom-width"></span>(आजको)</p>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4 mt-3">
                                        करदर्ता नं.:
                                        <div class="underline-dotted custom-width"></div>
                                        <br>
                                        प्रमाण पत्र नं:
                                        <div class="underline-dotted custom-width"></div>
                                    </div>
                                    <div class="col-md-4 text-end mt-3">दर्ता मिति :२०७&emsp; / &emsp; /&emsp; गते
                                        (दर्ता मिति नेपाली मिति)
                                    </div>
                                    <div class="col-md-4 d-flex justify-content-end">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="card border border-dark"
                                                     style="width: 6rem; height: 6rem;">
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center my-1">फोटो</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-center text-decoration-underline my-1"><b>व्यवसाय दर्ता प्रमाण
                                        पत्र</b></p>
                                <span class="my-2">&emsp;&emsp; जिल्ला<span
                                        class="underline-dotted custom-width"></span><span
                                        class="underline-dotted custom-width"></span>
                                    पालिका वडा नं. <span class="underline-dotted custom-width"></span> बस्ने श्री
                                    <span class="underline-dotted custom-width"></span> लाई निम्न विवरण व्यवसायीको
                                    दर्ता गरी यो प्रमाण पत्र जारी गरिएको छ ।<br>
                                जारी मिति : <span class="underline-dotted custom-width"></span><br>
                                    व्यवसाय संचालन मिति : <span class="underline-dotted custom-width"></span><br>
                                    व्यवसाय रहने स्थान <span class="underline-dotted custom-width"></span> (पालिका<span class="underline-dotted custom-width"></span>
                                    वडा नं<span class="underline-dotted custom-width"></span>)<br>
                                    बाटोकोनाम<span class="underline-dotted custom-width"></span>(मार्ग)<span class="underline-dotted custom-width"></span>
                                    घर नं. <span class="underline-dotted custom-width"></span> टोल <span class="underline-dotted custom-width"></span><br>
                                    व्यवसाय रगाने घर/जग्गाधनीको नाम :<span class="underline-dotted custom-width"></span><br>
                                    व्यवसाय प्रकृति :<span class="underline-dotted custom-width"></span><br>
                                    विवरण परिचय पतिको साइज :<span class="underline-dotted custom-width"></span><br>
                                    पुंजीगत लगानी (रु. मा)<span class="underline-dotted custom-width"></span>
                                </span>
                                <div class="row mt-2">
                                    <div class="col-md-4 mt-3 text-center">
                                        <span class="underline-dotted custom-width"></span><br>
                                        संचालक
                                    </div>
                                    <div class="col-md-4  mt-3 text-center">
                                        <span class="underline-dotted custom-width"></span><br>
                                        तयार गर्ने
                                    </div>
                                    <div class="col-md-4 mt-3 text-center">
                                        <span class="underline-dotted custom-width"></span><br>
                                        संचालक
                                    </div>
                                </div>
                                <span>१) प्रत्येक आर्थिक बर्सको लागि तिकिएको वार्थिक कर उक्त आ.वा. को ३ महिना दिन भित्र बुझाई प्रमाणपत्र नविकरण गर्नुपर्ने छ ।
                                    <span class="underline-dotted custom-width"></span>पालिकाबाट व्यवसाय कर टोलि खटाइएको अवस्थामा व्यवसायीको कार्यस्थलमै
                                    व्यवसाय प्रमाणपत्र नविकरण गर्न सकिने छ ।
                                </span>

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
