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
                                <h3 class="text-center my-3"><b>सम्झौत पत्र</b></h3>
                                <p class="text-center"><b>(सुपरिवेक्षक/कन्सल्टेन्ट तथा घरधनी बीच)</b></p>
                                <p class="mb-3">
                                    लिखितम् नेपालगञ्ज उप-महानगरपालिका वडा नं.<span class="underline-dotted custom-width"></span>बस्ने श्री<span class="underline-dotted custom-width"></span>को नाती/नातिनी श्री <span class="underline-dotted custom-width"></span> को छोरा/छोरी/श्रीमती/बुहारी घरधनी वर्ष <span class="underline-dotted custom-width"></span>को श्री <span class="underline-dotted custom-width"></span> यसपछि पहिलो पक्ष भनिएको र <span class="underline-dotted custom-width"></span> उप-महानगरपालिका वडा नं.<span class="underline-dotted custom-width"></span>बस्ने सुपरिवेक्षण (इन्जिनियर, सव इन्जिनियर)
                                    श्री<span class="underline-dotted custom-width"></span>को नाति/नातिनी श्री <span class="underline-dotted custom-width"></span>को छोरा/छोरी वर्ष <span class="underline-dotted custom-width"></span>को श्री <span class="underline-dotted custom-width"></span>यस पछि दोस्रो पक्ष भनिएको बीच आज मिति <span class="underline-dotted custom-width"></span>साल <span class="underline-dotted custom-width"></span>महिना<span class="underline-dotted custom-width"></span>गतेका दिन तपसिल बमोजिमका सर्तका अधिनमा रही कार्य गराउन मन्जुर भएको हुँदा यो समझदारी-पत्रमा सही छाप गरी किनाराका साक्षीको रोहवरमा एक-एक प्रति बुझि लियौँ दियौँ |
                                </p>
                                <h4>शर्तहरु:</h4>
                                <p>१. घरधनीलाई आवश्यक पर्ने प्रविधिक सरसल्लाह एवं सुझाव उपलव्ध गराईनेछ |</p>
                                <p>२. उप-महानगरपालिकाबाट 'राष्ट्रिय भवन संहिता-२०६०' 'जग्गा विकास तथा भवन मापदण्ड-२०६४तथा 'वस्ती विकास शहरी योजना तथा भवन मापदण्ड-२०७२' बमोजिम प्रथम चरणको नक्शा स्वीकृत भए पश्चात सो स्वीकृत नक्शामा तोकिए बमोजिमको Drawing, Design र Specification बमोजिम निर्माण कार्य गर्न गराउनको लागि आवश्यक पर्ने प्राविधिक सेवा उपलब्ध गराइनेछ ।</p>
                                <p>३. निर्माणकर्मीहरुलाई आवश्यक पर्ने कुनैपनि अस्पष्ट कुराहरुलाई तोकिए बमोजिम स्पष्ट गराईनेछ |</p>
                                <p>४. कार्य प्रगतिको बारेमा घरधनी र उप-महानगरपालिकालाई समय-समयमा जानकारी उपलब्ध गराईनेछ ।</p>
                                <p>५. उप-महानगरपालिकाले तोके बमोजिम डि.पि.सि. सम्मको प्रतिवेदन उप-महानगरपालिकाले उपलब्ध गराएको फरम्याटमा तयार गरी उप-महानगरपालिकामा पेश गरिनेछ । भवन निर्माण सम्पन्न भैसकेपछि निर्माण सम्पन्नको प्रतिवेदन उप-महानगरपालिकाले उपलब्ध गराएको फरम्याटमा तयार गरी उप-महानगरपालिकामा पेश गरिनेछ ।</p>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">प्रथम पक्षको तर्फबाट</th>
                                        <th scope="col">दोस्रो पक्षको तर्फबाट</th>
                                        <th scope="col">रोहवर</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>

                                        <td>घरधनीको नाम:<span class="underline-dotted custom-width"></span></td>
                                        <td>घरधनीको नाम:<span class="underline-dotted custom-width"></span></td>
                                        <td>उप-महानगरपालिका<span class="underline-dotted custom-width"></span></td>
                                    </tr>
                                    <tr>
                                        <td>हस्ताक्षर:<span class="underline-dotted custom-width"></span></td>
                                        <td>ने.ई.का.नं. :<span class="underline-dotted custom-width"></span></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>कन्सल्टेन्सी:<span class="underline-dotted custom-width"></span></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                       <td></td>
                                        <td>हस्ताक्षर:<span class="underline-dotted custom-width"></span></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>ठेगाना:<span class="underline-dotted custom-width"></span></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <p>मिति: २०७<span class="underline-dotted custom-width"></span>महिना<span class="underline-dotted custom-width"></span>गते<span class="underline-dotted custom-width"></span>|</p>

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
