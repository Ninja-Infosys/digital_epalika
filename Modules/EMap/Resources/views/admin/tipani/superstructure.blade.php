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
                                <h3 class="text-center my-4"><b>भवन निर्माण स्थायी ईजाजत पत्र (Superstructure को लागि)</b></h3>

                                <p class="mb-3">
                                    श्री/श्रीमती<span class="underline-dotted custom-width"></span> ले जग्गा धनी श्री<span class="underline-dotted custom-width"></span>
                                    को नाममा दर्ता रहेको यस ने.उ.म.न.पा.वडा नं.<span class="underline-dotted custom-width"></span>
                                    टोल<span class="underline-dotted custom-width"></span> मा रहेको साविक<span class="underline-dotted custom-width"></span>
                                    गा.वि.स.वडा नं.<span class="underline-dotted custom-width"></span> कित्ता नं.<span class="underline-dotted custom-width"></span>
                                    ज.वि.जम्मा<span class="underline-dotted custom-width"></span>
                                    को जग्गामा 'स्थानीय सरकार संचालन ऐन, २०७४' को दफा २७, २८, २९, ३०, ३१, ३२, ३३, ३४ अनुसार
                                    नक्सा पास  प्रक्रिया पुरा भैसकेको हुँदा यसको पछिल्लो पानामा उल्लेखित शर्तहरु र यसै साथ दिईएको स्वीकृत नक्सा बमोजिम
                                    <span class="underline-dotted custom-width"></span> निर्माण गर्न नक्सा पास भएकोले यो प्रमाण-पत्र दिईएको छ |
                                    'आधारभूत निर्माण मापदण्ड-२०७२' तथा 'राष्ट्रिय भवन निर्माण संहिता-२०६०' बमोजिम निर्माण कार्य गर्नुहोला | स्वीकृत भएको नक्सा
                                    बमोजिम निर्माण कार्य गरिसकेपछि "निर्माण सम्पन्न प्रमाणपत्र" अनिवार्य लिनुपर्नेछ |
                                </p>
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
                                        <td>ग)</td>
                                        <td>प्रथम तला </td>
                                    </tr>
                                    <tr>
                                        <td>२.</td>
                                        <td>चौडाई(रनिङ फिट)</td>
                                        <td></td>
                                        <td>घ)</td>
                                        <td>दोस्रो तला</td>
                                    </tr>
                                    <tr>
                                        <td>३.</td>
                                        <td>प्लिन्थ लेभलको उचाई </td>
                                        <td></td>
                                        <td>ङ)</td>
                                        <td>तेस्रो तला</td>
                                    </tr>
                                    <tr>
                                        <td>४.</td>
                                        <td>सेट ब्याक</td>
                                        <td></td>
                                        <td>च)</td>
                                        <td>चौथो तला</td>
                                    </tr>
                                    <tr>
                                        <td>५.</td>
                                        <td>सडकको चौडाई</td>
                                        <td></td>
                                        <td>छ)</td>
                                        <td>पाँचौ तला</td>
                                    </tr>
                                    <tr>
                                        <td>६.</td>
                                        <td>कम्पाउण्ड वाल (रनिङ फिट)</td>
                                        <td></td>
                                        <td>ज)</td>
                                        <td>छैठौ तला</td>
                                    </tr>
                                    <tr>
                                        <td>७.</td>
                                        <td>भवनको प्रयोग</td>
                                        <td></td>
                                        <td>झ)</td>
                                        <td>सातौ तला</td>
                                    </tr>
                                    <tr>
                                        <td>८.</td>
                                        <td>प्लिन्य एरिया (वर्ग फिट)</td>
                                        <td></td>
                                        <td>ञ)</td>
                                        <td>आठौ तला</td>
                                    </tr>
                                    <tr>
                                        <td>क.</td>
                                        <td>बेस्मेन्ट</td>
                                        <td></td>
                                        <td>ट)</td>
                                        <td>नठौ तला</td>
                                    </tr>
                                    <tr>
                                        <td>ख.</td>
                                        <td>प्लिन्थ एरिया (वर्ग फिट)</td>
                                        <td></td>
                                        <td>ठ)</td>
                                        <td>दशौ तला</td>
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
                                        <td>ताल संख्या </td>
                                        <td></td>
                                        <td>५.</td>
                                        <td>पिल्र्मा प्रयोग गर्ने डण्डीको<br>
                                            साईज र संख्या</td>
                                    </tr>
                                    <tr>
                                        <td>३.</td>
                                        <td>भवन स्ट्रक्चरल सिस्टम</td>
                                        <td>फ्रेम/वाल</td>
                                        <td>६.</td>
                                        <td>कंक्रिट ब्याण्डहरु</td>
                                        <td>लिन्टल/सिल</td>
                                    </tr>

                                    </tbody>
                                </table>
                                <p>नक्सा स्वीकृत अगावै निर्माण कार्य भएको भए सो को विवरण :</p>
                                <p>(स्वीकृत नक्सा अनुसार हाल<span class="underline-dotted custom-width"></span>तल्ला निर्माण गरिनेछ | </p>
                                <div  class="d-flex justify-content-around mt-4">
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
                                <h5>दोस्रो चरणका इजाजत नविकरण </h5>
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
                                <h5>दोस्रो चरणका इजाजत नामसारी </h5>
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
