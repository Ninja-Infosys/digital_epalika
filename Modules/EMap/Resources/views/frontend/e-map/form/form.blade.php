@extends('frontend.layouts.master')
@section('content')
    <section class="inner-section mt-lg-5 ">
        <div class="container">
            <div class="row d-flex mt-5 ">
                <div class="breadcrumb d-flex">
                    <div class="breadcrumb-item">
                        <a class="whitespace-nowrap text-primary-500" href="{{url('e-map')}}">ई-नक्सा</a>
                        <i class="fa fa-angle-double-right"></i>
                        <a class=" text-primary-500 text-center">नक्सा दरखास्त फारम</a>
                    </div>
                </div>
                <h4 class="fw-semibold heading-line">नक्सा दरखास्त फारम</h4>
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <h3></h3>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <div class="btn-group mb-3">
                                <button class="bg-success text-white" onclick=" printJS({
                printable: 'printData',
                type: 'html',
                documentTitle: 'ufjgjufgjh',
                showModal: true,
                css: '{{asset('assets/backend/css/print.css')}}',
                honorMarginPadding: false,
                modalMessage: 'तपाईंको कागजात छाप्नको लागि तयार हुँदैछ।'})"><i class="fa fa-print"></i> Print
                                </button>
                            </div>
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card mb_30">
                            <div class="card-body p-3">
                                <div class="font-black" id="printData">
                                    <span>श्रीमान प्रमुख प्रशासकीय ज्यु<br>
                                    नेपालगंज उप-महानगरपालिका<br>
                                    नगर कार्यपालिकाको कार्यालय<br>
                                    नेपालगन्ज, बाँके</span>
                                    <h4 class="text-center fw-bold mt-2">बिषय:-भवन निर्माणको लागि नक्सापास सम्बन्धमा
                                        ।</h4>
                                    <span class="mt-2">
                           &emsp;&emsp;&emsp;मैले/हामीले देहायमा लेखिए बमोजिम भवन निर्माण कार्य गर्ने भएकोले उक्त निर्माण कार्यको विवरण तपसिलमा खुलाई आफनो हक भोगेको निस्सको
                                        नक्कल, कित्ता नापी नक्साको नक्कल र घरको नक्सा लगायत आवश्यक कागजात सहित निवेदन पेश गरेको छु/छौ । उक्त नक्सापास गरी निर्माण कार्य गर्न
                                        स्वीकृति पाउन अनुरोध छ । निर्माण कार्यको इजाजत दरखास्त फारममा लेखिएको व्यहोरा ठिक साँचो छ, झुठा ठहरे कानून बमोजिम सहूँला बुझउँला ।
                                         </span>
                                    <h5 class="fw-bold mt-2">१. प्रस्तावित भवनको विवरण</h5>
                                    <span>१.१  निर्माण कार्यको किसिम <br>
                                      <input class="form-check-input form-check-inline" type="checkbox"
                                             name="inlineRadioOptions" id="inlineRadio1"
                                             value="option1">
                                      <label class="form-check-label" for="inlineRadio1">नयाँ घर निर्माण</label>&emsp;
                                    <input class="form-check-input form-check-inline" type="checkbox"
                                           name="inlineRadioOptions" id="inlineRadio2"
                                           value="option2">
                                      <label class="form-check-label" for="inlineRadio2">तल्ला थप्ने</label>&emsp;
                                    <input class="form-check-input form-check-inline" type="checkbox"
                                           name="inlineRadioOptions" id="inlineRadio3"
                                           value="option3">
                                    <label class="form-check-label" for="inlineRadio3">साविक घर भत्काई पुन: निर्माण गर्ने</label>&emsp;
                                    <input class="form-check-input form-check-inline" type="checkbox"
                                           name="inlineRadioOptions" id="inlineRadio4"
                                           value="option4">
                                    <label class="form-check-label" for="inlineRadio4">थप घर निर्माण</label>&emsp;<br>
                                       <input class="form-check-input form-check-inline" type="checkbox"
                                              name="inlineRadioOptions" id="inlineRadio5"
                                              value="option5">
                                    <label class="form-check-label"
                                           for="inlineRadio5">जग्गामा पक्की पर्खाल लगाउने </label>&emsp;
                                       <input class="form-check-input form-check-inline" type="checkbox"
                                              name="inlineRadioOptions" id="inlineRadio6"
                                              value="option6">
                                    <label class="form-check-label" for="inlineRadio6">घरको मोहोडा फेर्ने</label>&emsp;
                                       <input class="form-check-input form-check-inline" type="checkbox"
                                              name="inlineRadioOptions" id="inlineRadio7"
                                              value="option7">
                                    <label class="form-check-label" for="inlineRadio7">घरको छानो फेर्ने</label>&emsp;
                                  </span><br>
                                    <span>१.२ प्रयोजन<br>
                                    <input class="form-check-input form-check-inline" type="checkbox"
                                           name="inlineRadioOptions" id="inlineRadio1"
                                           value="option1">
                                    <label class="form-check-label" for="inlineRadio1">आवासीय</label>&emsp;
                                    <input class="form-check-input form-check-inline" type="checkbox"
                                           name="inlineRadioOptions" id="inlineRadio2"
                                           value="option2">
                                    <label class="form-check-label" for="inlineRadio2">व्यवसायिक</label>&emsp;
                                    <input class="form-check-input form-check-inline" type="checkbox"
                                           name="inlineRadioOptions" id="inlineRadio3"
                                           value="option3">
                                    <label class="form-check-label" for="inlineRadio3">स्वास्थ्य</label>&emsp;
                                    <input class="form-check-input form-check-inline" type="checkbox"
                                           name="inlineRadioOptions" id="inlineRadio4"
                                           value="option4">
                                    <label class="form-check-label" for="inlineRadio4">शिक्षा</label>&emsp;
                                    <input class="form-check-input form-check-inline" type="checkbox"
                                           name="inlineRadioOptions" id="inlineRadio5"
                                           value="option5">
                                    <label class="form-check-label"
                                           for="inlineRadio5">
                                    सरकारी र अर्ध सरकारी</label>&emsp;
                                    <input class="form-check-input form-check-inline" type="checkbox"
                                           name="inlineRadioOptions" id="inlineRadio6"
                                           value="option6">
                                    <label class="form-check-label" for="inlineRadio6">मानिसहरु भेला हुने भवन</label>&emsp;<br>
                                    <input class="form-check-input form-check-inline" type="checkbox"
                                           name="inlineRadioOptions" id="inlineRadio7"
                                           value="option7">
                                    <label class="form-check-label" for="inlineRadio7">उधोग</label>&emsp;
                                    <input class="form-check-input form-check-inline" type="checkbox"
                                           name="inlineRadioOptions" id="inlineRadio7"
                                           value="option7">
                                    <label class="form-check-label" for="inlineRadio7">उधोग</label>&emsp;
                                    <input class="form-check-input form-check-inline" type="checkbox"
                                           name="inlineRadioOptions" id="inlineRadio8"
                                           value="option8">
                                    <label class="form-check-label" for="inlineRadio8">व्यवसायिक भवन</label>&emsp;
                                    <input class="form-check-input form-check-inline" type="checkbox"
                                           name="inlineRadioOptions" id="inlineRadio9"
                                           value="option9">
                                    <label class="form-check-label" for="inlineRadio9">होटेल</label>&emsp;
                                    <input class="form-check-input form-check-inline" type="checkbox"
                                           name="inlineRadioOptions" id="inlineRadio10"
                                           value="option10">
                                    <label class="form-check-label" for="inlineRadio10">सेवा वितरण र वितरण सुविधा (स्वास्थ्य, खाच, उपयोगिता)</label>&emsp;<br>
                                    <input class="form-check-input form-check-inline" type="checkbox"
                                           name="inlineRadioOptions" id="inlineRadio11"
                                           value="option11">
                                    <label class="form-check-label" for="inlineRadio11">खतरनाक सामग्री रोकथाम बिल्डिङ</label>&emsp;
                                    <input class="form-check-input form-check-inline" type="checkbox"
                                           name="inlineRadioOptions" id="inlineRadio12"
                                           value="option12">
                                    <label class="form-check-label" for="inlineRadio12">अपार्टमेन्ट</label>&emsp;
                                    <input class="form-check-input form-check-inline" type="checkbox"
                                           name="inlineRadioOptions" id="inlineRadio13"
                                           value="option13">
                                    <label class="form-check-label" for="inlineRadio13">संघ संस्था</label>&emsp;
                                        </span><br>
                                    <span>१.३ भवन एन अनुसार भएको वर्गीकरण&emsp;
                                       <input class="form-check-input form-check-inline" type="checkbox"
                                              name="inlineRadioOptions" id="inlineRadio1"
                                              value="option1">
                                    <label class="form-check-label" for="inlineRadio1">"क" बर्ग</label>&emsp;
                                    <input class="form-check-input form-check-inline" type="checkbox"
                                           name="inlineRadioOptions" id="inlineRadio2"
                                           value="option2">
                                    <label class="form-check-label" for="inlineRadio2">"ख" बर्ग</label>&emsp;
                                    <input class="form-check-input form-check-inline" type="checkbox"
                                           name="inlineRadioOptions" id="inlineRadio3"
                                           value="option3">
                                    <label class="form-check-label" for="inlineRadio3">"ग" बर्ग</label>&emsp;
                                    <input class="form-check-input form-check-inline" type="checkbox"
                                           name="inlineRadioOptions" id="inlineRadio4"
                                           value="option4">
                                    <label class="form-check-label" for="inlineRadio4">"घ" बर्ग</label>&emsp;</span><br>
                                    <span>१.४ स्ट्रक्चर टाईप</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @push('scripts')
                    <script src="{{asset('assets/backend/js/printAjaxScript.js')}}"></script>
                @endpush
            </div>
        </div>
    </section>
@endsection
