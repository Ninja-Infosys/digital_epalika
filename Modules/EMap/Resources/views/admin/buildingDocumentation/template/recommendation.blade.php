@extends('admin.layouts.master')

@section('content')
    <div class="row m-3">
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

                        <li class="breadcrumb-item active">अभिलेखीकरण</li>
                    </ol>
                </div>
                <h4 class="page-title">सिफारिस पत्रको ढाँचा</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card p-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title">सिफारिस पत्रको ढाँचा </h4>
                        <div class="d-flex justify-content-between">
                            <x-print-button title="७ दिने सूचना" target-element="printData" />

                            <a href="{{ route('emap.admin.buildingDocumentation.index') }}"
                                class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-list"> दर्ता भएका अभिलेखीकरण</i>
                            </a>
                        </div>
                    </div>
                </div>

                @if (!is_null(auth()->user()->ward_no) && $buildingDocumentation->sent_admin == 'land_confirmation_show')
                    <form action="{{ route('emap.admin.buildingDocumentation.sentToAdmin', $buildingDocumentation) }}"
                        method="post" style="display: inline">
                        @csrf
                        @method('put')

                        <button data-bs-type="edit" type="submit" title="प्रिन्ट गर्नुहोस"
                            class="btn btn-xs btn-outline-warning">
                            <i class="fa fa-print"></i>पालिकामा पाठाउनुहोस
                        </button>
                    </form>
                @endif
                @if ($buildingDocumentation->sent_admin == 'recommendation_sent' || !is_null(auth()->user()->ward_no))
                    <div class="card-body px-0">
                        <div Id="printData">
                            <div class="text-center fw-bolder">
                                <div><span style="font-size:14px"><strong>अनुसूची ४</strong></span><br />
                                    <span style="font-size:14px"><strong>निर्देशिकाको दफा ५ संग
                                            सम्वन्धिता</strong></span><br />
                                    <span style="font-size:14px"><strong>सिफारिस पत्रको ढाँचा</strong></span>
                                </div>
                            </div>

                            <div class="subject text-justify-center lh-lg px-5 ">
                                <h5><strong> {{ $officeSetting->localBody->local_body ?? '' }}</strong></h5>
                                <h5><strong>{{$buildingDocumentation->land_ward_no ?? ''}} वडा कार्यालय</strong></h5>

                            </div>
                            <div class="d-flex text-justify-center lh-lg px-5">
                                <p>प.स.:</p>
                                <p style="margin-left: 500px;">मिति :{{ get_nepali_number($currentDate)}}</p>
                            </div>
                            <p class="text-justify-center lh-lg px-5"> चालनी नं. :</p>
                            <div class="text-justify-center lh-lg px-5">
                                <p>श्री {{ $officeSetting->localBody->local_body ?? '' }}को कार्यालय</p>
                                <p>{{ $officeSetting->site_address }} ।</p>
                            </div>
                            <p class="text-justify-center text-center lh-lg px-5"> <strong>बिषय : घर जग्गा अभिलेखिकरणको
                                    सिफारिस
                                    पठाइएको बारे ।</strong></p>
                            <p class="text-justify-center  lh-lg px-5">
                                प्रस्तुत बिषयमा {{ $officeSetting->localBody->local_body ?? '' }} वडा नं.
                                {{ get_nepali_number($buildingDocumentation->land_ward_no) }} साविक जिल्ला
                                {{ $buildingDocumentation->former_district }}
                                {{ $buildingDocumentation->former_local_body }} वडा नं
                                {{ get_nepali_number($buildingDocumentation->former_ward_no) }} कित्ता नं.
                                {{ get_nepali_number($buildingDocumentation->plot_no) }} मा
                                {{ get_nepali_number($buildingDocumentation->land_area) }} क्षेत्रफलमा घर
                                निर्माण गरेको घरधनि श्री. {{ $buildingDocumentation->house_owner_name }} ले यस कार्यालयमा
                                घर अभिलेखिकरणका लागी सिफारिस गरिपाउँ भनि दिएको निवेदन माथि जाँचबुझ
                                गर्दा निजले पेश गरेको घरको अभिलेखिकरण गर्न तोकिएको मापदण्ड हरु सबै पुरा भएको देखिएकाले घर
                                अभिलेखिकरण गरिदिनुहुन सिफारिस साथ अनुरोध छ
                            </p>
                            <p class="text-justify-center  lh-lg px-5">
                                ...................<br>
                                वडा अध्यक्ष
                            </p>
                            <p class="text-justify-center lh-lg px-5"> <strong>(नगरपालिकामा सिफारिस गर्दा तपसिल बमोजिमका
                                    कागजात
                                    संलग्न हुनपर्नेछ)</strong></p>

                            <div class="subject text-justify-center lh-lg px-5">
                                <ol>
                                    <li>
                                        सम्बन्धीत वडा कार्यालयको सिफारिस पत्र (१ प्रति)
                                    </li>
                                    <li>
                                        नगरपालिकामा सूचिकृत भएको कन्सल्टेन्सीबाट तयार भई सहिछाप भएको घरको नक्सा (२ प्रति)
                                    </li>

                                    <li>नेपाली नागरिकताको प्रमाण पत्रको प्रतिलिपी (१ प्रति)</li>

                                    <li>चालु आ.व को मालपोत कर तिरेको प्रमाण (१ प्रति)</li>
                                    <li>पासपोर्ड साइजको फोटो (४ प्रति)</li>

                                    <li>जग्गा धनी दर्ता प्रमाण पूर्जाको प्रतिलिपी (१ प्रति)</li>
                                    <li>घर बनेको जग्गाको ब्लु प्रिन्ट, फाईल वा ट्रेस नक्साको सक्कल प्रतिलिपी (१ प्रति)</li>
                                    <li>चार किल्ला प्रमाणित सिफारिसको प्रतिलिपी (१ प्रति)</li>
                                    <li>निर्मित घर टहरा तथा पक्की भवनको चौतर्फी फोटो (१/१ प्रति)</li>

                                </ol>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endsection
