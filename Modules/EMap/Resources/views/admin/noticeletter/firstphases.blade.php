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
                                    यस उप-महानगरपालिकाको वडा नं.<span class="underline-dotted custom-width"></span>
                                    टोल<span class="underline-dotted custom-width"></span>मा अवस्थित साविक
                                    <span class="underline-dotted custom-width"></span>
                                    कित्ता नं.<span class="underline-dotted custom-width"></span>
                                    क्षेत्रफल<span class="underline-dotted custom-width"></span>
                                    मा भवन निर्माण गर्ने घरधनी श्री<span class="underline-dotted custom-width"></span>
                                    ले भवन निर्माण गर्ने क्रममा प्लिन्थ लेभलसम्मको निर्माण कार्य सम्पन्न भएको हुँदा
                                    मिति<span class="underline-dotted custom-width"></span> मा स्थलगत निरीक्षण गरी देहाय
                                    बमोजिमको प्रतिवेदन पेश गरेको छु |
                                </p>
                                <p>१. सडक अधिकार क्षेत्र सम्बन्धि मापदण्ड (सडक सेटब्याक) पालना
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">भएको</label>
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">नभएको</label> (छैन भने विवरण खुलाउने)<br>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                </p>
                                <p class="mt-2">२. साइट प्लानमा देखाइए बमोजिम सेटब्याक पालना
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">भएको</label>
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">नभएको</label> (छैन भने विवरण खुलाउने)<br>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                </p>
                                <p class="mt-2">३. ग्राउण्ड कभरेजमा फरक
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">परेको</label>
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">नपरेको</label> (फरक परे विवरण खुलाउने)<br>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                </p>
                                <p class="mt-2">४. भवनको लम्बाई र चौडाई फिल्ड र नक्सामा फेरबदल
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">भएको</label>
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">नभएको</label> (भए सो को विवरण खुलाउने)<br>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                </p>
                                <p class="mt-2">५. नेपाल राष्ट्रिय भवन निर्माण संहिता २०६० अनुसार निर्माण
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">भएको</label>
                                    <input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">नभएको</label> आंशिक पालना भएको (तपसिलको विवरणमा चिन्ह लगाउने, नक्सा अनुसार फरक परेमा विवरण खुलाउने)<br>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                </p>
                                <table class="table table-bordered mt-3">
                                    <thead>
                                    <tr>
                                        <th scope="col">पिलरवाला घर</th>
                                        <th scope="col">भएको</th>
                                        <th scope="col">नभएको</th>
                                        <th scope="col">गारोवाला घर</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>नक्सा अनुसार पिलरको संख्या र नाप</td>
                                        <td><input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1"></td>
                                        <td><input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1"></td>
                                        <td>नक्सा अनुसार गारोको चौडाई</td>
                                    </tr>
                                    <tr>
                                        <td>नक्सा अनुसार पिलरको डण्डीको संख्या र नाप</td>
                                        <td><input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1"></td>
                                        <td><input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1"></td>
                                        <td>सबै कुनामा ठाडो डण्डी</td>
                                    </tr>
                                    <tr>
                                        <td>बिम र पिलरको जोर्नी पर्याप्त मात्रामा बाँधिएको</td>
                                        <td><input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1"></td>
                                        <td><input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1"></td>
                                        <td rowspan="2">भ्याल र भेन्टिलेशनहरु <br>
                                            गारोको २ फिट टाढा
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>जगबिम</td>
                                        <td><input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1"></td>
                                        <td><input class="form-check-input form-check-inline" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1"></td>

                                    </tr>
                                    </tbody>
                                </table>
                                <p class="mt-2">६. अन्य कुनै कुरा भएको खुलाउने :<br>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                    <span class="underline-dotted custom-width"></span>
                                </p>
                                <p class="mt-2">माथि उल्लेखित भवन स्थलगत निरीक्षण गर्दा प्रचलित भवन मापदण्ड एवं राष्ट्रिय भवन संहिता अनुसार ठिक छ |<br>
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
