@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.listRegistrations.listRegistration.index') }}">मौजुदा सुची दर्ता</a>
                        </li>
                        <li class="breadcrumb-item active">प्रमाणपत्र प्रिन्ट</li>
                    </ol>
                </div>
                <h4 class="page-title">प्रमाणपत्र प्रिन्ट</h4>
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
                            title="प्रमाणपत्र"
                        />
                    </div>
                </div>
                <div class="card-body">
                    <div id="print" class="certificate"
                         style="border-image: url({{ asset('assets/backend/border.png') }}) 30 stretch; padding: 20px;">
                        <div class="lh-lg font-15 position-relative">
{{--                            {!! letterHead() !!}--}}


                                <div class="text-center ">
                                    <p class="certificate-title" style="font-size: 20px;"><u><strong>मौजुदा सुचीमा दर्ता भएको प्रमाण</strong></u></p>
                                </div>

                            <div>
                                <strong>प्रमाण पत्र नं:</strong> २५<br>
                                <strong>सुची दर्ता नं:{{get_nepali_number($listRegistration->registration_no)}}</strong> २५
                            </div>

                            <p class="mt-4">
                                श्री <strong>{{$listRegistration->name}}</strong> बाट गैडहवा गाउँपालिकाको कार्यालय तथा यस कार्यालय अन्तर्गतका वडा कार्यालयमा आर्थिक वर्ष <strong>{{get_nepali_number($listRegistration?->fiscalYear?->title)}}</strong> का लागि <strong>{{$listRegistration?->business_nature_description}}</strong>
                                निर्माण कार्य/सेवा/मालसामान उपलब्ध गराउने प्रयोजनार्थ मौजुदा सुचीमा सूचीकृत
                                हुन पाउँ भनी मिति <strong>{{get_nepali_number($listRegistration->date)}}</strong> मा यस कार्यालयमा निवेदन प्राप्त भएको
                                आधारमा मौजुदा सुचीमा दर्ता गरी यो प्रमाण प्रदान गरिएको छ।
                            </p>

                            <div class="text-end mt-5">
                                <strong>दर्ता गर्ने अधिकारीको<br></strong>
                                दस्तखत:...............<br>
                                नाम:..................<br>
                                पद:...................<br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
