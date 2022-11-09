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
            <h3> {{\Modules\EMap\Enums\NoticeTypeEnum::PERMISSION->label()}}</h3>
        </div>
        <div class="col-sm-8">
            <div class="text-sm-end">
                <div class="btn-group mb-3">
                    <x-application-component
                        :application-type="\Modules\EMap\Enums\NoticeTypeEnum::PERMISSION"
                        url="{{route('emap.admin.map.map-apply.notice.upload.permission',$mapApply)}}"/>
                </div>
                <div class="btn-group mb-3">
                    <button class="bg-success text-white" onclick=" printJS({
                printable: 'printData',
                type: 'html',
                documentTitle: 'मन्जुरीनामा',
                showModal: true,
                css: '{{asset('assets/backend/css/print.css')}}',
                honorMarginPadding: false,
                modalMessage: 'तपाईंको कागजात छाप्नको लागि तयार हुँदैछ।'})"><i class="fa fa-print"></i> Print
                    </button>
                </div>
            </div>
        </div><!-- end col-->
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-body p-3">
                    <div class="font-black" id="printData">
                        <h3 class="text-center mt-3"><b>मन्जुरीनामा</b></h3>

                        <div class="vertical">
                            दस्तखत : <span class="underline-dotted custom-width"></span>
                        </div>
                        <div class="text">
                                    <span>
                                        लिखितम<span class="underline-dotted custom-width"></span>जिल्ला<span
                                            class="underline-dotted custom-width"></span>
                                        उ.न.पा./गा.वि.स. वडा नं.<span class="underline-dotted custom-width"></span>
                                        बस्ने वर्ष<span class="underline-dotted custom-width"></span>
                                        को आगे<span class="underline-dotted custom-width"></span> मेरो/हाम्रो नाउँमा
                                        दर्ता भएको साविक<span class="underline-dotted custom-width"></span>
                                        हाल<span class="underline-dotted custom-width"></span> उ.न.पा. वडा नं.<span
                                            class="underline-dotted custom-width"></span>
                                        स्थित कि.नं.<span class="underline-dotted custom-width"></span> क्षेत्रफल<span
                                            class="underline-dotted custom-width"></span>
                                        भएको जग्गामा घरटहरा, पर्वत, बाटो बनाउनको लागि<span
                                            class="underline-dotted custom-width"></span> उ.न.पा. कार्यालयमा नक्सा
                                        संहितको दस्तखत
                                        दिई नक्सा पास तथा निर्माण इजाजत लिनका लागि<span
                                            class="underline-dotted custom-width"></span> उ.न.पा. वडा नं.<span
                                            class="underline-dotted custom-width"></span>
                                        बस्ने वर्ष<span class="underline-dotted custom-width"></span> को श्री<span
                                            class="underline-dotted custom-width"></span> ले मन्जुरीनामा लेखिदिनु भनी
                                        मलाई भन्दा
                                        मेरो चित्त बुझ्यो | उक्त जग्गामा घर, टहरा, पर्खाल, बाटो निर्माण गरेमा मेरो
                                        मन्जुरी छ | पछि उक्त मेरो नाउँको जग्गामा बनाउन पाउने होइन भनी कुनै कुराको उजुरी
                                        गर्ने छैन | गरे
                                        यसै कागजबाट बदर गरिदिनु भनी मेरो मनोमान खुशीराजीसँग<span
                                            class="underline-dotted custom-width"></span> बनाउन मन्जुरीनामाको कागज
                                        लेखिदिएँ साक्षी किनारको सदर |
                                    </span><br>


                            <span class="letter mt-2">
                                    इति सम्वत्<span class="underline-dotted custom-width"></span>
                                    साल<span class="underline-dotted custom-width"></span>
                                    महिना<span class="underline-dotted custom-width"></span>
                                    गते रोज<span class="underline-dotted custom-width"></span>
                                    शुभम</span>
                        </div>
                        <div class="row mt-4">
                            <div class="d-flex justify-content-between">
                                <p class="signature my-5">दस्तखत:<span class="underline-dotted"></span></p>
                                <div class="d-flex justify-content-end">
                                    <div class="row p-4">
                                        <div class="col-md-6">
                                            <div class="finger" style="width: 7rem; height: 10rem;">
                                                <div class="card-body">
                                                    <h5 class="card-title text-center mt-2">दायाँ</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-4">
                                        <div class="col-md-6">
                                            <div class="finger" style="width: 7rem; height: 10rem;">
                                                <div class="card-body">
                                                    <h5 class="card-title text-center mt-2">वायाँ</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="person">
                            <h5 class="text-decoration-underline">सक्षीहरु</h5>
                            <p>१. श्री<span class="underline-dotted custom-width"></span> दरखास्त<span
                                    class="underline-dotted custom-width"></span></p>
                            <p class="mt-2">२. श्री<span class="underline-dotted custom-width"></span>
                                दरखास्त<span class="underline-dotted custom-width"></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script src="{{asset('assets/backend/js/printAjaxScript.js')}}"></script>
    @endpush

@endsection
