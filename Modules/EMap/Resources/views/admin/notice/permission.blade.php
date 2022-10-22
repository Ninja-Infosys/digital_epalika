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
                        <h3> {{\Modules\EMap\Enums\NoticeTypeEnum::PERMISSION->label()}}</h3>
                        <div class="d-flex justify-content-between">
                            <x-application-component
                                :application-type="\Modules\EMap\Enums\NoticeTypeEnum::PERMISSION"
                                url="{{route('emap.admin.map.map-apply.notice.upload.permission',$mapApply)}}"/>

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
                                <h3 class="text-center mt-3"><b>मन्जुरीनामा</b></h3>
                                <div class="row">
                                    <p class="vertical">
                                        दरखास्त : <span class="underline-dotted custom-width"></span>
                                    </p>
                                </div>
                                <div class="row">
                                    <p class="letter">
                                        लिखितम<span class="underline-dotted custom-width"></span>जिल्ला<span class="underline-dotted custom-width"></span>
                                        उ.न.पा./गा.वि.स. वडा नं.<span class="underline-dotted custom-width"></span> बस्ने वर्ष<span class="underline-dotted custom-width"></span>
                                        को आगे<span class="underline-dotted custom-width"></span> मेरो/हाम्रो नाउँमा दर्ता भएको साविक<span class="underline-dotted custom-width"></span>
                                        हाल<span class="underline-dotted custom-width"></span> उ.न.पा. वडा नं.<span class="underline-dotted custom-width"></span>
                                        स्थित कि.नं.<span class="underline-dotted custom-width"></span> क्षेत्रफल<span class="underline-dotted custom-width"></span>
                                        भएको जग्गामा घरटहरा, पर्वत, बाटो बनाउनको लागि<span class="underline-dotted custom-width"></span> उ.न.पा. कार्यालयमा नक्सा संहितको दरखास्त
                                        दिई नक्सा पास तथा निर्माण इजाजत लिनका लागि<span class="underline-dotted custom-width"></span> उ.न.पा. वडा नं.<span class="underline-dotted custom-width"></span>
                                        बस्ने वर्ष<span class="underline-dotted custom-width"></span> को श्री<span class="underline-dotted custom-width"></span> ले मन्जुरीनामा लेखिदिनु भनी मलाई भन्दा
                                        मेरो चित्त बुझ्यो | उक्त जग्गामा घर, टहरा, पर्खाल, बाटो निर्माण गरेमा मेरो मन्जुरी छ | पछि उक्त मेरो नाउँको जग्गामा बनाउन पाउने होइन भनी कुनै कुराको उजुरी गर्ने छैन | गरे
                                        यसै कागजबाट बदर गरिदिनु भनी मेरो मनोमान खुशीराजीसँग<span class="underline-dotted custom-width"></span> बनाउन मन्जुरीनामाको कागज लेखिदिएँ साक्षी किनारको सदर |
                                    </p>
                                </div>
                                <p class="mt-2">इति सम्वत्<span class="underline-dotted custom-width"></span> साल<span class="underline-dotted custom-width"></span>
                                    महिना<span class="underline-dotted custom-width"></span> गते रोज<span class="underline-dotted custom-width"></span>
                                    शुभम</p>
                                <div class="d-flex justify-content-between mt-4">
                                    <p class="my-5">दरखास्त :<span class="underline-dotted custom-width"></span></p>
                                    <div class="d-flex justify-content-end">
                                        <div class="row p-4">
                                            <div class="col-sm-6">
                                                <div class="card" style="width: 7rem; height: 8rem;">
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">दायाँ</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-4">
                                            <div class="col-sm-6">
                                                <div class="card" style="width: 7rem; height: 8rem;">
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">वायाँ</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-decoration-underline">सक्षीहरु</h5>
                                <p>१. श्री<span class="underline-dotted custom-width"></span> दरखास्त<span class="underline-dotted custom-width"></span></p>
                                <p class="mt-2">२. श्री<span class="underline-dotted custom-width"></span> दरखास्त<span class="underline-dotted custom-width"></span></p>
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
            .vertical {
                transform: rotate(90deg);
                transform-origin: left top 0;
                margin-left: 30px;
                padding: 0 60px;
                color: black;
            }
            .letter{
                padding-left: 30px;

            }
        </style>
    @endpush
    @push('scripts')
        <script src="{{asset('assets/backend/js/printAjaxScript.js')}}"></script>
    @endpush

@endsection
