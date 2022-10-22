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
                        <h3> {{\Modules\EMap\Enums\NoticeTypeEnum::FIFTEEN_DAYS_NOTICE_ADJOURNED->label()}}</h3>
                        <div class="d-flex justify-content-between">
                            <x-application-component
                                :application-type="\Modules\EMap\Enums\NoticeTypeEnum::FIFTEEN_DAYS_NOTICE_ADJOURNED"
                                url="{{route('emap.admin.map.map-apply.notice.upload.notice',$mapApply)}}"/>

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
                                <div class="top-line d-flex justify-content-between mt-5">
                                    <p>पत्र सं: <span class="underline-dotted custom-width"></span></p>
                                    <p class="">मिति: <span class="underline-dotted custom-width"></span></p>
                                </div>
                                <p>चलानी नं: <span class="underline-dotted custom-width"></span></p>
                                <div class="res mt-3">
                                    <p>श्री वडा समितिको कार्यालय <br>
                                        {{config('applicationDetail.to_office.office_name')}} <br>
                                        वडा नं:<span class="underline-dotted custom-width"></span></p>
                                </div>
                                <p class="text-center my-3"><b>बिषय: १५ दिने सूचना टास सम्बन्धमा
                                        ।</b></p>
                                <p class="mb-3">
                                    &emsp;&emsp;&emsp;यस {{config('applicationDetail.to_office.office_name')}} वडा नं. <span
                                        class="underline-dotted">{{$mapApply->landDetail->ward_no ?? ''}}</span> बस्ने
                                    श्री <span class="underline-dotted">{{$mapApply->houseOwner->name ?? ''}}</span> ले ऐ. वडा नं.<span
                                        class="underline-dotted">{{$mapApply->landDetail->ward_no ?? ''}}</span> साविक <span
                                        class="underline-dotted">{{$mapApply->landDetail->former_ward_no ?? ''}}</span>
                                    कि.नं.<span class="underline-dotted">{{$mapApply->landDetail->plot_no ?? ''}}</span> मा भवन बनाउन नक्सा पास
                                    स्वीकृतिका लागि दरखास्त पर्न आएकोले सो सम्बन्धी प्रकाशित १५ दिने सूचना यसै साथ
                                    संलग्न सूचना त्यस वडा समितिको कार्यालय र घर निर्माण स्थल<span
                                        class="underline-dotted custom-width"></span> मा टास गरी सो को टास मुचुल्का
                                    पठाईदिनुहुन अनुरोध छ |
                                </p>

                                <div class="d-flex justify-content-end mt-5"><span
                                        class="underline-dotted custom-width"></span></div>
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
