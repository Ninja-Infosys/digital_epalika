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
                        <h3> {{\Modules\EMap\Enums\NoticeTypeEnum::BUILDING_COMPLETION_CERTIFICATE->label()}}</h3>
                        <div class="d-flex justify-content-between">
                            <x-application-component
                                :application-type="\Modules\EMap\Enums\NoticeTypeEnum::BUILDING_COMPLETION_CERTIFICATE"
                                url="{{route('emap.admin.map.map-apply.notice.upload.certificate',$mapApply)}}"/>

                            <button id="printButton" class="btn btn-sm btn-success" printElementId='printData'
                                    requestRoute="{{route('print.office-letter-print')}}">
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
                                <div class="top-line d-flex justify-content-between">
                                    <p>पत्र सं.<span class="underline-dotted custom-width"></span></p>
                                    <p>मिति: <span class="underline-dotted custom-width"></span></p>
                                </div>
                                <p>चलानी:<span class="underline-dotted custom-width"></span></p>
                                <h3 class="text-center"><b>भवन निर्माण कार्य सम्पन्न प्रमाण-पत्र</b></h3>

                                <p>
                                    श्री<span class="underline-dotted">{{$mapApply->houseOwner->name??''}}</span> ले
                                    यस {{config('applicationDetail.office_type')}}
                                    वडा नं.<span class="underline-dotted">{{$mapApply->landDetail->ward_no??''}}</span>
                                    मा निम्न बमोजिम निर्माण कार्य पूरा गरेकोले यो निर्माण कार्य सम्पन्न प्रमाण-पत्र
                                    प्रदान गरिएको छ |</p>
                                <p>१. जग्गाधनीको नाम, थर<span
                                        class="underline-dotted">{{$mapApply->landOwner->name??''}}</span>
                                </p>
                                <p>२. घरधनीको नाम, थर, वतन <span
                                        class="underline-dotted">{{$mapApply->houseOwner->name??''}}</span><span
                                        class="underline-dotted custom-width"></span></p>
                                <p>३. जग्गाको विवरण साविक<span
                                        class="underline-dotted">{{$mapApply->landDetail->former_ward_no??''}}</span>
                                    हालको वडा नं.<span
                                        class="underline-dotted">{{$mapApply->landDetail->ward_no??''}}</span>
                                    घर नं.<span class="underline-dotted"></span> सडकको नाम<span
                                        class="underline-dotted">{{$mapApply->landDetail->street_code_no??''}}</span>
                                    साविक<span class="underline-dotted custom-width"></span> कि.नं.<span
                                        class="underline-dotted">{{$mapApply->landDetail->plot_no??''}}</span>
                                    क्षेत्रफल<span
                                        class="underline-dotted">{{$mapApply->landDetail->unit_value??''}} {{$mapApply->landDetail->unit->title??''}}</span>
                                    भू-उपयोग क्षेत्र<span
                                        class="underline-dotted">{{$mapApply->landDetail->land_use_area??''}}</span>
                                </p>
                                <p>
                                    ५. राष्ट्रिय भवन संहिता अनुसार भवनको वर्गिकरण :&nbsp;&nbsp;
                                </p>
                                <div class="d-flex flex-wrap">
                                    @foreach(\Modules\EMap\Enums\CategorizationEnum::cases() as $category)
                                        <div class="m-1">
                                            <input type="checkbox"
                                                   {{$category->value==$mapApply->building_category->value ? 'checked' : ''}}
                                                   disabled>
                                            {{$category->label()}}
                                        </div>
                                    @endforeach
                                </div>
                                <p>

                                    निर्माणको स्ट्रक्चरल सिस्टम<span
                                        class="underline-dotted">{{$mapApply->structureType->title??''}}</span></p>
                                <p>६. निर्माण कार्य इजाजत प्रमाण-पत्र लिएको मिति<span
                                        class="underline-dotted custom-width"></span></p>
                                <p>७.</p>
                                <table class="table table-bordered mt-2">
                                    <thead>
                                    <tr>
                                        <th scope="col">तला</th>
                                        <th scope="col">स्वीकृत क्षेत्रफल</th>
                                        <th scope="col">निर्माण क्षेत्रफल</th>
                                        <th scope="col">तला</th>
                                        <th scope="col">स्वीकृत क्षेत्रफल</th>
                                        <th scope="col">निर्माण क्षेत्रफल</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>भूमिगत वा अर्ध भूमिगत तला १</td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td>पाचौ</td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                    </tr>
                                    <tr>
                                        <td>भूमिगत वा अर्ध भूमिगत तला २</td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td>छैठौ</td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                    </tr>
                                    <tr>
                                        <td>जमिन तला</td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td>सातौ</td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                    </tr>
                                    <tr>
                                        <td>पहिलो तला</td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td>आठौ</td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                    </tr>
                                    <tr>
                                        <td>दोस्रो तला</td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td>नवौ</td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                    </tr>
                                    <tr>
                                        <td>तेस्रो तला</td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td>दशौ</td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                    </tr>
                                    <tr>
                                        <td>चौथो तला</td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td></td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <p>जम्मा क्षेत्रफल<span class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">८. भवनको ग्राउण्ड कभरेज: <span
                                        class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">९. बनेको भवनको उचाई <span class="underline-dotted">{{$mapApply->height}}</span>
                                    तला संख्या <span class="underline-dotted">{{$mapApply->current_storey}}</span></p>
                                <p class="mt-2">१०. घर बनेको प्लटसँग जोडिएको सडकको सडक सिमानाबाट न्युनतम छाड्न पर्ने
                                    दूरी<span class="underline-dotted custom-width"></span>
                                    छाडिएको दूरी<span class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">११. बिजुलीको तार नजिक भएमा छाड्न पर्ने दूरी<span
                                        class="underline-dotted custom-width"></span> छाडेको दूरी <span
                                        class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">१२. नदी, नालाको किनार भएमा छाड्न पर्ने दूरी <span
                                        class="underline-dotted custom-width"></span> छाडेको दूरी <span
                                        class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">१३. ढल निकास सम्बन्धी ढल, सेप्टिकटैक, सोकपिट भए सो को विवरण : <span
                                        class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">१४. अन्य कुनै भए विवरण : <span
                                        class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">१५. नेपाल राष्ट्रिय भवन संहिता २०६० सम्बन्धी विवरण :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    पालना भएको &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; पालना नभएको </p>
                                <p>पालना नभएको भए विवरण : <span class="underline-dotted custom-width"></span></p>
                                <div class="d-flex justify-content-around my-4">
                                    <p class="text-center"><span class="underline-dotted custom-width"></span><br>
                                        तयार गर्ने </p>
                                    <p class="text-center"><span class="underline-dotted custom-width"></span><br>चेक
                                        गर्ने<br>(इन्जिनियर)</p>
                                    <p class="text-center"><span class="underline-dotted custom-width"></span><br>
                                        स्वीकृत गर्ने <br>(प्रमुख प्रशासकिय अधिकृत) </p>
                                </div>
                                <div class="break-page"></div>
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
