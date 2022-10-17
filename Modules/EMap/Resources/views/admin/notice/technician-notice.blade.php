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
                                <h3 class="text-center my-3"><b>प्रविधिक प्रतिवेदन</b></h3>
                                <p class="text-center"><b>(स्थानीय सरकार संचालन ऐन २०७४ को दफा ३१ र ३२ बमोजिम सर्जमिन खटी गएको )</b></p>
                                <p class="mb-3">
                                   यस उप-महानगरपालिका वडा नं.<span class="underline-dotted custom-width"></span>टोल <span class="underline-dotted custom-width"></span>मा अवस्थित साविक <span class="underline-dotted custom-width"></span>कित्ता नं.<span class="underline-dotted custom-width"></span>क्षेत्रफल <span class="underline-dotted custom-width"></span>मा भवन निर्माण गर्ने घरधनी श्री <span class="underline-dotted custom-width"></span>ले भवन निर्माणको निमित्त पेश गरेको नक्सा सम्बन्धमा मिति <span class="underline-dotted custom-width"></span>मा स्थलगत निरिक्षण गरी देहाय बमोजिमको प्रतिवेदन पेश गरेको छु |
                                </p>
                                <p>१. भू-उपयोग क्षेत्र<span class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">२. निर्माण हुने स्थलसम्म पग्ने बाटोको व्यवस्था : </p>
                                    <p>२.१ बाटोको किसिम  :
                                        <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">ग्राभेल&emsp;</label>
                                        <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                        <label class="form-check-label" for="inlineRadio3">मोटर जाने&emsp;</label>
                                        <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio4" value="option4">
                                        <label class="form-check-label" for="inlineRadio4">कच्ची&emsp;</label>
                                        <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio5" value="option5">
                                        <label class="form-check-label" for="inlineRadio5">अन्य भए खुलाउने <span class="underline-dotted custom-width"></span></label>
                                    </p>
                                <p class="mt-2">२.२ बाटोको चौडाई<span class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">२.३ मापदण्ड बमोजिमको सडक अधिकार क्षेत्रसँग साइट प्लान मेल खान्छ, खादैन सो को विवरण <span class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">३. निर्माण हुने भवनले सार्बजनिक स्थल वा निर्माणलाई बाधा पुर्याएको
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">छ&emsp;</label>
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">छैन&emsp;</label>सो को विवरण<span class="underline-dotted custom-width"></span>
                                </p>
                                <p class="mt-2">४. खोला/खहरे/नदी/ताल/कुलो आदि नजिक भए सो देखि  </p>
                                <p class="mt-2">४.१ निर्माणको निमित्त प्रस्तावित जग्गासम्मको दुरी:<span class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">४.२ प्रस्तावित भवन निर्माणको बाहिरी भागसम्मको दुरी:<span class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">५. निर्माण हुने जग्गा वा सो को नजिकबाट हाइटेन्सन लाइन गएको
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">छ&emsp;</label>
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">छैन</label>
                                </p>
                                <p class="mt-2">५.१ छ भने</p>
                                <p class="mt-2">५.१.१ निर्माणको निमित्त प्रस्तावित जग्गासम्मको दुरी:<span class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">५.१.२ प्रस्तावित भवन निर्माणको बाहिरी भागसम्मको दुरी:<span class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">६. नापी नक्सा र फिल्डको आकार प्रकार
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">मिल्छ&emsp;</label>
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">मिल्दैन</label>
                                </p>
                                <p class="mt-2">७. लालपुर्जा भन्दा फिल्डमा जग्गा
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">ठिक&emsp;</label>
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">बढी&emsp;</label>
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                    <label class="form-check-label" for="inlineRadio3">घटी देखिन्छ</label>
                                </p>
                                <p class="mt-2">८. प्रविधिकको अन्य कुनै कुरा भए व्यहोरा खुलाउने</p>
                                <p class="mt-2">(क) भिरालो जग्गा भए <span class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">(ख) भौगर्भिक धाँजा भए<span class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">प्रतिवेदन पेश गर्नेको नाम:<span class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">पद:<span class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">सही:<span class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">मिति:<span class="underline-dotted custom-width"></span></p>
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
