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
                                <h3 class="text-center mt-3"><b>वारेसनामा</b></h3>
                              <div class="row">
                                      <p class="vertical">
                                          दरखास्त : <span class="underline-dotted custom-width"></span>
                                      </p>
                              </div>
                                <div class="row">
                                        <p class="letter mt-2">
                                            लिखितम<span class="underline-dotted custom-width"></span>जिल्ला<span class="underline-dotted custom-width"></span>
                                            उ.न.पा./गा.वि.स. वडा नं.<span class="underline-dotted custom-width"></span> बस्ने वर्ष<span class="underline-dotted custom-width"></span>
                                            को आगे<span class="underline-dotted custom-width"></span> मेरो/हाम्रो नाउँमा दर्ता भएको साविक<span class="underline-dotted custom-width"></span>
                                            हाल<span class="underline-dotted custom-width"></span> उ.न.पा. वडा नं.<span class="underline-dotted custom-width"></span>
                                            स्थित कि.नं.<span class="underline-dotted custom-width"></span> क्षेत्रफल<span class="underline-dotted custom-width"></span>
                                            भएको जग्गामा घर बनाउनको लागि<span class="underline-dotted custom-width"></span> उ.न.पा. कार्यालयमा नक्सा दरखास्त पेश गरी नक्सा पास तथा निर्माण
                                            इजाजत लिन मेरो/हाम्रो घरयसी कामले फुर्सद नभएकोले सो कार्यको लागि<span class="underline-dotted custom-width"></span>
                                            उ.न.पा. वडा नं.<span class="underline-dotted custom-width"></span> बस्ने वर्ष<span class="underline-dotted custom-width"></span>
                                            को श्री<span class="underline-dotted custom-width"></span> लाई वारेसको अख्तियार दिई पठाएको/का छु/छौ | निज वारेसले त्यस उ.न.पा. कार्यालयमा
                                            उपस्थित भै तत्सम्बन्धी दरखास्त पेश गरी मक्स पास तथा निर्माण इजाजत लिएमा र नक्सा पास कार्य हुँदा जाँदा केहि गरी विपक्षहरुसँग मुदा हारे जितेमा मेरो/हाम्रो मन्जुर छ |
                                            मुदा फैसला हुँदाका बखत जो परेको म/हामी आफै उपस्थित भै बुझाउने छु/छौ | अड्डा अदालतबाट लागेको दण्ड जरिवाना सरकारी विगो, दशौद र आदेशले लागेको कोर्ट फि
                                            समेत तिर्न बुझाउन मैले/हामीले बाँकि राख्ने छैन/छैनौँ | नतिरी बाँकि राखेको ठहरे वारेसनामा बदर गरी नक्सा पास कार्य कानून बमोजिम होस् भनि मेरो/हाम्रो राजीखुशीले
                                            किनारामा लेखिएका साक्षीहरुको रोहवरमा<span class="underline-dotted custom-width"></span> उ.न.पा. कार्यालयमा बसेर वारेसनामा लेखी
                                            नीज<span class="underline-dotted custom-width"></span> लाई दिएँ |
                                        </p>
                                </div>
                                <p class="mt-2">इति सम्वत्<span class="underline-dotted custom-width"></span> साल<span class="underline-dotted custom-width"></span>
                                    महिना<span class="underline-dotted custom-width"></span> गते रोज<span class="underline-dotted custom-width"></span>
                                शुभम</p>
                                <div class="d-flex justify-content-between mt-4">
                                    <p class="my-5">दरखास्त :<span class="underline-dotted custom-width"></span></p>
                                    <div class="d-flex justify-content-end">
                                        <div class="row p-4">
                                            <div class="col-sm-6">
                                                <div class="card" style="width: 7rem; height: 8rem;">
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">दायाँ</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-4">
                                            <div class="col-sm-6">
                                                <div class="card" style="width: 7rem; height: 8rem;">
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">वायाँ</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-decoration-underline">सक्षीहरु</h5>
                                <p>१. श्री<span class="underline-dotted custom-width"></span> दरखास्त<span class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">२. श्री<span class="underline-dotted custom-width"></span> दरखास्त<span class="underline-dotted custom-width"></span></p>
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
            .vertical {
                transform: rotate(90deg);
                transform-origin: left top 0;
                margin-left: 30px;
               padding: 0 60px;
                color: black;
            }
            .letter{
                padding-left: 30px;

            }
        </style>
    @endpush
    @push('scripts')
        <script src="{{asset('assets/backend/js/printAjaxScript.js')}}"></script>
    @endpush

@endsection
