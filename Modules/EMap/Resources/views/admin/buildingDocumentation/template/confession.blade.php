@extends('admin.layouts.master')

@section('content')
    <div class="row m-3">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}"
                                     alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>

                        <li class="breadcrumb-item active">अभिलेखीकरण</li>
                    </ol>
                </div>
                <h4 class="page-title">कबुलियती नामा</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card p-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title">कबुलियती नामा</h4>
                        <div class="d-flex justify-content-between">
                            <x-print-button title="कबुलियती नामा" target-element="printData"/>

                            <a href="{{ route('emap.admin.buildingDocumentation.index') }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-list"> दर्ता भएका अभिलेखीकरण</i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div id="printData">
                                        <div class="text-center font-weight-bold">
                                            <h3><strong>कबुलियती नामा :</strong></h3>
                                        </div>
                                        <div class="subject">
                                            <p class=" text-justify-center lh-lg px-5 fs-4">
                                                लिखितम जिल्ला सल्यान बागचौर नगरपालिकाको कार्यालयले कबुलियत नामा कागज
                                                गराई लिने तस्य आगे घर नक्सा सम्बन्धी कबुलियत नामा कागज गरि दिनेको जिल्ला
                                                सल्यान साविक <span class="dashed-bottom">{{$buildingDocumentation->applicant_former_district}}</span> गा.वि.स.<span class="dashed-bottom">{{$buildingDocumentation->applicant_former_locaL_body}}</span> वडा नं <span class="dashed-bottom">{{get_nepali_number($buildingDocumentation->applicant_former_ward_no)}}</span> मा बस्ने {{$buildingDocumentation->house_owner_name}}को
                                                ना.प्र.नं <span class="dashed-bottom">{{$buildingDocumentation->citizenship_no}}</span>को नाँउमा दर्ता कायम रहेको जग्गा जिल्ला
                                                सल्यान साविक गा.वि.स <span class="dashed-bottom">{{$buildingDocumentation->former_locL_body}}</span> वडा नं.<span class="dashed-bottom">{{$buildingDocumentation->applicant_former_locaL_body}}</span> वडा नं <span class="dashed-bottom">{{get_nepali_number($buildingDocumentation->former_ward_no)}}</span> को
                                                कि.नं<span class="dashed-bottom">{{$buildingDocumentation->applicant_former_locaL_body}}</span> वडा नं <span class="dashed-bottom">{{get_nepali_number($buildingDocumentation->plot_n0)}}</span> को ज.वि <span class="dashed-bottom">{{$buildingDocumentation->land_detail}}</span> जग्गा भित्र <span class="dashed-bottom">{{$buildingDocumentation->applicant_former_locaL_body}}</span> वडा नं <span class="dashed-bottom">{{get_nepali_number($buildingDocumentation->applicant_former_ward_no)}}</span> मिति <span class="dashed-bottom">{{get_nepali_number($buildingDocumentation->house_built_year)}}</span> गतेमा घर निर्माण
                                                कार्य सम्पन्न भएकोले
                                                सो सम्बन्धमा यस बागचौर नगरपालिकाबाट प्राविधिक अनुमानको आधारमा सहरी बिकास
                                                तथा भवन निर्माण मापदण्ड पुरा नभएको आधारमा उक्त पक्की घर निर्माण भएकोले
                                                प्राविधिक तथा कोही कसैलाई पछिसम्म उजुर बाजुर गर्ने छैन साथै भवनले क्षती
                                                पूऱ्याएमा कसैलाई उजुर समेत गर्ने छैन साथै पछि बाटो सडकहरू बिस्तार भएमा
                                                बनेको पक्की घर भत्काउनु परेमा समेत मन्जुर छु भनि मेरो आ-आफ्ना मनोमान
                                                राजीखुसी सँग यो कबुलियत नामा कागजमा सहिछाप गरि बागचौर नगरपालिकाको
                                                कार्यालय मार्फत नेपाल सरकारमा चढायौं।

                                            </p>
                                            <p class=" text-justify-center lh-lg px-5 fs-4"> ई.ति सम्बत् २०............साल महिना...........गते
                                                रोज.............मा सुभम्।</p>
                                            <p class=" text-justify-center lh-lg px-5 fs-4"> हस्ताक्षर</p>
                                            <p class=" text-justify-center lh-lg px-5 "> .................</p>
                                            <div class="col-md-6 lh-lg px-5" style="margin-left:450px;">
                                                <p>दाँया</p>
                                                <div class="d-flex ms-auto">
                                                    <div class="border border-primary" style="height: 100px; width: 100px;"></div>
                                                    <div class="border border-primary" style="height: 100px; width: 100px;"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
