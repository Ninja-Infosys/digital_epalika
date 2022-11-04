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
            <h4> {{\Modules\EMap\Enums\NoticeTypeEnum::PERMISSION_LETTER_FOR_CONSTRUCTION_WORK_UP_TO_PLINTH_LEVEL->label()}}</h4>
        </div>
        <div class="col-sm-8">
            <div class="text-sm-end">
                <div class="btn-group mb-3">
                    <x-application-component
                        :application-type="\Modules\EMap\Enums\NoticeTypeEnum::PERMISSION_LETTER_FOR_CONSTRUCTION_WORK_UP_TO_PLINTH_LEVEL"
                        url="{{route('emap.admin.map.map-apply.notice.upload.certificate',$mapApply)}}"/>
                </div>
                <div class="btn-group mb-3">
                    <x-print-button title="{{$mapApply->client->name}}प्लिन्थ लेभलसम्म निर्माण कार्यको इजाजत पत्र"/>
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
                                    <div class="card" style="width: 7rem; height: 8rem;">
                                        <div class="card-body">
                                            <h5 class="card-title text-center my-4">फोटो</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                पत्र सं: <div class="underline-dotted custom-width"></div><br>
                                चलानी नं: <div class="underline-dotted custom-width"></div>
                            </div>
                            <div class="col-md-6 text-end">मिति: <div class="underline-dotted custom-width"></div></div>
                        </div>
                        <h4 class="text-center"><b> प्लिन्थ लेभलसम्म निर्माण कार्यको इजाजत पत्र ।</b></h4>

                        <span>
                            &emsp;&emsp;&emsp;&emsp;तपाई श्री/श्रीमती<span
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
                        </span>
                        <div class="text-center"><b>निर्माण स्वीकृति भएको विवरण </b></div>
                        <div class="fw-bold">जग्गा बिकास तथा भवन मापदण्ड २०६४</div>
                        <table class="table table-sm table-bordered mb-1">
                            <thead>
                            <tr class="text-center">
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
                            <tr class="text-center">
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
                            <span class="text-center"><span class="underline-dotted custom-width"></span><br>
                                तयार गर्ने </span>
                            <span class="text-center"><span class="underline-dotted custom-width"></span><br>चेक
                                गर्ने<br>(इन्जिनियर)</span>
                            <span class="text-center"><span class="underline-dotted custom-width"></span><br>
                                स्वीकृत गर्ने <br>(प्रमुख प्रशासकिय अधिकृत) </span>
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
    @push('scripts')
        <script src="{{asset('assets/backend/js/printAjaxScript.js')}}"></script>
    @endpush

@endsection
