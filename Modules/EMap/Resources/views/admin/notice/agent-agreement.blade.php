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
                        <h3> {{\Modules\EMap\Enums\NoticeTypeEnum::AGREEMENT_LETTER_HOMEOWNER_AND_BUILDER_CONTRACTOR->label()}}</h3>
                        <div class="d-flex justify-content-between">
                            <x-application-component
                                :application-type="\Modules\EMap\Enums\NoticeTypeEnum::AGREEMENT_LETTER_HOMEOWNER_AND_BUILDER_CONTRACTOR"
                                url="{{route('emap.admin.map.map-apply.notice.upload.agreement',$mapApply)}}"/>

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
                                <h3 class="text-center mt-3"><b>सम्झौत पत्र</b></h3>
                                <p class="text-center mt-2"><b>(घरधनी र निर्माणकर्मी/ठेकेदार)</b></p>
                                <p>
                                    लिखितम् {{$mapApply->houseOwner->local_body??''}} वडा नं.<span
                                        class="underline-dotted custom-width">{{$mapApply->houseOwner->ward_no??''}}</span>बस्ने वर्ष<span
                                        class="underline-dotted custom-width"></span>को
                                    श्री <span class="underline-dotted custom-width">{{$mapApply->houseOwner->father_name??''}}</span> को छोरा/छोरी/बुहारी वर्ष
                                    <span class="underline-dotted custom-width"></span>
                                    को घरधनी श्री <span class="underline-dotted custom-width">{{$mapApply->houseOwner->name??''}}</span>(पहिलो पक्ष) र
                                    <span class="underline-dotted custom-width">{{$mapApply->designerDetails->first()->local_body??''}}</span>
                                    वडा नं.<span class="underline-dotted custom-width">{{$mapApply->designerDetails->first()->ward_no??''}}</span>बस्ने श्री <span
                                        class="underline-dotted custom-width">{{$mapApply->designerDetails->first()->father_name??''}}</span>
                                    को छोरा/निर्माणकर्मी(ठेकेदार) श्री<span
                                        class="underline-dotted custom-width">{{$mapApply->designerDetails->first()->name??''}}</span>
                                    (दोस्रो पक्ष) बीच यस {{config('applicationDetail.office_type')}}बाट नक्सापास भए बमोजिमको नक्सा र डिजाईन अनुसार
                                    भवन निर्माण गर्न मन्जुरी भई प्रविधिक सुपरिवेक्षकको रोहवरमा तपसिल बमोजिमको शर्तहरुको
                                    अधिनमा रही सम्झौता गर्दछौं ।
                                </p>
                                <h4 class="text-decoration-underline">शर्तहरु:</h4>
                                <p>१. प्रथम पक्षले यस {{config('applicationDetail.office_type')}}को कार्यालयबाट प्रथम चरणको नक्सापास गरेपछि मात्र
                                    दोस्रो पक्षलाई घर निर्माण गर्ने जिम्मा लगाउनु पर्नेछ ।</p>
                                <p>२. दोस्रो पक्ष (निर्माणकर्मी/ठेकेदार) ले यस {{config('applicationDetail.office_type')}}को कार्यालयमा सूचीकृत भई
                                    नविकरण भएको र आपूर्ती
                                    सम्बन्धित संस्थामा समेत दर्ता र नविकरण भएको हुनुपर्नेछ ।</p>
                                <p>३. निर्माण कार्यमा प्रयोग हुने गुणस्तरयुक्त कच्चा सामाग्रीहरु समयमा नै उपलब्ध गराउने
                                    जिम्मेवारी प्रथम पक्षको हुनेछ भने नक्शा पास बमोजिमको राष्ट्रिय भवन संहिता-२०६० तथा
                                    यस {{config('applicationDetail.office_type')}}को मापदण्ड बमोजिम निर्माण
                                    कार्य गर्ने गराउने जिम्मा दोस्रो पक्षको हुनेछ ।</p>
                                <p>४. नक्शा पास बमोजिमको नक्शा र डिजाईन अनुसारको निर्माण कार्य गर्ने र प्राविधिक सल्लाह,
                                    सुझाव, उपलब्ध गराउन
                                    प्राविधिक सुपरिवेक्षक नियुक्त गर्ने जिम्मा पहिलो पक्षको हुनेछ ।</p>
                                <p> ५. भवन निर्माण भइरहेको अवस्थामा दोश्रो पक्ष (ठेकेदार) बाट नक्शा पासको नक्शा र डिजाईन
                                    बमोजिम निर्माण कार्य नगरेको, नभएको पाइएमा पहिलो पक्षले प्राविधिक सुपरिवेक्षक र यस
                                    {{config('applicationDetail.office_type')}}मा तुरुन्त खबर गर्नुपर्नेछ ।</p>
                                <p>६. नक्सापास बमोजिम 'राष्ट्रिय भवन संहिता-२०६०' र यस {{config('applicationDetail.office_type')}}को मापदण्ड विपरित
                                    निर्माण गर्न
                                    घरधनी र प्राविधिक सुपरिवेक्षकले (ठेकेदार/निर्माणकर्मी) लाई दबाब दिएमा निर्माण कार्य
                                    रोकेर तुरुन्त यस {{config('applicationDetail.office_type')}}मा लिखित जानकारी गराउनुपर्नेछ। उक्त अवस्थाको जानकारी
                                    नगराई मापदण्ड विपरीत निर्माण कार्य जारी राखेमा आइपर्ने जोखिमको जिम्मेवार सम्बन्धित
                                    निर्माणकर्मी/ठेकेदार नै हुनेछ ।</p>
                                <p>७. नक्सापास बमोजिम 'राष्ट्रिय भवन संहिता-२०६०' र यस {{config('applicationDetail.office_type')}}को मापदण्ड बमोजिम
                                    भवन निर्माण गर्न दुबै पक्ष राजीखुशी छौ । यदि दुबै पक्षबाट ऐन, नियम र मापदण्ड बमोजिम
                                    निर्माण नभएमा यस {{config('applicationDetail.office_type')}}बाट जारी हुने निर्देशन मान्न हामी तयार छौ र उक्त
                                    सम्झौतामा सही छाप गरी एक-एक प्रति लियौँ दियौँ ।</p>
                                <table class="table table-bordered mt-2">
                                    <thead>
                                    <tr>
                                        <th scope="col">प्रथम पक्ष</th>
                                        <th scope="col">दोस्रो पक्ष</th>
                                        <th scope="col">रोहवर</th>
                                        <th scope="col">रोहवर</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>

                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                        <td><span class="underline-dotted custom-width"></span></td>
                                    </tr>
                                    <tr>
                                        <td>घरधनी</td>
                                        <td>ठेकेदार</td>
                                        <td>प्रविधिक सुपरिवेक्षण</td>
                                        <td>सम्बन्धित संस्था</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <p>मिति: २०७<span class="underline-dotted custom-width"></span>महिना<span
                                        class="underline-dotted custom-width"></span>गते<span
                                        class="underline-dotted custom-width"></span> ।</p>

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
