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

                </div>
                <div class="btn-group mb-3">
                    <button class="bg-success text-white" onclick=" printJS({
                printable: 'printData',
                type: 'html',
                documentTitle: 'नक्सा प्रमाणित प्रमाण-पत्र',
                showModal: true,
                css: '{{asset('assets/backend/css/print.css')}}',
                honorMarginPadding: false,
                modalMessage: 'तपाईंको कागजात छाप्नको लागि तयार हुँदैछ।'})"><i class="fa fa-print"></i> Print
                    </button>
                </div>
            </div>
            </div>
        </div><!-- end col-->
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-3">
                    <div class="font-black" id="printData">
                        <div class="row">
                            <div class="col-md-2">
                                <img height="100" width="110" src="{{asset('images/np.png')}}">
                            </div>
                            <div class="col-md-8 text-center">
                                <x-header-component/>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mb-4">
                            <div class="row ">
                                <div class="col-sm-6">
                                    <div class="photo" style="width: 6rem; height: 6rem;">
                                        <div class="card-body">
                                            <h5 class="text-center">फोटो</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-6">
                                    प्रमाण पत्र नं.
                                    <div class="underline-dotted custom-width"></div>
                                </div>
                                <div class="col-md-6 text-end">मिति:
                                    <div class="underline-dotted custom-width"></div>
                                </div>
                            </div>
                        <h4 class="text-center"><b>नक्सा प्रमाणित प्रमाण-पत्र</b></h4>
                        <span>श्री <span class="underline-dotted custom-width"></span><br>
                            &emsp;&emsp; ने.ग.उ.म.न.पा. वडा नं. <span class="underline-dotted custom-width"></span>
                        </span>
                        <div class="mt-5">
                            &emsp;&emsp;&emsp;&emsp;तपाईको नाममा दर्ता रहेको यस उप-महानगरपालिका अन्तर्गत साविकवडा नं.
                            <span class="underline-dotted custom-width"></span> हाल वडा नं. <span
                                class="underline-dotted custom-width"></span>
                            कि.नं <span class="underline-dotted custom-width"></span> सि.नं. <span
                                class="underline-dotted custom-width"></span>
                            ज.वि <span class="underline-dotted custom-width"></span> जग्गाको पूर्व <span
                                class="underline-dotted custom-width"></span> पश्चिम <span
                                class="underline-dotted custom-width"></span>
                            उत्तर <span class="underline-dotted custom-width"></span> द्क्षिण <span
                                class="underline-dotted custom-width"></span> यति चार किल्ला भित्राको जग्गामा
                            लम्वाई<span class="underline-dotted custom-width"></span>
                            चौडाई <span class="underline-dotted custom-width"></span> उचाई <span
                                class="underline-dotted custom-width"></span> हुने गरी भुई तले/ एक तले/ दुई तले/ तीन
                            तले/ चार तले पक्की घरको र कम्पाउण्ड वलको नक्सा प्रमाणित गरी पाउँ भनी तपाईको नक्साको
                            दरखास्त परी कारवाही भई यस उप-महानगरपालिकाबाट चेक जाँच गर्दा सडकको बीच सेन्टरबाट <span
                                class="underline-dotted custom-width"></span> तर्फ सडक नालीको लागि जग्गा छाडी मिति <span
                                class="underline-dotted custom-width"></span> सालमा बनाइसकेको क्षेत्रफ़ल
                            <span class="underline-dotted custom-width"></span> बएको घरको नक्सा पहिलो नगर सभाको
                            निर्णयानुसार प्रमाणित गरी यो प्रमाण-पत्र दिइएको छ। तर यसरी नक्सा प्रमाणित भएका घरहरुको मोहडा
                            फेर्न, तल्ला थप्न प्रेम साविकमा कुनै किसिमको हेरफेर गर्नु प्रेम उप-महानगरपालिकाले तोकेको
                            मापदण्ड
                            भित्र रही मात्र नक्सा स्वीकृत गरिने छ। वातावरण संरक्षणका लागि बिरुवा अनिवार्य रुपमा लगाउनु
                            पर्नेछ ।
                        </div>
                        <div class="d-flex justify-content-around mt-3">
                            <span><span class="underline-dotted custom-width"></span><br>
                            फाँटवाला</span>
                            <span><span class="underline-dotted custom-width"></span><br>
                            इन्जिनियर</span>
                            <span><span class="underline-dotted custom-width"></span><br>
                            प्रमुख प्रशासकीय अधिकृत</span>
                        </div>
                        <div class="break-page"></div>
                        <h3 class="text-center text-decoration-underline mt-3">घर नक्सा नामसारी सम्बन्धि विवरण</h3>
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">सि.नं.</th>
                                <th scope="col">मिति</th>
                                <th scope="col">नामसारी गरी<br>
                                    दिनेको नामथर ठेगाना
                                </th>
                                <th scope="col">नामसारी गरी<br>
                                    लिनेको नामथर ठेगाना
                                </th>
                                <th>निर्णय मिति</th>
                                <th>नजग्गा धनीको फोटो</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
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
                                <td></td>
                            </tr>
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
