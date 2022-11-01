@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div>
                @error('file')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3> {{\Modules\EMap\Enums\NoticeTypeEnum::PERMISSION_LETTER_FOR_CONSTRUCTION_WORK_UP_TO_PLINTH_LEVEL->label()}}</h3>
                        <div class="d-flex justify-content-between">
                            <x-application-component
                                :application-type="\Modules\EMap\Enums\NoticeTypeEnum::PERMISSION_LETTER_FOR_CONSTRUCTION_WORK_UP_TO_PLINTH_LEVEL"
                                url="{{route('emap.admin.map.map-apply.notice.upload.certificate',$mapApply)}}"/>

                            <button id="printButton" class="btn btn-sm btn-success" printElementId='printData'
                                    requestRoute="{{route('print.application-print')}}">
                                <i class="fa fa-print"></i> Print
                            </button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card mb_30">
                        <div class="card-body p-3">
                            <div class="font-black" id="printData">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <a href="https://digital-palika.ninjainfosys.com.np" class="main-logo">
                                            <img alt="nepal-government-logo" class="m-2" height="120" width="140"
                                                 src="{{asset('images/np.png')}}">
                                        </a>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-xs-8">
                                        <div class="row mt-3">
                                            <div class="text-center">
                                                <x-header-component/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <div class="row mt-3">
                                            <div class="card" style="width: 120px; height: 120px;">
                                                <div class="card-body">
                                                    <h5 class="card-title text-center my-4">फोटो</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                </div>
                                <div class="top-line d-flex justify-content-between">
                                    <p>पत्र सं: <span class="underline-dotted custom-width"></span></p>
                                    <p>मिति: <span class="underline-dotted custom-width"> </span></p>
                                </div>
                                <p>चलानी नं: <span class="underline-dotted custom-width"></span></p>
                                <h4 class="text-center"><b> प्लिन्थ लेभलसम्म निर्माण कार्यको इजाजत पत्र ।</b></h4>

                                <p class="mb-3">
                                    तपाई श्री/श्रीमती<span
                                        class="underline-dotted ">{{$mapApply->houseOwner->name??''}}</span> ले जग्गा
                                    धनी<span
                                        class="underline-dotted custom-width">{{$mapApply->landOwner->name??''}}</span>
                                    को नाममा दर्ता रहेको
                                    {{config('applicationDetail.place_short_name')}} {{config('applicationDetail.office_short_name')}}
                                    वडा नं.<span class="underline-dotted">{{$mapApply->landDetail->ward_no??''}}</span>
                                    टोल <span class="underline-dotted">{{$mapApply->landDetail->tole??''}}</span> मा
                                    रहेको साविक <span
                                        class="underline-dotted">{{$mapApply->landDetail->former_ward_no??''}}</span>
                                    गा.वि.स. वडा नं.<span class="underline-dotted custom-width"></span> किता नं.<span
                                        class="underline-dotted custom-width">{{$mapApply->landDetail->plot_no??''}}</span>
                                    ज.वि.जम्मा<span
                                        class="underline-dotted custom-width">{{$mapApply->landDetail->unit_value??''}}  {{$mapApply->landDetail->unit->title??''}}</span>
                                    को जग्गामा भवन निर्माण स्वीकृतिको
                                    लागि मिति<span class="underline-dotted custom-width"></span> मा दरखास्त सहित नक्सा
                                    पेश गर्नु भएकोमा 'स्थानीय सरकार संचालन ऐन, २०७४' को दफा २७, २८, २९, ३०, ३१, ३२, ३३,
                                    ३४ अनुसार प्रक्रिया पुरा भई यस कार्यालयको मिति<span
                                        class="underline-dotted custom-width"></span>
                                    को निर्माण बमोजिम प्रथम चरणमा 'आधारभूत निर्माण मापदण्ड-२०७२' तथा 'राष्ट्रिय भवन
                                    निर्माण संहिता-२०६०' बमोजिम निम्नाअनुसार डि.पि.सि.लेभलसम्म मात्र निर्माण कार्य
                                    गर्नुहोला । डि.पि.सि.सम्मको निर्माण कार्य सकिएपछि सो भन्दा माथिको स्वीकृति (भवन
                                    निर्माण स्थायी ईजाजत पत्र) को लागि कन्सल्टेन्ट/ईन्जिनियरबाट डि.पि.सि. निर्माण
                                    कार्यको फिल्ड प्रतिवेदन लिनु भै उपस्थित हुन जानकारी गराईन्छ ।
                                </p>
                                <h5 class="text-center"><b>निर्माण स्वीकृति भएको विवरण </b></h5>
                                <h6>जग्गा बिकास तथा भवन मापदण्ड २०६४</h6>
                                <table class="table table-bordered mb-1">
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
                                        <td>{{$mapApply->length}}</td>
                                        <td>४.</td>
                                        <td>दायाँ/बायाँ छोड्ने दुरी<br>
                                            (रनिङ फिट)
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>२.</td>
                                        <td>चौडाई(रनिङ फिट)</td>
                                        <td>{{$mapApply->breadth}}</td>
                                        <td>५.</td>
                                        <td>कम्पाउन्ड वाल<br>
                                            (रनिङ फिट)
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>३.</td>
                                        <td>सेट ब्याक<br>(छडको चौडाई सहित)</td>
                                        <td>{{$mapApply->criteriaDetails->where('detail',\Modules\EMap\Enums\DetailsRegardingCriteriaEnum::SET_BACK)->first()->according_to_criteria??''}}</td>
                                        <td>६.</td>
                                        <td>लिन्थ लेभलको उचाई</td>
                                        <td>{{$mapApply->height}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h6>राष्ट्रिय भवन निर्माण संहिता २०६०</h6>
                                <table class="table table-bordered">
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
                                        <td>{{$mapApply->building_category->label()}}</td>
                                        <td>४.</td>
                                        <td>पिलरको साईज (इन्च)</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>२.</td>
                                        <td>भवन स्ट्रक्चरल सिस्टम</td>
                                        <td>{{$mapApply->structureType->title??''}}</td>
                                        <td>५.</td>
                                        <td>पिल्र्मा प्रयोग गर्ने डण्डीको<br>
                                            साईज र संख्या
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>३.</td>
                                        <td>जगको साईज (फिट)</td>
                                        <td></td>
                                        <td>६.</td>
                                        <td>पिलरको छुरीको साईज</td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-around">
                                    <p class="text-center"><span class="underline-dotted custom-width"></span><br>
                                        तयार गर्ने </p>
                                    <p class="text-center"><span class="underline-dotted custom-width"></span><br>चेक
                                        गर्ने<br>(इन्जिनियर)</p>
                                    <p class="text-center"><span class="underline-dotted custom-width"></span><br>
                                        स्वीकृत गर्ने <br>(प्रमुख प्रशासकिय अधिकृत) </p>
                                </div>
                                <div class="break-page"></div>
                                <h6>प्रथम चरणका इजाजत नविकरण </h6>
                                <table class="table table-bordered">
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
                                <h5>प्रथम चरणका इजाजत नामसारी </h5>
                                <table class="table table-bordered">
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
