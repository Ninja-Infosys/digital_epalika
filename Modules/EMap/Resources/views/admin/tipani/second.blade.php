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
                                <h3 class="text-center my-3"><b>प्रथम चरणको कार्य सम्पन्नको परामर्शदाताको  प्रतिवेदन</b></h3>
                                <p class="mb-3">
                                    यस उप-महानगरपालिकाको स्थान<span class="underline-dotted custom-width"></span>
                                    वडा नं.<span class="underline-dotted custom-width"></span>मा अवस्थित साविक
                                    <span class="underline-dotted custom-width"></span>
                                    कित्ता नं.<span class="underline-dotted custom-width"></span>
                                    क्षेत्रफल<span class="underline-dotted custom-width"></span>
                                    मा भवन निर्माण गर्ने घरधनी श्री<span class="underline-dotted custom-width"></span>
                                    ले भवन निर्माण गर्ने क्रममा दोस्रो चरणको निर्माण कार्य सम्पन्न भएको हुँदा
                                    मिति<span class="underline-dotted custom-width"></span> मा स्थलगत निरीक्षण गरी देहाय
                                    बमोजिमको प्रतिवेदन पेश गरेको छु |
                                </p>
                                <p>१. सडक अधिकार क्षेत्र सम्बन्धि मापदण्ड पालना भएको
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">छ कि </label>
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">छैन</label> (छैन भने विवरण खुलाउने)<br>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                </p>
                                <p class="mt-2">२. साइट प्लानमा देखाइए बमोजिम सेटब्याक पालना भएको
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">छ कि </label>
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">छैन</label> (छैन भने विवरण खुलाउने)<br>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                </p>
                                <p class="mt-2">३. ग्राउण्ड कभरेजमा फरक परेको
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">छ कि</label>
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">छैन</label> (छैन भने विवरण खुलाउने)<br>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                </p>
                                <p class="mt-2">४. छज्जा (क्यान्टीलिभर), बार्दली, बाहिरको सिँढी आदि निकालेको हकमा मापदण्डको पालना भएको
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">छ कि</label>
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">छैन</label> (छैन भने विवरण खुलाउने)<br>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                </p>
                                <p class="mt-2">५. नेपाल राष्ट्रिय भवन निर्माण संहिता २०६० अनुसार निर्माण भएको
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">छ कि</label>
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">छैन</label> (छैन भने विवरण खुलाउने)<br>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                </p>
                                <p class="mt-2">६. अन्य कुनै कुरा भएको खुलाउने :<br>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                </p>
                                <p class="mt-3">माथि उल्लेखित भवन स्थलगत निरीक्षण गर्दा प्रचलित भवन मापदण्ड अनुसार ठिक छ |<br>
                                    फरक ठहरे कानुन बमोजिम सहुँला बुझउँला | <br>
                                    हस्ताक्षर:<span class="underline-dotted custom-width"></span><span class="underline-dotted custom-width"></span>  प्रतिवेदन पेश गर्ने प्रविधिकको नाम, थर :<span class="underline-dotted custom-width"></span><span class="underline-dotted custom-width"></span></p>

                                <p class="mt-2">कन्सल्टेन्सीको नाम:<span class="underline-dotted custom-width"></span><span class="underline-dotted custom-width"></span> कन्सल्टेन्सीको दर्ता नं.<span class="underline-dotted custom-width"></span><span class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">पेश गरेको मिति:<span class="underline-dotted custom-width"></span><span class="underline-dotted custom-width"></span>
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
