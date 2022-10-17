@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <button id="printButton" class="btn btn-sm btn-success" printElementId='printData'
                                requestRoute="{{route('print.office-letter-print')}}">
                            <i class="fa fa-print"></i> Print
                        </button>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card mb_30">
                        <div class="card-body p-3">
                            <div class="font-black" id="printData">
                                <div class="top-line d-flex justify-content-end">
                                    <p class="mt-2">मिति: <span class="underline-dotted custom-width"></span></p>
                                </div>
                                <h3 class="text-center"><b>भवन निर्माण कार्य सम्पन्न प्रमाण-पत्र</b></h3>
                                <p class="text-center mt-2"><b>विषय :- घरनक्सा नामसारी सम्बन्धमा |</b></p>
                                <p>श्रीमान,</p>
                                <p class="my-3">
                                    यस उप-महानगरपालिका वडा नं.<span class="underline-dotted custom-width"></span>साविक<span class="underline-dotted custom-width"></span>
                                    कि.नं.<span class="underline-dotted custom-width"></span> ज.वि<span class="underline-dotted custom-width"></span>
                                    मा श्री<span class="underline-dotted custom-width"></span> ले मिति<span class="underline-dotted custom-width"></span>
                                    मा घर निर्माणको लागि लम्बाई <span class="underline-dotted custom-width"></span> चौडाई<span class="underline-dotted custom-width"></span>
                                    उचाई<span class="underline-dotted custom-width"></span> प्लिन्थ क्षेत्रफल<span class="underline-dotted custom-width"></span>
                                    रहेको घर नक्सा पास गरी लैजानु भएकोमा मिति<span class="underline-dotted custom-width"></span> मा जिल्ला बाँकेको मालपोत कार्यालयको निर्णय
                                    अनुसार रजिस्ट्रेसन/अंशवण्डा/नामसारी/कित्ता काट बाट श्री <span class="underline-dotted custom-width"></span> ले लिनु भएको प्रमाण सहित घर
                                    नक्सा नामसारीको लागि दरखास्त पर्न आएकोले यस कार्यालयबाट मिति<span class="underline-dotted custom-width"></span> मा
                                    श्री<span class="underline-dotted custom-width"></span> को नाममा पास भै गएको घरनक्सा श्री<span class="underline-dotted custom-width"></span>
                                    को नाममा आएको कागज प्रमाण बमोजिम हाल कायम रहन आएको कि.नं.<span class="underline-dotted custom-width"></span>
                                    जग्गा क्षेत्रफल<span class="underline-dotted custom-width"></span> रहने गरी नक्सा नामसारीको लागि मनासिब देखि पेश गरेको छु |
                                </p>
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
