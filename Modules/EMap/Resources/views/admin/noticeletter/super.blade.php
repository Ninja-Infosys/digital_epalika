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
                                <div class="top-line d-flex justify-content-between mt-4">
                                    <p>श्रीमान प्रमुख प्रशासकिय अधिकृत ज्यु<br>
                                        नेपालगन्ज उप-महानगरपालिका कार्यालय<br>
                                        नेपालगन्ज, बाँके
                                    </p>
                                    <p class="">मिति: <span class="underline-dotted custom-width"></span></p>
                                </div>
                                <p class="text-center my-3"><b>बिषय: सुपरस्ट्रक्चरको निर्माण कार्यको लागि इजाजत बारे
                                        ।</b></p>
                                <p class="mb-3">
                                    यस उप-महानगरपालिका मिति<span class="underline-dotted custom-width"></span> को प्लिन्थ लेभलसम्मको निर्माण ईजाजत अनुसार मैले/हामीले साविक वडा नं. <span class="underline-dotted custom-width"></span> हाल उप-महानगरपालिका वडा नं.<span class="underline-dotted custom-width"></span> किता नं. <span class="underline-dotted custom-width"></span>
                                   क्षेत्रफल<span class="underline-dotted custom-width"></span> भित्र स्वीकृत नक्सा अनुसार नै प्लिन्थ लेभलसम्मको निर्माण कार्य सम्पन्न गरी प्रविधिक सुपरिवेक्षकको प्रतिवेदन सहित सुपरस्ट्रक्चरको निर्माण कार्यको नक्सा पास तथा निर्माण ईजाजत पाउँ भनी यो निवेदन पेश गरेको/गरेका छु/छौ |
                                </p>


                                    <h4 class=" text-decoration-underline d-flex justify-content-end px-5 my-3"><b>निवेदन</b></h4>

                                <div class="d-flex justify-content-end">
                                  <p> सही:<span class="underline-dotted custom-width"></span><span class="underline-dotted custom-width"></span><br>
                                    नाम:<br>
                                    स्थायी ठेगाना:<br>
                                    मोबिइल नं. :</p>
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
