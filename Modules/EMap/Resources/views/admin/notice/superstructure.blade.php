@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.circular.registration.index')}}">ई-नक्सा </a>
                        </li>
                        <li class="breadcrumb-item active">नक्सा विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">ई-नक्सा</h4>
            </div>
        </div>
    </div>
    <div>
        @error('file')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="row mb-2">
        <div class="col-sm-4">
            <h4> {{\Modules\EMap\Enums\NoticeTypeEnum::PERMANENT_BUILDING_PERMIT_FOR_SUPERSTRUCTURE->label()}}</h4>
        </div>
        <div class="col-sm-8">
            <div class="text-sm-end">
                <div class="btn-group mb-3">
                    <x-application-component
                        :application-type="\Modules\EMap\Enums\NoticeTypeEnum::PERMANENT_BUILDING_PERMIT_FOR_SUPERSTRUCTURE"
                        url="{{route('emap.admin.map.map-apply.notice.upload.certificate',$mapApply)}}"/>

                </div>
                <div class="btn-group mb-3">
                    <x-print-button title="{{$mapApply->client->name}}भवन निर्माण स्थायी ईजाजत पत्र "/>
                </div>
            </div>
        </div><!-- end col-->
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-body p-3">
                    <div class="font-black" id="printData">
                        <div class="d-flex justify-content-end mb-4">
                            <div class="row ">
                                <div class="col-sm-6">
                                    <div class="photo" style="width: 6rem; height: 6rem;">
                                        <div class="card-body">
                                            <h5 class="card-title text-center my-4">फोटो</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="date">
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    पत्र सं:
                                    <div class="underline-dotted custom-width"></div>
                                    <br>
                                    चलानी नं:
                                    <div class="underline-dotted custom-width"></div>
                                </div>
                                <div class="col-md-6 text-end">मिति:
                                    <div class="underline-dotted custom-width"></div>
                                </div>
                            </div>
                        </div>
                        <h3 class="top text-center my-4"><b>भवन निर्माण स्थायी ईजाजत पत्र (Superstructure को
                                लागि)</b></h3>

                        <div class="super">
                                    श्री/श्रीमती<span
                                class="underline-dotted">{{$mapApply->houseOwner->name??''}}</span> ले जग्गा धनी
                                    श्री<span class="underline-dotted">{{$mapApply->landOwner->name??''}}</span>
                                    को नाममा दर्ता रहेको यस {{config('applicationDetail.office_short_name')}} वडा
                                    नं.<span
                                class="underline-dotted">{{$mapApply->landDetail->ward_no??''}}</span>
                                    टोल<span
                                class="underline-dotted">{{$mapApply->landDetail->tole??''}}</span>
                                    मा रहेको साविक<span
                                class="underline-dotted custom-width"></span>
                                    गा.वि.स.वडा नं.<span
                                class="underline-dotted">{{$mapApply->landDetail->former_ward_no??''}}</span>
                                    कित्ता नं.<span
                                class="underline-dotted">{{$mapApply->landDetail->plot_no??''}}</span>
                                    ज.वि.जम्मा<span
                                class="underline-dotted">{{$mapApply->landDetail->unit_value??''}}  {{$mapApply->landDetail->unit->title??''}}</span>
                                    को जग्गामा 'स्थानीय सरकार संचालन ऐन, २०७४' को दफा २७, २८, २९, ३०, ३१, ३२, ३३, ३४
                                    अनुसार
                                    नक्सा पास प्रक्रिया पुरा भैसकेको हुँदा यसको पछिल्लो पानामा उल्लेखित शर्तहरु र यसै
                                    साथ दिईएको स्वीकृत नक्सा बमोजिम
                                    <span
                                        class="underline-dotted">{{$mapApply->construction_type->label()??''}}</span>
                                    निर्माण गर्न नक्सा पास भएकोले यो
                                    प्रमाण-पत्र दिईएको छ ।
                                    'आधारभूत निर्माण मापदण्ड-२०७२' तथा 'राष्ट्रिय भवन निर्माण संहिता-२०६०' बमोजिम
                                    निर्माण कार्य गर्नुहोला । स्वीकृत भएको नक्सा
                                    बमोजिम निर्माण कार्य गरिसकेपछि "निर्माण सम्पन्न प्रमाणपत्र" अनिवार्य लिनुपर्नेछ ।
                                </div><br>
                        <div class="fw-bold line">जग्गा बिकास तथा भवन मापदण्ड २०६४</div>
                        <table class="table table-sm table-bordered text-center word">
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
                                <td>प्रथम तला</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>२.</td>
                                <td>चौडाई(रनिङ फिट)</td>
                                <td></td>
                                <td>घ)</td>
                                <td>दोस्रो तला</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>३.</td>
                                <td>प्लिन्थ लेभलको उचाई</td>
                                <td></td>
                                <td>ङ)</td>
                                <td>तेस्रो तला</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>४.</td>
                                <td>सेट ब्याक</td>
                                <td></td>
                                <td>च)</td>
                                <td>चौथो तला</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>५.</td>
                                <td>सडकको चौडाई</td>
                                <td></td>
                                <td>छ)</td>
                                <td>पाँचौ तला</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>६.</td>
                                <td>कम्पाउण्ड वाल (रनिङ फिट)</td>
                                <td></td>
                                <td>ज)</td>
                                <td>छैठौ तला</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>७.</td>
                                <td>भवनको प्रयोग</td>
                                <td></td>
                                <td>झ)</td>
                                <td>सातौ तला</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>८.</td>
                                <td>प्लिन्य एरिया (वर्ग फिट)</td>
                                <td></td>
                                <td>ञ)</td>
                                <td>आठौ तला</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>क.</td>
                                <td>बेस्मेन्ट</td>
                                <td></td>
                                <td>ट)</td>
                                <td>नठौ तला</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>ख.</td>
                                <td>प्लिन्थ एरिया (वर्ग फिट)</td>
                                <td></td>
                                <td>ठ)</td>
                                <td>दशौ तला</td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                        <span class="fw-bold word">राष्ट्रिय भवन निर्माण संहिता २०६०</span>
                        <table class="table table-bordered mt-2 text-center word">
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
                                <td>क&emsp; ख&emsp; ग&emsp; घ</td>
                                <td>४.</td>
                                <td>पिलरको साईज (इन्च)</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>२.</td>
                                <td>ताल संख्या</td>
                                <td></td>
                                <td>५.</td>
                                <td>पिल्र्मा प्रयोग गर्ने डण्डीको
                                    साईज र संख्या
                                </td>
                                <td></td>
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
                        <p class="word">नक्सा स्वीकृत अगावै निर्माण कार्य भएको भए सो को विवरण :</p>
                        <p class="word">(स्वीकृत नक्सा अनुसार हाल<span
                                class="underline-dotted">{{$mapApply->current_storey}}</span>तल्ला
                            निर्माण गरिनेछ | </p>
                        <div class="d-flex justify-content-around mt-4">
                            <p class="text-center"><span class="underline-dotted custom-width"></span><br>
                                तयार गर्ने </p>
                            <p class="text-center"><span class="underline-dotted custom-width"></span><br>चेक
                                गर्ने<br>(इन्जिनियर)</p>
                            <p class="text-center"><span class="underline-dotted custom-width"></span><br>
                                स्वीकृत गर्ने <br>(प्रमुख प्रशासकिय अधिकृत) </p>
                        </div>

                        <div class="break-page"></div>
                        <h5>दोस्रो चरणका इजाजत नविकरण </h5>
                        <table class="table table-bordered mt-2">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">नविकरण गरेको मिति</th>
                                <th scope="col">म्याद पुग्ने मिति</th>
                                <th scope="col">सिफारिस गर्ने</th>
                                <th scope="col">स्वीकृत गर्ने</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
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
                                <th scope="col">सिफारिस गर्ने</th>
                                <th scope="col">स्वीकृत गर्ने</th>
                            </tr>
                            </thead>
                            <tbody>
                            @for($i=1 ; $i<21; $i++)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endfor

                            </tbody>
                        </table>
                        <p>निर्माण कार्य गर्दा पालना गर्नु पर्ने शर्तहरु</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @push('style')
        <style>
            .word{
                font-size: 10px;
            }
            .super{
                font-size: 10px;
            }
        </style>
    @endpush
    @push('scripts')
        <script src="{{asset('assets/backend/js/printAjaxScript.js')}}"></script>
    @endpush

@endsection
