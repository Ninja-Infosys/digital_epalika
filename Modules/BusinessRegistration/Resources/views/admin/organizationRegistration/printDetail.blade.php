@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                                <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.businessRegistration.businessRegistration.index')}}">व्यवसाय
                                दर्ता </a>
                        </li>
                        <li class="breadcrumb-item active">प्रमाणपत्र प्रिन्ट</li>
                    </ol>
                </div>
                <h4 class="page-title">प्रमाणपत्र प्रिन्ट </h4>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">प्रमाणपत्र प्रिन्ट</h4>
                        <x-print-button
                            target-element="print"
                            title="{{$organizationRegistration-> registration_no}}"
                        />
                    </div>
                </div>
                <div class="card-body">
                    <div id="print" class="certificate" style="border-image: url({{asset('assets/backend/border.png')}}) 30 stretch">
                        <div class="lh-lg font-15 position-relative">
                            {!! letterHead() !!}

                            <div class="d-flex justify-content-between mt-3">
                                <div>
                                    <p><strong>प्रमाणपत्र नं :</strong> {{get_nepali_number($organizationRegistration-> registration_no)}}</p>
                                </div>
                                <div class="certificate-title my-5">
                                    <h3>संस्था दर्ता प्रमाण-पत्र</h3>
                                </div>
                                <div>
                                    <p><strong>दर्ता मिति :</strong> {{get_nepali_number($organizationRegistration->registration_date_ne)}}</p>
                                </div>
                            </div>

                            <div class="mt-2" style="text-align: justify;">
                                <p>
                                    <span class="mx-1">{{$officeSetting->localBody->local_body??''}}</span>
                                    वडा नं. <span class="mx-1">{{get_nepali_number($organizationRegistration->ward_no)}}</span>
                                    मा स्थित {{$organizationRegistration->tole}} मा संस्थालाई {{$officeSetting->localBody->local_body??''}}को मिति {{get_nepali_number($organizationRegistration->registration_date_ne)}} को निर्णय बमोजिमदर्ता गरि यो प्रमाण-पत्र प्रदान गरिएको छ |
                                </p>
                                <p class="mt-2">"यस नगरपालिकाको आर्थिक, सामाजिक, भौतिक पूर्वाधार, शहरी सुशासन लगायतका क्षेत्रम संस्थाको सक्रिय सहभागिताको अपेक्षाका साथै उत्तरोत्तर प्रगतिको शुभकामना व्यत्त गर्दछु |</p>
                            <div class="d-flex justify-content-end mt-5">
                                <p>.......................................<br>
                                प्रमुख प्रशासकीय अधिकृत</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
