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
                                <h3 class="text-center my-4"><b>निर्माण कार्य सम्पन्न प्रमाण-पत्रको लागि निवेदन</b></h3>
                                <div class="top-line d-flex justify-content-between">
                                   <p>श्रीमान प्रमुख प्रशासकीय अधिकृत ज्यू<br>
                                   नेपालगन्ज उप-महानगरपालिका <br>
                                   नगर कार्यपालिकाको कार्यालय<br>
                                   नेपालगन्ज, बाँके</p>
                                    <p class="">मिति: <span class="underline-dotted custom-width"></span></p>
                                </div>
                                <p class="text-center text-decoration-underline my-3"><b>बिषय: निर्माण कार्य सम्पन्न प्रमाण-पत्र पाउँ
                                        ।</b></p>
                                <p>महोदय,</p>
                                <p class="my-3">
                                    उपर्युक्त सम्बन्धमा नेपालगन्ज उप-महानगरपालिकाको च.नं.<span class="underline-dotted custom-width"></span> मिति <span class="underline-dotted custom-width"></span> गते घरको सुपरस्ट्रक्चर निर्माण गर्न मैले/हामीले <span class="underline-dotted custom-width"></span><span class="underline-dotted custom-width"></span>
                                    को क्षेत्रफल <span class="underline-dotted custom-width"></span> भित्र उ.न.पा.बाट स्वीकृत नक्सा तथा मापदण्ड र नेपाल राष्ट्रिय भवन निर्माण संहिता २०६० अनुसार निर्माण कार्य सम्पन्न गरेको छु/छौ | अत : निर्माण कार्यमा संलग्न प्रबिधिकको प्रतिवेदन संलग्न राखी उ.न.पा. बाट जे बुझ्नु पर्ने बुझि निर्माण कार्य सम्पन्नको प्रमाण-पत्र पाउँ भनी यो निवेदन पेश गरेको छु/छौ |
                                </p>
                                <div class="d-flex justify-content-end mt-4 px-5">
                                    <p>निवेदकको नाम :-<span class="underline-dotted custom-width"></span><br>
                                    ठेगाना :-<span class="underline-dotted custom-width"></span><br>
                                    दरखास्त :-<span class="underline-dotted custom-width"></span><br>
                                    मोबाइल नं. :-<span class="underline-dotted custom-width"></span></p>

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
