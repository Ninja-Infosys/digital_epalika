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
                        <h3> {{\Modules\EMap\Enums\NoticeTypeEnum::GRANTING_PERMISSION_FOR_CONSTRUCTION_UP_TO_THE_PLINTH_LEVEL_OF_THE_HOUSE->label()}}</h3>
                        <div class="d-flex justify-content-between">
                            <x-application-component
                                :application-type="\Modules\EMap\Enums\NoticeTypeEnum::GRANTING_PERMISSION_FOR_CONSTRUCTION_UP_TO_THE_PLINTH_LEVEL_OF_THE_HOUSE"
                                url="{{route('emap.admin.map.map-apply.notice.upload.order',$mapApply)}}"/>

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
                                <div class="top-line d-flex justify-content-end mt-2">
                                    <p class="">मिति: <span class="underline-dotted custom-width">
                            </span></p>
                                </div>
                                <h3 class="text-center my-3"><b>टिप्पणी र आदेश</b></h3>
                                <p class="text-center my-3"><b>बिषय: घरको प्लिन्थ लेभल सम्मको निर्माणका निमित्त इजाजत
                                        प्रदान गर्ने ।</b></p>
                                <p>श्रीमान,</p>
                                <p class="mb-3">
                                    जग्गा धनी <span class="underline-dotted ">{{$mapApply->landOwner->name??''}}</span> को नाममा दर्ता रहेको यस
                                    {{config('applicationDetail.office_type')}} वडा नं. <span class="underline-dotted ">{{$mapApply->landDetail->ward_no??''}}</span>
                                    टोल<span class="underline-dotted ">{{$mapApply->landDetail->tole??''}}</span> मा अवस्थित साविक वडा नं.
                                    <span class="underline-dotted ">{{$mapApply->landDetail->former_ward_no??''}}</span>कित्ता नं. <span
                                        class="underline-dotted ">{{$mapApply->landDetail->plot_no??''}}</span> क्षेत्रफल <span
                                        class="underline-dotted ">{{$mapApply->landDetail->unit_value??''}}  {{$mapApply->landDetail->unit->title??''}}</span> मा भवन निर्माण गर्ने घरधनी श्री
                                    <span class="underline-dotted ">{{$mapApply->houseOwner->name??''}}</span> ले भवन निर्माण गर्ने स्वीकृति
                                    पाउँ
                                    भनी स्थानीय सरकार संचालन ऐन २०७४ को दफा २७, २८, २९, ३० बमोजिम मिति<span
                                        class="underline-dotted custom-width"></span> मा नक्सा सहित आवश्यक प्रमाण राखी
                                    निवेदन दिनुभएकोमा सोहि ऐनको दफा ३०, ३१ बमोजिम १५ दिन सन्धीसर्पंनको उजुरीबारे सूचना
                                    प्रकाशीत गरिएकोमा ऐनको म्यादभित्र कसैको उजुरी नपरेकोले श्री <span
                                        class="underline-dotted custom-width"></span> लाई निर्माण कार्य स्वीकृति दिंदा
                                    कसैको हानी नोक्सानी
                                    हुँदैन भनी उल्लेख भई आएको, साथै प्रविधिकको स्थलगत प्रतिवेदनमा समेत नक्सापास गरी भवन
                                    निर्माण स्वीकृति दिने मिल्ने भन्ने मिति<span
                                        class="underline-dotted custom-width"></span> मा भएको सर्जमिन मुचुल्कामा उल्लेख
                                    भै आएकोले दफा ३२, ३३, ३४, ३५ बमोजिम<span
                                        class="underline-dotted custom-width"></span> इजाजत दिन मनासिब देखि पेश गरेको छु
                                    ।
                                </p>
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
