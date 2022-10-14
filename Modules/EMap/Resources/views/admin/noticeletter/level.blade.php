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
                                <div class="top-line d-flex justify-content-between">
                                    <p>पत्र सं: <span class="underline-dotted custom-width"></span></p>
                                    <p class="">मिति: <span class="underline-dotted custom-width"> </span></p>
                                </div>
                                <p>चलानी नं: <span class="underline-dotted custom-width"></span></p>
                                <p class="text-center my-3"><b>बिषय: प्लिन्थ लेभलसम्म निर्माण कार्यको इजाजत पत्र ।</b></p>

                                <p class="mb-3">
                                  तपाई श्री/श्रीमान<span class="underline-dotted custom-width"></span> ले जग्गा धनी<span class="underline-dotted custom-width"></span> को नाममा दर्ता रहेको ने.उ.म.न.पा.वडा नं.<span class="underline-dotted custom-width"></span>किता नं.<span class="underline-dotted custom-width"></span> ज.वि.जम्मा<span class="underline-dotted custom-width"></span> को जग्गामा भवन निर्माण स्वीकृतिको लागि मिति<span class="underline-dotted custom-width"></span> मा दरखास्त सहित नक्सा पेश गर्नु भएकोमा 'स्थानीय सरकार संचालन ऐन, २०७४' को दफा २७, २८, २९, ३०, ३१, ३२, ३३, ३४ अनुसार प्रक्रिया पुरा भई यस कार्यालयको मिति<span class="underline-dotted custom-width"></span>
                                    को निर्माण बमोजिम प्रथम चरणमा 'आधारभूत निर्माण मापदण्ड-२०७२' तथा 'राष्ट्रिय भवन निर्माण संहिता-२०६०' बमोजिम निम्नाअनुसार डि.पि.सि.लेभलसम्म मात्र निर्माण कार्य गर्नुहोला | डि.पि.सि.सम्मको निर्माण कार्य सकिएपछि सो भन्दा माथिको स्वीकृति (भवन निर्माण स्थायी ईजाजत पत्र) को लागि कन्सल्टेन्ट/ईन्जिनियरबाट डि.पि.सि. निर्माण कार्यको फिल्ड प्रतिवेदन लिनु भै उपस्थित हुन जानकारी गराईन्छ |
                                </p>
                                <h4 class="text-center"><b>निर्माण स्वीकृति भएको विवरण </b></h4>
                                <h5>जग्गा बिकास तथा भवन मापदण्ड २०६४</h5>
                                <table class="table table-bordered mt-2">
                                    <thead>
                                    <tr>
                                        <th scope="col">क्र.स.</th>
                                        <th scope="col">विवरण</th>
                                        <th scope="col">स्वीकृति अनुसार</th>
                                        <th scope="col">क्र.स.</th>
                                        <th scope="col">विवरण</th>
                                        <th scope="col">स्वीकृति अनुसार</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>१.</td>
                                        <td>लम्बाई(रनिङ फिट)</td>
                                        <td></td>
                                        <td>४.</td>
                                        <td>दायाँ/बायाँ छोड्ने दुरी<br>
                                            (रनिङ फिट) </td>
                                    </tr>
                                    <tr>
                                        <td>२.</td>
                                        <td>चौडाई(रनिङ फिट)</td>
                                        <td></td>
                                        <td>५.</td>
                                        <td>कम्पाउन्ड वाल<br>
                                            (रनिङ फिट) </td>
                                    </tr>
                                    <tr>
                                        <td>३.</td>
                                        <td>सेट ब्याक<br>(छडको चौडाई सहित)</td>
                                        <td></td>
                                        <td>६.</td>
                                        <td>लिन्थ लेभलको उचाई</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h5>राष्ट्रिय भवन निर्माण संहिता २०६०</h5>
                                <table class="table table-bordered mt-2">
                                    <thead>
                                    <tr>
                                        <th scope="col">क्र.स.</th>
                                        <th scope="col">विवरण</th>
                                        <th scope="col">स्वीकृति अनुसार</th>
                                        <th scope="col">क्र.स.</th>
                                        <th scope="col">विवरण</th>
                                        <th scope="col">स्वीकृति अनुसार</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>१.</td>
                                        <td>भवनको वर्गिकरण</td>
                                        <td>क ख ग घ </td>
                                        <td>४.</td>
                                        <td>पिलरको साईज (इन्च)</td>
                                    </tr>
                                    <tr>
                                        <td>२.</td>
                                        <td>भवन स्ट्रक्चरल सिस्टम</td>
                                        <td>फ्रेम/वाल</td>
                                        <td>५.</td>
                                        <td>पिल्र्मा प्रयोग गर्ने डण्डीको<br>
                                        साईज र संख्या</td>
                                    </tr>
                                    <tr>
                                        <td>३.</td>
                                        <td>जगको साईज (फिट)</td>
                                        <td></td>
                                        <td>६.</td>
                                        <td>पिलरको छुरीको साईज</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div  class="d-flex justify-content-around">
                                    <p class="text-center"><span class="underline-dotted custom-width"></span><br>
                                        तयार गर्ने </p>
                                    <p class="text-center"><span class="underline-dotted custom-width"></span><br>चेक गर्ने<br>(इन्जिनियर)</p>
                                    <p class="text-center"><span class="underline-dotted custom-width"></span><br>
                                        स्वीकृत गर्ने <br>(प्रमुख प्रशासकिय अधिकृत) </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb_30">
                            <div class="card-body p-3">
                                <h5>प्रथम चरणका इजाजत नविकरण </h5>
                                <table class="table table-bordered mt-2">
                                    <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">नविकरण गरेको मिति</th>
                                        <th scope="col">म्याद पुग्ने मिति</th>
                                        <th scope="col">सिफारिस गर्ने </th>
                                        <th scope="col">स्वीकृत गर्ने</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                   </tbody>
                                </table>
                                <h5>प्रथम चरणका इजाजत नामसारी </h5>
                                <table class="table table-bordered mt-2">
                                    <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">नामसारी गरी दिने नामथर</th>
                                        <th scope="col">नामसारी गरी लिनेको नामथर</th>
                                        <th scope="col">सिफारिस गर्ने </th>
                                        <th scope="col">स्वीकृत गर्ने</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
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
