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
                                <h3 class="text-center my-3"><b>सरजमिन मुचुल्का</b></h3>
                                <p class="text-center"><b>(स्थानीय सरकार संचालन ऐन २०७४ को दफा ३१ र ३२ बमोजिम सर्जमिन खटी गएको )</b></p>
                                <p class="mb-3">
                                    लिखितम हामी तपसिलका मानिसहरु आगे जग्गा धनी श्री <span class="underline-dotted"></span> को नाममा दर्ता रहेको यस उप-महानगरपालिका वडा नं.<span class="underline-dotted"></span>टोल <span class="underline-dotted"></span> मा अवस्थित साविक वडा नं.<span class="underline-dotted"></span> कित्ता नं.<span class="underline-dotted"></span> क्षेत्रफल<span class="underline-dotted"></span> मा भवन निर्माण गर्ने घरधनी श्री <span class="underline-dotted"></span> ले नक्सा बमोजिमको भवन बनाउन पाउ भनी दरखास्त परेको १५ दिनको सूचना टास भई "स्थानीय सरकार संचालन ऐन २०७४ "
                                    को दफा ३० र ३१ बमोजिम सर्जमिन गर्नु पर्दा यस सर्जमिनमा आई तपाई तपसिलका मानिसहरुसँग सोधनी गरिन्छ कि माथि लेखिए बमोजिमको भवन बनाउदा तपाईहरुलाई सन्धि सर्पन पीर मर्का पर्छ, पर्दैन भए आफ्नो व्यहोरा तपसिलमा खोली लेखी दिनुस् भनी यस उप-महानगरपालिका कार्यालय नक्सा शाखाबाट खटी आउनुभएका कर्मचारीले सोधनी गर्दा हामीहरुको चित बुभयो, उक्त जग्गामा कोहि कसैको सन्धि सर्पन, पिर मर्का नपर्ने देखिएको हुदाँ सो <span class="underline-dotted"></span> को नक्सा पास गरिदिएमा ठिक छ, भनेर लेखी दिएको छौ फरक पर्ने छैन फरक परे ऐन कानुन बमोजिम सहुला
                                    बुझाउँला भनी यस मुचुल्कामा सही छाप गरि नेपालगञ्ज उप-महानगरपालिकामा चढायौ | पुनश्च :
                                </p>
                                <h4 class="text-center">तपसिल</h4>
                                <div class="d-flex justify-content-around border">
                                <p class="text-center ">सही छाप<span class="underline-dotted custom-width"></span></p>
                                <p>जग्गा साँध संधियारको नाम,थर<span class="underline-dotted custom-width"></span></p></div>
                                <p class="text-center my-2">पूर्व वर्ष<span class="underline-dotted custom-width"></span> को श्रीमान/श्रीमती/सुश्री<span class="underline-dotted custom-width"></span></p>
                                <p class="text-center my-2">पश्चिम वर्ष<span class="underline-dotted custom-width"></span> को श्रीमान/श्रीमती/सुश्री<span class="underline-dotted custom-width"></span></p>
                                <p class="text-center my-2">उतर वर्ष<span class="underline-dotted custom-width"></span> को श्रीमान/श्रीमती/सुश्री<span class="underline-dotted custom-width"></span></p>
                                <p class="text-center my-2">दक्षिण वर्ष<span class="underline-dotted custom-width"></span> को श्रीमान/श्रीमती/सुश्री<span class="underline-dotted custom-width"></span></p>
                                <h4 class="text-decoration-underline mt-2">छिमेकि सक्षीवाला</h4>
                                <p class="d-flex justify-content-center my-2">नेपालगञ्ज उ.म.न.पा.<span class="underline-dotted custom-width"></span>बस्ने<span class="underline-dotted custom-width"></span> वर्षको श्रीमान/श्रीमती/सुश्री<span class="underline-dotted custom-width"></span> </p>
                                <p class="d-flex justify-content-center my-2">नेपालगञ्ज उ.म.न.पा.<span class="underline-dotted custom-width"></span>बस्ने<span class="underline-dotted custom-width"></span> वर्षको श्रीमान/श्रीमती/सुश्री<span class="underline-dotted custom-width"></span> </p>
                                <p class="d-flex justify-content-center my-2">नेपालगञ्ज उ.म.न.पा.<span class="underline-dotted custom-width"></span>बस्ने<span class="underline-dotted custom-width"></span> वर्षको श्रीमान/श्रीमती/सुश्री<span class="underline-dotted custom-width"></span> </p>
                                <p class="d-flex justify-content-center my-2">नेपालगञ्ज उ.म.न.पा.<span class="underline-dotted custom-width"></span>बस्ने<span class="underline-dotted custom-width"></span> वर्षको श्रीमान/श्रीमती/सुश्री<span class="underline-dotted custom-width"></span> </p>
                                <p class="d-flex justify-content-center my-2">नेपालगञ्ज उ.म.न.पा.<span class="underline-dotted custom-width"></span>बस्ने<span class="underline-dotted custom-width"></span> वर्षको श्रीमान/श्रीमती/सुश्री<span class="underline-dotted custom-width"></span> </p>
                                <p class="d-flex justify-content-center my-2">नेपालगञ्ज उ.म.न.पा.<span class="underline-dotted custom-width"></span>बस्ने<span class="underline-dotted custom-width"></span> वर्षको श्रीमान/श्रीमती/सुश्री<span class="underline-dotted custom-width"></span> </p>
                                <p class="d-flex justify-content-center my-2">नेपालगञ्ज उ.म.न.पा.<span class="underline-dotted custom-width"></span>बस्ने<span class="underline-dotted custom-width"></span> वर्षको श्रीमान/श्रीमती/सुश्री<span class="underline-dotted custom-width"></span> </p>
                                <h4 class="text-decoration-underline">रोहवरमा</h4>
                                <p>सहिछाप</p>
                                <p>१. नेपालगञ्ज उ.म.न.पा.वडा नं.<span class="underline-dotted custom-width"></span> बस्ने वर्ष <span class="underline-dotted custom-width"></span> को जग्गा धनी श्रीमान/श्रीमती/सुश्री <span class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">२. वडा नं.<span class="underline-dotted custom-width"></span>को वडा अध्यक्ष श्री <span class="underline-dotted custom-width"></span></p>
                                <p class="text-decoration-underline mt-2">काम तामेल गर्ने </p>
                                <p>प्रविधिक श्री <span class="underline-dotted custom-width"></span>पद <span class="underline-dotted custom-width"></span>प्रशासनिक कर्मचारी श्री <span class="underline-dotted custom-width"></span>पद <span class="underline-dotted custom-width"></span>
                                    ईति सम्वत् <span class="underline-dotted custom-width"></span>
                                    साल <span class="underline-dotted custom-width"></span>
                                    महिना <span class="underline-dotted custom-width"></span>
                                    गते <span class="underline-dotted custom-width"></span>रोज शुभम् | </p>
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
            .border{
                width: 100%;
                padding: 0.5rem;
                border: 4px solid black;
            }
        </style>
    @endpush
    @push('scripts')
        <script src="{{asset('assets/backend/js/printAjaxScript.js')}}"></script>
    @endpush

@endsection
